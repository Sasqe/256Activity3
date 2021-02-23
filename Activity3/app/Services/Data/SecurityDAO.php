<?php
namespace App\Services\Data;

use App\Model\UserModel;

use ErrorException;

class SecurityDAO{
    private $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbname = "activity2";
    private $dbQuery;
    
    public function __construct(){
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        
    }
    public function findByUser(UserModel $credentials){
        try {
            $this->dbQuery = "SELECT Username, Password
                             FROM users
                             WHERE Username = '{$credentials->getUsername()}'
                             AND Password = '{$credentials->getPassword()}'";
            $result = mysqli_query($this->conn, $this->dbQuery);
          //  mysqli_free_result($result);
            if ($result = mysqli_num_rows($result) > 0){
               
                mysqli_close($this->conn);
                return true;
               
            }
            else {
                mysqli_close($this->conn);
                return false;
            }
           
        } catch (ErrorException $e){
            echo $e->getMessage();
        }
    }
}

