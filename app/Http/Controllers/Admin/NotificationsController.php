<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendSms;
use App\Services\Notification\Email;
use App\Services\Notification\Sms;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{

    /**
     * show sms form
     *
     * @return void
     */
    public function showSmsFrom()
    {
        return view('admin.sms');
    }

    /**
     * send sms
     *
     * @param Request $request
     * @return void
     */
    public function sendSms(Request $request)
    {
        $request->validate([
            'text' => ['required', 'max:256'],
        ]);
        SendSms::dispatch();
        return redirect()->back()->with('sendSms', true);
    }

    /**
     * show email form
     *
     * @return void
     */
    public function showEmailForm()
    {
        return view('admin.email');
    }

    /**
     * send email
     *
     * @param Request $request
     * @return void
     */
    public function sendEmail(Request $request, Email $email)
    {
        $request->validate([
            'email' => ['email', 'exists:users'],
            'typeOfEmail' => ['required' ,'string']
        ]);

        $email->send();
        return redirect()->back();
    }

}   
