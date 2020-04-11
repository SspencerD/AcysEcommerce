<p align="center">
  <a href="" rel="noopener">
 <img height=200px src="https://s3-us-west-2.amazonaws.com/assets.pagofacil.cl/images/1-Logo_cuadrado.png" alt="Pago Fácil SpA Examples"></a>
</p>

<h3 align="center"><a href="https://github.com/PSTPAGOFACIL/sdk-apis-php-signature" target = "_blank">@pstpagofacil/sdk-apis-php-signature</a></h3>

<div align="center">

[![Status](https://img.shields.io/badge/status-active-success.svg)](https://github.com/PSTPAGOFACIL/sdk-apis-php-signature/)
[![GitHub Issues](https://img.shields.io/github/issues/PSTPAGOFACIL/sdk-apis-php-signature.svg)](https://github.com/PPSTPAGOFACIL/sdk-apis-php-signature/issues)
[![GitHub Pull Requests](https://img.shields.io/github/issues-pr/PSTPAGOFACIL/sdk-apis-php-signature.svg)](https://github.com/PSTPAGOFACIL/sdk-apis-php-signature/pulls)
![License](https://img.shields.io/badge/license-MIT-blue.svg)
</div>

---

# pstpagofacil/sdk-apis-php-signature

## Table of Contents

- [About](#about)
- [Getting Started](#getting_started)
- [Usage](#usage)
- [Authors](#authors)

## About <a name = "about"></a>

This library will help you to sign the message that you send to Pago Fácil API Server

## Getting Started <a name = "getting_started"></a>

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See [deployment](#deployment) for notes on how to deploy the project on a live system.


### Installing with Composer

You can install it using Composer with the following command.

```
composer require pstpagofacil/sdk-apis-php-signature
```


## Usage <a name = "usage"></a>

Example

```php

<?php
require_once(__DIR__ . '/vendor/autoload.php');
use Symfony\Component\Dotenv\Dotenv;
use PSTPagoFacil\SignatureHelper;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');


$tokenService = $_ENV['TOKEN_SERVICE'];
$tokenSecret = $_ENV['TOKEN_SECRET'];

$sHelper = new SignatureHelper($tokenSecret);

$x_reference = (int) microtime(true); //Just a random number as an example 
$x_session_id = (int) microtime(true); //Just a random number as an example 


$trxBody = [
    "x_account_id"=> $tokenService,
    "x_amount"=> 1000,
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
print_r($trxBody);

```


## Authors
- Cristian Tala Sánchez