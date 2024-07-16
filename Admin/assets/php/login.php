<?php

session_start();
require_once 'connection.php';

class Login {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    public function userLogin($username, $password){

        $response = [];

        if(empty($username) || empty($password)){
            $response['status'] = 'error';
            $response['message'] = "<span style='color:red'>All the Fields Are Required</span>";
            header('Content-Type: application/json'); 
            echo json_encode($response);
            return;
        }
        $stmt = $this->conn->prepare("SELECT * FROM admintable WHERE username = ?");
        $stmt->bindParam(1, $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result) {
            if(password_verify($password, $result['pass'])){
                
                $_SESSION['username'] = $result['username'];
    
                $response = ['status' => true, 'title' => 'Successful', 'message' => "Login was Successful"];
            }else{
                $response = ['status' => false, 'title' => 'Wrong Input', 'message' => 'Invalid Password'];
            }
        }else{
            $response = ['status' => false, 'title' => 'No User', 'message' => "User not found"];
        }

        // Output the JSON response
        header('Content-Type:application/json'); 
        echo json_encode($response);
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $database = new Database();
    $conn = $database->connect();

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $login = new Login($conn);
    $login->userLogin($username,$password);

}
?>