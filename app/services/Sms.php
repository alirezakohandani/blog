<?php

namespace App\Services;

use App\Jobs\SendSms;
use App\Models\User;
use App\services\NotificationInterface;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Sms implements NotificationInterface
{
   /**
    * user cellphone
    *
    * @var [string]
    */
    private $cellphone;

    /**
     * sms body
     *
     * @var [string]
     */
    private $text;
    
    public function __construct(Request $request)
    {
        $this->cellphone = $request->user ? User::where('id', $request->user)->first()->cellphone : null; 
        $this->text = $request->text;
    }
  
    /**
     * send smm
     *
     * @return void
     */
    public function send()
    {
        $client = new Client();
        if (Cache::get('token')) {
            $token = Cache::get('token');
            return $this->sendBody($client, $token); 
        }
        $token = $this->generateToken($client);
        Cache::put('token', $token, 1780);
        return $this->sendBody($client, $token); 
        
    }

    /**
     * Undocumented function
     *
     * @param Client $client
     * @return TokenKey
     */
    private function generateToken(Client $client)
    {
        $data = [
            "UserApiKey" => config('services.sms.UserApiKey'),
	        "SecretKey" => config('services.sms.SecretKey'),
        ];
        
        $option = [
            'json' => $data,
        ]; 
        
        $response = $client->post('https://RestfulSms.com/api/Token', $option);

        return json_decode($response->getBody())->TokenKey;
    }
    private function sendBody(Client $client, $token)
    {
        $data = [
            'Messages' => [$this->text],
            'MobileNumbers' => [$this->cellphone],
            'LineNumber' => '30008002046206',
            'SendDateTime' => '',
            'CanContinueInCaseOfError'=> 'false',
        ];

        $option = [
            'headers' => [
                'x-sms-ir-secure-token' => $token,
            ],
            'json' => $data,

        ];

        return $client->post('https://RestfulSms.com/api/MessageSend', $option);
    }	    
}