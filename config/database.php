<?php
class Database{
  
    // specify your own database credentials
    private $host = "mysql-jeanpantoja1.alwaysdata.net";
    private $db_name = "jeanpantoja1_smartcitybd";
    private $username = "215238_root";
    private $password = "smartcity123";
    public $conn;
  
    // get the database connection
    public function getConnection(){
  
        $this->conn = null;
  
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}
?>