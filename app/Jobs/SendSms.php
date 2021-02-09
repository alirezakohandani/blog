<?php

namespace App\Jobs;


use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $token;
    private $cellphone;
    private $text;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($token, $cellphone, $text)
    {
        $this->token = $token;
        $this->cellphone = $cellphone;
        $this->text = $text;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $client = new Client();
        $data = [
            'Messages' => [$this->text],
            'MobileNumbers' => [$this->cellphone],
            'LineNumber' => '30008002046206',
            'SendDateTime' => '',
            'CanContinueInCaseOfError'=> 'false',
        ];

        $option = [
            'headers' => [
                'x-sms-ir-secure-token' => $this->token,
            ],
            'json' => $data,
        ];

        $client->post('https://RestfulSms.com/api/MessageSend', $option);

    }

}
