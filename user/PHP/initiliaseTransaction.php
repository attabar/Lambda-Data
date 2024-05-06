<?php

function sendMoneyToWallet($walletAccountNumber, $amount)
{
    // include token generator file
    require_once 'AccessTokenGenerator.php';

    $Base_url = "https://sandbox.monnify.com";
     $token = new GenerateAccessToken("apiKey", "secretKey");
    $access_token = $token->getAccessToken();

    $headers = array(
        'Content-Type:application/json',
        'Authorization: Bearer ' . $access_token
    );

    $data = array(
        // "amount" => $amount,
        // "currencyCode" => "NGN",
        // "toWallet" => $walletAccountNumber,
        "amount"=>1000.00,
        "customerName"=>"Ahmad Abdulmalik",
        "customerEmail"=>"Musty234@gmail.com",
        "paymentReference"=>"65b248a4d11af",
        "paymentDescription"=>"Trial transaction",
        "currencyCode"=> "NGN",
        "contractCode"=>"0378523971",
        "redirectUrl"=>"https://my-merchants-page.com/transaction/confirm",
        "paymentMethods"=>["CARD","ACCOUNT_TRANSFER"]
    );

    // $url = $Base_url . "/api/v1/transfer/single";
    $url = $Base_url . "/api/v1/merchant/transactions/init-transaction";


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

        if ($responseData['requestSuccessful'] == true) {
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
$walletAccountNumber = "3000287783"; // Replace with the actual wallet account number
$amountToSend = 400.00; // Replace with the amount you want to send

sendMoneyToWallet($walletAccountNumber, $amountToSend);
?>
