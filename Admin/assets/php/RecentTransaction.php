<?php

header("Content-Type: application/json");

require_once './connection.php';

class RecentTransaction {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    function GetRecentTransaction() {
        // Get current date and time
        $current_date = date("Y-m-d H:i:s");

        // Get date and time 24 hours ago
        $date_24_hours_ago = date('Y-m-d H:i:s', strtotime('-24 hours'));

        $sql = $this->conn->prepare("SELECT * FROM data_transaction WHERE create_date >= ? AND create_date <= ?");
        $sql->bindParam(1,$date_24_hours_ago, PDO::PARAM_STR);
        $sql->bindParam(2, $current_date, PDO::PARAM_STR);
        $sql->execute();

        $current_transactions = [];

        while($result = $sql->fetch(PDO::FETCH_ASSOC)) {

            $current_transactions = [
                'transaction_id' => $result['transaction_id'],
                'plan_network' => $result['plan_network'],
                'mobile_number' => $result['mobile_number'],
                'plan' => $result['plan'],
                'status' => $result['status'],
                'plan_name' => $result['plan_name'],
                'plan_amount' => $result['plan_amount'],
                'create_date' => $result['create_date']
            ];
        }

        echo json_encode(['success' => true, 'current_transactions' => $current_transactions]);

    }
}

$db = new Database();
$conn = $db->connect();

$recent_transaction = new RecentTransaction($conn);
$recent_transaction->GetRecentTransaction();
?>