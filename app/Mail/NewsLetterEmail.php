<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsLetterEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $newsData;
    public function __construct($newsData) {
        $this->newsData = $newsData;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->newsData['email'])
            ->subject($this->newsData['subject'])
            ->view('emails.newsLetterEmail')->with('data', $this->newsData);
    }
}