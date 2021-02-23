<?php 
namespace App\Services\Business;

use App\Model\CustomerModel;
use App\Services\Data\CustomerDAO;

class CustomerService{
    private $added;
    
    public function addCustomer(CustomerModel $data){
        $this->added = new CustomerDAO();
        
        return $this->added->addCustomer($data);
    }
}
?>