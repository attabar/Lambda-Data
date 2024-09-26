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
            // Hash password for security purposes
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            
            // Step 1: Insert new user into the database
            $sql = "INSERT INTO users (fullname, email, phone, pin, passwords) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sssss", $fullname, $email, $phone, $pin, $hashedPassword);

            if($stmt->execute()) {
                // Step 2: Get the new user_id
                $user_id = $this->conn->insert_id;

                // Step 3: Generate referral code and update the user record
                $referral = $this->generateReferralCode($user_id);

                $sql = "UPDATE users SET referral = ? WHERE user_id = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("si", $referral, $user_id);
                $stmt->execute();

                // Return success response
                return ["success" => true, "message" => "Registration was successful"];
            } else {
                return ["success" => false, "message" => "Error encountered during Registration: " . $this->conn->error];
            }    
        } else {
            return $validationResult;
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
    $referral = $_POST['referral'];
    $pin = $_POST['pin'];
    $password = $_POST['password'];

    // Instantiate Registration class and submit data
    $registration = new Registration($conn);
    $response = $registration->retrieveData($fullname, $email, $phone, $referral, $pin, $password);

    echo json_encode($response);
    exit;
}
?>
