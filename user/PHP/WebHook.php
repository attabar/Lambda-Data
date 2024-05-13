<?php

// Retrieve the Monnify webhook payload
$payload = file_get_contents("php://input");

// Retrieve the Monnify webhook signature
$signature = $_SERVER['HTTP_X_MONNIFY_SIGNATURE'];

// Define your Monnify API secret key
$apiSecretKey = 'Q4PFEVJWE1YFAHFVDP1QQX8SGYGAVUM5';

// Verify the signature
$isValidSignature = verifyMonnifyWebhookSignature($payload, $signature, $apiSecretKey);

if ($isValidSignature) {
    // Signature is valid, proceed with processing the webhook
    // Decode the JSON payload
    $data = json_decode($payload, true);
    // Extract the necessary information from the payload
         
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
                $sql = $conn->prepare("INSERT INTO account_balance(transaction_user_id,settlement_amount,paid_on,payment_reference,transaction_reference,payment_status) VALUES(?,?,?,?,?,?)");
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
    
    
    // Return a response to Monnify indicating successful processing
    
    //     http_response_code(200);
    //         echo 'Webhook processed successfully.';
            
    // } else {
                // Invalid signature, discard the webhook notification
                
    //        http_response_code(403);
    //       echo 'Invalid signature. Webhook discarded.';
     }

    
// Function to verify the Monnify webhook signature

function verifyMonnifyWebhookSignature($payload, $signature, $apiSecretKey) {

    $concatenatedString = $payload . $apiSecretKey;
    
    $generatedSignature = hash('sha512',$concatenatedString);
    
    return hash_equals($generatedSignature, $signature);
}

?>