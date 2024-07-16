<?php
session_start();
header("Content-Type: application/json");

if(isset($_SESSION['username'])) {
    $admin = array("success" => true, "admin" => $_SESSION['username']);
    echo json_encode($admin);
}else{
    $admin = array("success" => false, "admin" => "Unauthorised User");
    echo json_encode($admin);
}
?>