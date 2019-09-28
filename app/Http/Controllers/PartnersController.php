<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\App;

class PartnersController extends Controller
{
    public function index(Request $request)
    {
        $partners = Partner::all();
        App::setLocale($request->locale);

        return view('public.partners.index', compact('partners'));
    }
    public function show(Request $request, $id)
    {

        $partners = Partner::findOrFail($id);
        App::setLocale($request->locale);

        return view('public.partners.view', compact('partners'));
    }
}
