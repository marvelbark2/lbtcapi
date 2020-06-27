<?php

namespace prospeak\lbtcapi\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;


class LbtcApiPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    
//     public function __construct()
//     {
//         $endpoint = $this->endpoint;
//         $method = $this->method;
//         $opt = $this->opt;
//     }
    static function apis($endpoint, $method, $opt = null)
    {
        $key = config('lbtcapi.key');
        $secret_key = config('lbtcapi.secret');
        $mt = explode(' ', microtime());
        $API_AUTH_NONCE = $mt[1] . substr($mt[0], 2, 6);
        if (!is_null($opt)) {
            $datas = http_build_query($opt, '', '&');
        } else {
            $datas = "";
        }

        $message = "$API_AUTH_NONCE" . $key . $endpoint . $datas;
        $message_byte = utf8_encode($message);
        $signature = strtoupper(hash_hmac('sha256', $message_byte, utf8_encode($secret_key)));
        $client = new \GuzzleHttp\Client(['base_uri' => 'https://localbitcoins.com']);
        $response = $client->request(
            $method,
            $endpoint,
            [
                $method == 'GET' || empty($opt) ? "query" : "form_params" => $opt,
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Apiauth-Key' => $key,
                    'Apiauth-Nonce' => $API_AUTH_NONCE,
                    'Apiauth-Signature' => $signature
                ]

            ]
        );
        $data = json_decode($response->getBody()->getContents());
        return response()->json([$data], 200);
    }
}
