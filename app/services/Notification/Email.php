<?php

namespace App\Services\Notification;

use App\Models\User;
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
        $this->email = User::where('id', $request->user)->first()->email;
        $this->mailable = $request->mailable;
        
    }
    /**
     * send email
     *
     * @return void
     */
    public function send()
    {
        $mailable = 'App\Mail\\' . $this->mailable;
        Mail::to($this->email)->send(new $mailable);
    }
}