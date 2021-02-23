<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\CustomerModel;
use App\Services\Business\CustomerService;
//Chris King
//2/15/2020
//Customer controller
class CustomerController extends Controller
{

    //
    public function index(Request $request)
    {
        $firstname = request()->get('firstname');
        $lastname = request()->get('lastname'); 
        $data = new CustomerModel($firstname, $lastname);
        
        $nextID = 0;
        
        // put all form values in array called 'formValues'
       // $service = new CustomerService();
    //    $isValid = $service->addCustomer($data);
        // $userName = request()->input('username');
        // return request()->get('username');
     //   echo ($isValid);
//         if ($isValid){
//             echo "Customer added succesfully";
//             return view('Customer');
//         }
//         else {
//             echo "Error adding customer";
//            return view('Customer');
//         }
        return redirect('neworder')->with('nextID', $nextID)
                                   ->with('firstName', request()->get('firstname'))
                                   ->with('lastName', request()->get('lastname'));
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

