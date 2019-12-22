<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsOfSaleController extends Controller
{
    public function index(Request $request)
    {
        return view('public.terms-of-sale.index');
    }
}