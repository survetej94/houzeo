<?php

namespace App\Listeners;

use App\Events\RegisterMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\SignupMail;;
use Illuminate\Support\Facades\Mail;

class MailNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RegisterMail  $event
     * @return void
     */
    public function handle(RegisterMail $event)
    {

         Mail::to($event->email['email'])->send(new SignupMail($event->email));
    }
}
