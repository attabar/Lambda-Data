<?php

require_once "./connection.php";

class RecentTransaction {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    function processRecentTransaction() {
        $this->getRecentTransaction();
    }

    // function for getting recent transaction
    private function getRecentTransaction() {
        // first get the date function
        $date = date("H");
        if($date >= 24){
            
        }
        echo "New Transaction Yet to Start";
    }
}

$db = new Database();
$conn = $db->connect();

$recentTransaction = new RecentTransaction($conn);
$recentTransaction->processRecentTransaction();

?>