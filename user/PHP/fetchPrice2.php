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
                $fetch = [];

                while ($row = $res->fetch_assoc()) {
                    $fetchDataPlan = $row['data_type'];
                    $fetchDataPrice = $row['price'];

                    $fetch[] = [
                        'fetchDataPlan' => $fetchDataPlan,
                        'fetchDataPrice' => $fetchDataPrice
                    ];
                }

                return [
                    'success' => true,
                    'fetch' => $fetch
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
    $plan_type = isset($_POST['plan_id']) ? $conn->real_escape_string($_POST['plan_id']) : '';

    $result = $dataFetcher->fetchData($plan_type);
    echo json_encode($result);
}
?>