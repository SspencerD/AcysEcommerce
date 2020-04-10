<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;
use PSTPagoFacil\SignatureHelper;


class WebPayService
{
    public function authUser() {
        $client = new \GuzzleHttp\Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);
        
        $data = array(
            'username' => env('WEBPAY_USER'),
            'password' => env('WEBPAY_PASSWORD'),
        );

        $apiRequest = $client->post('https://apis-dev.pgf.cl/users/login',
            ['body' => json_encode($data)]
        );
        
        $response = json_decode($apiRequest->getBody());

        return $response;
    }

    public function handlePayment($request) {
        $apiKey = env('WEBPAY_FLOW_PUBLIC');
        $secretKey = env('WEBPAY_FLOW_SECRET');
        $base_uri = "https://sandbox.flow.cl/api";

        $amount = 2000;
        $reference = '0005';
        $session_id = (int) microtime(true);
        $url = "https://09db0e1d.ngrok.io";
        
        $client = new \GuzzleHttp\Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);

        
        $data = array(
            "apiKey" => $apiKey,
            "commerceOrder" => rand(1100,2000),
            "subject" => "Pago de prueba",
            "currency" => "CLP",
            "amount" => 5000,
            "email" => "cliente@gmail.com",
            "paymentMethod" => 9,
            "urlConfirmation" => $url,
            "urlReturn" => $url,
        );
        
        $keys = array_keys($data);
        sort($keys);

        $toSign = "";
        foreach($keys as $key) {
            $toSign .= $key . $data[$key];
        };
        
        $signature = hash_hmac('sha256', $toSign , $secretKey);
        //$data["s"] = $signature;

        
        dd(json_encode($data));
        $client->post($base_uri.'/payment/create',
            ['body' => json_encode($data)]
        );
        

        dd($client);
    }

    public function handleAproval() {

    }

}
