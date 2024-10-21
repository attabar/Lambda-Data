<?php

session_start();
header("Content-Type: application/json");
require_once './connection.php';

class ChangePassword {

    private $oldPass;
    private $newPass;
    private $retypePass;
    private $conn;
    private $userId;

    public function __construct($oldPass, $newPass, $retypePass, $conn, $userId) {
        $this->oldPass = $oldPass;
        $this->newPass = $newPass;
        $this->retypePass = $retypePass;
        $this->conn = $conn;
        $this->userId = $userId;
    }

    public function changePass() {
        $sql = $this->conn->prepare("SELECT * FROM users WHERE user_id = ?");
        $sql->bind_param("i", $this->userId);
        $sql->execute();

        $res = $sql->get_result();

        if($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $userPass = $row['passwords'];

            if(!password_verify($this->oldPass, $userPass)){
                echo json_encode([
                    "success" => false,
                    "message" => "Wrong Password"
                ]);
            }
            elseif($this->newPass !== $this->retypePass) {
                echo json_encode([
                    "success" => false,
                    "message" => "New Password and Confirm Password was not matched"
                ]);
            }
            else {

                $hashPass = password_hash($this->newPass, PASSWORD_BCRYPT);
            
                $sql = $this->conn->prepare("UPDATE users SET passwords = ? WHERE user_id = ?");
                $sql->bind_param("si", $hashPass , $this->userId);
                
                if($sql->execute()) {
                    echo json_encode([
                        "success" => true,
                        "message" => "Password was Change Successfully"
                    ]);
                }
            }
        }
        else {
            echo json_encode([
                "success" => false,
                "message" => "User not Exist"
            ]);
        }
    }
}



if(!empty($_POST['oldPass']) && !empty($_POST['newPass']) && !empty($_POST['retypePass']) ){
    
    $oldPass = $conn->real_escape_string($_POST['oldPass']);
    $newPass = $conn->real_escape_string($_POST['newPass']);
    $retypePass = $conn->real_escape_string($_POST['retypePass']);
    $userId = $_SESSION['user_id'];

    $chgPass = new ChangePassword($oldPass, $newPass, $retypePass, $conn, $userId);
    $chgPass->changePass();
}else {
    echo json_encode([
        "success" => false,
        "message" => "Fields Required"
    ]);
}
?>