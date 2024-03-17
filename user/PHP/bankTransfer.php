<?php

function sendMoneyToWallet($walletAccountNumber, $amount)
{
    // include token generator file
    require_once 'AccessTokenGenerator.php';

    $Base_url = "https://sandbox.monnify.com";

    $access_token = generateAccessToken();

    $headers = array(
        'Content-Type:application/json',
        'Authorization: Bearer ' . $access_token
    );

    $data = array(
        // "amount" => $amount,
        // "currencyCode" => "NGN",
        // "toWallet" => $walletAccountNumber,
        "transactionReference" => "{{6582d59d9a38d}}",
        "bankCode" => "035"
    );

    // $url = $Base_url . "/api/v1/transfer/single";
    $url = $Base_url . "/api/v1/merchant/bank-transfer/init-payment";
    


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_CAINFO, '../../../../../../ca certificate/cacert-2023-12-12.pem');
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
$walletAccountNumber = "3000254186"; // Replace with the actual wallet account number
$amountToSend = 300.00; // Replace with the amount you want to send

sendMoneyToWallet($walletAccountNumber, $amountToSend);
?>
