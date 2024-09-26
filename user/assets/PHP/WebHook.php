<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './connection.php';

class WebHook {
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function GetSenderIdentity($eventData){

        $customer = $eventData['customer'];
        $customerEmail = $customer['email'];
    
        $sql = $this->conn->prepare("SELECT user_id FROM users WHERE email = ?");
        $sql->bind_param("s", $customerEmail);
        $sql->execute();
    
        $res = $sql->get_result();
        if($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $id = $row['user_id'];
            return $id;
        }
    }

    private function handleSuccessfulTransaction($eventData) {
        // Extract relevant data and perform actions
        $settlementAmount = $eventData['settlementAmount'];
        $paymentStatus = $eventData['paymentStatus'];
        $transactionReference = $eventData['transactionReference'];
        $paymentReference = $eventData['paymentReference'];
        $paidOn = $eventData['paidOn'];
        
        $id = $this->GetSenderIdentity($eventData);
    
        $sql = $this->conn->prepare("INSERT INTO account_balance(transaction_user_id,settlement_amount,paid_on,payment_reference,transaction_reference,payment_status) VALUES(?,?,?,?,?,?)");
        $sql->bind_param("iissss", $id, $settlementAmount, $paidOn, $paymentReference, $transactionReference, $paymentStatus);
        $sql->execute();
    }

    function handleFailedTransaction($data) {
        // Extract relevant data and perform actions
        $transactionReference = $data['eventData']['transactionReference'];
        $failureReason = $data['eventData']['failureReason'];
    
        // Your custom logic for a failed transaction
        // Example: Log the failure reason
        $this->logFailedTransaction($transactionReference, $failureReason);
    
        // Additional actions as needed
    }
    
    function handleUnknownEventType($data) {
        // Handle unknown event types
        // You might want to log or handle these cases differently
        // Example: Log the unexpected event type
        $this->logUnknownEventType($data);
    
        // Additional actions as needed
    }
    
    function logFailedTransaction($transactionReference, $failureReason) {
        // Implement logic to log failed transactions
        // Example: Log to a file or database
        // $logMessage = "Failed transaction: $transactionReference - Reason: $failureReason";
        // Write the log message to a log file or database
    }
    
    function logUnknownEventType($data) {
        // Implement logic to log unknown event types
        // Example: Log to a file or database
        // $eventType = $data['eventType'];
        // $logMessage = "Unknown event type: $eventType - Data: " . json_encode($data);
        // Write the log message to a log file or database
    }

    public function ExecuteWebHook() {
        // Retrieve the raw JSON payload from the webhook
        $webhookData = file_get_contents("php://input");

        // Parse the JSON data
        $data = json_decode($webhookData, true);

        // Check if the JSON decoding was successful
        if ($data !== null) {
            // Check the eventType from Monnify
            $eventType = $data['eventType'];
            $eventData = $data['eventData'];

            // Handle different event types
            switch ($eventType) {
                case 'SUCCESSFUL_TRANSACTION':
                    $this->handleSuccessfulTransaction($eventData);
                    break;
                case 'FAILED_TRANSACTION':
                    $this->handleFailedTransaction($data);
                    break;
                // Add more cases for other event types as needed
                default:
                    $this->handleUnknownEventType($data);
                     break;
            }

            // Respond with a success status code (HTTP 200 OK)
            http_response_code(200);
        } else {
            // Invalid JSON data
            // Respond with an appropriate status code
            http_response_code(400); // Bad Request for invalid JSON
        }
    }
}

$webhook = new WebHook($conn);
$webhook->ExecuteWebHook();

?>