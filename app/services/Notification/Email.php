<?php

namespace App\Services\Notification;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Email implements NotificationInterface
{
    /**
     * email variable
     *
     * @var [User]
     */
    private $email;

    /**
     * mailable variable
     *
     * @var [mailable]
     */
    private $mailable;

    /**
     * constructor function
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->email = $request->email;
        $this->mailable = $request->mailable;
        
    }

    public function send()
    {
        Mail::to($this->email)->send(new $this->mailable);
    }
}