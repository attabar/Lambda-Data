<?php
function generateReferralCode($user_id) {
    // You can use the user ID or hash to create a referral code
    return substr(md5(uniqid($user_id, true)), 0, 8); // 8-character unique code
}

echo generateReferralCode(1)
?>