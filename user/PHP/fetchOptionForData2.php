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

    public function fetchData($plan_type) {
        try {
            $sql = $this->conn->prepare("SELECT data_type, price FROM data_prices WHERE Data_ID = ?");
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
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dataFetcher = new DataFetcher($conn);
    $plan_type = isset($_POST['dataType']) ? $conn->real_escape_string($_POST['dataType']) : '';

    $result = $dataFetcher->fetchData($plan_type);
    echo json_encode($result);
}
?>