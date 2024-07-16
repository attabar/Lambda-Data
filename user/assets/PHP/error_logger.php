<?php
function logError($message){
    $logFile = "../../../../../php/logs/error_log.txt";
    $timestamp = date('Y-m-d H:i:s');
    $logMessage = "[$timestamp] $message" . PHP_EOL;

    // Open the log file in append mode, or create it if it doesn't exist
    if($handle = fopen($logFile, 'a')){
        if(flock($handle, LOCK_EX)){ // Lock the file for exclusive writing
            fwrite($handle, $logMessage);
            flock($handle, LOCK_UN);  // Release the lock
        }else{
            // Couldn't get the lock, handle the error as needed
            error_log("Failed to get lock while writing to the error log.");
        }
        fclose($handle);
    }else{
        // Couldn't open the log file, handle the error as needed
        error_log("Failed to open the error log file.");
    }
}
?>