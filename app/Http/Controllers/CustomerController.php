<?php

namespace App\Http\Controllers;
use Webkul\Customer\Http\Controllers\CustomerController as WebkulCustomerController;

use Illuminate\Http\Request;

class CustomerController extends WebkulCustomerController
{
  public function index()
  {
    $customer = $this->customer->find(auth()->guard('customer')->user()->id);

    return view($this->_config['view'], compact('customer', 'items'));
  }

  public function update()
    {
        $id = auth()->guard('customer')->user()->id;

        $this->validate(request(), [
            'first_name' => 'string',
            'last_name' => 'string',
            'gender' => 'required',
            'date_of_birth' => 'date|before:today',
            'email' => 'email|unique:customers,email,'.$id,
         ]);

        $data = collect(request()->input())->except('_token')->toArray();

        if ($data['date_of_birth'] == "") {
            unset($data['date_of_birth']);
        }

        if ($this->customer->update($data, $id)) {
            Session()->flash('success', trans('shop::app.customer.account.profile.edit-success'));

            return redirect()->route($this->_config['redirect']);
        } else {
            Session()->flash('success', trans('shop::app.customer.account.profile.edit-fail'));

            return redirect()->back($this->_config['redirect']);
        }
    }

}
