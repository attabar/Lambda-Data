<?php

require "../../../vendor/autoload.php";

class Connection {

    private $host;
    private $username;
    private $password;
    private $dbname;
    private $conn;
    

    public function __construct($host,$username,$password,$dbname) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;   
    }

    public function connect(){

        // Attempt to establish connection
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname, null, "../../../ca_certificate/cacert-2023-12-12.pem");
        // Set connection timeout
        mysqli_options( $this->conn, MYSQLI_OPT_CONNECT_TIMEOUT, 5);

        // check for database connection
        if($this->conn->connect_error){
            error_log("Connection Failed: " . $this->conn->connect_error, 3, "./app_errors.log");
            return "Unable to connect to the database. Please try again later.";
        }
        return $this->conn;
    }
}

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Retrieve credentials from environment variables
$host = $_ENV['DB_HOST'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$dbname = $_ENV['DB_NAME'];

$connection = new Connection($host,$username,$password,$dbname);
$conn = $connection->connect();

?>