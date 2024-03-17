<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once './connection.php';
if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    
    $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $username = $row['username'];
    }else{
        echo '<script>alert("User not Exist")</script>';
    }

    if(isset($username)){
        echo json_encode([
            'success' => true,
            'username' => $username
        ]);
    }else{
        echo json_encode(['success' => false]);
    }
}else{
    // header('location:./loginPage.php');
    echo "This User is Exist";
}

?>