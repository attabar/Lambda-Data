<?php
session_start();

// unset all the session variables
$_SESSION = array();


// destroy the session
session_destroy();

$response = array("success" => true);


header("Content-Type: json/application");

echo json_encode($response);


?>