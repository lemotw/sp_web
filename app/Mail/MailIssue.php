<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailIssue extends Mailable
{
    use Queueable, SerializesModels;
    public $obj;
    public function __construct($obj)
    {
       $this->obj = $obj;
    }

    public function build()
    {
        return $this
        // ->from(('address'), env('name'))
        ->subject('新增的議題')
        ->view('emails.newissue');
    }
}