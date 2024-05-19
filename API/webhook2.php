<?php

class MonnifyWebhookHandler
{
    private $apiSecretKey;
    private $dbConnection;

    public function __construct($apiSecretKey, $dbHost, $dbUsername, $dbPassword, $dbName)
    {
        $this->apiSecretKey = $apiSecretKey;
        $this->dbConnection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        if ($this->dbConnection->connect_error) {
            http_response_code(500); // Internal Server Error
            die("Database connection failed");
        }
    }

    private function verifySignature($payload, $signature)
    {
        $concatenatedString = $payload . $this->apiSecretKey;
        $generatedSignature = hash('sha512', $concatenatedString);
        return hash_equals($generatedSignature, $signature);
    }


    public function __destruct()
    {
        $this->dbConnection->close();
    }
}

?>