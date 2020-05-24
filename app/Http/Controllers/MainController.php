<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Gallery;
use App\Models\Slider;
use Webkul\Product\Models\ProductFlat;
use App\Models\News;
use App\Models\OurService;
// use App\Models\Treatise;

class MainController extends Controller
{
    public function index()
    {
        $currentChannel = core()->getCurrentChannel();
        $sliders = Slider::all();
        $mainGallery = Gallery::where('active', true)->inRandomOrder()->limit(5)->get();
        $products = ProductFlat::where('featured', 1)->where('status', 1)->where('locale', App::getLocale())->limit(8)->get()->sortByDesc('special_price');        
        $news = News::where('active', true)->orderByDesc('publish_date')->limit(3)->get();
        $ourServices = OurService::active()->get();
        // $articles = Article::where('active', true)->orderByDesc('publish_date')->limit(5)->get();
        // $treatises = Treatise::where('active', true)->orderByDesc('publish_date')->limit(5)->get();
        return view('public.main.index', compact('sliders', 'mainGallery', 'products', 'allNews', 'news', 'ourServices'));
    }
}
