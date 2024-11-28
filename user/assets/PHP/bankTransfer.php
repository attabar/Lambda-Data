<?php

function BankTransfer($walletAccountNumber, $amount)
{
    // include token generator file
    require_once 'AccessTokenGenerator.php';

    $Base_url = "https://sandbox.monnify.com";

    $GenerateAccessToken = new GenerateAccessToken("MK_TEST_KWB4J5FHZN","Q4PFEVJWE1YFAHFVDP1QQX8SGYGAVUM5");
    $access_token = $GenerateAccessToken->getAccessToken();

    $headers = array(
        'Content-Type:application/json',
        'Authorization: Bearer ' . $access_token
    );

    $data = array(
        "amount" => $amount,
        "currencyCode" => "NGN",
        "toWallet" => $walletAccountNumber,
        "transactionReference" => "{{662cd0d892a79}}",
        "bankCode" => "035"
    );

    // $url = $Base_url . "/api/v1/transfer/single";
    $url = $Base_url . "/api/v1/merchant/bank-transfer/init-payment";
    


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_CAINFO, '../../../ca_certificate/cacert-2023-12-12.pem');
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        // Handle cURL error
        echo 'cURL Error: ' . curl_error($ch);
    } else {
        // Handle API response
        $responseData = json_decode($response, true);
        
        if ($responseData["responseMessage"] == "success") {
            // Transfer successful
            // echo 'Money sent successfully.';
            echo $response;
        } else {
            // Transfer failed
            echo 'Error sending money: ' . $responseData['responseMessage'];
        }
    }

    curl_close($ch);
}

// Example usage
$walletAccountNumber = "3000284761"; // Replace with the actual wallet account number
$amountToSend = 300.00; // Replace with the amount you want to send
BankTransfer($walletAccountNumber, $amountToSend);
?>
