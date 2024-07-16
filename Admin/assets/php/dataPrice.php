<?php

require_once 'connection.php';
header("Content-Type: application/json");
try{
    $sql = $conn->prepare("SELECT * FROM data_prices");

    if(!$sql){
        throw new Exception("Prepared Statement Failed: " . $conn->error);
    }
    
    $sql->execute();

    $result = $sql->get_result();

    if($result->num_rows > 0){
        $data_prices = [];

        while($row=$result->fetch_assoc()){
            $id = $row['id'];
            $data_id = $row['data_id'];
            $network_id = $row['network_id'];
            $plan_type = $row['plan_type'];
            $price = $row['price'];
            $selling_price = $row['selling_price'];
            $data_type = $row['data_type'];
            $validity = $row['validity'];
            
            $data_price[] = [
                'success'=>true,
                'id'=>$id,
                'data_id'=>$data_id,
                'network_id'=>$network_id,
                'plan_type'=>$plan_type,
                'price'=>$price,
                'selling_price'=>$selling_price,
                'data_type'=>$data_type,
                'validity'=>$validity,
            ];
        }
        echo json_encode([
            'success' => true,
            'data_price' => $data_price
        ]);
    }
}catch(Exception $e){
    echo "ERROR: " . $e->getMessage();
}

?>