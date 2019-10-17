<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\App;
use Artesaos\SEOTools\Facades\SEOMeta;

class PartnersController extends Controller
{
    public function index(Request $request)
    {
        $partners = Partner::all();

        return view('public.partners.index', compact('partners'));
    }
    public function show(Request $request, $id)
    {
        $partners = Partner::findOrFail($id);
        $locale = App::getLocale();
        SEOMeta::addKeyword([$partners->translate($locale)->keywords]);

        return view('public.partners.view', compact('partners', 'locale'));
    }
}
