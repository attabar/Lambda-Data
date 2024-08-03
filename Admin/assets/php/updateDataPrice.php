<?php

require_once 'connection.php';
header("Content-Type:application/json");
class UpdateDataPrice {

    private $conn;

    function __construct($conn) { 
        $this->conn = $conn;
     }

     public function processNetwork($network) {
        switch($network) {
            case 1:
                return $this->getPlanTypeViaNetwork("MTN");
            case 2:
                return $this->getPlanTypeViaNetwork("GLO");
            case 3:
                return $this->getPlanTypeViaNetwork("AIRTEL");
            case 6:
                return $this->getPlanTypeViaNetwork("9MOBILE");
            default:
                return "";
        }
     }

     private function getPlanTypeViaNetwork($network) {

        try{

            $sql = $this->conn->prepare("SELECT * FROM data_prices WHERE network_id = ?");
            $sql->bindParam(1, $network, PDO::PARAM_STR);
            $sql->execute();

            $planType = [];

            while($result = $sql->fetch(PDO::FETCH_ASSOC)) {

                $planType[] = [
                    'plan_type' => $result['plan_type'],
                    'data_id' => $result['data_id'],
                    'data_type' => $result['data_type'],
                    'validity' => $result['validity']
                ];

            }

            echo json_encode([
                'success' => true, 
                'plan' => $planType
            ]);

        } catch(PDOException $e) {
            echo json_encode([
                'success' => false, 
                'message' => $e->getMessage()
            ]);
        }
     }  
}

$db = new Database();
$conn = $db->connect();

$update = new UpdateDataPrice($conn);

if(isset($_POST['network'])) {
    $update->processNetwork($_POST['network']);
}