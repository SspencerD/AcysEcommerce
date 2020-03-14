<?php

namespace App\Services;

use App\Traits\ConsumeExternalServices;

class PayPalServices{

    use ConsumeExternalServices;

    protected $baseUri;

    protected $clientId;

    protected $clientSecret;

    public function __construct()
    {
        $this->baseUri = config('services.paypal.base_uri');
        $this->clientId = config('services.paypal.client_id');
        $this->clientSecret = config('services.paypal.client_secret');

    }

    public function resolveAuthorization(&$queryParams, &$formParams, &$headers)
    {
        $headers['Autorization'] = $this->resolveAccessToken();

    }
    public function decodeResponse( $response)
    {
       return json_decode($response);

    }
    public function resolveAccessToken()
    {
        $credentials =base64_encode("{$this->clientId }:{$this->clientSecret }");

        return "Basic {credentials}";
    }
}

