<?php
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
    public function retrieveData($fullname,$email,$phone,$referral,$pin,$password){

        // Hash password and confirm password for security purpose
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        // validate input data
        $validationResult = $this->validateData($fullname,$email,$phone,$referral,$pin,$password);
        
        if($validationResult === true){

            $stmt = $this->conn->prepare("INSERT INTO users(fullname,email,phone,referral,pin,passwords) VALUES(?,?,?,?,?,?)");
            $stmt->bind_param("ssssss", $fullname,$email,$phone,$referral,$pin,$password);
            $stmt->execute();

            if($stmt){
                return ["success" => true, "message" => "Registration was successful" . $this->conn->error];

            }else {
                return ["success" => false, "message" => "Error encountered during Registration: " . $this->conn->error];
            }    
        }else{
            return $validationResult;
        }
    }

     // Method to validate input data
     private function validateData($fullname,$email,$phone,$referral,$pin,$password) {
        $isValid = true;

        // Validate First Name shall only contain letters and white space
        if (!preg_match("/^[a-zA-Z-' ]*$/", $fullname)) {
            return ["success" => false, "message" => "Only letters and white space allowed For First Name"];
            $isValid = false;
        }

        $sql = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $sql->bind_param("s", $email);
        $sql->execute();

        $res = $sql->get_result();

        if($res->num_rows > 1) {
            return ["success" => false, "message" => "Error: This email already exist"];
            $isValid = false;
        }

        // Validate mobile number input value
        if (strlen($phone) > 11) {
            return ["success" => false, "message" => "Mobile number Must be 11 digits."];
            $isValid = false;
        }

        // Referral Code
        if (!preg_match("/^[a-zA-Z-' ]*$/", $referral)) {
            return ["success" => false, "message" => "Only letters and white space allowed For The referral Code"];
            $isValid = false;
        }

        // Transaction Pin
        if (strlen($pin) > 5) {
            return ["success" => false, "message" => "Transaction Pin Must be 5 digits."];
            $isValid = false;
        }

        // Validate password to contain a combination of lowercase, uppercase, and digit
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=!*_]).{8,}$/';
        if (!preg_match($pattern, $password)) {
            return ["success" => false, "message" => "Very Weak Password"];
            $isValid = false;
        }
        
        return $isValid;
    }
   
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Sanitize and retrieve form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $referral = $_POST['referral'];
    $pin = $_POST['pin'];
    $password = $_POST['password'];

     // Instantiate Registration class and submit data
     $registration = new Registration($conn);
     $response = $registration->retrieveData($fullname,$email,$phone,$referral,$pin,$password);

     echo json_encode($response);
     exit;
 }

?>