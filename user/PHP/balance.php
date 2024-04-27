<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
header('Content-Type: application/json');

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vtu";
    $conn = new mysqli($host, $username, $password, $dbname);

    $sql = $conn->prepare("SELECT settlement_amount FROM account_balance WHERE transaction_user_id = ?");
    $sql->bind_param("i", $user_id);
    $sql->execute();
    $res = $sql->get_result();

    if($res->num_rows > 0){
        $row = $res->fetch_assoc();
        $balance = $row['settlement_amount'];

        echo json_encode([
            'success'=>true,
            'balance'=>$balance
        ]);
    }
    else{
        echo json_encode([
            'success'=>false,
            'balance'=>'This Account is Not Exist'
        ]);
    }
}else{
    echo json_encode([
        'success'=>true,
        'balance'=>'User Not loggined'
    ]);
}

?>