<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaulowniaController extends Controller
{
    public function index(Request $request)
    {
        return view('public.paulownia.index');
    }

}
