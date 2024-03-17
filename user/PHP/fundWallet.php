<?php
/*This file is used to output the user reserved account 
details when he clicks on fund wallet at his dashboard
*/
session_start();
require_once 'connection.php';

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT * FROM wallet_account WHERE wallet_user_id = ?");
    $stmt->bind_param("i",$user_id);
    $stmt->execute();

    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $accountName = $row['account_name'];
        $accountNumber = $row['account_number'];
        $bankName = $row['bank_name'];
        $accountReference = $row['account_reference'];
    }

    if(isset($accountNumber, $accountName, $bankName)){
        echo json_encode([
            'success' => true,
            'accountNumber' => $accountNumber,
            'accountName' => $accountName,
            'bankName' => $bankName
        ]);
    }else{
        echo json_encode(['success' => false]);
    }
}

?>