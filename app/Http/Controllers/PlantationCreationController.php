<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlantationCreationController extends Controller
{
    public function planting(Request $request)
    {
        return view('public.paulownia.planting');
    }

}