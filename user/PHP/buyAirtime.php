<?php
require_once 'connection.php';
header("Content-Type: application/json");
class Airtime {

    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function buyAirtime($network_id, $mobile_number, $airtime_type, $amount){
        $balance = $this->checkAccountBalance();

        if($amount > $balance){
            $response = $this->performAirtimePurchase($network_id, $mobile_number, $airtime_type, $amount);
            return ['success', 'message' => 'Purchase successfully'];
        }else{
            return [
                'success' => false,
                'settlement_amount' => $balance,
                'title' => 'INSUFFICIENT BALANCE',
                'message' => 'Kindly Fund Your Wallet and Enjoy Your Top Ups, Your Current Balance: ' . $balance
            ];
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
            return ["success" => false, "message" => "cURL: " . curl_error($ch)];
            // error_log($error);
        }else{
            $result = json_decode($response);

            if($result->Status === 'successful'){
                return ["success" => true, "message" => $result->api_response];
            }
        }
    }

    public function checkAccountBalance(){
        $sql = $this->conn->prepare("SELECT settlement_amount FROM account_balance WHERE  transaction_user_id = ?");
        $sql->bind_param("i", $_SESSION['user_id']);
        $sql->execute();

        $result = $sql->get_result();
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            return $row['settlement_amount'];
        }
        return 0;
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $network_id = $conn->real_escape_string($_POST['network_id']);
    $airtime_type = $conn->real_escape_string($_POST['airtime_type']);
    $mobile_number = $conn->real_escape_string($_POST['mobile_number']);
    $amount = $conn->real_escape_string($_POST['amount']);
    
    $airtime = new Airtime($conn);
    $buyAirtime = $airtime->buyAirtime($network_id,$mobile_number, $airtime_type, $amount);
    echo json_encode($buyAirtime);
}

?>