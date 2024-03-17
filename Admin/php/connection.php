<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "vtu";

$conn = new mysqli($host, $user, $pass, $dbname);

if(!$conn){
    echo "<h1>Failed to Connect: </h1>" . $conn->error;
}


?>