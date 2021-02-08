<?php

namespace App\Services;

use App\services\NotificationInterface;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class Sms implements NotificationInterface
{
    

    /**
     * send sms
     *
     * @return void
     */
    public function send()
    {
        dd('tes');
    }
}