<?php
session_start();
require_once 'connection.php';
header("Content-Type: application/json");
class CheckOut {

    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    private function fetchWalletAccountNumber(){
        $sql = $this->conn->prepare("SELECT account_number FROM wallet_account WHERE wallet_user_id = ?");
        $sql->bind_param("i", $_SESSION['user_id']);
        $sql->execute();

        $res = $sql->get_result();

        if($res->num_rows > 0){
            $row = $res->fetch_assoc();
            return $row['account_number'];
        }
        return null;
    }

    private function fetchFullname(){
        $sql = $this->conn->prepare("SELECT fname,lname FROM users WHERE user_id = ?");
        $sql->bind_param("i", $_SESSION['user_id']);
        $sql->execute();

        $res = $sql->get_result();

        if($res->num_rows > 0){
            $row = $res->fetch_assoc();
            return $row['fname'] . $row['lname'];
        }
        return null;
    }

    private function fetchEmail(){
        $sql = $this->conn->prepare("SELECT email FROM users WHERE user_id = ?");
        $sql->bind_param("i", $_SESSION['user_id']);
        $sql->execute();

        $res = $sql->get_result();

        if($res->num_rows > 0){
            $row = $res->fetch_assoc();
            return $row['email'];
        }
        return null;
    }

    private function generatePaymentReference($length){
        // Generate the desired number of bytes (half the length, since each byte is two hex characters)
        $bytes = random_bytes(ceil($length / 2));
         // Convert the bytes to a hexadecimal string
         $hex = bin2hex($bytes);
         // Trim the string to the desired length
         return substr($hex, 0, $length);
    }


    private function sendRequestToMonnify($amount){
        // include token generator file
        require_once 'AccessTokenGenerator.php';

        $Base_url = "https://sandbox.monnify.com";
        $token = new GenerateAccessToken("MK_TEST_KWB4J5FHZN", "Q4PFEVJWE1YFAHFVDP1QQX8SGYGAVUM5");
        $access_token = $token->getAccessToken();

        $headers = array(
            'Content-Type:application/json',
            'Authorization: Bearer ' . $access_token
        );

        $length = 13;

        $data = array(
            "amount" => $amount,
            "toWallet" => $this->fetchWalletAccountNumber(),
            "customerName"=>$this->fetchFullname(),
            "customerEmail"=>$this->fetchEmail(),
            "paymentReference"=>$this->generatePaymentReference($length),
            "paymentDescription"=>"payment for top up",
            "currencyCode"=> "NGN",
            "contractCode"=>"0378523971",
            "redirectUrl"=>"http://localhost/Personal%20Projects/Lambda%20Data/user/fundWallet.php",
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
            return array('success'=>false, 'message'=>'cURL Error: ' . curl_error($ch));
        } else {
            // Handle API response
            $responseData = json_decode($response, true);

            if ($responseData['requestSuccessful'] == true) {
                return array("success" => true, "redirectUrl" => $responseData['responseBody']['checkoutUrl']);
                exit(); // Always use exit after a header redirect to stop script execution
            } else {
                return array('success'=>false, 'message'=>'Error: ' . $responseData['responseMessage']);
            }
        }

        curl_close($ch);
    }

    public function displayCheckOut($amount){
        return $this->sendRequestToMonnify($amount);
    }

}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $amount = isset($_POST['amount']) ? $conn->real_escape_string($_POST['amount']) : null;

    if($amount === null){
        echo json_encode(array('success' => false, 'message' => 'Amount is required'));
    }
    $checkout = new CheckOut($conn);
    $result = $checkout->displayCheckOut($amount);
    echo json_encode($result);
}
?>
