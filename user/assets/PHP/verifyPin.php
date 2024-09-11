<?php
session_start();
header('Content-Type: application/json');
$input = json_decode(file_get_contents('php://input'), true);
$pin = trim($input['pin']);

// Connect to the database
include_once('./connection.php'); // Include your database connection file

// Fetch the correct PIN from the database
$sql = $conn->prepare("SELECT pin FROM users WHERE email = ?");
$sql->bind_param("s",$_SESSION['email']);
$sql->execute();

$res = $sql->get_result();
$row = $res->fetch_assoc();

$correctPin = trim($row['pin']);

file_put_contents('debug.txt', "Entered PIN: $pin\nStored PIN: $correctPin\n");


if ($pin === $correctPin) {
    echo json_encode(['valid' => true]);
} else {
    echo json_encode(['valid' => false]);
}
?>
