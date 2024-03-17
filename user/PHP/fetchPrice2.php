<?php
header("Content-Type: application/json");
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'connection.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    try{
        
        $plan_type = isset($_POST['plan_type']) ? $conn->real_escape_string($_POST['plan_type']) : '';
        
        $sql = $conn->prepare("SELECT data_type,price FROM data_prices WHERE Data_ID = ? ");
        $sql->bind_param("i",$plan_type);
        $sql->execute();

        $res = $sql->get_result();
        if($res->num_rows > 0){

            $fetch = [];

            while($row = $res->fetch_assoc()){

            $fetchDataPlan = $row['data_type'];
            $fetchDataPrice = $row['price'];

            $fetch[] = [
                'fetchDataPlan' => $fetchDataPlan,
                'fetchDataPrice' => $fetchDataPrice
            ];

            }
            echo json_encode([
                'success' => true,
                'fetch' => $fetch
            ]);
        }

    }catch(Exception $e){
        echo $e->getMessage();
    }
}