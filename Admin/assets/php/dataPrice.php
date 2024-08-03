<?php

header("Content-Type: application/json");
require_once 'connection.php';


class DataPrice {

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function processGetDataPrice() {
        $this->getDataPrice();
    }

    private function getDataPrice() {
        try {
            $sql = $this->conn->prepare("SELECT * FROM data_prices");
    
            $sql->execute();

            $dataPrice = [];

            while($result = $sql->fetch(PDO::FETCH_ASSOC)){
                $dataPrice[] = [
                    'id' => $result['id'],
                    'data_id' => $result['data_id'],
                    'network_id' => $result['network_id'],
                    'plan_type' => $result['plan_type'],
                    'price' => $result['price'],
                    'selling_price' => $result['selling_price'],
                    'data_type' => $result['data_type'],
                    'validity' => $result['validity'],
                ];
            }
            
            echo json_encode(['success' => true, 'dataPrice' => $dataPrice]);

        } catch(PDOException $err) {
            echo $err->getMessage();
        }

    }
}

$db = new Database();
$conn = $db->connect();

$dataPrice = new DataPrice($conn);
$dataPrice->processGetDataPrice();

 ?>