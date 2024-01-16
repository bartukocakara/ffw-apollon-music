<?php

namespace App\Services\Api;

use Illuminate\Support\Facades\Http;

class SoundrawService
{
    public static function sendRequest($endpoint, $method = 'POST', $data = [])
    {

        $url = config('services.soundraw.base_url') . $endpoint;
        $headers = [
            'Authorization' => 'Bearer ' . config('services.soundraw.token'),
            'Content-Type' => 'application/json',
        ];
        return Http::withHeaders($headers)->withoutVerifying()->{$method}($url, $data);
    }
}
