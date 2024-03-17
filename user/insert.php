<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once 'connection.php';
    $table = 'registration';

    // Retrieve data from the form or any source
    $data = [
        ':fname' => $_POST['fname'],
        ':lname' => $_POST['lname'],
        ':username' => $_POST['username'],
        ':email' => $_POST['email'],
        ':phone' => $_POST['phone'],
        ':pass' => $_POST['password'],
        ':confirmPass' => $_POST['cpassword'],
    ];

    // Build the SQL query
    $columns = implode(", ", array_keys($data));
    $placeholder = implode(", ", array_keys($data));
    $sql = "INSERT INTO $table ($columns) VALUES($placeholder)";

    // Prepare and execute the SQL statement\
    $stmt = $conn->getPdo()->prepare($sql);


     // Bind values to placeholders
    //  foreach($data as $placeholder => $values){
    //     $stmt->bindValue($placeholder, $values);
    //  }

    if($stmt->execute($data)){
        echo "Data Inserted Successfully";
    } else {
        echo "Data not Inserted";
    }
}
?>