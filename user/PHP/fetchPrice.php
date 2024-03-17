<?php
header("Content-Type: application/json");
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'connection.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    try{
        $network = isset($_POST['network']) ? $conn->real_escape_string($_POST['network']) : '';
        $plan_type = isset($_POST['plan_type']) ? $conn->real_escape_string($_POST['plan_type']) : '';
        $data_plan = isset($_POST['data_plan']) ? $conn->real_escape_string($_POST['data_plan']) : '';
        $amount = isset($_POST['amount']) ? $conn->real_escape_string($_POST['amount']) : '';

        if(empty($network)){
            echo json_encode(['success' => false, 'message' => 'network value is empty']);
        }
        else if($network === '1'){
            mtn($conn);
        }else if($network === '3'){
            airtel($conn);
        }else if($network === '2'){
            glo($conn);
        }else if($network === '6'){
            nineMobile($conn);
        }else{
            echo json_encode(['success' => false, 'message' => 'none of the network value were chosen']);
        }

    }catch(Exception $e){
        echo json_encode(['error' . 'Error: ' => $e->getMessage()]);
    }
}else{
    echo json_encode(['success' => false, 'message' => 'REQUEST MESSAGE IS NOT POST']);
}

// mtn function
function mtn($conn){
    $network = 'MTN';

    $sql = $conn->prepare("SELECT * FROM data_prices WHERE Network_Name = ?");
    $sql->bind_param("s", $network);
    $sql->execute();

    $res = $sql->get_result();
    if($res->num_rows > 0){
        $mtn = [];
        while($row=$res->fetch_assoc()){
            $data_id = $row['Data_ID'];
            $plan_type = $row['plan_type'];
            $data_type = $row['data_type'];
            $price = $row['price'];
            
            $mtn[] = [
                'mtn_data_id' => $data_id,
                'mtn_plan_type' => $plan_type,
                'mtn_data_type' => $data_type,
                'mtn_price' => $price
            ];
        }
        echo json_encode([
            'success' => true,
            'mtn' => $mtn
        ]);
    }
}

// airtel function
function airtel($conn){
    $network = 'Airtel';

     $sql = $conn->prepare("SELECT * FROM data_prices WHERE Network_Name = ?");
     $sql->bind_param("s", $network);
     $sql->execute();

    $res = $sql->get_result();

    if($res->num_rows > 0){
        $airtel = [];
        while($row=$res->fetch_assoc()){
            $data_id = $row['Data_ID'];
            $plan_type = $row['plan_type'];
            $data_type = $row['data_type'];
            $price = $row['price'];

            $airtel[] = [
                'airtel_data_id' => $data_id,
                'airtel_plan_type' => $plan_type,
                'airtel_data_type' => $data_type,
                'airtel_price' => $price
            ];
        }
        echo json_encode([
            'success' => true,
            'airtel' => $airtel
        ]);
    }
}


// glo function
function glo($conn){
    $network = 'Glo';

    $sql = $conn->prepare("SELECT * FROM data_prices WHERE Network_Name = ?");
    $sql->bind_param("s", $network);
    $sql->execute();

    $res = $sql->get_result();

    if($res->num_rows > 0){
        $glo = [];
        while($row=$res->fetch_assoc()){
            $data_id = $row['Data_ID'];
            $plan_type = $row['plan_type'];
            $data_type = $row['data_type'];
            $price = $row['price'];

            $glo[] = [
                'glo_data_id' => $data_id,
                'glo_plan_type' => $plan_type,
                'glo_data_type' => $data_type,
                'glo_price' => $price
            ];
        }
        echo json_encode([
            'success' => true,
            'glo' => $glo
        ]);
    }
 }

//  9mobile function
function nineMobile($conn){
    $network = 'nineMobile';

    $sql = $conn->prepare("SELECT * FROM data_prices WHERE Network_Name = ?");
    $sql->bind_param("s", $network);
    $sql->execute();

    $res = $sql->get_result();

    if($res->num_rows > 0){
        $nineMobile = [];
        while($row=$res->fetch_assoc()){
            $data_id = $row['Data_ID'];
            $plan_type = $row['plan_type'];
            $data_type = $row['data_type'];
            $price = $row['price'];

            $nineMobile[] = [
                'nineMobile_data_id' => $data_id,
                'nineMobile_plan_type' => $plan_type,
                'nineMobile_data_type' => $data_type,
                'nineMobile_price' => $price
            ];
        }
        echo json_encode([
            'success' => true,
            'nineMobile' => $nineMobile
        ]);
    }
}
?>