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
                    'price' => $row['selling_price'],
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
            $sql = $this->conn->prepare("SELECT data_type, selling_price FROM data_prices WHERE data_id = ?");
            $sql->bind_param("i", $plan_type);
            $sql->execute();

            $res = $sql->get_result();
            if ($res->num_rows > 0) {

                $row = $res->fetch_assoc();

                $fetchPrice = $row['selling_price'];
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
?>