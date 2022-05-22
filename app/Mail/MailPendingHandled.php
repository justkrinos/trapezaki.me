<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailPendingHandled extends Mailable
{
    use Queueable, SerializesModels;

    public $action;
    public $representative;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $action, $representative)
    {
        $this->action = $action;
        $this->representative = $representative;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Trapezaki Associate Approval")->view('emails.pending-handled');
    }
}
