<?php

// Replace these with your actual API credentials
$apiKey = 'your_api_key';
$apiSecret = 'your_api_secret';
$baseURL = 'https://sandbox.monnify.com/api/v1'; // Replace with production URL for live transactions

// Sample data for virtual top-up
$customerEmail = 'customer@example.com';
$amount = 1000; // Amount in kobo (Naira's smallest unit)

// Create authorization header
$authorizationHeader = base64_encode("$apiKey:$apiSecret");

// Set up cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$baseURL/virtual-top-up/initiate");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);

// Set headers
$headers = array(
    "Authorization: Basic $authorizationHeader",
    "Content-Type: application/json"
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Prepare data
$data = array(
    'customerEmail' => $customerEmail,
    'amount' => $amount
);
$jsonData = json_encode($data);

// Set post data
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

// Execute cURL request
$response = curl_exec($ch);

// Close cURL handle
curl_close($ch);

// Handle response
if ($response) {
    $responseData = json_decode($response, true);
    if ($responseData && isset($responseData['data']['transactionReference'])) {
        $transactionReference = $responseData['data']['transactionReference'];
        // You can now proceed to redirect the user to a payment page or do further processing
    } else {
        // Handle error response
    }
} else {
    // Handle cURL error
}

?>