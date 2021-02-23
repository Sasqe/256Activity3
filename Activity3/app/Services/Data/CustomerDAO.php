<?php
namespace App\Services\Data;

use App\Services\Data\Utility\Database;
use App\Model\CustomerModel;

use ErrorException;
//Chris King
//2/15/2020
//CustomerDAO OOP Data access
class CustomerDAO{
    private $conn;
    private $connection;
    private $dbname = "";
    private $dbQuery;
    private $dbObj;
    
    public function __construct($dbObj){
        
        $this->dbObj = $dbObj;
        
    }
    public function addCustomer($data){
        try {
            $firstname = $data->getFirstName();
            $lastname = $data->getLastName();
            
            
            $this->dbQuery = "INSERT INTO customers 
                             (firstName, lastName)
                             VALUES
                             ('$firstname', '$lastname')";
            
           
      //      $result = mysqli_query($this->conn, $this->dbQuery);
          //  mysqli_free_result($result);
            if ($this->dbObj->query($this->dbQuery)){
              
              //  $this->conn->connclose();
                return true;
               
            }
            else {
           //     $this->conn->connclose();
                return false;
            }
           
        } catch (ErrorException $e){
            echo $e->getMessage();
        }
    }
    public function getNextID(){
        try {
            $this->dbQuery = "SELECT customers.customerID
                             FROM customers
                             ORDER BY customerID DESC LIMIT 0,1";
            $result = $this->dbObj->query($this->dbQuery);
            while ($row = mysqli_fetch_array($result)){
                return $row['customerID'] + 1;
            }
        } catch(ErrorException $e){
            echo $e->getMessage();
        }
    }
}

