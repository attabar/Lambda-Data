<?php
require_once './connection.php';

// $response = array('success' => false, 'message' => '');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql = $conn->prepare("SELECT * FROM admintable WHERE username = ?");
    $sql->bind_param("s", $username);
    $sql->execute();

    $result = $sql->get_result();
    if($result->num_rows > 0){
        $row =  $result->fetch_assoc();
        $plainPassword = $row['pass'];
        $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);
        if(password_verify($password, $hashedPassword)){
            echo "<span style='color:green'>You're Authorised to access this site</span>";
        }else {
            echo "<span style='color:red'>Incorrect Password</span>";
        }
        // echo 
    }else{
        echo "<span style='color:red'>You're not authorized to access this site</span>";
    }
}
?>