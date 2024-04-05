<?php

session_start();

class RedirectBackToLoginPage {

    public function getUsername() {
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
        }else{
            header('location:./loginPage.php');
        }
    }
}

$redirect = new RedirectBackToLoginPage();
$redirect->getUsername();

?>