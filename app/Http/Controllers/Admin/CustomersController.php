<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $perPage = 10;
        $customers = Customer::latest()->paginate($perPage);
        return view('admin.customers.index', compact('customers'));
    }
}
