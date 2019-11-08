<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculationsController extends Controller
{
    public function index()
    {
        return view('public.calculations.index');
    }
}
