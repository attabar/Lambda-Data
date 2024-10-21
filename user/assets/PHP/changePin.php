<?php

session_start();
require_once './connection.php';

class ChangeTansactionPin {

    private $oldPin;
    private $newPin;
    private $retypePin;
    private $conn;
    private $userId;

    public function __construct($oldPin, $newPin, $retypePin, $conn, $userId) {
        $this->oldPin = $oldPin;
        $this->newPin = $newPin;
        $this->retypePin = $retypePin;
        $this->conn = $conn;
        $this->userId = $userId;
    }

    public function changePin() {
        $sql = $this->conn->prepare("SELECT pin FROM users WHERE user_id = ?");
        $sql->bind_param("i", $this->userId);
        $sql->execute();

        $res = $sql->get_result();

        if($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $userPin = $row['pin'];

            if($this->oldPin !== $userPin){
                echo "Wrong Pin";
            }
            elseif($this->newPin !== $this->retypePin) {
                echo "New Pin and Confirm Pin was not matched";
            }
            else {

                $newPin = $this->newPin;
            
                $sql = $this->conn->prepare("UPDATE users SET pin = ? WHERE user_id = ?");
                $sql->bind_param("si", $newPin , $this->userId);
                
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

$oldPin = $_POST['oldPin'];
$newPin = $_POST['newPin'];
$retypePin = $_POST['retypePin'];
$userId = $_SESSION['user_id'];

if(!empty($oldPin) && !empty($newPin) && !empty($retypePin) ){
    $chgPin = new ChangeTansactionPin ($oldPin, $newPin, $retypePin, $conn, $userId);
    $chgPin->changePin();
}else {
    echo "Fields Required";
}

?>