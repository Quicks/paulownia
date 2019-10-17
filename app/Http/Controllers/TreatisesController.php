<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treatise;
use Illuminate\Support\Facades\App;
use Artesaos\SEOTools\Facades\SEOMeta;

class TreatisesController extends Controller
{
    public function index(Request $request)
    {
        $treatises = Treatise::where('active', true)->get();

        return view('public.treatises.index', compact('treatises'));
    }
    public function show(Request $request, $id)
    {
        $treatises = Treatise::findOrFail($id);
        $locale = App::getLocale();
        SEOMeta::addKeyword([$treatises->translate($locale)->keywords]);

        return view('public.treatises.view', compact('treatises', 'locale'));
    }
}
