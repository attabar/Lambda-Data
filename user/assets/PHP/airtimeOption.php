<?php

require_once 'connection.php';

class AirtimeOptions {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function fetchAmount($network_name){
        $sql = $this->conn->prepare("SELECT amount FROM airtime_prices WHERE Network_Name = ?");
        $sql->bind_param("i", $network_name);
        $sql->execute();

        $res = $sql->get_result();
        if($res->num_rows > 0){
            $amount[] = [];
            while($row=$res->fetch_assoc()){
                $a = $row['amount'];
                $amount[] = [
                    "success" => true,
                    "amount" => $a
                ];
            }
            return $amount;
        }else{
            return ["success" => false, "amount" => "No amount found"];
        }
    }

    public function fetchAmountToPay($amount){
        $sql = $this->conn->prepare("SELECT amountToPay FROM airtime_prices WHERE amount = ?");
        $sql->bind_param("s", $amount);
        $sql->execute();

        $res = $sql->get_result();
        if($res->num_rows > 0){
            $row=$res->fetch_assoc();
            $a = $row['amountToPay'];
            
            $amount = [
                "success" => true,
                "amountToPay" => $a
            ];
            return $amount;
        }else{
            return ["success" => false, "amount" => "No amount found"];
        }
    }
}

if(isset($_POST['network_id']) && !empty($_POST['network_id'])){
    $network_name = $conn->real_escape_string($_POST['network_id']);
    $airtimeOption = new AirtimeOptions($conn);
    $response = $airtimeOption->fetchAmount($network_name);
    echo json_encode($response);
}

elseif(isset($_POST['amount']) && !empty($_POST['amount'])){
    $amount = $conn->real_escape_string($_POST['amount']);
    $airtimeOption = new AirtimeOptions($conn);
    $response = $airtimeOption->fetchAmountToPay($amount);
    echo json_encode($response);
}


?>