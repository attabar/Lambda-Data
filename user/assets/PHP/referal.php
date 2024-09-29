<?php
header("Content-Type: application/json");
session_start();

if(isset($_SESSION['referral'])){

    $referral_code = $_SESSION['referral'];
    $referral_link = "http://localhost/Personal%20Projects/LambdaDataWebApp/user/RegistrationPage.php?ref=" . $referral_code;

    echo json_encode([
        "success" => true,
        'referral' => $referral_link
    ]);

} else {
    echo json_encode([
        "success" => false,
        'message' => 'no referral'
    ]);
}
?>