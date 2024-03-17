<?php
// Set your Monnify API credentials
$api_key = 'MK_TEST_KWB4J5FHZN';
$contract_code = '0378523971';

// Define the API endpoint
$api_url = 'https://api.monnify.com/api/v1/bank-transfer/reserved-accounts';

// Create a request to generate a reserved account with Monnify
$data = array(
    'accountReference' => 'reference12345', // You can use a unique user identifier
    'accountName' => 'Lambda', // Replace with the actual user's name
    'currencyCode' => 'NGN', // You can change this if you're using a different currency
    'contractCode' => $contract_code,
);

// Initialize cURL session
$ch = curl_init($api_url);

// Set cURL options for the request
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
// curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: Bearer ' . $api_key,
    'Content-Type: application/json',
));

// Execute the cURL request
$response = curl_exec($ch);

// Check for errors and handle the response
if ($response === false) {
    die('cURL Error: ' . curl_error($ch));
}

// Close the cURL session
curl_close($ch);

// Parse the API response
$response_data = json_decode($response, true);

// Check if the API call was successful
if ($response_data && isset($response_data['responseCode']) && $response_data['responseCode'] == '00') {
    $accountNumber = $response_data['reservedAccount']['accountNumber'];
    $accountName = $response_data['reservedAccount']['accountName'];
    // Now you can use $accountNumber and $accountName to display or store the user's account details
    echo "Account Number: $accountNumber<br>";
    echo "Account Name: $accountName<br>";
} else {
    // Handle API error
    echo "Error: " . $response_data['responseMessage'];
}
?>