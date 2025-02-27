<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        $topics = Content::where('name', 'like', '%topic%')->get();
        $faqs = FAQ::all();

        return view('public.faq.index', compact('topics', 'faqs'));
    }
}
