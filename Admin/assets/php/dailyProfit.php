<?php
header("Content-Type: application/json");
require_once './connection.php';

class DailyProfit {

   private $conn;

   public function __construct($conn) {
      $this->conn = $conn;      
   }
   public function getProfit() {

   // Get Today's Date
   $today = date("Y-m-d");

   $sql = $this->conn->prepare("SELECT SUM(profit) AS daily_profit FROM data_transaction WHERE DATE(transaction_date) = ?");
   $sql->bindParam(1, $today, PDO::PARAM_INT);
   $sql->execute();

   $res = $sql->fetch(PDO::FETCH_ASSOC);
   $profit = $res['daily_profit'];

    echo json_encode(['dailyProfit' => $profit]);
   }

}

$db = new Database();
$conn = $db->connect();

$daily_profit = new DailyProfit($conn);  
$daily_profit->getProfit();

?>