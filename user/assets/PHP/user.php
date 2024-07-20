<?php

session_start();
header("Content-Type: application/json");

class RedirectBackToLoginPage {

    public function getUsername() {
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
           
            $response = [
                "success" => true,
                "username" => $username
            ];
            return $response;
        }else{
            $response = [
                "success" => false,
                "username" => null
            ];
        }
        return $response;
    }
}

$redirect = new RedirectBackToLoginPage();
$response = $redirect->getUsername();
echo json_encode($response);
?>