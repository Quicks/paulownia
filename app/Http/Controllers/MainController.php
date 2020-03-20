<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Webkul\Core\Repositories\SliderRepository;
use App\Models\Gallery;
use Webkul\Product\Models\ProductFlat;
use App\Models\News;
use App\Models\Article;
use App\Models\Treatise;

class MainController extends Controller
{
    public function index(SliderRepository $sliderRepository)
    {
        $currentChannel = core()->getCurrentChannel();
        $sliderData = $sliderRepository->findByField('channel_id', $currentChannel->id)->toArray();
        $mainGallery = Gallery::where('active', true)->inRandomOrder()->limit(5)->get();
        $products = ProductFlat::where('featured', 1)->where('status', 1)->where('locale', App::getLocale())->limit(8)->get()->sortByDesc('special_price');
        $news = News::where('active', true)->orderByDesc('publish_date')->limit(5)->get();
        $articles = Article::where('active', true)->orderByDesc('publish_date')->limit(5)->get();
        $treatises = Treatise::where('active', true)->orderByDesc('publish_date')->limit(5)->get();
        $allNews = $news->concat($articles)->concat($treatises)->sortByDesc('publish_date');

        return view('public.main.index', compact('sliderData', 'mainGallery', 'products', 'allNews'));
    }
}
