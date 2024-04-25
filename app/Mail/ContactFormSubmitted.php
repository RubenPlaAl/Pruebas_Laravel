<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $pregunta;

    public function __construct($name, $email, $pregunta)
    {
        $this->name = $name;
        $this->email = $email;
        $this->pregunta = $pregunta;
    }
    
    public function build()
    {
        return $this->from($this->email)
                    ->view('emails.contact-form-submitted');
    }
}
