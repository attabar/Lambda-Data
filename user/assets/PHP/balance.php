<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
header('Content-Type: application/json');
require_once 'connection.php';

class WalletBalance {

    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    function FetchWalletBalance() {
        if(isset($_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];
        
            $sql = $this->conn->prepare("SELECT settlement_amount FROM account_balance WHERE transaction_user_id = ?");
            $sql->bind_param("i", $user_id);
            $sql->execute();
            $res = $sql->get_result();
        
            if($res->num_rows > 0){
                $row = $res->fetch_assoc();
                $balance = $row['settlement_amount'];
        
                echo json_encode([
                    'success'=>true,
                    'balance'=>$balance
                ]);
            }
            else{
                echo json_encode([
                    'success'=>false,
                    'balance'=> 0
                ]);
            }
        }else{
            echo json_encode([
                'success'=>true,
                'balance'=>'Unauthorised User'
            ]);
        }
    }   
}
$WalletBalance = new WalletBalance($conn);
$WalletBalance->FetchWalletBalance();
?>