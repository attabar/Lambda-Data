<?php
header("Content-Type: application/json");
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'connection.php';

class DataFetcher {
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
        $sql = $this->conn->prepare("SELECT * FROM data_prices WHERE Network_Name = ?");
        $sql->bind_param("s", $networkName);
        $sql->execute();

        $res = $sql->get_result();

        if ($res->num_rows > 0) {
            $data = [];
            while ($row = $res->fetch_assoc()) {
                $data[] = [
                    strtolower($networkName) . '_data_id' => $row['Data_ID'],
                    strtolower($networkName) . '_plan_type' => $row['plan_type'],
                    strtolower($networkName) . '_data_type' => $row['data_type'],
                    strtolower($networkName) . '_price' => $row['price']
                ];
            }
            return ['success' => true, strtolower($networkName) => $data];
        } else {
            return ['success' => false, 'message' => 'No data found for the specified network'];
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dataFetcher = new DataFetcher($conn);
    $network = isset($_POST['network']) ? $conn->real_escape_string($_POST['network']) : '';

    if (!empty($network)) {
        $result = $dataFetcher->fetchDataByNetwork($network);
        echo json_encode($result);
    } else {
        echo json_encode(['success' => false, 'message' => 'Network value is empty']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Request method is not POST']);
}
?>
