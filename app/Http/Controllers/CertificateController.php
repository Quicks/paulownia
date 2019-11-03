<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;

class CertificateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $code)
    {
        $id = explode("-", $code)[1];
        $certificate = Certificate::find($id);
        if($certificate && $certificate->active) {
            return view('public.certificate.show', compact('certificate'));
        }
        return "Such certificate does not exist.";
    }
}
