<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendSms;
use App\Services\NotificationInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class NotificationController extends Controller
{
    
    public function __construct()
    {
        $this->notify = app(NotificationInterface::class);
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
