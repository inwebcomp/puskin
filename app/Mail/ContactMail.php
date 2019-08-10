<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class ContactMail extends Mailable
{
    use Queueable;

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $subject = __('Сообщение с сайта от ') . ' ' . $this->data['name'];

        return $this->subject($subject)->view('mail.contact')->with([
            'name'    => $this->data['name'],
            'contact' => $this->data['contact'],
            'text'    => nl2br(strip_tags($this->data['text'])),
        ]);
    }
}