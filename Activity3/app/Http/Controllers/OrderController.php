<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\CustomerModel;
use App\Services\Business\CustomerService;
use App\Services\Business\SecurityService;

class OrderController extends Controller
{

    //
    public function index(Request $request)
    {
        
        $data = new CustomerModel(request()->get('firstName'), request()->get('lastName'));
        
        $product = request()->get('product');
        $customerID = $request->input('customerID');
        
       $serviceCustomer = new SecurityService();
       
        // put all form values in array called 'formValues'
        
        $isValid = $serviceCustomer->addAll($product, $customerID, $data);
        // $userName = request()->input('username');
        // return request()->get('username');
        echo ($isValid);
        if ($isValid){
            echo "Order data committed succesfully!";
        }
        else {
            echo "Error data rolled back...";
        }
        return view('order');
    }
         
      

    public function validateForm(Request $request)
    {
        // set up data validation for login form
        $rules = [
            'username' => 'Required | Between:4,10 | Alpha',
            'password' => 'Required | Between:4,10'];
           
           //run data validation rules
           $this->validate($request, $rules);
       }
    
       
    }

