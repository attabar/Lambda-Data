<?php

// Retrieve the raw JSON payload from the webhook
$webhookData = file_get_contents("php://input");

// Parse the JSON data
$data = json_decode($webhookData, true);

if ($data !== null) {
    // Check if the eventType is 'SUCCESSFUL_TRANSACTION'
    if ($data['eventType'] === 'SUCCESSFUL_TRANSACTION') {
        // Extract all data
        $eventType = $data['eventType'];
        $eventData = $data['eventData'];
        
        // Product details
        $productReference = $eventData['product']['reference'];
        $productType = $eventData['product']['type'];

        // Transaction details
        $transactionReference = $eventData['transactionReference'];
        $paymentReference = $eventData['paymentReference'];
        $paidOn = $eventData['paidOn'];
        $paymentDescription = $eventData['paymentDescription'];

        // Payment source information
        $paymentSourceInformation = $eventData['paymentSourceInformation'];
        $amountPaid = $eventData['amountPaid'];

        // Destination account information
        $destinationAccountInformation = $eventData['destinationAccountInformation'];
        $destinationBankCode = $destinationAccountInformation['bankCode'];
        $destinationBankName = $destinationAccountInformation['bankName'];
        $destinationAccountNumber = $destinationAccountInformation['accountNumber'];

        // Other details
        $totalPayable = $eventData['totalPayable'];
        $paymentMethod = $eventData['paymentMethod'];
        $currency = $eventData['currency'];
        $settlementAmount = $eventData['settlementAmount'];
        $paymentStatus = $eventData['paymentStatus'];

        // Customer details
        $customer = $eventData['customer'];
        $customerName = $customer['name'];
        $customerEmail = $customer['email'];
         
         
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "vtu";

        $conn = new mysqli($host,$username,$password,$dbname);

        // Get the user_id from the users table based on the customer's email
        $sql = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
        $sql->bind_param("s", $customerEmail);
        $sql->execute();
        $res = $sql->get_result();
        if($res->num_rows > 0){
            $row = $res->fetch_assoc();
            $user_id = $row['user_id'];

            // Perform actions based on successful 
            $sql = $conn->prepare("INSERT INTO transaction_history(transaction_user_id,settlement_amount,paid_on,payment_reference,transaction_reference,payment_status) VALUES(?,?,?,?,?,?)");
            $sql->bind_param("isssss",$user_id,$settlementAmount,$paidOn,$paymentReference,$transactionReference,$paymentStatus);
            $sql->execute();
            // Respond to Monnify with a success status code (HTTP 200 OK)
            http_response_code(200);
        }
        
    } else {
        // Handle other event types if needed
        echo "Invalid JSON data";
        echo "User not found";
        // Respond with an appropriate status code
        http_response_code(400); // Bad Request for unknown event types
    }
} else {
    // Invalid JSON data
    // Respond with an appropriate status code
    http_response_code(400); // Bad Request for invalid JSON
}

?>