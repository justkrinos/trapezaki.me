<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Reservation;
use App\Models\User3;
use App\Models\Table;

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
        // TODO: change this to https when ssl works
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
        return $this->subject("Trapezaki Decision")->view('emails.pending-handled');
    }
}
