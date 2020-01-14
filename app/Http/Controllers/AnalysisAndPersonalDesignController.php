<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalysisAndPersonalDesignController extends Controller
{
    public function index(Request $request)
    {
        return view('public.analysis-and-personal-design.index');
    }

}
