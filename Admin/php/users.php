<?php

require_once 'connection.php';
header("Content-Type: application/json");
try{
    $sql = $conn->prepare("SELECT * FROM users");

    if(!$sql){
        throw new Exception("Prepared Statement Failed: " . $conn->error);
    }
    
    $sql->execute();

    $result = $sql->get_result();

    if($result->num_rows > 0){
        $users = [];

        while($row=$result->fetch_assoc()){
            $id = $row['user_id'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $username = $row['username'];
            $email = $row['email'];
            $phone = $row['phone'];

            $users[] = [
                'success'=>true,
                'id'=>$id,
                'fname'=>$fname,
                'lname'=>$lname,
                'username'=>$username,
                'email'=>$email,
                'phone'=>$phone
            ];
        }
        echo json_encode([
            'success' => true,
            'users' => $users
        ]);
    }
}catch(Exception $e){
    echo "ERROR: " . $e->getMessage();
}

?>