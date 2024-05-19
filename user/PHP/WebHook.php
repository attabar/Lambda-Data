<?php
session_start();
require_once 'connection.php';

class Webhook {

    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    // get balance 
    private function getBalance($user_id){
        $sql = $this->conn->prepare("SELECT settlement_amount FROM account_balance WHERE transaction_user_id = ?");
        $sql->bind_param("i", $user_id);
        $sql->execute();

        $res = $sql->get_result();

        if($res->num_rows > 0){
            $row = $res->fetch_assoc();
            return $row['settlement_amount'];
        }
        return 0;
    }

    private function processSuccessfulTransaction($eventData){
        $customerEmail = $eventData['customer']['email'];
        $settlementAmount = $eventData['settlementAmount'];
        $paidOn = $eventData['paidOn'];
        $paymentReference = $eventData['paymentReference'];
        $transactionReference = $eventData['transactionReference'];
        $paymentStatus = $eventData['paymentStatus'];

        // Get the user_id from the users table based on the customer's email
        $sql = $this->conn->prepare("SELECT user_id FROM users WHERE email = ?");
        $sql->bind_param("s", $customerEmail);
        $sql->execute();
        $res = $sql->get_result();

        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $user_id = $row['user_id'];

            // Get the current balance + new funding money
            $incrementBalance = $this->getBalance($user_id) + $settlementAmount;
            // Perform actions based on successful transaction
            $balanceUpdate = $this->conn->prepare("UPDATE account_balance SET
                                                                              settlement_amount = ?,
                                                                              paid_on = ?,
                                                                              payment_reference = ?,
                                                                              transaction_reference = ?,
                                                                              payment_status = ?
                                                                              WHERE transaction_user_id = ?");
            $balanceUpdate->bind_param("sssssi", $incrementBalance, $paidOn, $paymentReference, $transactionReference, $paymentStatus, $user_id);
            $balanceUpdate->execute();
            $balanceUpdate->close();

            // Respond to Monnify with a success status code (HTTP 200 OK)
            http_response_code(200);
            echo 'Webhook processed successfully.';
        } else {
            http_response_code(404); // Not Found
            echo "User not found";
        }
        $sql->close();
    }

    public function handleWebhook(){
        $payload = file_get_contents("php://input");
        
        // Log the payload for debugging
        error_log("Payload: " . $payload);

        $data = json_decode($payload, true);

        print_r($data);

        if ($data === null) {
            // Log the JSON error
            error_log("JSON Decode Error: " . json_last_error_msg(), 3, '../../../../../php/logs/php_error_log');
        }

        if ($data !== null && isset($data['eventType'])) {
            if ($data['eventType'] === 'SUCCESSFUL_TRANSACTION') {
                $this->processSuccessfulTransaction($data['eventData']);
            } else {
                http_response_code(400); // Bad Request for unknown event types
                echo "Invalid event type";
            }
        } else {
            http_response_code(400); // Bad Request for invalid JSON
            echo "Invalid JSON data";
        }
    }

    public function __destruct(){
        $this->conn->close();
    }
}

$handleWebhook = new Webhook($conn);
$handleWebhook->handleWebhook();
?>
