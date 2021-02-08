<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\NotificationInterface;
use Illuminate\Http\Request;


class NotificationController extends Controller
{
    private $notify;

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
            
         $response = $this->notify->send();
      
        if(json_decode($response->getBody())->IsSuccessful === false)
        {
            return redirect()->back()->with('dontSendSms', true);
        }

        return redirect()->back()->with('sendSms', true);
    }

}   
