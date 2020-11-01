<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function notFound()
    {
        
        return view('public.home.not_found');
    }

    public function renderRegisterForm(){
        return view('public.customers.signup.form');
    }

    public function renderLoginForm(){
        return view('public.customers.session.form');
    }

    public function renderHeader(){
        return view('public.blocks.header');
    }
}
