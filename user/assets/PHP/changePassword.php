<?php

session_start();
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
                echo "Wrong Password";
            }
            elseif($this->newPass !== $this->retypePass) {
                echo "New Password and Confirm Password was not matched";
            }
            else {

                $hashPass = password_hash($this->newPass, PASSWORD_BCRYPT);
            
                $sql = $this->conn->prepare("UPDATE users SET passwords = ? WHERE user_id = ?");
                $sql->bind_param("si", $hashPass , $this->userId);
                
                if($sql->execute()) {
                    echo "Password was Change Successfully";
                }
            }
        }
        else {
            echo "User not Exist";
        }
    }
}

$oldPass = $_POST['oldPass'];
$newPass = $_POST['newPass'];
$retypePass = $_POST['retypePass'];
$userId = $_SESSION['user_id'];

if(!empty($oldPass) && !empty($newPass) && !empty($retypePass) ){
    $chgPass = new ChangePassword($oldPass, $newPass, $retypePass, $conn, $userId);
    $chgPass->changePass();
}else {
    echo "Fields Required";
}



?>