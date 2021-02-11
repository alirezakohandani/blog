<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendSms;
use App\Services\Notification\Sms;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    
    public function __construct()
    {
        $this->notify = app(Sms::class);
    }

    public function show()
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

}   
