<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNewReservation extends Mailable
{
    //TODO: otan kami o u2 j o u3 kratisi

    use Queueable, SerializesModels;

    public $link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $secret, $user)
    {
        // TODO: change this to https when ssl works
        $this->link = 'http://' . $user . '.trapezaki.me' . '/change-password/' . $email . '/' . $secret . '/';

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Trapezaki Forgot Password")->view('emails.forgot');
    }
}
