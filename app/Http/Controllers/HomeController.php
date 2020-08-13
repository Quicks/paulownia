<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function notFound()
    {
        
        return view('public.home.not_found');
    }

}
