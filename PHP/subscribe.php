<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $conn = new mysqli("localhost", "root", "", "vtu");

    $subscriber = $conn->real_escape_string($_POST['email-subscribe']);

    $sql = $conn->prepare('INSERT INTO subscribers(subscribers) VALUES(?)');
    $sql->bind_param("s", $subscriber);
    $sql->execute();

    if($sql){
        echo "You've Subscribed Our Site Successfully";
    }else{
        echo "Subscribe is Failed: " . $conn->error;
    }
}
?>