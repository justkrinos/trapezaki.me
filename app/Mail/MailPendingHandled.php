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
        $t!✖his->action = $action;
        $this->representative = $representative;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "";
        if ($this->action == 'accept')
            $subject = "Trapezaki Associate Approval";
        else if($this->action == 'decline')
            $subject = "Trapezaki Associate Request";

        return $this->subject($subject)->view('emails.pending-handled');
    }
}
