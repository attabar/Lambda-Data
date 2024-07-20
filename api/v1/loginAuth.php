<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

session_start();
require_once '../config/database.php';

$database = new Database();
$conn = $database->getConnection();

class Login {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    public function userLogin($username, $password){
        $response = [];

        if(empty($username) || empty($password)){
            $response['status'] = 'error';
            $response['message'] = "All the Fields Are Required";
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->bindParam(1, $username, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if($result) {
                if(password_verify($password, $result['pass'])){
                    $_SESSION['user_id'] = $result['user_id'];
                    $_SESSION['username'] = $result['username'];
                    $_SESSION['email'] = $result['email'];
                    $_SESSION['fullname'] = $result['fname'] . $result['lname'];

                    $response = ['status' => true, 'title' => 'Successful', 'message' => "Login was Successful"];
                } else {
                    $response = ['status' => false, 'title' => 'Wrong Input', 'message' => 'Invalid Password'];
                }
            } else {
                $response = ['status' => false, 'title' => 'No User', 'message' => "User not found"];
            }
        }

        // Output the JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $login = new Login($conn);
    $login->userLogin($username,$password);
}
?>
