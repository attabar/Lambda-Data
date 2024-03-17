<?php

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$url = "https://sdk.monnify.com/plugin/monnify.js";
$clientID = "MK_TEST_KWB4J5FHZN";
$secret = "Q4PFEVJWE1YFAHFVDP1QQX8SGYGAVUM5";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
    "x-client-id: $clientID",
    "x-client-secret: $secret"
));
?>