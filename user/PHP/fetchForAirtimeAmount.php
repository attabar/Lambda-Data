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
            while($row=$res->fetch_assoc()){
                $amount = $row['amount'];
                echo $amount . '<br/>';
            }
        }else{
            echo "The row is 0";
        }
    }
}

if(isset($_POST['network_id'])){
    $network_id = $_POST['network_id'];

    $fetchAmount = new FetchForAirtimeAmount($conn);
    $fetchAmount->fetchAmount($network_id);
}else{
    echo "undefine post";
}

?>