<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function getCustomers(){
        $customers = Customer::all();
        return view('admin.pages.customers.index',compact('customers'));
    }
}