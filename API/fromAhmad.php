<?php

class Monnify{
    // Base URL for the Monnify API
    private $base_url;
    // API Key and Secret Key for authentication
    private $API_KEY;
    private $SECRET_KEY;
    
    // Contract code and account number
    private $CONTRACT_CODE;
    private $ACCOUNT_NUMBER;
    
    // Currency code (NGN for Nigerian Naira)
    private $CURRENCY_CODE = "NGN";
    
    // Authorization header value
    private $AUTHORIZATION;
    
    public function __construct($base_url = null, $API_KEY = null, $SECRET_KEY = null, $CONTRACT_CODE = null, $ACCOUNT_NUMBER = null){
        if ($base_url !== null) {
            $this->base_url = $base_url;
        }
        if ($API_KEY !== null) {
            $this->API_KEY = $API_KEY;
        }
        if ($SECRET_KEY !== null) {
            $this->SECRET_KEY = $SECRET_KEY;
        }
        if ($CONTRACT_CODE !== null) {
            $this->CONTRACT_CODE = $CONTRACT_CODE;
        }
        if ($ACCOUNT_NUMBER !== null) {
            $this->ACCOUNT_NUMBER = $ACCOUNT_NUMBER;
        }
        
        // Calculate the authorization value
        $this->AUTHORIZATION = base64_encode($this->API_KEY.':'.$this->SECRET_KEY);
    }
    public function getAuthorization(){
        return $this->AUTHORIZATION;
    }
    public function getAccessToken(){
        $url = $this->base_url .'/auth/login';
        $payload = ['AUTHORIZATION'=>$this->AUTHORIZATION
    ];
    // Make a POST request to get the access token
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response, true);
    // Return the access token 
    return $data['responseBody']['accessToken'];
}

public function reserveAccount($email, $name){
    $url = 'https://sandbox.monnify.com/api/v1/bank-transfer/reserved-accounts';
    $headers = ['Content-Type: application/json','Authorization: Bearer'.$this->getAccessToken()
];
// $reference = strval(rand(1000000000, 9999999999));
$reference = strval(rand(1000000000, 9999999999));

$payload = [
    'accountReference'=>'nascom-'.$reference,
    'accountName'=>$name,
    'currencyCode'=>$this->CURRENCY_CODE,
    'contractCode'=>$this->CONTRACT_CODE,
    'customerEmail'=>$email,
    'customerName'=>$name,
    'accountNumber'=>$this->ACCOUNT_NUMBER,
    'getAllAvailableBanks'=>false,
    'preferredBanks'=>['035','058'],
];

// Make a POST request to reserve the account
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);

if($data['requestSuccessful']) {
    $account_details = [
        'bank_name' => $data['responseBody']['bankName&#39'],
        'account_name'=>'Nascom-'.$data['responseBody']['accountName'],
        'account_number'=>$data['responseBody']['accountNumber']
];
$data = [
    'success'=>true,
    'account_name' =>$data['responseBody']['accountName'],
    'account'=>$account_details,
    'reference'=>$data['responseBody']['accountReference'],
    'contract_code'=>$data['responseBody']['contractCode'],
    'reservationReference'=>$data['responseBody']['reservationReference'],
    'creationDate'=>$data['responseBody']['createdOn'],
];
} else {
$data = [
    'error' =>$data['responseMessage'],
    'success'=>false
];
}

return $data;
}

public function verifyHash($obj){
    $request_body = json_encode($obj);
    $secret_key = $this->SECRET_KEY;
    
    // Calculate HMAC value using SHA512
    $hmac_value = hash_hmac('sha512', $request_body, $secret_key);

return $hmac_value;
}
}
$base_url = "https://sandbox.monnify.com/api/v1";
$API_KEY = "MK_TEST_KWB4J5FHZN";
$SECRET_KEY = "Q4PFEVJWE1YFAHFVDP1QQX8SGYGAVUM5";
$CONTRACT_CODE = "0378523971";
$ACCOUNT_NUMBER = "4538673821";
$output = new Monnify($base_url,$SECRET_KEY, $CONTRACT_CODE, $ACCOUNT_NUMBER);
$output->reserveAccount("mabdulmalik436@gmail.com", "lambda");
///sendbox.Monnify.com;
?>