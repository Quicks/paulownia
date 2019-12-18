<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsLetterEmail;
use Webkul\Core\Models\SubscribersList;

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
        $mailsSent = 0;
        $subscribers = SubscribersList::where('is_subscribed', 1)->where('channel_id', core()->getCurrentChannel()->id)->get();
        $subscribers->prepend(new SubscribersList(['email'=>env('ADMIN_MAIL_TO'), 'token'=>'Admin can\'t unsubscribe']));

        foreach ($subscribers as $subscriber) {
            $newsData['email'] = $subscriber->email;
            $newsData['token'] = $subscriber->token;
            try {
                Mail::queue(new NewsLetterEmail($newsData));
                $mailsSent++;
            } catch (\Exception $e) {
                
            }
        }

        if($mailsSent > 0) {
            session()->flash('success', 'Successfully sended '.$mailsSent.' e-mails');
        } else {
            session()->flash('error', 'E-mail not sent');
        }

        return redirect()->route('admin.customer.index');
    }

}
