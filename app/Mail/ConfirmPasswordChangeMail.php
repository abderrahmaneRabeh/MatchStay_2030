<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class ConfirmPasswordChangeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $user;

    public function __construct($user, $data)
    {
        $this->data = $data;
        $this->user = $user;
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.mailConfirm',
            with: [
                'data' => $this->data,
                'user' => $this->user
            ]
        );
    }
}
