<?php
namespace App\Services\Data\Utility;
use mysqli;
use App\Model\CustomerModel;

class Database{
    private $conn;
    private $dbname = "";
   
    
    public function __construct($dbName){
        $this->dbname = "activity3";
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "root";
    }
    public function connect(){
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
       // $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        //error checking
        if ($this->conn->connect_errno){
            echo "Failed to connect to MySQL: " . $this->conn->connect_errno;
            exit();
        }
        return ($this->conn);
    }
    
    public function connclose(){
        $this->conn->close();
        //procedural
       // mysqli_close($this->conn);
    }
        //Turn ON Autocommit
    public function setcommit(){
        $this->conn->autocommit(TRUE);
    }
    //turn OFF autocommit
    public function setcommitfalse(){
        //turn autocommit OFF
        $this->conn->autocommit(FALSE);
    }
    
    
    public function beginTransaction(){
        $this->conn->begin_transaction();
    }
    public function commitTransaction(){
        $this->conn->commit();
    }
    public function rollback(){
        $this->conn->rollback();
    }
}

