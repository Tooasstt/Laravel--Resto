<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function getAllCustomer() {//in php $ is to initialize variable

      //[model_name]::[eloquent function]
     $customerData = Customer::all();//get all customer in customer table

     //dd or do or die function= similar to console log
    //  dd($customerData);
    return $customerData;
    }

    public function showAllCustomer() {
        // call get allcuustomer function and return all data and initialize the customer data variable
        // $this-> means the function is inside of the same controller
        $customerData =$this-> getAllCustomer();

        return view('home', compact('customerData'));
    }
}
 