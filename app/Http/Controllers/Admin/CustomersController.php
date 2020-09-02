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

    public function create()
    {
        $customer = new Customer();
        return view('admin.customers.create', compact('customer'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:90',
            'last_name' => 'required|max:90',
            'email' => 'required|email',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'phone'=>'string|max:30',

        ]);
        $requestData = $request->all();
        $requestData['channel_id'] = 1;

        Customer::create($requestData);

        return redirect('admin/customers')->with('flash_message', 'Customer added!');
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id)->first();

        return view('admin.customers.show', compact('customer'));
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id)->first();

        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required|max:90',
            'last_name' => 'required|max:90',
            'email' => 'required|email',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'phone'=>'string|max:30',
        ]);

        Customer::findOrFail($id)->first()->fill($request->all())->save();

        return redirect('admin/customers')->with('flash_message', 'Customer updated!');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id)->first();
        $customer->delete();

        return redirect('admin/customers')->with('flash_message', 'Customer deleted!');
    }
}
