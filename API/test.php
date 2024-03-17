<?php
// Monnify API endpoint
$api_url = "https://sandbox.monnify.com/api/v1/merchant/transactions/initiate";

// Your Monnify API credentials
$merchant_id = "your_merchant_id";
$api_key = "your_api_key";
$contract_code = "your_contract_code";

// VTU transaction details
$amount = 1000;  // Amount in kobo (e.g., 1000 kobo = 10 NGN)
$reference = "VTU123456";  // Unique reference for the transaction
$customer_name = "John Doe";
$customer_email = "johndoe@example.com";
$customer_phone = "08012345678";

// Create API request payload
$data = array(
    "amount" => $amount,
    "contractCode" => $contract_code,
    "reference" => $reference,
    "customerName" => $customer_name,
    "customerEmail" => $customer_email,
    "customerMobileNumber" => $customer_phone
);

// Set up cURL request
$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Basic " . base64_encode("$merchant_id:$api_key"),
    "Content-Type: application/json"
));

// Execute cURL request
$response = curl_exec($ch);

// Handle API response
if ($response === false) {
    // Handle cURL error
    echo "cURL Error: " . curl_error($ch);
} else {
    $response_data = json_decode($response, true);
    // Handle Monnify response data
    print_r($response_data);
}

// Close cURL session
curl_close($ch);












class MonnifyVTU {
    private $api_url = "https://sandbox.monnify.com/api/v1/merchant/transactions/initiate";
    private $merchant_id = "your_merchant_id";
    private $api_key = "your_api_key";
    private $contract_code = "your_contract_code";
    
    public function initiatePayment($amount, $reference, $customer_name, $customer_email, $customer_phone) {
        $data = array(
            "amount" => $amount,
            "contractCode" => $this->contract_code,
            "reference" => $reference,
            "customerName" => $customer_name,
            "customerEmail" => $customer_email,
            "customerMobileNumber" => $customer_phone
        );
        
        $ch = curl_init($this->api_url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Basic " . base64_encode("$this->merchant_id:$this->api_key"),
            "Content-Type: application/json"
        ));
        
        $response = curl_exec($ch);
        
        if ($response === false) {
            return array("error" => "cURL Error: " . curl_error($ch));
        } else {
            $response_data = json_decode($response, true);
            return $response_data;
        }
        
        curl_close($ch);
    }
}

// Usage
$monnify = new MonnifyVTU();
$response = $monnify->initiatePayment(
    1000,  // Amount in kobo (e.g., 1000 kobo = 10 NGN)
    "VTU123456",  // Unique reference for the transaction
    "John Doe",
    "johndoe@example.com",
    "08012345678"
);

print_r($response);

?>
