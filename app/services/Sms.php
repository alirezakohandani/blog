<?php

namespace App\Services;

use App\services\NotificationInterface;
use Illuminate\Http\Request;

class Sms implements NotificationInterface
{
    private $request;
    /**
     * sms text
     *
     * @var [string]
     */
    private $text;

    public function __construct(Request $request, $text)
    {
        $this->request = $request;
        $this->text = $text;
    }
    /**
     * send smm
     *
     * @return void
     */
    public function send()
    {
        return true;
    }
}