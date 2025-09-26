<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function getAllCustomer() {
     //in php $ is to initialize variable
     //[model_name]::[eloquent function]
     $customerData = Cache::remember('customer_cache',600,function(){
        return Customer::all();
    });

     //dd or do or die function= similar to console log
    //  dd($customerData);
    return $customerData;
    }

    public function showAllCustomer() {
        // call get all customer function and return all data and initialize the customer data variable
        // $this-> means the function is inside of the same controller
        $customerData =$this-> getAllCustomer();

        return view('home', compact('customerData'));
    }

    public function saveCustomerDetail(Request $request){
        //first layer of defense on web development
        //VALIDATION
        $request->validate([
            'Name'=>' required|string|max:45',
            'Address'=>'required|string|max:100',
        ]);

        Customer::create([
            'custname' => $request-> Name,
            'cust_address' =>$request-> Address,
        ]);

        Cache::forget('customer_cache');

        return redirect()->route('home');    
    }

    public function deleteCustomerDetail($cust_id){
        //find the info inside of this func in the db and return it
        //but if it cant find the info in the db throw an error
        $customer = Customer::findOrFail($cust_id);

        $customer-> delete();

        Cache::forget('customer_cache');

        return redirect()->route('home'); 
    }
    
    public function showCustomerDetails($cust_id){
        $customerDetails = Customer::findOrFail($cust_id);

        return view('editCustomer',compact('customerDetails'));

    }

     public function saveEditCustomers(Request $request,$cust_id){
         $customerDetails = Customer::findOrFail($cust_id);

        $customerDetails->custname = $request-> input('Name'); 
        $customerDetails->cust_address=$request->input('Address');

        $customerDetails->save();

        Cache::forget('customer_cache');

        return redirect()->route('home'); 
    }

    public function saveCustomerDetailUnsani(Request $request) {
          $request->validate([
            'Name'=>' required|string|max:45',
            'Address'=>'required|string|max:100',
        ]);
        
       DB::unprepared("INSERT INTO customer_table(custname,cust_address)VALUES('$request->Name','$request->Address')");

       return redirect()->route('home');

    }
}
 