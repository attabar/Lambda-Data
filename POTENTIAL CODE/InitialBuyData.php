<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once 'connection.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $network_provider = $conn->real_escape_string($_POST['network_provider']);
    $data_type = $conn->real_escape_string($_POST['data_type']);
    $mobile_number = $conn->real_escape_string($_POST['mobile_number']);
    $data_plan = $conn->real_escape_string($_POST['data_plan']);
    $amount = $conn->real_escape_string($_POST['amount']);

    // Check the account balance before preceding to the transaction
    $sql = $conn->prepare("SELECT settlement_amount FROM transaction_history WHERE transaction_user_id = ? ");
    $sql->bind_param("i",$_SESSION['user_id']);
    $sql->execute();
    
    $res = $sql->get_result();
    if($res->num_rows > 0){
        $row = $res->fetch_assoc();
        $balance = $row['settlement_amount'];  
        
        if($amount > $balance){
            echo "<script>alert('INSUFFICIENT AMOUNT')</script>";
        }else{
            try{

                $success = BuyData($network_provider,$mobile_number, $data_type, $data_plan, $conn);
                
                if($success){
                    $newBalance = UpdateBalance($amount, $balance, $conn, $success);

                    if($newBalance !== false){
                        echo "New Balance: " . $newBalance;
                    } else{
                        echo "ERROR WHILE UPDATING BALANACE";
                    }
                }
            }catch(Exception $e){
                echo "ERROR: " . $e->getMessage();
            }
        }
      
    }
}
function BuyData($network_provider,$mobile_number, $data_type, $data_plan, $conn){

    $endpoint =  'https://gladtidingsapihub.com/api/data/';

    $header = array(
        'Authorization: Token ' . '45264e5b4be99aa0f1571e0c0447719759c3e4bb',
        'Content-Type: application/json'
    );

    $data = array(
        "network" => $network_provider,
        "mobile_number" => $mobile_number,
        "plan" => $data_plan,
        "data_type" => $data_type,
        "Ported_number" => true
    );

    $ch =  curl_init();
    curl_setopt($ch, CURLOPT_URL, $endpoint);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($ch);

    $objResponse = json_decode($response);

    if(curl_errno($ch)){
        echo "cURL: " . curl_error($ch);
    }else{
        print_r($objResponse);
        $status = $objResponse->Status;
        if($status === 'successful'){
            $id = $objResponse->id;
            $bb = $objResponse->balance_before;
            $ba = $objResponse->balance_after;
            $planNetwork = $objResponse->plan_network;
            $mn = $objResponse->mobile_number;
            $plan = $objResponse->plan;
            $plan_name = $objResponse->plan_name;
            $plan_amount = $objResponse->plan_amount;
            $date = $objResponse->create_date;

            if(isset($_SESSION['user_id'])){
                $user_id = $_SESSION['user_id'];

                $sql = $conn->prepare("INSERT INTO data_transaction(data_user_id,transaction_id,balance_before,balance_after,plan_network,mobile_number,plan,status,plan_name,plan_amount,create_date) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
                $sql->bind_param("iiiisiissds", $user_id,$id,$bb,$ba,$planNetwork,$mn,$plan,$status,$plan_name,$plan_amount,$date);
                $success = $sql->execute();

                return $success;
            }
        }else{
            echo "Data Purchase Failed: " . $status;
            return false;
        }
    }
}
function UpdateBalance($amount, $balance, $conn, $success){

    if($success){
        $deduct = $balance - $amount;

        // Statment for Updation
        $sql = $conn->prepare("UPDATE transaction_history SET settlement_amount = ? WHERE transaction_user_id = ?");
        $sql->bind_param("di",$deduct,$_SESSION['user_id']);
        $exe = $sql->execute();

        return $exe ? $deduct :false;
    }else{
        return $balance;
    }
}
?>     