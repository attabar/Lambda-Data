<?php

require_once 'connection.php';
header("Content-Type: json/application");

class FetchForAirtimeAmount {
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }
    
    public function fetchAmount($network_id){
        $sql = $this->conn->prepare("SELECT * FROM airtime_prices WHERE Network_Name = ?");
        $sql->bind_param("s", $network_id);
        $sql->execute();

        $res = $sql->get_result();
        if($res->num_rows > 0) {
            $response = array();
            while($row=$res->fetch_assoc()){
                $amount = $row['amount'];
                
                $response = [
                    "success" => true,
                    "amount" => $amount
                ];
            }
            return $response;
        }else{
            echo "The row is 0";
        }
    }
}

if(isset($_POST['network_id'])){
    $network_id = $_POST['network_id'];

    $fetchAmount = new FetchForAirtimeAmount($conn);
    $response = $fetchAmount->fetchAmount($network_id);
    echo json_encode($response);
}else{
    echo "undefine post";
}

?>