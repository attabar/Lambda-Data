<?php

// Retrieve the raw JSON payload from the webhook
$webhookData = file_get_contents("php://input");

// Parse the JSON data
$data = json_decode($webhookData, true);

// Check if the JSON decoding was successful
if ($data !== null) {
    // Check the eventType from Monnify
    $eventType = $data['eventType'];

    // Handle different event types
    switch ($eventType) {
        case 'SUCCESSFUL_TRANSACTION':
            handleSuccessfulTransaction($data);
            break;
        case 'FAILED_TRANSACTION':
            handleFailedTransaction($data);
            break;
        // Add more cases for other event types as needed
        default:
            handleUnknownEventType($data);
            break;
    }

    // Respond with a success status code (HTTP 200 OK)
    http_response_code(200);
} else {
    // Invalid JSON data
    // Respond with an appropriate status code
    http_response_code(400); // Bad Request for invalid JSON
}

// Functions to handle different event types

function handleSuccessfulTransaction($data) {
    // Extract relevant data and perform actions
    $transactionReference = $data['eventData']['transactionReference'];
    $amountPaid = $data['eventData']['paymentSourceInformation'][0]['amountPaid'];

    // Your custom logic for a successful transaction
    // Example: Save the transaction details to a database
    saveTransactionToDatabase($transactionReference, $amountPaid);

    // Additional actions as needed
}

function handleFailedTransaction($data) {
    // Extract relevant data and perform actions
    $transactionReference = $data['eventData']['transactionReference'];
    $failureReason = $data['eventData']['failureReason'];

    // Your custom logic for a failed transaction
    // Example: Log the failure reason
    logFailedTransaction($transactionReference, $failureReason);

    // Additional actions as needed
}

function handleUnknownEventType($data) {
    // Handle unknown event types
    // You might want to log or handle these cases differently
    // Example: Log the unexpected event type
    logUnknownEventType($data);

    // Additional actions as needed
}

// Sample functions for custom logic

function saveTransactionToDatabase($transactionReference, $amountPaid) {
    // Implement logic to save the transaction details to your database
    // Example: Insert into a database table
    // $sql = "INSERT INTO transactions (transaction_reference, amount_paid) VALUES ('$transactionReference', $amountPaid)";
    // Execute the SQL query
}

function logFailedTransaction($transactionReference, $failureReason) {
    // Implement logic to log failed transactions
    // Example: Log to a file or database
    // $logMessage = "Failed transaction: $transactionReference - Reason: $failureReason";
    // Write the log message to a log file or database
}

function logUnknownEventType($data) {
    // Implement logic to log unknown event types
    // Example: Log to a file or database
    // $eventType = $data['eventType'];
    // $logMessage = "Unknown event type: $eventType - Data: " . json_encode($data);
    // Write the log message to a log file or database
}

?>
