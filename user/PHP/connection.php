<?php

class Connection {

    private $host;
    private $username;
    private $password;
    private $dbname;
    

    public function __construct($host,$username,$password,$dbname) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;   
    }

    public function DatabaseConnection($conn) {
        if($conn->error){
            // echo "<h1>CONNECTION SUCCESSFULLY</h1>";
            $error = "Error: " . $conn->error;
        }
    }
}
$host = "localhost";
$username = "root";
$password = "";
$dbname = "vtu";
$conn = new mysqli($host, $username, $password, $dbname);

$c = new Connection($host,$username,$password,$dbname);
$c->DatabaseConnection($conn);
?>