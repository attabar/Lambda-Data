<?php

class Database {

    private $host = "localhost";
    private $dbname = "vtu";
    private $user = "root";
    private $pass = "";
    
    private $conn;

    public function connect() {
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(Exception $ex){
            echo "Connection Error: " . $ex->getMessage();
        }
        return $this->conn;
    }
}
?>