<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once 'connection.php';

class DataTransaction {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function buyData($network_id, $mobile_number, $plan_id, $amount) {
        // Check the account balance before proceeding to the transaction
        $balance = $this->getAccountBalance();

        if ($amount < $balance) {
            // Perform data purchase
            $response = $this->performDataPurchase($network_id, $mobile_number, $plan_id);
            echo json_encode($response);
        } else {
            // Insufficient balance
            echo json_encode([
                'success' => false,
                'settlement_amount' => $balance,
                'title' => 'INSUFFICIENT BALANCE',
                'message' => 'Kindly Fund Your Wallet and Enjoy Your Top Ups, Your Current Balance: ' . $balance
            ]);
        }
    }

    private function getAccountBalance() {
        $sql = $this->conn->prepare("SELECT settlement_amount FROM transaction_history WHERE transaction_user_id = ?");
        $sql->bind_param("i", $_SESSION['user_id']);
        $sql->execute();
        
        $res = $sql->get_result();
        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            return $row['settlement_amount'];
        }
        return 0;
    }

    private function performDataPurchase($network_id, $mobile_number, $plan_id) {
        $endpoint = 'https://gladtidingsapihub.com/api/data/';
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

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $objResponse = json_decode($response);

        if (curl_errno($ch)) {
            $error = "cURL: " . curl_error($ch);
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

// Create instance of DataTransaction class
$dataTransaction = new DataTransaction($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $network_id = isset($_POST['network_id']) ? $conn->real_escape_string($_POST['network_id']) : '';
    $plan_id = isset($_POST['plan_id']) ? $conn->real_escape_string($_POST['plan_id']) : '';
    $mobile_number = isset($_POST['mobile_number']) ? $conn->real_escape_string($_POST['mobile_number']) : '';
    $amount = isset($_POST['amount']) ? $conn->real_escape_string($_POST['amount']) : '';

    // Call buyData method
    $dataTransaction->buyData($network_id, $mobile_number, $plan_id, $amount);
}
?>


