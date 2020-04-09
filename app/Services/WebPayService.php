<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;
use PSTPagoFacil\SignatureHelper;


class WebPayService
{
    public function signatureWebpay($amount) {
        $tokenService = env('WEBPAY_TOKEN_SERVICE');
        $tokenSecret = env('WEBPAY_TOKEN_SECRET');

        $sHelper = new SignatureHelper($tokenSecret);

        $x_reference = (int) microtime(true); //Just a random number as an example 
        $x_session_id = (int) microtime(true); //Just a random number as an example 


        $trxBody = [
            "x_account_id"=> $tokenService,
            "x_amount"=> $amount,
            "x_currency"=> "CLP",
            "x_reference"=> $x_reference,
            "x_customer_email"=> "emaildelcliente@pagofacil.cl",
            "x_url_complete"=> "https://postman-echo.com/post",
            "x_url_cancel"=> "https://postman-echo.com/post",
            "x_url_callback"=> "https://postman-echo.com/post",
            "x_shop_country"=> "CL",
            "x_session_id"=> "$x_session_id"
        ];

        $x_signature = $sHelper->signPayload($trxBody);
        $trxBody["x_signature"] = $x_signature;
        return $x_signature;   
    }

    public function handlePayment($request) {
        $amount = 2000;
        $client = new \GuzzleHttp\Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);
        $signature = $this->signatureWebpay($amount);
        $data = array(
            'x_account_id' => env('WEBPAY_TOKEN_SERVICE'),
            'x_amount' => $amount,
            'x_currency' => $request->currency,
            'x_reference' => '000',
            'x_customer_email' => 'test@gmail.com',
            'x_url_complete' => \URL::route('callback.webpay'),
            'x_url_cancel' => \URL::route('callback.webpay'),
            'x_url_callback' => \URL::route('callback.webpay'),
            'x_signature' => $signature,
            'x_shop_country' => 'CL',
            'x_session_id' => (int) microtime(true),
        );

        
        
        $client->post('https://apis-dev.pgf.cl/trxs',
            ['body' => json_encode($data)]
        );

        dd($client);
    }

    public function handleAproval() {
        
    }

}
