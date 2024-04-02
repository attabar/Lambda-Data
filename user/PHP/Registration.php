<?php

// session_start();
header("Content-Type: application/json");

// include database connection file
require_once './connection.php';

class Registration {
        
    // Properties
    private $conn;
    
    // Constructor to initialize database connection
    public function __construct($conn){
        $this->conn = $conn;
    }
    
    // Method to validate and store registration data
    public function retrieveData($fname,$lname,$username,$email,$phone,$password,$cpassword){

        // Hash password and confirm password for security purpose
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $hashedCPassword = password_hash($cpassword, PASSWORD_DEFAULT);
        
        // validate input data
        $isValid = $this->validateData($fname,$lname,$username,$email,$phone,$password,$cpassword);
        
        if($isValid){

            // initialise the response variable
            $response = [];

            $stmt = $this->conn->prepare("INSERT INTO users(fname,lname,username,email,phone,pass,confirmPass) VALUES(?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssss", $fname,$lname,$username,$email,$phone,$hashedPassword,$hashedCPassword);
            $stmt->execute();

            if($stmt){
                // Get the id of the registered user
                $user_id = $stmt->insert_id;

                // Proceed to wallet account detail creation
                $this->createWalletAccount($fname, $lname, $username, $email, $user_id);
            }else {
                $response = ["success" => false, "message" => "Error encountered during Registration: " . $this->conn->error];
            }    
        }else{
            $response = ["success" => false, "message" => "Invalid Input"];
        }
        echo json_encode($response);
    }

     // Method to validate input data
     private function validateData($fname, $lname, $username, $email, $phone, $password, $cpassword) {
        $isValid = true;

        // initialise the response variable
        $response = [];

        // Validate First Name shall only contain letters and white space
        if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
            $response = ["success" => false, "message" => "Only letters and white space allowed For First Name"];
            $isValid = false;
        }

        // Validate Last Name shall only contain letters and white space
        if (!preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
            $response = ["success" => false, "message" => "Only letters and white space allowed For Last Name"];
            $isValid = false;
        }

        // Check if the username already exists
        $query = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $query->bind_param("s", $username);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            $response = ["success" => false, "message" => "Username Already Exists. Please choose another username"];
            $isValid = false;
        }

        // Check the validity of email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response = ["success" => false, "message" => "Error: Invalid email format"];
            $isValid = false;
        }

        // Validate mobile number input value
        if (strlen($phone) < 11) {
            $response = ["success" => false, "message" => "Mobile number Must be 11 digits."];
            $isValid = false;
        }

        // Validate password to contain a combination of lowercase, uppercase, and digit
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=!*_]).{8,}$/';
        if (!preg_match($pattern, $password)) {
            $response = ["success" => false, "message" => "Password needs Uppercase (A-Z), Lowercase (a-z), and Special Characters (@$%-)."];
            $isValid = false;
        }

        // Check if password and confirm password match
        if ($password !== $cpassword) {
            $response = ["success" => false, "message" => "Password and Confirm Password do not match"];
            $isValid = false;
        }
        echo json_encode($response);
        return $isValid;
    }

    // Method to process additional actions upon successful registration
    private function createWalletAccount($fname, $lname, $username, $email, $user_id) {

        // initialise the response variable
        $response = [];

        // Additional actions upon successful registration
        require_once 'AccessTokenGenerator.php';

        $contractCode = "0378523971";
        $Base_url = "https://sandbox.monnify.com";

        // pass these variables into the constructor in order to generate the token
        $apiKey = "MK_TEST_KWB4J5FHZN";
        $secretKey = "Q4PFEVJWE1YFAHFVDP1QQX8SGYGAVUM5";

        $access_token = new GenerateAccessToken($apiKey, $secretKey);

        $headers = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $access_token->getAccessToken()
        );
        $data = array(
            "accountReference" => uniqid(),
            "accountName" => $username,
            "currencyCode" => "NGN",
            "contractCode" => $contractCode,
            "customerEmail" => $email,
            "customerName" => $fname . $lname,
        );

        $url = $Base_url . "/api/v1/bank-transfer/reserved-accounts";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_CAINFO, '../../../../../../ca certificate/cacert-2023-12-12.pem');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $response = ["success" => false, "message" => 'cURL: ' . curl_error($ch)];
        } else {
            $responseData = json_decode($response);
            if ($responseData->requestSuccessful == 1) {
                // Extracted details
                $accountName = $responseData->responseBody->accountName;
                $accountNumber = $responseData->responseBody->accountNumber;
                $bankName = $responseData->responseBody->bankName;
                $accountReference = $responseData->responseBody->accountReference;

                // Insert into reserved account
                $reserved_table = $this->conn->prepare("INSERT INTO wallet_account(wallet_user_id, account_name, account_number, bank_name, account_reference) VALUES(?,?,?,?,?)");
                $reserved_table->bind_param("issss", $user_id, $accountName, $accountNumber, $bankName, $accountReference);
                $reserved_table->execute();

                
                if ($reserved_table) {
                    $response = ["success" => true, "message" => "Registration is Successful"];
                } else {
                    $response = ["success" => false, "message" => "Wallet Account didn't insert into Table Successfully: " . $this->conn->$reserved_table];
                }
            } else {
                $response = ["success" => false, "message" => "Error While Creating Wall]et: " . $responseData->responseMessage];
            }
            echo json_encode($response);
        }
    }
   
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $fname = $conn->real_escape_string($_POST['fname']);
    $lname = $conn->real_escape_string($_POST['lname']);
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $password = $conn->real_escape_string($_POST['password']);
    $cpassword = $conn->real_escape_string($_POST['cpassword']);

     // Instantiate Registration class and submit data
     $registration = new Registration($conn);
     $registration->retrieveData($fname, $lname, $username, $email, $phone, $password, $cpassword);
 }

?>