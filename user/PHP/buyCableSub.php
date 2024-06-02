<?php
// --header 'Authorization: Token 66f2e5c39ac8640f13cd888f161385b12f7e5e92' \
// --header 'Content-Type: application/json' \
// --data '{
//     "cablename":cablename id,
//     "cableplan": cableplan id,
//     "smart_card_number": meter
// }'
header("Content-Type: application/json");
require_once 'connection.php';
session_start();

class CableSubscription{

    private $conn;

    function __construct($conn){
       $this->conn = $conn; 
    }

    public function buyTvCable($cable_name, $cable_plan, $smart_card_number){
        // call the method for getting particular user account balance
        $balance = $this->getAccountBalance();
        
        // then compare the amount and the purchaser account balance if the balance is low than the account show up insufficient balance
        // if($amount > $balance){
        //     return [
        //         "success" => false,
        //         "title" => "Insufficient Balance",
        //         "message" => "please kindly fund your wallet and then continue transaction with us, current balance: " . $balance
        //     ];
        // }

        $response = $this->processTvCableSub($cable_name, $cable_plan, $smart_card_number);

        if(isset($response)){
            $response;
        }
        // if($response && $response['status'] === "successful"){
        //     return [
        //         "success" => true,
        //         "title" => "Successful Transaction",
        //         "message" => "Tv Subs was Purchased successfully",
        //         "status" => "successful"
        //     ];
        // }else{
        //     return [
        //         "success" => false,
        //         "title" => "Transaction Failed",
        //         "message" => "Failed to Purchase Tv Subs, Please try again",
        //         "status" => "failed"
        //     ];
        // }
    }

    private function processTvCableSub($cable_name, $cable_plan_id, $smart_card_number){

        $endpoint = "https://gladtidingsapihub.com/api/cablesub/";
        $header = array(
            "Authorization: Token"  . '45264e5b4be99aa0f1571e0c0447719759c3e4bb',
            'Content-Type: application/json'
        );

        $data = array(
            "cablename" => $cable_name,
            "cableplan" => $cable_plan_id,
            "smart_card_number" => $smart_card_number
        );

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $endpoint);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($curl);

        if(curl_errno($curl)){
            return ["status" => "failed", "error" => curl_error($curl)];
        }

        curl_close($curl);
        return json_decode($response, true);
    }

    private function getAccountBalance() {
        $sql = $this->conn->prepare("SELECT settlement_amount FROM account_balance WHERE transaction_user_id = ?");
        $sql->bind_param("i", $_SESSION['user_id']);
        $sql->execute();
        
        $res = $sql->get_result();
        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();

            return $row['settlement_amount'];
        }
        return 0;
    }
}
if(!empty($_POST['cable_name']) && !empty($_POST['smart_card_number']) && !empty($_POST['cable_plan_id'])){

    $cable_name = $conn->real_escape_string($_POST['cable_name']);
    $smart_card_number = $conn->real_escape_string($_POST['smart_card_number']);
    $cable_plan_id = $conn->real_escape_string($_POST['cable_plan_id']);

    $cl = new CableSubscription($conn);
    $call = $cl->buyTvCable($cable_name, $smart_card_number, $cable_plan_id);
    echo json_encode($call);
}
?>