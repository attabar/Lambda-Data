<?php

require_once 'connection.php';

try{
    $data_id = isset($_POST['data_id']) ? $conn->real_escape_string($_POST['data_id']) : '';
    $network = isset($_POST['network_provider']) ? $conn->real_escape_string($_POST['network_provider']) : '';
    $plan_type = isset($_POST['plan_type']) ? $conn->real_escape_string($_POST['plan_type']) : '';
    $price = isset($_POST['price']) ? $conn->real_escape_string($_POST['price']) : '';
    $data_type = isset($_POST['data_type']) ? $conn->real_escape_string($_POST['data_type']) : '';
    
    $sql = $conn->prepare("INSERT INTO data_prices(Data_ID,Network_Name,plan_type,price,data_type) VALUES(?,?,?,?,?)");
    $sql->bind_param("issis", $data_id,$network,$plan_type,$price,$data_type);
    $sql->execute();

    if($sql){
        header('location:../addnew.php');
    }else{
        echo "Error: " . $conn->$sql;
    }
}catch(Exception $e){
    echo "ERROR: " . $e->getMessage();
}

?>