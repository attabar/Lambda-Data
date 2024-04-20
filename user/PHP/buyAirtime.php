<?php
require_once 'connection.php';
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $network_provider = $conn->real_escape_string($_POST['network_id']);
    $airtime_type = $conn->real_escape_string($_POST['airtime_type']);
    $mobile_number = $conn->real_escape_string($_POST['mobile_number']);
    $amount = $conn->real_escape_string($_POST['rechargeId']);
    
    function BuyAirtime($network_provider,$mobile_number, $amount){

        $endpoint =  'https://gladtidingsapihub.com/api/topup/';

        $header = array(
            'Authorization: Token ' . '45264e5b4be99aa0f1571e0c0447719759c3e4bb',
            'Content-Type: application/json'
        );

        $data = array(
            "network" => $network_provider,
            "mobile_number" => $mobile_number,
            "airtime_type"=>"VTU",
            "Ported_number" => true,
            "amount" => $amount
        );

        $ch =  curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);

        if(curl_errno($ch)){
            echo "cURL: " . curl_error($ch);
        }else{
            print_r($response); 
        }
    }
    BuyAirtime($network_provider,$mobile_number, $amount);
    
}

?>