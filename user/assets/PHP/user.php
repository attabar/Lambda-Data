<?php

session_start();
header("Content-Type: application/json");

class RedirectBackToLoginPage {

    public function getUsername() {
        if(isset($_SESSION['email'])){
            $email = $_SESSION['email'];
           
            $response = [
                "success" => true,
                "email" => $email
            ];
            return $response;
        }else{
            $response = [
                "success" => false,
                "email" => null
            ];
        }
        return $response;
    }
}

$redirect = new RedirectBackToLoginPage();
$response = $redirect->getUsername();
echo json_encode($response);
?>