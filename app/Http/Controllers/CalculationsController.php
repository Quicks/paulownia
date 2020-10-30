<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfitabilityCalculation;

class CalculationsController extends Controller
{
    public function index()
    {
        return view('public.calculations.index');
    }

    public function store(Request $request)
    {
    	// if (\Auth::check()) {
	        $this->validate($request, [
	            'sort_id' => 'required|integer',
	            'p_type_id' => 'required|integer',
	            'tree_amount' => 'nullable|numeric|between:1,50000',
	        ]);
	        $requestData = $request->all();
	        // $requestData['customer_id'] = \Auth::id();
	        $requestData['customer_id'] = 1;
	        ProfitabilityCalculation::create($requestData);
	    // }
		session()->flash('success', __('profitability-calculation.success-flash'));
        return redirect()->back();
    }
}
