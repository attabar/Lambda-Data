<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once 'connection.php';
if($_SERVER['REQUEST_METHOD'] === 'POST' ){
    $network_id = isset($_POST['network_id']) ? $conn->real_escape_string($_POST['network_id']) : '';
    $plan_id = isset($_POST['plan_id']) ? $conn->real_escape_string($_POST['plan_id']) : '';
    $mobile_number = isset($_POST['mobile_number']) ? $conn->real_escape_string($_POST['mobile_number']) : '';
    $data_type = isset($_POST['data_type']) ? $conn->real_escape_string($_POST['data_type']) : '';
    $amount = isset($_POST['amount']) ? $conn->real_escape_string($_POST['amount']) : '';
    
    function BuyData($network_id, $mobile_number,$plan_id,$conn,$balance, $amount){
        $endpoint =  'https://gladtidingsapihub.com/api/data/';
                
            $header = array(
                'Authorization: Token ' . '45264e5b4be99aa0f1571e0c0447719759c3e4bb',
                'Content-Type: application/json'
            );
                
            $data = array(
                "network" => $network_id,
                "mobile_number" => $mobile_number,
                "plan" => $plan_id,
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
                $error = "cURL: " . curl_error($ch);
            }else{
                // print_r($objResponse);
                $id = $objResponse->id;
                $bb = $objResponse->balance_before;
                $ba = $objResponse->balance_after;
                $planNetwork = $objResponse->plan_network;
                $mn = $objResponse->mobile_number;
                $plan = $objResponse->plan;
                $status = $objResponse->Status;
                $plan_name = $objResponse->plan_name;
                $plan_amount = $objResponse->plan_amount;
                $date = $objResponse->create_date;
                $message = $objResponse->api_response;
        
                // Store the API response
        
                $sql = $conn->prepare("INSERT INTO data_transaction(data_user_id,transaction_id,balance_before,balance_after,plan_network,mobile_number,plan,status,plan_name,plan_amount,create_date) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
                $sql->bind_param("iiiisiissds", $_SESSION['user_id'],$id,$bb,$ba,$planNetwork,$mn,$plan,$status,$plan_name,$plan_amount,$date);
                $sql->execute();
        
                if($status === 'successful'){
                    echo json_encode([
                        'success' => true,
                        'status' => $status,
                        'message' => $message,
                    ]);
                    // Deduct the specific amount from the customer balance and update the balance
                    $newBalance = $balance - $amount;
                    $sql = $conn->prepare("UPDATE transaction_history SET settlement_amount = ? WHERE transaction_user_id = ?");
                    $sql->bind_param("di",$newBalance,$_SESSION['user_id']);
                    $sql->execute();
                }else{
                    echo json_encode([
                        'success' => true,
                        'status' => $status,
                        'message' => $message,
                    ]);
                }
            }
    }
    
    // Check the account balance before preceding to the transaction
    $sql = $conn->prepare("SELECT settlement_amount FROM transaction_history WHERE transaction_user_id = ? ");
    $sql->bind_param("i",$_SESSION['user_id']);
    $sql->execute();
    
    $res = $sql->get_result();
    if($res->num_rows > 0){
        $row = $res->fetch_assoc();
        $balance = $row['settlement_amount'];

        if($amount < $balance){
            BuyData($network_id, $mobile_number,$plan_id,$conn, $balance, $amount);
        }else{
            echo json_encode([
                'success' => false,
                'settlement_amount' => $balance,
                'title' => 'INSUFFICIENT BALANCE',
                'message' => 'Kindly Fund Your Wallet and Enjoy Your Top Ups, Your Current Balance: ' . $balance
            ]);
        }
    }
}
?>     