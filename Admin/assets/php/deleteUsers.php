<?php

require_once 'connection.php';

header("Content-Type: application/json");

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user ID from the POST data
    $userId = isset($_POST['id']) ? $_POST['id'] : null;

    if ($userId) {
        try {
            // Prepare a DELETE statement
            $sql = $conn->prepare("DELETE FROM users WHERE user_id = ?");

            if (!$sql) {
                throw new Exception("Prepared Statement Failed: " . $conn->error);
            }

            // Bind the parameter and execute the statement
            $sql->bind_param("i", $userId);
            $sql->execute();

            // Check if the deletion was successful
            if ($sql->affected_rows > 0) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'User not found or not deleted']);
            }

            // Close the statement
            $sql->close();
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'User ID not provided']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}

?>
