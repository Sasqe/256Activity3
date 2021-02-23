<?php
namespace App\Services\Business;

use App\Model\UserModel;
use App\Services\Data\SecurityDAO;
use App\Services\Data\OrderDAO;
use App\Services\Data\Utility\Database;
use App\Services\Data\CustomerDAO;

class SecurityService{
    private $verifyCred;
    private $addOrder;
    
    public function login(UserModel $credentials){
        $this->verifyCred = new SecurityDAO();
        
        return $this->verifyCred->findByUser($credentials);
    }
    public function addOrder($product, $customerID){
        $this->addOrder = new OrderDAO();
        
        return $this->addOrder->addOrder($product, $customerID);
    }
    public function addAll($product, $customerID, $data){
        $conn = new Database("activity3");
        $dbObj = $conn->connect();
           $conn->setcommitfalse();
           $conn->beginTransaction();
        
        $this->verifyCred = new CustomerDAO($dbObj);
        $identity = $this->verifyCred->getNextID();
        $this->addOrder = new OrderDAO($dbObj);
        $success = $this->verifyCred->addCustomer($data);
        
        $successful = $this->addOrder->addOrder($product, $identity);
        
        if ($success && $successful){
            $conn->commitTransaction();
            return true;
        }
        else {
            $conn->rollback();
            return false;
        }
    }
}
?>