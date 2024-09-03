<?php
session_start();
require_once 'connection.php';

class Login {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    public function userLogin($email, $password){
        $response = [];

        if(empty($email) || empty($password)){
            $response['status'] = 'error';
            $response['message'] = "All the Fields Are Required";
        } else {
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
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    $login = new Login($conn);
    $login->userLogin($email,$password);
}
?>
