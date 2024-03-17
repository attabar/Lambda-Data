<?php
//kaje Webhook section kayi pasting link na Webhook file naka:


// Retrieve the Monnify webhook payload
$payload = $_POST['payload'];

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
         
    // Perform your desired actions based on the event and data received
    
  if ($event === 'TRANSFER') {
  // User performed a transfer into their wallet
 // Process the transfer, update your database, send notifications, etc
    }
    
    // Return a response to Monnify indicating successful processing
    
        http_response_code(200);
            echo 'Webhook processed successfully.';
            
    } else {
                // Invalid signature, discard the webhook notification
                
           http_response_code(403);
          echo 'Invalid signature. Webhook discarded.';
     }
     
// Function to verify the Monnify webhook signature

function verifyMonnifyWebhookSignature($payload, $signature, $apiSecretKey) {

    $concatenatedString = $payload . $apiSecretKey;
    
    $generatedSignature = hash('sha512',$concatenatedString);
    
    return hash_equals($generatedSignature, $signature);
}
?>