<?php
// Monnify API credentials
$apiKey = 'your_api_key';
$secretKey = 'your_secret_key';

// API endpoint
$baseUrl = 'https://sandbox.monnify.com/api/v1';

// Payment details
$reference = uniqid(); // Generate a unique reference for each transaction
$amount = 100000; // Amount in kobo (Naira * 100)

// Prepare the payload
$data = [
    'amount' => $amount,
    'currencyCode' => 'NGN',
    'paymentReference' => $reference,
    // Add more parameters as required by the API
];

// Create a signature
$signature = hash_hmac('sha256', json_encode($data), $secretKey);

// Set up cURL options
$ch = curl_init($baseUrl . '/merchant/transactions/init-transaction');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey,
    'Signature: ' . $signature,
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

// Execute cURL request
$response = curl_exec($ch);

// Check for errors and handle response
if ($response === false) {
    echo 'cURL Error: ' . curl_error($ch);
} else {
    $responseData = json_decode($response, true);
    // Handle the response data
    var_dump($responseData);
}

// Close cURL session
curl_close($ch);
?>