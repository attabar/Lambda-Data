<?php

session_start();
header("Content-Type: application/json");

class RedirectBackToLoginPage {

    public function getUsername() {
        if(isset($_SESSION['fullname'])){

            $fullname = $_SESSION['fullname'];
           
            $response = [
                "success" => true,
                "fullname" => $fullname
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