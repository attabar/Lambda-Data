<?php

session_start();

class Dashboard {

    function red() {
        if(!isset($_SESSION['email'])) {
            header('location: ./loginPage.php');
        }
    }
}

$ds = new Dashboard();
$ds->red();



?>