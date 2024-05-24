<?php

header("Content-Type: application/json");
require_once 'connection.php';
session_start();

class ElectricityBillPayment{

    private $conn;

    function __construct($conn){
       $this->conn = $conn; 
    }

    public function buyNepaBill($amount){
        // call the method for getting particular user account balance
        $balance = $this->getAccountBalance();
        
        // then compare the amount and the purchaser account balance if the balance is low than the account show up insufficient balance
        if($amount > $balance){
            return [
                "success" => false,
                "title" => "error",
                "text" => "Insufficient Balance",
                "message" => "......................"
            ];
        }else{
            $response = $this->processElectricityBillPayment();
            if($response === "successful"){
                return [
                    "success" => true,
                    "title" => "success",
                    "text" => "Success",
                    "message" => "....................."
                ];
            }else{
                return [
                    "success" => false,
                    "title" => "error",
                    "text" => "Failed",
                    "message" => "..................."
                ];
            }
        }
    }

    private function processElectricityBillPayment(){

        $endpoint = "'https://gladtidingsapihub.com/api/billpayment/";
        $header = array(
            "Authorization: Token"  . '45264e5b4be99aa0f1571e0c0447719759c3e4bb',
            'Content-Type: application/json'
        );

        $data = array(
            "disco_name" => 'Yola Electric',
            "amount" => '15000',
            "meter_number" => 'meter number',
            "MeterType" => 'meter type id (PREPAID:1,POSTPAID:2)'
        );

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $endpoint);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($curl);

        print_r($response);
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

$cl = new ElectricityBillPayment($conn);
$call = $cl->buyNepaBill($amount);
echo $call;
?>