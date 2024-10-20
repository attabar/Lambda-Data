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
    public function retrieveData($fullname, $email, $phone, $referral, $pin, $password){

        // validate input data
        $validationResult = $this->validateData($fullname, $email, $phone, $referral, $pin, $password);
        
        if($validationResult === true){

            // return referrer id
            $referred_by = $this->ReferrerId($referral);
            // Insert new user
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $referralCode = $this->generateReferralCode($referred_by); // Function to generate a unique referral code
            $insertSql = $this->conn->prepare("INSERT INTO users (fullname, email, phone, pin,  passwords, referral_code, referred_by) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $insertSql->bind_param("ssiissi", $fullname, $email, $phone, $pin, $hashedPassword, $referralCode, $referred_by);
            
            if($insertSql->execute()) {
                return ["success" => true, "message" => "Registration was successful"];
            } else {
                return ["success" => false, "message" => "Error encountered during Registration: " . $this->conn->error];
            } 
              
        } else {
            return $validationResult;
        }
    }

    private function ReferrerId($referral) {
        $sql = $this->conn->prepare("SELECT user_id FROM users WHERE referral_code = ?");
        $sql->bind_param("s", $referral);
        $sql->execute();
        $result = $sql->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $referred_by = $row['user_id'];  // The ID of the person who referred them

            return $referred_by;
        }
    }

    private function generateReferralCode($user_id) {
        // You can use the user ID or hash to create a referral code
        return substr(md5(uniqid($user_id, true)), 0, 8); // 8-character unique code
    }
    
    // Method to validate input data
    private function validateData($fullname, $email, $phone, $referral, $pin, $password) {
        // Validate Full Name: Only letters and white space
        if (!preg_match("/^[a-zA-Z-' ]*$/", $fullname)) {
            return ["success" => false, "message" => "Only letters and white space allowed for Full Name"];
        }

        // Check if email already exists
        $sql = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $sql->bind_param("s", $email);
        $sql->execute();
        $res = $sql->get_result();

        if($res->num_rows > 0) {
            return ["success" => false, "message" => "Error: This email already exists"];
        }

        // Validate mobile number: Must be exactly 11 digits
        if (strlen($phone) != 11) {
            return ["success" => false, "message" => "Mobile number must be 11 digits."];
        }

        if (!preg_match("/^[a-zA-Z-0-9' ]*$/", $referral)) {
            return ["success" => false, "message" => "Only Alphanumeric allowed"];
        }

        // Validate Transaction Pin: Must be exactly 5 digits
        if (strlen($pin) < 5) {
            return ["success" => false, "message" => "Transaction Pin must be 5 digits."];
        }

        // Validate Password: Combination of lowercase, uppercase, digit, and special character, minimum length 8
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=!*_]).{8,}$/';
        if (!preg_match($pattern, $password)) {
            return ["success" => false, "message" => "Password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character."];
        }

        return true;
    }
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Sanitize and retrieve form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $referral = $_POST['ref'];
    $pin = $_POST['pin'];
    $password = $_POST['password'];

    // Instantiate Registration class and submit data
    $registration = new Registration($conn);
    $response = $registration->retrieveData($fullname, $email, $phone, $referral, $pin, $password);

    echo json_encode($response);
    // $registration->getRefererrId();

    exit;
}
?>
