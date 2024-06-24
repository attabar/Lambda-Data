<?php

require_once 'connection.php';
header("Content-Type:application/json");
class UpdateDataPrice {

    private $conn;

    function __construct($conn) { 
        $this->conn = $conn;
     }

     public function processfetchThroughNetwork($network) {
        switch($network){
            case 1:
                return $this->fetchThroughNetwork('MTN');
            case 2:
                return $this->fetchThroughNetwork('GLO');
            case 3:
                return $this->fetchThroughNetwork('AIRTEL');
            case 6:
                return $this->fetchThroughNetwork('9MOBILE');
            default:
                return ['success' => false, 'message' => 'Invalid Network'];
        }
     }

     public function processfetchThroughPlantype($planType){
        return $this->fetchPriceThroughDataId($planType);
     }

     public function processResetPrice($buying_price, $selling_price, $planType){
        return $this->resetPrice($buying_price, $selling_price, $planType);
     }

     private function fetchThroughNetwork($network){

        $sql = $this->conn->prepare("SELECT * FROM data_prices WHERE network_id = ? ");
        $sql->bind_param("s", $network);
        $sql->execute();

        $res = $sql->get_result();

        if($res->num_rows > 0){
            $data[] = [];
            while($row = $res->fetch_assoc()){
                $planType = $row['plan_type'];
                $dataType = $row['data_type'];
                $validity = $row['validity'];
                $dataid = $row['data_id'];

                $data[] = [
                    'planType' => $planType,
                    'dataType' => $dataType,
                    'validity' => $validity,
                    'dataid' => $dataid
                ];
            }
            return $data;
        }
     }

     private function fetchPriceThroughDataId($dataType){
        $sql = $this->conn->prepare("SELECT * FROM data_prices WHERE data_id = ? ");
        $sql->bind_param("s", $dataType);
        $sql->execute();

        $res = $sql->get_result();

        if($res->num_rows > 0){
            
            $row = $res->fetch_assoc();
            $price = $row['price'];
            $selling_price = $row['selling_price'];

            $data = [
                'price' => $price,
                'selling_price' => $selling_price
            ];
            
            return $data;
        }
     }

     private function resetPrice($buying_price, $selling_price, $planType){

        $sql = $this->conn->prepare("UPDATE data_prices SET price = ?, selling_price = ? WHERE data_id = ?");
        $sql->bind_param("sss", $buying_price, $selling_price, $planType);
        $sql->execute();

        // $res = $sql->get_result();
        // $row = $res->fetch_assoc();

        // $bprice = $row['price'];
        // $sprice = $row['selling_price'];

        // if($res){
            return array(['success' => true, 'message'=> "The Price Updated Successfully"]);
        // }
        // return ["success" => false, 'message'=> "The Price Failed To Updated"];
     }
}
if(isset($_POST['network-id']) && !empty($_POST['network-id'])){
    $network = $conn->real_escape_string($_POST['network-id']);
    
    $class = new UpdateDataPrice($conn);
    $networkid = $class->processfetchThroughNetwork($network);
    echo json_encode($networkid);
}

if(isset($_POST['planType']) && !empty($_POST['planType'])){
    $planType = $conn->real_escape_string($_POST['planType']);

    $class = new UpdateDataPrice($conn);
    $planType = $class->processfetchThroughPlantype($planType);
    echo json_encode($planType);

}

if(!empty($_POST['network-id']) && !empty($_POST['planType']) && !empty($_POST['buying-price']) && !empty($_POST['selling-price'])){
    $planType = $conn->real_escape_string($_POST['planType']);
    $buying_price = $conn->real_escape_string($_POST['buying-price']);
    $selling_price = $conn->real_escape_string($_POST['selling-price']);

    $class = new UpdateDataPrice($conn);
    $resetPrice = $class->processResetPrice($buying_price, $selling_price, $planType);
    echo json_encode($resetPrice);
}