<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $conn = new mysqli("localhost", "root", "", "vtu");

    $fullname = $conn->real_escape_string($_POST['fullname']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = $conn->prepare("INSERT INTO contact_us(fullname, email, messages) VALUES(?,?,?)");
    $sql->bind_param("sss", $fullname,$email,$message);
    $sql->execute();

     if($sql){
        echo "Your Complaint Submitted Successfully";
     }else{
        echo "Oop Your Complaint failed to Submitted";
     }
}
?>