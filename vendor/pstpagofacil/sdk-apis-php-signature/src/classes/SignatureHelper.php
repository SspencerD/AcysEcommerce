<?php
/**
 * Copyright  2020  Pago Fácil SpA
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 *
 */


namespace PSTPagoFacil;


/**
 * Class SignatureHelper
 * @package PSTPagoFacil
 */
class SignatureHelper
{
    protected $_secret="";

    /**
     * SignatureHelper constructor.
     * @param null $secret secreto con el cual se firmarán los mensajes
     */
    public function __construct($secret=null)
    {
        $this->_secret=$secret;
    }


    /**
     * We sign the payload as described in
     * https://developers.pagofacil.cl/docs/firma-para-creación-de-transacciones
     * @param $array The array that should be signed
     * @return string The signature of the array
     */
    public function signPayload($array) {
        //Order Array
        ksort($array);
        //Concat array. I only sign valiables, not objects or arrays.
        $message = $this->concatArray($array);
        //Sign and return message
        return $this->signMessage($message, $this->_secret);
    }

    function signMessage($message, $secret) {
        return hash_hmac('sha256', $message, $secret);
    }


    /**
     * Concat the variables with the values only if they are strings. Objects and Arrays are ignored as described here :
     * https://developers.pagofacil.cl/docs/firma-para-creación-de-transacciones
     * @param $array
     * @return string
     */
    function concatArray($array) {
        $result = "";
        foreach ($array as $field => $value) {
            if($field!="x_signature"&&!is_object($value)&&!is_array($value))
            {
                $result .= $field . $value;
            }
        }
        return $result;
    }
}