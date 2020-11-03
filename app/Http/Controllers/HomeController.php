<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function notFound()
    {
        
        return view('public.home.not_found');
    }

    /**
     * @return json with slides
     */
    public function getJson(\Illuminate\Http\Request $request)
    {
        $slides = \App\Models\Slider::with('image')->latest()->take(3)->get();
        if ($request->ajax()) {
            return response()->json(compact('slides'));
        }
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
