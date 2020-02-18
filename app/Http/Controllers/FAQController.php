<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        $topics = Content::where('name', 'like', '%topic%')->get();

        return view('public.faq.index', compact('topics'));
    }
}
