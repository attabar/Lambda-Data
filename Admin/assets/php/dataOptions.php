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
        $sql->bindParam(1, $networkName, PDO::PARAM_STR);
        $sql->execute();



        try  {
            $data = [];
            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
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
        } catch(PDOException $e) {

            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    // plan id
    public function fetchData($plan_type) {
        try {
            $sql = $this->conn->prepare("SELECT price, selling_price FROM data_prices WHERE data_id = ?");
            $sql->bindParam(1, $plan_type, PDO::PARAM_STR);
            $sql->execute();

            
         

                $row = $sql->fetch(PDO::FETCH_ASSOC);

                $buyPrice = $row['price'];
                $sellPrice = $row['selling_price'];

                return [
                    'success' => true,
                    'buyPrice' => $buyPrice,
                    'sellPrice' => $sellPrice
                ];
            } catch(PDOException $e) {
                return [
                    'success' => false,
                    'message' => 'No data found for the specified plan type: ' . $e->getMessage()
                ];
            }
    }
}

$db = new Database();
$conn = $db->connect();

if (isset($_POST['network'])) {
    $dataFetcher = new BuyData($conn);
    $network = isset($_POST['network']) ? htmlspecialchars($_POST['network']) : '';

    if (!empty($network)) {
        $result = $dataFetcher->fetchDataByNetwork($network);
        echo json_encode($result);
    } else {
        echo json_encode(['success' => false, 'message' => 'Network value is empty']);
    }

} elseif(isset($_POST['planType'])) {
    $buyData = new BuyData($conn);
    $plan_id = isset($_POST['planType']) ? htmlspecialchars($_POST['planType']) : '';

    $result = $buyData->fetchData($plan_id);
    echo json_encode($result);
}
?>