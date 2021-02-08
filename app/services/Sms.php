<?php

namespace App\Services;

use App\services\NotificationInterface;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class Sms implements NotificationInterface
{
  
    /**
     * send smm
     *
     * @return void
     */
    public function send()
    {
        $client = new Client();
        $this->generateToken($client);
    }

    /**
     * Undocumented function
     *
     * @param Client $client
     * @return TokenKey
     */
    private function generateToken(Client $client)
    {
        $data =[
            "UserApiKey" => config('services.sms.UserApiKey'),
	        "SecretKey" => config('services.sms.SecretKey'),
        ];

        $option = [
            'json' => $data,
        ]; 

        $response = $client->post('https://RestfulSms.com/api/Token', $option);

        return json_decode($response->getBody())->TokenKey;
        
    }
}