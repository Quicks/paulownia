<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlantationCreationController extends Controller
{
    public function view(Request $request)
    {
        return view('public.paulownia.view');
    }

}