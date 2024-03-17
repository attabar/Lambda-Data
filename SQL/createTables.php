<?php
$conn = new mysqli("localhost","root","");

try{
    // create database
    $create_db = $conn->query("CREATE DATABASE vtu");
    if(!$create_db){
        exit("Error: ".$conn->error);
    }else{
        // select database
        $selete_db = $conn->select_db("vtu");
        // admin table
        $admin = $conn->query("CREATE TABLE adminn(
            username VARCHAR(255),
            pass VARCHAR(255)
        )");
        // create tables
        $users = $conn->query("CREATE TABLE users(
            user_id INT AUTO_INCREMENT PRIMARY KEY,
            fname VARCHAR(255),
            lname VARCHAR(255),
            username VARCHAR(255),
            email VARCHAR(255),
            phone VARCHAR(255),
            pass VARCHAR(255),
            confirmPass VARCHAR(255)
            )");
        // account details table
        $reserved_account = $conn->query("CREATE TABLE reserved_account(
            account_id INT PRIMARY KEY AUTO_INCREMENT,
            user_id INT,
            account_name VARCHAR(100),
            account_number VARCHAR(20),
            bank_name VARCHAR(100),
            account_reference VARCHAR(50),
            FOREIGN KEY (user_id) REFERENCES users(user_id)
            )");
        // contact us table
        $contactUs = $conn->query("CREATE TABLE contact_us(
            id INT(11) AUTO_INCREMENT,
            fullname VARCHAR(255),
            email VARCHAR(255),
            messages VARCHAR(255),
            PRIMARY KEY(id)
        )");
        // subscribers
        $subscribers = $conn->query("CREATE TABLE subscribers(
            id INT(11) AUTO_INCREMENT,
            subscribers VARCHAR(255),
            PRIMARY KEY(id)
        )");
        // access token table
            if(!$admin || !$users || !$reserved_account || !$contactUs || !$subscribers){
                exit("error while creating one of the tables: ".$conn->error);
            }
            else{
                $username = "lambda";
                $password = "Malik@389093";
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $insert = $conn->prepare("INSERT INTO adminn(username,pass) VALUES(?,?)");
                $insert->bind_param("ss", $username,$hashedPassword);
                $insert->execute();

                if($insert){
                    echo "<h1>Data Inserted Successfully</h1>";
                }
        }
    }
}catch(Exception $e){
    $e->getMessage();
}

?>