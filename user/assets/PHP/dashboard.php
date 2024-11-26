<?php

session_start();

class Dashboard {

    function red() {
        if(!isset($_SESSION['user_id'])) {
            header('location: ./login.php');
        }
    }
}

$ds = new Dashboard();
$ds->red();



?>