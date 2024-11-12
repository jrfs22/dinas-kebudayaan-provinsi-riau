<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendContactUsResponseEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $receiver, $name, $messages;

    public function __construct($name, $receiver, $messages)
    {
        $this->receiver = $receiver;
        $this->name = $name;
        $this->messages = $messages;
    }

    public function build()
    {
        return $this->subject('Pesan Baru dari ' . $this->name)
                    ->view('before-login.kontak.mail')
                    ->with([
                        'name' => $this->name,
                        'receiver' => $this->receiver,
                        'messages' => $this->messages,
                    ]);
    }
}
