<?php
header("Content-Type: application/json");
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'connection.php';

class BuyData {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function fetchDataByNetwork($network) {
        switch ($network) {
            case '1':
                return $this->fetchDataForNetwork('MTN');
            case '2':
                return $this->fetchDataForNetwork('Glo');
            case '3':
                return $this->fetchDataForNetwork('Airtel');
            case '6':
                return $this->fetchDataForNetwork('NineMobile');
            default:
                return ['success' => false, 'message' => 'Invalid network'];
        }
    }

    private function fetchDataForNetwork($networkName) {
        $sql = $this->conn->prepare("SELECT * FROM data_prices WHERE network_id = ?");
        $sql->bind_param("s", $networkName);
        $sql->execute();

        $res = $sql->get_result();

        if ($res->num_rows > 0) {
            $data = [];
            while ($row = $res->fetch_assoc()) {
                $data[] = [
                    "success" => true,
                    'id' => $row['id'],
                    'data_id' => $row['data_id'],
                    'plan_type' => $row['plan_type'],
                    'data_type' => $row['data_type'],
                    'price' => $row['price'],
                    'validity' => $row['validity']
                ];
            }
            return $data;
        } else {
            return ['success' => false, 'message' => 'No data found for the specified network'];
        }
    }

    // plan id
    public function fetchData($plan_type) {
        try {
            $sql = $this->conn->prepare("SELECT data_type, price FROM data_prices WHERE data_id = ?");
            $sql->bind_param("i", $plan_type);
            $sql->execute();

            $res = $sql->get_result();
            if ($res->num_rows > 0) {

                $row = $res->fetch_assoc();

                $fetchPrice = $row['price'];
                $fetchDataType = $row['data_type'];

                return [
                    'success' => true,
                    'fetchPrice' => $fetchPrice,
                    'fetchDataType' => $fetchDataType
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'No data found for the specified plan type.'
                ];
            }
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    // Buy data
    public function buyData($network_id, $mobile_number, $plan_id, $amount) {
        // Check the account balance before proceeding to the transaction
        $balance = $this->getAccountBalance();

        if ($amount > $balance) {
            // Perform data purchase
            $response = $this->performDataPurchase($network_id, $plan_id, $data_type, $mobile_number);
            echo json_encode($response);
        } else {
            // Insufficient balance
            echo json_encode([
                'success' => false,
                'amount' => $balance,
                'title' => 'INSUFFICIENT BALANCE',
                'message' => 'Kindly Fund Your Wallet and Enjoy Your Top Ups, Your Current Balance: ' . $balance
            ]);
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

if (isset($_POST['network_id'])) {
    $dataFetcher = new BuyData($conn);
    $network = isset($_POST['network_id']) ? $conn->real_escape_string($_POST['network_id']) : '';

    if (!empty($network)) {
        $result = $dataFetcher->fetchDataByNetwork($network);
        echo json_encode($result);
    } else {
        echo json_encode(['success' => false, 'message' => 'Network value is empty']);
    }

} elseif(isset($_POST['plan_id'])) {
    $buyData = new BuyData($conn);
    $plan_id = isset($_POST['plan_id']) ? $conn->real_escape_string($_POST['plan_id']) : '';

    $result = $buyData->fetchData($plan_id);
    echo json_encode($result);
}

elseif(!empty($_POST['network_id']) && !empty($_POST['plan_id'])){
    $network_id = isset($_POST['network_id']) ? $conn->real_escape_string($_POST['network_id']) : '';
    $plan_id = isset($_POST['plan_id']) ? $conn->real_escape_string($_POST['plan_id']) : '';
    $data_type = isset($_POST['data_type']) ? $conn->real_escape_string($_POST['data_type']) : '';
    $mobile_number = isset($_POST['mobile_number']) ? $conn->real_escape_string($_POST['mobile_number']) : '';
    $amount = isset($_POST['amount']) ? $conn->real_escape_string($_POST['amount']) : '';

    // Call buyData method
    $dataTransaction = new BuyData($conn);
    $buyData = $dataTransaction->buyData($network_id, $mobile_number, $plan_id, $amount);
    echo json_encode($buyData);
}
?>