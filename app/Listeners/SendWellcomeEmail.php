<?php

namespace App\Listeners;

use App\Events\Login;
use App\Mail\WellcomeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWellcomeEmail
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
     * @param  object  $event
     * @return void
     */
    public function handle(Login $login)
    {
        Mail::to($login->email)->send(new WellcomeMail($login->email));
    }
}
