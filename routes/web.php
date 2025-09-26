<?php

use App\Http\Controllers\CustomerController;

use Illuminate\Support\Facades\Route;

route::redirect('/','/home');

Route::get('/home',[CustomerController::class,'showAllCustomer'])->name('home');
 
Route::post('/saveCustomer',[CustomerController::class,'saveCustomerDetail'])->name('saveCustomer');

Route::post('/saveCustomerUnsani',[CustomerController::class,'saveCustomerDetailUnsani'])->name('saveCustomerUnsanitized');

Route::get('/editCustomer/{cust_id}',[CustomerController::class,'showCustomerDetails'])->name('customerEdit');

Route::delete('/customerDelete/{cust_id}',[CustomerController::class,'deleteCustomerDetail'])->name('customerDelete');

Route::put('/saveEditCustomer/{cust_id}',[CustomerController::class,'saveEditCustomers'])->name('saveEditCustomer');

