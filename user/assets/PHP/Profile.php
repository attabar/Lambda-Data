<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once './connection.php';

class Profile {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getProfile() {

        if(isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE user_id = ?");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
        
            $result = $stmt->get_result();
        
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $fname = $row['fullname'];
                $email = $row['email'];
                $mobile = $row['phone'];

                echo json_encode([
                    'success' => true,
                    'fullname' => $fname,
                    'email' => $email,
                    'mobile' => $mobile
                ]);

            }else{
                $error = "User not Exist";
                return $error;
            }
        }
        
    }
    
}

$profile = new Profile($conn);
$profile->getProfile();
?>