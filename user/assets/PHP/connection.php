<?php

require "../../../vendor/autoload.php";

class Connection {

    private $host;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct($host, $username, $password, $dbname) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function connect() {
        // Validate SSL certificate
        $ssl_cert = "../../../ca_certificate/cacert-2023-12-12.pem";
        if (!file_exists($ssl_cert)) {
            error_log("SSL certificate missing.", 3, "/secure/path/to/app_errors.log");
            exit("Configuration error. Please contact support.");
        }

        // Attempt to establish connection with SSL and timeout
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname, null, $ssl_cert);

        mysqli_options($this->conn, MYSQLI_OPT_CONNECT_TIMEOUT, 5);

        // Check for database connection
        if ($this->conn->connect_error) {
            error_log("Database connection error: " . $this->conn->connect_error, 3, "/secure/path/to/app_errors.log");
            exit("A system error occurred. Please try again later.");
        }

        return $this->conn;
    }
}

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Validate environment variables
if (!isset($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME'])) {
    error_log("Environment variables missing or invalid.", 3, "/secure/path/to/app_errors.log");
    exit("Configuration error. Please contact support.");
}

// Retrieve credentials from environment variables
$host = $_ENV['DB_HOST'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$dbname = $_ENV['DB_NAME'];

// Connect to database
$connection = new Connection($host, $username, $password, $dbname);
$conn = $connection->connect();
?>
