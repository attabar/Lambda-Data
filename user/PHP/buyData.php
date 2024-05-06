<?php
session_start();
header("Content-Type: application/json");
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'connection.php';

class DataPurchase{

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Buy data
    public function buyData($network_id, $mobile_number, $plan_id, $data_type, $amount) {
        // Check the account balance before proceeding to the transaction
        $balance = $this->getAccountBalance();

        if ($amount < $balance) {
            // Perform data purchase
            $response = $this->performDataPurchase($network_id, $plan_id, $data_type, $mobile_number);
            return $response;
        } else {
            // Insufficient balance
            return [
                'success' => false,
                'balance' => $balance,
                'title' => 'INSUFFICIENT BALANCE',
                'message' => 'Kindly Fund Your Wallet and Enjoy Your Top Ups, Your Current Balance: ' . $balance
            ];
        }
    }

    private function getAccountBalance() {
        $sql = $this->conn->prepare("SELECT settlement_amount FROM account_balance WHERE transaction_user_id = ?");
        $sql->bind_param("i", $_SESSION['user_id']);
        $sql->execute();
        
        $res = $sql->get_result();
        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();

            $balance = $row['settlement_amount'];
            return $balance;
        }
        return 0;
    }

    private function performDataPurchase($network_id, $plan_id, $data_type, $mobile_number) {
        $endpoint = 'https://gladtidingsapihub.com/api/data/';
        $header = array(
            'Authorization: Token ' . '45264e5b4be99aa0f1571e0c0447719759c3e4bb',
            'Content-Type: application/json'
        );

        $data = array(
            "network" => $network_id,
            "plan" => $plan_id,
            "data_type" => $data_type,
            "mobile_number" => $mobile_number,
            "Ported_number" => true
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $objResponse = json_decode($response);

        print_r($objResponse);

        if (curl_errno($ch)) {
            $error = "cURL: " . curl_error($ch);
            error_log($error, 3, '../../../../../php/logs/php_error_log');
            return ['success' => false, 'error' => $error];
        } else {
            // Handle API response
            // ...

            // Store the API response
            // ...

            return [
                'success' => true,
                'status' => $objResponse->Status,
                'message' => $objResponse->api_response
            ];
        }
    }

}

if(!empty($_POST['network_id']) && !empty($_POST['plan_id']) && !empty($_POST['data_type']) && !empty($_POST['mobile_number']) && !empty($_POST['amount'])){
    $network_id = $_POST['network_id'];
    $plan_id = $_POST['plan_id'];
    $data_type = $_POST['data_type'];
    $mobile_number = $_POST['mobile_number'];
    $amount = $_POST['amount'];
    
    $buy = new DataPurchase($conn);
    $bd = $buy->buyData($network_id, $mobile_number, $plan_id, $data_type, $amount);
    echo json_encode($bd);
}else{
    echo json_encode(["success" => false, "message" => "all the fields are empty"])
}

?>