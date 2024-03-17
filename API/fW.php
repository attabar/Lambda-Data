
<?php

// Monnify API credentials
$api_key = 'MK_TEST_KWB4J5FHZN';
$contract_code = '0378523971';

// API Endpoint
$api_url = 'https://api.monnify.com/api/v1/bank-transfer/generic';

// User details
$user_email = 'mabdulmalik436@gmail.com';
$user_name = 'lambda';

// Create a unique reference ID
$reference_id = uniqid();

// Request data
$data = array(
    'recipientName' => $user_name,
    'recipientAccountNumber' => '', // Leave this empty for Monnify to generate
    'recipientBankCode' => '057', // Bank code for a Nigerian bank (e.g., Zenith Bank)
    'recipientEmail' => $user_email,
    'reference' => $reference_id,
    'contractCode' => $contract_code,
);

// Convert data to JSON
$data_json = json_encode($data);

// Initialize cURL session
$ch = curl_init($api_url);

// Set cURL options
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: ' . $api_key,
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_json),
));

// Execute the cURL request
$response = curl_exec($ch);

// Close the cURL session
curl_close($ch);

// Check for errors
if ($response === false) {
    die('Error: ' . curl_error($ch));
}

// Decode the JSON response
$response_data = json_decode($response, true);

if (isset($response_data['data']['recipientAccountNumber'])) {
    $account_number = $response_data['data']['recipientAccountNumber'];
    echo "Generated Account Number: $account_number";
} else {
    echo "Account number generation failed. Error: " . $response_data['message'];
}

?>
