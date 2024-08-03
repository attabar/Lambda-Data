<?php
header("Content-Type: application/json");
error_reporting(E_ALL);
require_once 'connection.php';


class Users {
    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllUsers() {
        try{

            $sql = $this->conn->prepare("SELECT * FROM users");
            $sql->execute();    
            
            $users = [];
            while($result = $sql->fetch(PDO::FETCH_ASSOC)){

                $users[] = [
                'id' => $result['user_id'],
                'fname' => $result['fname'],
                'lname' => $result['lname'],
                'username' => $result['username'],
                'email' => $result['email'],
                'phone' => $result['phone']
                ];
            }

            echo json_encode([
                'success' => true,
                 'users' => $users
            ]);

        
        }catch(Exception $e){
            echo json_encode([
                "success" => false,
                "message" => "ERROR: " . $e->getMessage()
            ]);
        }
    }
}


$database = new Database();
$conn = $database->connect();

$users = new Users($conn);
$users->getAllUsers();

?>