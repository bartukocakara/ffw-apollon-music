<?php

namespace App\Services\Api;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class SummarifyService
{
    private const TOKEN_GRANT_TYPE = 'password';

    public static function generateToken()
    {
        $url = config('services.summarify.base_url') . '/token';
        $data['grant_type'] = self::TOKEN_GRANT_TYPE;
        $data['username'] = config('services.summarify.username');
        $data['password'] = config('services.summarify.password');
        $response = Http::asForm()->post($url, $data);
        Cache::put('summarify_access_token', $response['access_token'], now()->addMinutes(45));

        return $response['access_token'];
    }

    public static function sendRequest($endpoint, $method = 'POST', $data = [])
    {
        $token = Cache::get('summarify_access_token');
        if (!$token) {
            $token = self::generateToken();
        }
        $url = config('services.summarify.base_url') . $endpoint;
        $headers = [
            'Authorization' => 'Bearer ' .$token ,
            'Content-Type' => 'application/json',
        ];
        return Http::withHeaders($headers)->{$method}($url, $data);
    }
}
