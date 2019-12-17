<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SendNewsletterController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.sendNewsletter.index');
    }

    public function send(Request $request)
    {
       
        return dd($request);//view('admin.sendNewsletter.index', ["message" => "Hi SSJ"]);
    }

}
