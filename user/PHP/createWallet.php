<?php
session_start();

class Monnify {
    // credentials
    private $contractCode;
    private $accessToken;
    private $Base_url; 


    // methods for reserved account
    public function __construct($contractCode,$Base_url, $accessToken) {

        $this->contractCode = $contractCode;
        $this->accessToken = $accessToken;
        $this->Base_url = $Base_url;
    }

    public function reservedAccount() {
        
        $headers = array(
            'Content-Type:application/json',
            'Authorization:'. $this->accessToken
        );

        $data = array(
            "accountReference"=>uniqid(),
            "accountName"=>"Muhammad",
            "currencyCode"=>"NGN",
            "contractCode"=>$this->contractCode,
            "customerEmail"=>"mabdulmalik436@gmail.com",
            "customerBvn"=>"21212121212",
            "customerName"=>"Muhammad Abdulmalik",
            // "getAllAvailableBanks"=>false,
            // "preferredBank"=>["035","232", "058"]
        );
        $url = $this->Base_url."/api/v1/bank-transfer/reserved-accounts";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_CAINFO, '../../../../../../ca certificate/cacert-2023-12-12.pem');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if(curl_errno($ch)){
            echo 'cURL' . curl_error($ch);
        }else {
            // This function i.e json_decode convert the response into PHP object
            $data = json_decode($response);
            var_dump($data);
            if($data->requestSuccessful == 1){
                // Extracted details
                $accountName = $data->responseBody->accountName;
                $accountNumber = $data->responseBody->accountNumber;
                $bankName = $data->responseBody->bankName;
                // print out the extracted details
                echo "ACCOUNT NAME: " . $accountName . "<br>";
                echo "ACCOUNT NUMBER: " . $accountNumber . "<br>";
                echo "BANK NAME: " . $bankName . "<br><br><br>";
            } else {
                $error = "Error: " . $data->responseMessage;
                var_dump($error);
            }
        }
    }
    public function generateAndPrintAccounts($count){
        for($i=1; $i<=$count; $i++){
            $this->reservedAccount();
        }
    }
}

$contractCode = "4127673390";
$accessToken = require_once 'AccessTokenGenerator.php';

$Base_url = "https://sandbox.monnify.com";

$new = new Monnify($contractCode,$Base_url, $accessToken);
$new->generateAndPrintAccounts(3);
?>