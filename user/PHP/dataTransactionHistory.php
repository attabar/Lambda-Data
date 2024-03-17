<?php
session_start();
header("Content-Type: application/json");
require_once 'connection.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
      try{
        if(isset($_SESSION['user_id'])){
            $data_user_id = $_SESSION['user_id'];
            $sql = $conn->prepare("SELECT * FROM data_transaction WHERE data_user_id = ?");
            $sql->bind_param("i", $data_user_id);
            $sql->execute();

            $res = $sql->get_result();

            if($res->num_rows > 0){
                $history = [];
                while($row=$res->fetch_assoc()){
                    $id = $row['data_id'];
                    $transaction_id = $row['transaction_id'];
                    $plan_network = $row['plan_network'];
                    $mobile_number = $row['mobile_number'];
                    $plan = $row['plan'];
                    $status = $row['status'];
                    $plan_name = $row['plan_name'];
                    $plan_amount = $row['plan_amount'];
                    $create_date = $row['create_date'];

                    $history[] = [
                        'success' => true,
                        'id' => $id,
                        'transaction_id' => $transaction_id,
                        'plan_network' => $plan_network,
                        'mobile_number' => $mobile_number,
                        'plan' => $plan,
                        'status' => $status,
                        'plan_name' => $plan_name,
                        'plan_amount' => $plan_amount,
                        'create_date' => $create_datem                     ];
                }
                echo json_encode([
                    'success' => true,
                    'history' => $history,
                ]);
            }
        }
      }catch(Exception $ex){
        echo "ERROR: " . $ex->getMessage();
      }
}
?>