<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaulowniaController extends Controller
{
    public function about(Request $request)
    {
        return view('public.paulownia.about');
    }

}
