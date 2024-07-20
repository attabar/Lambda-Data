<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method) {
    case 'GET':
        getTopups();
        break;
    case 'POST':
        addTopup();
        break;
    case 'PUT':
        updateTopup();
        break;
    case 'DELETE':
        deleteTopup();
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function getTopups() {
    global $db;
    $query = "SELECT * FROM topups";
    $stmt = $db->prepare($query);
    $stmt->execute();

    $topups_arr = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $topup_item = array(
            "id" => $id,
            "user_id" => $user_id,
            "amount" => $amount,
            "status" => $status,
            "created_at" => $created_at
        );
        array_push($topups_arr, $topup_item);
    }

    echo json_encode($topups_arr);
}

function addTopup() {
    global $db;
    $data = json_decode(file_get_contents("php://input"));

    $query = "INSERT INTO topups SET user_id=:user_id, amount=:amount, status=:status, created_at=:created_at";
    $stmt = $db->prepare($query);

    $stmt->bindParam(":user_id", $data->user_id);
    $stmt->bindParam(":amount", $data->amount);
    $stmt->bindParam(":status", $data->status);
    $stmt->bindParam(":created_at", date('Y-m-d H:i:s'));

    if ($stmt->execute()) {
        echo json_encode(array("message" => "Topup added successfully."));
    } else {
        echo json_encode(array("message" => "Unable to add topup."));
    }
}

function updateTopup() {
    global $db;
    $data = json_decode(file_get_contents("php://input"));

    $query = "UPDATE topups SET user_id = :user_id, amount = :amount, status = :status WHERE id = :id";
    $stmt = $db->prepare($query);

    $stmt->bindParam(':id', $data->id);
    $stmt->bindParam(':user_id', $data->user_id);
    $stmt->bindParam(':amount', $data->amount);
    $stmt->bindParam(':status', $data->status);

    if ($stmt->execute()) {
        echo json_encode(array("message" => "Topup updated successfully."));
    } else {
        echo json_encode(array("message" => "Unable to update topup."));
    }
}

function deleteTopup() {
    global $db;
    $data = json_decode(file_get_contents("php://input"));

    $query = "DELETE FROM topups WHERE id = :id";
    $stmt = $db->prepare($query);

    $stmt->bindParam(':id', $data->id);

    if ($stmt->execute()) {
        echo json_encode(array("message" => "Topup deleted successfully."));
    } else {
        echo json_encode(array("message" => "Unable to delete topup."));
    }
}
?>
