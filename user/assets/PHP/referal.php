<?php
header("Content-Type: application/json");
session_start();

if(isset($_SESSION['referral_code'])){

    $referral_code = $_SESSION['referral_code'];
    $referral_code = $referral_code;

    echo json_encode([
        "success" => true,
        'referral' => $referral_code
    ]);

} else {
    echo json_encode([
        "success" => false,
        'message' => 'no referral'
    ]);
}
?>