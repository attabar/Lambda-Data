<?php
header("Content-Type: application/json");
require_once "connection.php";

class FetchData {

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function processNetwork($network) {

        switch($network) {
            case 1:
                return $this->Network("MTN");
            case 2:
                return $this->Network("GLO");
            case 3:
                return $this->Network("AIRTEL");
            case 6:
                return $this->Network("9MOBILE");
            default:
                return $this->Network("NONE");
        }
    }

    private function Network($network) {
        try{
            $sql = $this->conn->prepare("SELECT * FROM data_prices WHERE network_id = ?");
            $sql->bindParam(1, $network, PDO::PARAM_STR);
            $sql->execute();

            while($result = $sql->fetch(PDO::FETCH_ASSOC)) {

                $data_id = $result['data_id'];
                $plan_type = $result['plan_type'];

                $data = array("success" => true, "dataId" => $data_id, "planType" => $plan_type);

            }

            echo json_encode($data);


        } catch(PDOException $err) {
            echo $err->getMessage();
        }
        
    }
}

if(isset($_POST['network'])){
    $db = new Database();
    $conn = $db->connect();

    $data = new FetchData($conn);
    $data->processNetwork($_POST['network']);
}
?> 