<?php
require_once 'connection.php';
header("Content-Type: application/json");
session_start();
class Airtime {

    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function buyAirtime($network_id, $mobile_number, $airtime_type, $amount, $amountToPay){
        $balance = $this->getAccountBalance();
        if($amountToPay > $balance){
            return [
                'success' => false,
                'balance' => $balance,
                'title' => 'INSUFFICIENT BALANCE',
                'message' => 'Kindly Fund Your Wallet and Enjoy Your Top Ups, Your Current Balance: ' . $balance
            ];
        }
        else{
            $response = $this->performAirtimePurchase($network_id, $mobile_number, $airtime_type, $amount);
            if($response === "successful"){
                $currentBalance = $balance - $amount;
                $sql = $this->conn->prepare("UPDATE account_balance SET settlement_amount = $currentBalance WHERE transaction_user_id = ?");
                $sql->bind_param("i",$_SESSION['user_id']);
                $sql->execute();
                 return ['success' => true, 'status' => $response, 'message' => 'Purchase successfully'];
            }else{
                return ['success' => false, 'status' => $response, 'message' => 'Failed To Top Up Airtime'];
            }
           
        }
    }

    private function performAirtimePurchase($network_id, $mobile_number, $airtime_type, $amount){

        $endpoint =  'https://gladtidingsapihub.com/api/topup/';

        $header = array(
            'Authorization: Token ' . '45264e5b4be99aa0f1571e0c0447719759c3e4bb',
            'Content-Type: application/json'
        );

        $data = array(
            "network" => $network_id,
            "mobile_number" => $mobile_number,
            "airtime_type"=> $airtime_type,
            "Ported_number" => true,
            "amount" => $amount
        );

        $ch =  curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $result = json_decode($response);

        if(curl_errno($ch)){
            $error = "cURL: " . curl_error($ch);
            error_log($error, 3, '../../../../../php/logs/php_error_log');
            return ["success" => false, "message" => "Failed To Buy, maybe Network connection"];
        }else{
            
            if($result->Status === 'successful'){
                return $result->Status;
                // return ["success" => true, "message" => $result->api_response];
            }
        }
    }

    private function getAccountBalance() {
        $sql = $this->conn->prepare("SELECT settlement_amount FROM account_balance WHERE transaction_user_id = ?");
        $sql->bind_param("i", $_SESSION['user_id']);
        $sql->execute();
        
        $res = $sql->get_result();
        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();

            return $row['settlement_amount'];
        }
        return 0;
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $network_id = $conn->real_escape_string($_POST['network_id']);
    $airtime_type = $conn->real_escape_string($_POST['airtime_type']);
    $mobile_number = $conn->real_escape_string($_POST['mobile_number']);
    $amount = $conn->real_escape_string($_POST['amount']);
    $amountToPay = $conn->real_escape_string($_POST['amountToPay']);
    
    $airtime = new Airtime($conn);
    $buy = $airtime->buyAirtime($network_id,$mobile_number, $airtime_type, $amount, $amountToPay);
    echo json_encode($buy);
}else{
    echo json_encode(["success" => false,"message"=>"Undefined Post"]);
}

?>