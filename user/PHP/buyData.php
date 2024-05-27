<?php
session_start();
header("Content-Type: application/json");
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'connection.php';

class DataPurchase {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Buy data
    public function buyData($network_id, $mobile_number, $plan_id, $data_type, $amount) {
        // Check the account balance before proceeding to the transaction
        $balance = $this->getAccountBalance();

        if ($amount > $balance) {
            // Insufficient balance
            return [
                'success' => false,
                'balance' => $balance,
                'title' => 'INSUFFICIENT BALANCE',
                'message' => 'Kindly Fund Your Wallet and Enjoy Your Top Ups, Your Current Balance: ' . $balance
            ];
        }

        $response = $this->performDataPurchase($network_id, $plan_id, $data_type, $mobile_number, $amount);
        
        if (is_array($response)) {
            $response = (object) $response;
        }

        if ($response && is_object($response)) {
            $planNetwork = $response->plan_network ?? null;
            $mn = $response->mobile_number ?? null;
            $plan = $response->plan ?? null;
            $plan_name = $response->plan_name ?? null;
            $plan_amount = $response->plan_amount ?? null;
            $date = $response->create_date ?? null;
            $status = $response->Status ?? null;

            if ($status === 'successful') {
                $user_id = $_SESSION['user_id'];

                // Insert the transaction done as transaction history
                $sql = $this->conn->prepare("INSERT INTO data_transaction(data_user_id, plan_network, mobile_number, plan, status, plan_name, plan_amount, create_date) VALUES(?,?,?,?,?,?,?,?)");
                $sql->bind_param("isiissds", $user_id, $planNetwork, $mn, $plan, $status, $plan_name, $plan_amount, $date);
                $sql->execute();

                $balance = $this->getAccountBalance();
                // IF THE TRANSACTION WERE SUCCESSFUL THEN DEDUCT THE BALANCE WITH THE AMOUNT APPLIED
                $currentBalance = $balance - $amount;
                // AFTER DEDUCTION THEN UPDATE THE BALANCE STORED IN THE DATABASE
                $sql = $this->conn->prepare("UPDATE account_balance SET settlement_amount = ? WHERE transaction_user_id = ?");
                $sql->bind_param("ii", $currentBalance, $user_id);
                $sql->execute();

                return [
                    "success" => true,
                    "title" => "Successful Transaction",
                    "message" => "You have successfully Purchased Data"
                ];
            } else {
                return [
                    "success" => false,
                    "title" => "Transaction Failed",
                    "message" => "Failed to purchase data, please try again: " . ($status ?? 'Unknown error')
                ];
            }
        } else {
            return [
                "success" => false,
                "title" => "Transaction Failed",
                "message" => "Failed to purchase data, response was invalid."
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
            return $row['settlement_amount'];
        }
        return 0;
    }

    private function performDataPurchase($network_id, $plan_id, $data_type, $mobile_number, $amount) {
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

        if (curl_errno($ch)) {
            $error = "cURL: " . curl_error($ch);
            error_log($error, 3, '../../../../../php/logs/php_error_log');
            return ['success' => false, 'error' => $error];
        }

        curl_close($ch);
        return json_decode($response, true);
    }

}

if (!empty($_POST['network_id']) && !empty($_POST['plan_id']) && !empty($_POST['data_type']) && !empty($_POST['mobile_number']) && !empty($_POST['amount'])) {
    $network_id = $conn->real_escape_string($_POST['network_id']);
    $plan_id = $conn->real_escape_string($_POST['plan_id']);
    $data_type = $conn->real_escape_string($_POST['data_type']);
    $mobile_number = $conn->real_escape_string($_POST['mobile_number']);
    $amount = $conn->real_escape_string($_POST['amount']);

    $buy = new DataPurchase($conn);
    $bd = $buy->buyData($network_id, $mobile_number, $plan_id, $data_type, $amount);
    echo json_encode($bd);
} else {
    echo json_encode(["success" => false, "message" => "all the fields are empty"]);
}

?>
