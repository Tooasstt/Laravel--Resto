<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;// to disable adut timestamps

    //Table Name
    protected $table='customer_table';

    //primary key
    protected $primaryKey ='cust_id';

    //fillables= columns that you can changed, edit, or add
    protected $fillable =[
        'custname',
        'cust_address'
    ];
}
