<?php

namespace App\Services\Api;

use Illuminate\Support\Facades\Http;

class AsticaService
{
    public static function sendRequest($endpoint, $method = 'POST', $data = [])
    {
        $data['tkn'] = config('services.astica.token');
        $url = config('services.astica.base_url') . $endpoint;
        $headers = [
            'Content-Type' => 'application/json',
        ];
        return Http::withHeaders($headers)->withoutVerifying()->{$method}($url, $data);
    }
}
