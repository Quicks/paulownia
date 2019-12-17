<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsLetterEmail;

class SendNewsletterController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.sendNewsletter.index');
    }

    public function send(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required|max:200',
            'text' => 'required|string',
        ]);

        $newsData['subject'] = $request->subject;
        $newsData['text'] = $request->text;

        $mailSent = true;
        try {
            Mail::queue(new NewsLetterEmail($newsData));

            session()->flash('success', 'E-mail sended');
        } catch (\Exception $e) {
            session()->flash('error', 'E-mail send error');
            $mailSent = false;
            dd('ERR', $e);
        }

        return $mailSent ? 'Sent' : 'Error';//view('admin.sendNewsletter.index', ["message" => "Hi SSJ"]);
    }

}
