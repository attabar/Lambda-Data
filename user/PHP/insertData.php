<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
session_start();

$conn = new mysqli("localhost", "root", "", "vtu");
// Initialize validation flag
$isValid = true;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fname = $conn->real_escape_string($_POST['fname']);
    $lname = $conn->real_escape_string($_POST['lname']);
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $password = $conn->real_escape_string($_POST['password']);
    $cpassword = $conn->real_escape_string($_POST['cpassword']);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $hashedCPassword = password_hash($cpassword, PASSWORD_DEFAULT);

    // Define an array to store error messages
    // $errors = array();

    // Validate First Name shall only contain letters and white space
    if(!preg_match("/^[a-zA-Z-' ]*$/", $fname)){
        // $errors[] = "Only letters and white space allowed For First Name";
        $isValid = false;
        echo "Only letters and white space allowed For First Name ";
    }

    // Validate Last Name shall only contain letters and white space
    if(!preg_match("/^[a-zA-Z-' ]*$/", $lname)){
        // $errors[] = "Only letters and white space allowed For Last Name";
        echo "Only letters and white space allowed For Last Name ";
        $isValid = false;
    }

    // Code that checks weather a username is exist or not
    $query = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $query->bind_param("s", $username);
    $query->execute();

    $result = $query->get_result();
    
    if($result->num_rows > 0){
        // $errors[] = 'Username Already Exists. please Choose Another username';
        echo "Username Already Exists. please Choose Another username  ";
        $isValid = false;
    }
    
    // checks the validity of email format
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        // $errors[]  = "invalid_email format";
        echo "Error: invalid_email format ";
        $isValid = false;
    }

    // validate mobile number input value
    if(strlen($phone) < 11){
        // $errors[] = "Mobile number Must be 11 in digit.";
        echo "Mobile number Must be 11 in digit. ";
        $isValid = false;
    }

    //  Validate password to contain combination of lowercase, uppercase and digit
    // Regular expression pattern to match the password criteria
    $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=!*_]).{8,}$/';
    if(!preg_match($pattern, $password)){
        // $errors[] = "Password needs Uppercase(A-Z), Lowercase(a-z) and Special Characters(@$%-).";
        echo "Password needs Uppercase(A-Z), Lowercase(a-z) and Special Characters(@$%-). ";
        $isValid = false;
    }

    if($password !== $cpassword){
        // $errors[] = "Password and Confirm Password do not match";
        echo "Password and Confirm Password do not match ";
        $isValid = false;
    }
    if($isValid){

        $stmt = $conn->prepare("INSERT INTO users(fname,lname,username,email,phone,pass,confirmPass) VALUES(?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssss", $fname,$lname,$username,$email,$phone,$hashedPassword,$hashedCPassword);
        $stmt->execute();

        if($stmt){
            // Get the id of the registered user
            $user_id = mysqli_insert_id($conn);
            // include token generator file
            require_once 'AccessTokenGenerator.php';

            $contractCode = "0378523971";
            $Base_url = "https://sandbox.monnify.com";

            $access_token = generateAccessToken();

            $headers = array(
                'Content-Type:application/json',
                'Authorization: Bearer ' . $access_token
            );

            $data = array(
                "accountReference"=>uniqid(),
                "accountName"=>$username,
                "currencyCode"=>"NGN",
                "contractCode"=>$contractCode,
                "customerEmail"=>$email,
                // "customerBvn"=>"21212121212",
                "customerName"=>$fname . $lname,
            );

            $url = $Base_url."/api/v1/bank-transfer/reserved-accounts";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_CAINFO, '../../../../../../ca certificate/cacert-2023-12-12.pem');
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);

            if(curl_errno($ch)){
                $apiErrors[] = 'cURL: ' . curl_error($ch);
            } else {
                // This function i.e json_decode convert the response into PHP object
                $data = json_decode($response);
                if($data->requestSuccessful == 1){
                    // Extracted details
                    $accountName = $data->responseBody->accountName;
                    $accountNumber = $data->responseBody->accountNumber;
                    $bankName = $data->responseBody->bankName;
                    $accountReference = $data->responseBody->accountReference;
    
                    // insert into reserved account
                    $reserved_table = $conn->prepare("INSERT INTO wallet_account(wallet_user_id,account_name,account_number,bank_name,account_reference) VALUES(?,?,?,?,?)");
                    $reserved_table->bind_param("issss", $user_id,$accountName,$accountNumber,$bankName,$accountReference);
                    $reserved_table->execute();
    
                    if($reserved_table){
                        echo "<span style='color:green'>Registration is Successful</span>";
                    }else{
                        $insertWalletError = "Wallet Account didn't inserted into Table Successfully";
                    }
                } else {
                    $apiError = "Error While Creating Wallet: " . $data->responseMessage;
                }
            }    
          
        // if registration data is failed to insert into database run the code inside else block    
        }else{
            $registerFail = "Error encountered during Registeration: " . $conn->error;
        }
    }
// End of parent if statement
}
// if the parent if statement is not evaluated to true then run the code inside this else block
else{
    echo "The Request Method is Not POST or Submit is not define as name='submit'";
}
?>