<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailSender extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $name, $secret, $user)
    {
        $this->name = $name;
        $this->link = 'http://' . $user . '.trapezaki.me' . '/verify/' . $email . '/' . $secret . '/';

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Trapezaki Email Verification")->view('emails.verify');
    }
}
