<?php

session_start();
require_once './connection.php';

class CreateWallet {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Method to check weather the user already have an account or not
    public function checkExistenceOfUserAccount() {

        $sql = $this->conn->prepare("SELECT * FROM wallet_account WHERE wallet_user_id = ?");
        $sql->bind_param("i", $_SESSION['user_id']);
        $sql->execute();
        
        $res = $sql->get_result();

        if($res->num_rows > 0) {
            echo json_encode(['success' => false, 'message' => 'You have an existing virtual account']);
        } else {
            return $this->createWalletAccount();
        }
    }  
// Method to process additional actions upon successful registration
    private function createWalletAccount() {

        // Additional actions upon successful registration
        require_once 'AccessTokenGenerator.php';

        $contractCode = "0378523971";
        $Base_url = "https://sandbox.monnify.com";

        // pass these variables into the constructor in order to generate the token
        $apiKey = "MK_TEST_KWB4J5FHZN";
        $secretKey = "Q4PFEVJWE1YFAHFVDP1QQX8SGYGAVUM5";

        $access_token = new GenerateAccessToken($apiKey, $secretKey);

        $headers = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $access_token->getAccessToken()
        );
        $data = array(
            "accountReference" => uniqid(),
            "accountName" => $_SESSION['fullname'],
            "currencyCode" => "NGN",
            "contractCode" => $contractCode,
            "customerEmail" => 'mabdulmalik436@gmail.com',
        );

        $url = $Base_url . "/api/v1/bank-transfer/reserved-accounts";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_CAINFO, '../../../../../../ca_certificate/cacert-2023-12-12.pem');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        if (curl_errno($ch)) { 
            $error = 'cURL: ' . curl_error($ch);
            error_log($error, 3, './debug.txt');
            return ["success" => false, "message" => "No stable internet connection, try again later..."];
        } else {
            $responseData = json_decode($response);
            if ($responseData->requestSuccessful == 1) {
                // Extracted details
                $accountName = $responseData->responseBody->accountName;
                $accountNumber = $responseData->responseBody->accountNumber;
                $bankName = $responseData->responseBody->bankName;
                $accountReference = $responseData->responseBody->accountReference;

                // Insert into reserved account
                $reserved_table = $this->conn->prepare("INSERT INTO wallet_account(wallet_user_id, account_name, account_number, bank_name, account_reference) VALUES(?,?,?,?,?)");
                $reserved_table->bind_param("issss", $_SESSION['user_id'], $accountName, $accountNumber, $bankName, $accountReference);
                $reserved_table->execute();

                
                if ($reserved_table) {
                    echo json_encode(["success" => true, "message" => "Wallet Details Created Successfully"]);
                } else {
                    echo json_encode(["success" => false, "message" => "Wallet Account didn't insert into Table Successfully: " . $this->conn->$reserved_table]);
                }
            } else {
                $error = "Error While Creating Wallet: " . $responseData->responseMessage;
                error_log($error, 3, './debug.txt');
                // return a generic error message to the user so that to avoid exposing sensitive information
                echo json_encode(["success" => false, "message" => "Registration incomplete...Try again later."]);
            }
        }
    }
}

$createWallet = new CreateWallet($conn);
$createWallet->checkExistenceOfUserAccount();
?>