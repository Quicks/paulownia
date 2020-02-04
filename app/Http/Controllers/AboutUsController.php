<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;

class AboutUsController extends Controller
{
    public function index(Request $request)
    {
        $partners = Partner::orderByDesc('created_at')->take(3)->get();
        return view('public.about-us.index', compact('partners'));
    }

}
