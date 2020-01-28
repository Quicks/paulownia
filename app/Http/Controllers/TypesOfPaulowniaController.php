<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypesOfPaulowniaController extends Controller
{
    public function show(Request $request)
    {
        return view('public.paulownia.show');
    }

}
