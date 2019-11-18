<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webkul\Core\Repositories\SliderRepository;
use App\Helpers\BigBox;

class MainController extends Controller
{
    public function index(SliderRepository $sliderRepository)
    {
        $currentChannel = core()->getCurrentChannel();
        $sliderData = $sliderRepository->findByField('channel_id', $currentChannel->id)->toArray();

        return view('public.main.index', compact('sliderData'));

    }
}
