<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WriteToUs;

class WriteToUsController extends Controller
{
    public function send(Request $request) 
    {
        $this->validate($request, [
            'contact_email' => 'required|email',
            'name' => 'required|string',
            'message' => 'required|string',
        ]);

        $mailSent = false;
        try {
            Mail::to(env('ADMIN_MAIL_TO'))->send(new WriteToUs($request->all()));
            $mailSent = true;
        } catch (\Exception $e) { }

        if($mailSent) {
            session()->flash('success', 'Message successfully sended');
        } else {
            session()->flash('error', 'Message not sent');
        }
        return redirect()->back();
    }
}
