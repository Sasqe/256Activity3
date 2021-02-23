<?php
namespace App\Services\Data;

use App\Services\Data\Utility\Database;
use App\Model\CustomerModel;

use ErrorException;

class OrderDAO{
    private $conn;
    private $connection;
    private $dbname = "";
    private $dbQuery;
    private $dbObj;
    public function __construct($dbObj){
        $this->dbObj = $dbObj;
        
    }
    public function addOrder($product, $customerID){
        try {
            $this->dbQuery = "INSERT INTO orders
                             (product, customerID)
                             VALUES
                             ('" . $product . "', " . $customerID . ")";
            
            
            //      $result = mysqli_query($this->conn, $this->dbQuery);
            //  mysqli_free_result($result);
            //oop
            if ($this->dbObj->query($this->dbQuery)){
                
                //$this->conn->connclose();
                return true;
                
            }
            else {
              //  $this->conn->connclose();
                return false;
            }
            
        } catch (ErrorException $e){
            echo $e->getMessage();
        }
    }
    
}

