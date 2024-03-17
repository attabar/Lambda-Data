<?php

function getCustomerAccountBalance(){
    $apikey = "MK_TEST_KWB4J5FHZN";
    $secretKey = "Q4PFEVJWE1YFAHFVDP1QQX8SGYGAVUM5"; 

    $base_url = "https://sandbox.monnify.com/api/v1/disbursements/wallet/balance?accountNumber=3000074267";

    $headers = [
        'Content-Type: application/json',
        'Authorization: Basic ' . base64_encode($apikey . ":" . $secretKey)
    ];

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_URL, $base_url);
    curl_setopt($curl, CURLOPT_CAINFO, '../../../../../../ca certificate/cacert-2023-12-12.pem');

    $response = curl_exec($curl);

    if (curl_errno($curl)){
        echo 'cURL Error: ' . curl_error($curl);
    }

    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    curl_close($curl);

    if ($httpCode != 200) {
        echo 'HTTP Error: ' . $httpCode;
        echo 'Response: ' . $response; // Print the response for additional information
    } else {
        $responseData = json_decode($response);
        print_r($responseData);
    }
}
getCustomerAccountBalance();
?>
