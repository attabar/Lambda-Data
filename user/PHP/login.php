<?php
session_start();

require_once 'connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['password']);

        $response = array();

        if(empty($username) || empty($password)){
            $response['status'] = 'error';
            $response['message'] = "<span style='color:red'>All the Fields Are Required</span>";
        }
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if(password_verify($password, $row['pass'])){
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['fullname'] = $row['fname'] . $row['lname'];
                $response['status'] = 'success';
                $response['message'] = "Login was Successful";
            }else{
                $response['status'] = 'error';
                $response['message'] = "Invalid Password";
            }
        }else{
            $response['status'] = 'error';
            $response['message'] = "User not found";
        }

        // Output the JSON response
        header('Content-Type:application/json'); 
        echo json_encode($response);
}


?>