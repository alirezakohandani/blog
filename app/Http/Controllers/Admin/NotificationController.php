<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\NotificationInterface;
use Illuminate\Http\Request;


class NotificationController extends Controller
{

    public function show()
    {
        return view('admin.sms');
    }

    public function sendSms(Request $request)
    {
        $request->validate([
            'text' => ['required', 'max:256'],
            'user' => ['required', 'exists:users'],
        ]);
    }

}   
