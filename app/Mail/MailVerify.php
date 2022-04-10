<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailVerify extends Mailable
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
        //TODO: //-an en business na stelni allo view j an en www na stelni allo
                //-to variable $user lalei ti enei
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
