<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\CustomPage;
use Illuminate\Http\Request;

class CustomPagesController extends Controller
{

    public function show($link)
    {
      $custom_page = CustomPage::where('link', $link)->firstOrFail();

      return view('public.custom_pages.show', compact('custom_page'));
    }
 
}