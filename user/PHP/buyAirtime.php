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

        $response = $this->performAirtimePurchase($network_id, $mobile_number, $airtime_type, $amount);

        if(is_array($response)){
            $response = (object) $response;
            print_r($response);
        }

        if($response && is_object($response)){

            $transaction_id = $response->id ?? null;
            $plan_network = $response->plan_network ?? null;
            $mobile_number = $response->mobile_number ?? null;
            $status = $response->Status ?? null;
            $plan_amount = $response->plan_amount ?? null;
            $paid_amount = $response->paid_amount ?? null;
            $create_date = $response->create_date ?? null;
            $message = $response->message ?? null;

            if($status === "successful"){
                // after successful transaction deduct the balance
                $currentBalance = $balance - $amount;
                $sql = $this->conn->prepare("UPDATE account_balance SET settlement_amount = ? WHERE transaction_user_id = ?");
                $sql->bind_param("ii",$currentBalance,$_SESSION['user_id']);
                $sql->execute();

                // insert the data into database
                $sql = $this->conn->prepare("INSERT INTO airtime_transaction(airtime_user_id, transaction_id, plan_network, mobile_number, status, plan_amount, paid_amount, create_date) VALUES(?,?,?,?,?,?,?,?)");
                $sql->bind_param("iisisiis",$_SESSION['user_id'], $transaction_id, $plan_network, $mobile_number, $status, $plan_amount, $paid_amount, $create_date);
                $sql->execute();

                return ['success' => true, 'title' => 'Successful Transaction', 'message' => $message];
            }
            return [
                "success" => false,
                "title" => "Transaction Failed",
                "message" => "Failed to Top Up Airtime, please try again: " . ($status ?? 'Unknown error')
            ];
            
        }else{
            return ['success' => false, 'title' => 'Transaction Failed', 'message' => 'Failed to purchase Airtime, response was invalid.'];
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
    
        if(curl_errno($ch)){
            $error = "cURL: " . curl_error($ch);
            error_log($error, 3, '../../../../../php/logs/php_error_log');
            return ["success" => false, "message" => "Failed To Buy, maybe Network connection"];
        }
        return json_decode($response, true);
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