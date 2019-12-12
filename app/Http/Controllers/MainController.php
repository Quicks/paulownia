<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Webkul\Core\Repositories\SliderRepository;
use App\Models\Gallery;
use Webkul\Product\Models\ProductFlat;

class MainController extends Controller
{
    public function index(SliderRepository $sliderRepository)
    {
        $currentChannel = core()->getCurrentChannel();
        $sliderData = $sliderRepository->findByField('channel_id', $currentChannel->id)->toArray();
        $mainGallery = Gallery::first();
        $products = ProductFlat::where('featured', 1)->where('status', 1)->where('locale', App::getLocale())->limit(8)->get()->sortByDesc('special_price');

        return view('public.main.index', compact('sliderData', 'mainGallery', 'products'));
    }
}
