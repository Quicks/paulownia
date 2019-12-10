<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webkul\Core\Repositories\SliderRepository;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(SliderRepository $sliderRepository)
    {
        $currentChannel = core()->getCurrentChannel();
        $sliderData = $sliderRepository->findByField('channel_id', $currentChannel->id)->toArray();

        $mainGallery = Gallery::first();

        $products = DB::table('product_flat')->where('featured', 1)->limit(8)->get();
        foreach ($products as $product) {
            $product_imgs = DB::table('product_images')->where('product_id', $product->product_id)->first();
            if(!empty($product_imgs)){
                $product->img = $product_imgs->path;
            }
        }

        return view('public.main.index', compact('sliderData', 'mainGallery', 'products'));
    }
}
