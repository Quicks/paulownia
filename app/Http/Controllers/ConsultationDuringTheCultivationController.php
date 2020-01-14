<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultationDuringTheCultivationController extends Controller
{
    public function index(Request $request)
    {
        return view('public.consultation-during-the-cultivation.index');
    }

}
