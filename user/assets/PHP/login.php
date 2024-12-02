<?php
session_start();
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
// header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

// for all contributors please implement rate limit and restrict unverified email for login

require_once 'connection.php';

class Login {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function userLogin($email, $password){

        if($this->validatelnput($email, $password)){
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if(password_verify($password, $row['passwords'])){
                    $_SESSION['user_id'] = $row['user_id']; 
                    $_SESSION['fullname'] = $row['fullname'];
                    $_SESSION['email'] = $row['email']; 
                    $_SESSION['referral_code'] = $row['referral_code'];
                    return ['status' => true, 'title' => 'Successful', 'message' => "Login was Successful"];
                } else {
                    error_log("<br/> lnvalid password", 3, "./app_errors.log");
                    return ['status' => false, 'title' => 'Wrong Input', 'message' => 'Incorrect passwords or email'];
                }
            } else {
                error_log("User not found", 3, "./app_errors.log");
                return ['status' => false, 'title' => 'No User', 'message' => "Incorrect passwords or email"];
            }
            $stmt->close();
        } 
    }

    function validatelnput($email, $password) {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return ["success" => false, "message" => "Invalid email format"];
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=!*_]).{8,}$/';
        if (!preg_match($pattern, $password)) return ["success" => false, "message" => "Password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character."];

        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=!*_]).{8,}$/';
        if (!preg_match($pattern, $password)) return ["success" => false, "message" => "Password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character."];

        if(empty($email) || empty($password)){
            return ["success" => false, 'message' => "All the Fields Are Required"];
        } 

        return true;
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $login = new Login($conn);
    $response = $login->userLogin($email,$password);
    echo json_encode($response);
    exit;
}
?>
