<?php

require_once './connection.php';
header("Content-Type: application/json");

class ResetData {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    function updateDataPrice($buyPrice, $sellPrice, $dataId) {
        $sql = $this->conn->prepare("UPDATE data_prices SET price = ?, selling_price = ? WHERE data_id = ?");
        $sql->bindParam(1, $buyPrice, PDO::PARAM_STR);
        $sql->bindParam(2, $sellPrice, PDO::PARAM_STR);
        $sql->bindParam(3, $dataId, PDO::PARAM_STR);

        // execute the query
        $sql->execute();

        echo  json_encode(['success' => true, 'message' => $sql->rowCount() . ' record(s) UPDATED successfully']);
    }
}

if(isset($_POST['planType']) && isset($_POST['buying-price']) && isset($_POST['selling-price'])) {
    $db = new Database();
    $conn = $db->connect();

    $reset = new ResetData($conn);
    $reset->updateDataPrice($_POST['buying-price'], $_POST['selling-price'], $_POST['planType']);
}
?>
