<?php
header("Content-Type: application/json");
require_once 'connection.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Check the account balance before preceding to the transaction
    $sql = $conn->prepare("SELECT settlement_amount FROM transaction_history WHERE transaction_user_id = ? ");
    $sql->bind_param("i",$_SESSION['user_id']);
    $sql->execute();
    
    $res = $sql->get_result();
    if($res->num_rows > 0){
        $row = $res->fetch_assoc();
        $balance = $row['settlement_amount']; 

        echo json_encode([
            'success' => true,
            'settlement_amount' => $balance
        ]);
    }
}



?>