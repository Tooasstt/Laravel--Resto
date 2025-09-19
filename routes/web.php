<?php

use App\Http\Controllers\CustomerController;

use Illuminate\Support\Facades\Route;

route::redirect('/','/home');
Route::get('/',[CustomerController::class,'showAllCustomer']);
 