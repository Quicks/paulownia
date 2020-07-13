<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Gallery;
use App\Models\Slider;
use App\Models\News;
use App\Models\OurService;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Product\Repositories\ProductRepository;
// use App\Models\Treatise;

class MainController extends Controller
{
    public function index(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $currentChannel = core()->getCurrentChannel();
        $sliders = Slider::all();
        $mainGallery = Gallery::where('active', true)->inRandomOrder()->limit(5)->get();

        $news = News::where('active', true)->orderByDesc('publish_date')->limit(3)->get();
        $ourServices = OurService::active()->get();
        $categories = $categoryRepository->getCategoryFlatTree();
        $products = $productRepository->getAll(['limit' => 1000]);

        // $articles = Article::where('active', true)->orderByDesc('publish_date')->limit(5)->get();
        // $treatises = Treatise::where('active', true)->orderByDesc('publish_date')->limit(5)->get();
        return view('public.main.index', compact('sliders', 'mainGallery', 'categories', 'allNews', 'news', 'ourServices', 'products'));
    }
}
