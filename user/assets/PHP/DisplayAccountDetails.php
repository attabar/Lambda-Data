<?php
session_start();
require_once 'connection.php';

class DisplayAccountDetails {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function Display() {

        if(isset($_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];
        
            $stmt = $this->conn->prepare("SELECT * FROM wallet_account WHERE wallet_user_id = ?");
            $stmt->bind_param("i",$user_id);
            $stmt->execute();
        
            $result = $stmt->get_result();

            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $accountName = $row['account_name'];
                $accountNumber = $row['account_number'];
                $bankName = $row['bank_name'];

                echo json_encode([
                    'success' => true,
                    'accountNumber' => $accountNumber,
                    'accountName' => $accountName,
                    'bankName' => $bankName
                ]);
            }
            else{
                echo json_encode(['success' => false, 'accountNumber' => null, 'accountName' => null, 'bankName' => null]);
            }
        }
        
    }
}

$display_account_details = new DisplayAccountDetails($conn);
$display_account_details->Display();

?>