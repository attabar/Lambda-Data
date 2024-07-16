<?php

require_once 'connection.php';
header("Content-Type: application/json");
try{
    $sql = $conn->prepare("SELECT * FROM data_transaction");

    if(!$sql){
        throw new Exception("Prepared Statement Failed: " . $conn->error);
    }
    
    $sql->execute();

    $result = $sql->get_result();

    if($result->num_rows > 0){
        $data_transactions = [];

        while($row=$result->fetch_assoc()){
            $id = $row['transaction_id'];
            $plan_network = $row['plan_network'];
            $mobile_number = $row['mobile_number'];
            $plan = $row['plan'];
            $status = $row['status'];
            $plan_name = $row['plan_name'];
            $plan_amount = $row['plan_amount'];
            $create_date = $row['create_date'];

            $data_transactions[] = [
                'success'=>true,
                'id'=>$id,
                'plan_network'=>$plan_network,
                'mobile_number'=>$mobile_number,
                'plan'=>$plan,
                'status'=>$status,
                'plan_name'=>$plan_name,
                'plan_amount'=>$plan_amount,
                'create_date'=>$create_date
            ];
        }
        echo json_encode([
            'success' => true,
            'data_transactions' => $data_transactions
        ]);
    }
}catch(Exception $e){
    echo "ERROR: " . $e->getMessage();
}

?>