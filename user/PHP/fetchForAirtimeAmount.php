<?php

require_once 'connection.php';
header("Content-Type: application/json");

class FetchForAirtimeAmount {
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }
    
    public function fetchAmount($network_id){
        $sql = $this->conn->prepare("SELECT * FROM airtime_prices WHERE Network_Name = ?");
        $sql->bind_param("i", $network_id);
        $sql->execute();

        $res = $sql->get_result();
        if($res->num_rows > 0) {
            $response = array();
            while($row=$res->fetch_assoc()){
                $amount = $row['amount'];
                
                $response[] = [
                    "success" => true,
                    "amount" => $amount
                ];
            }
            return $response;
        }else{
            return ["success" => false, "message" => "No data found"];
        }
    }

    public function fetchAmountToPay($amountToPay){
        $sql = $this->conn->prepare("SELECT * FROM airtime_prices WHERE amount = ?");
        $sql->bind_param("i", $amountToPay);
        $sql->execute();

        $res = $sql->get_result();

        if($res->num_rows > 0){
            $row = $res->fetch_assoc();
            $atp = $row['amountToPay'];

            $response = [
                "success" => true,
                "amountToPay" => $atp
            ];

            return $response;
        } else {
            return ["success" => false, "message" => "No data found for amountToPay"];
        }
    }
}

if(isset($_POST['network_id'])){
    $network_id = $_POST['network_id'];
    
    $fetchAmount = new FetchForAirtimeAmount($conn);
    $response1 = $fetchAmount->fetchAmount($network_id);
    
    echo json_encode($response1);
}elseif(isset($_POST['amount'])){
    $amountToPay = $_POST['amount'];

    $fetchAmount = new FetchForAirtimeAmount($conn);
    $response2 = $fetchAmount->fetchAmountToPay($amountToPay);

    echo json_encode($response2);
}
else{
    echo json_encode(["success" => false, "message" => "Undefined POST"]);
}

?>
