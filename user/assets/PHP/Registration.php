<?php
session_start();
// Session Hardening
// Implement these to secure sessions
ini_set('session.cookie_httponly', true);
ini_set('session.cookie_secure', true); // Use HTTPS
ini_set('session.use_strict_mode', true);
session_regenerate_id(true);

header("Content-Type: application/json");
// include database connection file
require_once './connection.php';

class Registration {
    private $conn;
    private $maxAttempts = 5; // Maximum number of attempts allowed
    private $blockTime = 60 * 10; // Block time in seconds (10 minutes)
    
    // Constructor to initialize database connection
    public function __construct($conn){
        $this->conn = $conn;
    }

    // Method to validate and store registration data
    public function retrieveData($fullname, $email, $phone, $referral, $pin, $password){

        $ipAddress = $_SERVER['REMOTE_ADDR'];

        // Check if IP is blocked due to too many attempts
        if ($this->isRateLimited($ipAddress)) {
            return ["success" => false, "message" => "Too many attempts. Please try again later."];
        }

        // validate input data
        $validationResult = $this->validateData($fullname, $email, $phone, $referral, $pin, $password);
        
        if($validationResult === true){

            // return referrer id
            $referred_by = $this->ReferrerId($referral);
            // Insert new user
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            // hashedPin
            $hashedPin = password_hash($pin, PASSWORD_BCRYPT);

            $referralCode = $this->generateReferralCode($referred_by); // Function to generate a unique referral code
            $insertSql = $this->conn->prepare("INSERT INTO users (fullname, email, phone, pin,  passwords, referral_code, referred_by) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $insertSql->bind_param("ssiissi", $fullname, $email, $phone, $hashedPin, $hashedPassword, $referralCode, $referred_by);
            
            if($insertSql->execute()) {    
                $insertSql->close();
                $this->resetRateLimit($ipAddress); // Reset rate limit on successful registration
                return ["success" => true, "message" => "Registration was successful"];
            } else {
                return ["success" => false, "message" => "Registration failed. Please try again later."];
            }      
        } 
        else {
            $this->incrementRateLimit($ipAddress); // Increment rate limit on failed validation
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
        return null;
    }

    private function generateReferralCode($user_id) {
        // You can use the user ID or hash to create a referral code
        return substr(md5(uniqid($user_id, true)), 0, 8); // 8-character unique code
    }
    
    // Method to validate input data
    private function validateData($fullname, $email, $phone, $referral, $pin, $password) {
        // Validate Full Name: Only letters and white space
        if (!preg_match("/^[a-zA-Z-' ]*$/", $fullname)) return ["success" => false, "message" => "Only letters and white space allowed for Full Name"];
        
        if (strlen($fullname) > 30) return ["success" => false, "message" => "Full Name is too long."];
        
        // Check if email already exists
        $sql = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $sql->bind_param("s", $email);
        $sql->execute();
        $res = $sql->get_result();

        if($res->num_rows > 0) return ["success" => false, "message" => "Error: This email already exists"];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return ["success" => false, "message" => "Invalid email format"];
        
        // Validate mobile number: Must be exactly 11 digits
        if (!preg_match('/^\d{11}$/', $phone)) return ["success" => false, "message" => "Mobile number must be exactly 11 digits."];
        
        // Validate referral code: only alphanumeric
        if (!preg_match('/^[a-zA-Z0-9]*$/', $referral)) return ["success" => false, "message" => "Invalid Referral Code"];

        if (strlen($referral) > 8) return ["success" => false, "message" => "Full Name is too long."];
        
        // Validate Transaction Pin: Must be exactly 5 digits
        if (strlen($pin) != 5 || !ctype_digit($pin)) return ["success" => false, "message" => "Invalid PIN"];

        // Validate Password: Combination of lowercase, uppercase, digit, and special character, minimum length 8
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=!*_]).{8,}$/';
        if (!preg_match($pattern, $password)) return ["success" => false, "message" => "Password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character."];
        
        return true;
    }

    // Rate limiting functions
    private function isRateLimited($ip) {
        $sql = $this->conn->prepare("SELECT attempts, last_attempt FROM rate_limits WHERE ip_address = ?");
        $sql->bind_param("s", $ip);
        $sql->execute();
        $result = $sql->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $timeDiff = time() - strtotime($row['last_attempt']);

            if ($row['attempts'] >= $this->maxAttempts && $timeDiff < $this->blockTime) {
                return true;
            } elseif ($timeDiff >= $this->blockTime) {
                $this->resetRateLimit($ip); // Reset if block time has passed
            }
        }
        return false;
    }

    private function incrementRateLimit($ip) {
        $sql = $this->conn->prepare("INSERT INTO rate_limits (ip_address, attempts, last_attempt) VALUES (?, 1, NOW()) ON DUPLICATE KEY UPDATE attempts = attempts + 1, last_attempt = NOW()");
        $sql->bind_param("s", $ip);
        $sql->execute();
    }

    private function resetRateLimit($ip) {
        $sql = $this->conn->prepare("DELETE FROM rate_limits WHERE ip_address = ?");
        $sql->bind_param("s", $ip);
        $sql->execute();
    }
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Check CSRF token in the request
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        echo json_encode(["success" => false, "message" => "Invalid CSRF token"]);
        exit;
    }

    // Sanitize and retrieve form data
    $fullname = htmlspecialchars($_POST['fullname']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $referral = htmlspecialchars($_POST['ref']);
    $pin = htmlspecialchars($_POST['pin']);
    $password = htmlspecialchars($_POST['password']);

    // Instantiate Registration class and submit data
    $registration = new Registration($conn);
    $response = $registration->retrieveData($fullname, $email, $phone, $referral, $pin, $password);

    echo json_encode($response);
    exit;
}
?>
