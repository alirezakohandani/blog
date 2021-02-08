<?php

namespace App\Services;

use App\services\NotificationInterface;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class Sms implements NotificationInterface
{
   
    private $request;
    
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
  
    /**
     * send smm
     *
     * @return void
     */
    public function send()
    {
        $client = new Client();
        $token = $this->generateToken($client);
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

    /**
     * send body sms
     *
     * @param Client $client
     * @param string $token
     * @return void
     */
    private function sendBody(Client $client, $token)
    {
        $data = [
            'Messages' => $this->request->text,
            'MobileNumbers' => ["09129750492"],
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