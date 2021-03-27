<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SignupMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $email;

    public function __construct($mailData)
    {
       $this->email=$mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->from('survetej94@gmail.com')
        ->subject('Welcome To Houzeo')
        ->view('mail.signup-mail')
         ->with([
            'userName' => $this->email->name,
         ]);
    }
}
