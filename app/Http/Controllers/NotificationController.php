<?php

namespace App\Http\Controllers;

use App\Services\NotificationInterface;
use Illuminate\Http\Request;


class NotificationController extends Controller
{

    public function show()
    {
        return view('admin.sms');
    }

}   
