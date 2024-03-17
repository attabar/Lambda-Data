<?php
class DatabaseConnection {
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $pdo;

    public function __construct($host, $dbname, $username, $password){
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;

        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            die("Database Connection Failed: ".$e->getMessage());
        }
    }
    // LET THIS SECTION ENABLE WHEN TRYING TO CREATE NEW TABLE
    public function getPdo(){
        // $stmt = $this->pdo->prepare($sql);
        // $stmt->execute();
        return $this->pdo;
    }
}

$host = "localhost";
$dbname = "vtudata";
$username = "root";
$password = "";

$conn = new DatabaseConnection($host,$dbname,$username,$password);
?>