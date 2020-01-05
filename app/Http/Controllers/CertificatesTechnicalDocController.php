<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CertificatesTechnicalDocController extends Controller
{
    public function index(Request $request)
    {
        return view('public.certificates-technical-doc.index');
    }

}