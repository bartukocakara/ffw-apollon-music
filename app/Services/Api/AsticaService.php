<?php

namespace App\Services\Api;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class AsticaService
{
    public static function sendRequest($endpoint, $method = 'POST', $data = [])
    {
        try {
            $data['tkn'] = config('services.astica.token');
            $url = config('services.astica.base_url') . $endpoint;
            $headers = [
                'Content-Type' => 'application/json',
            ];

            return Http::withHeaders($headers)
                ->{$method}($url, $data);
        } catch (RequestException $e) {
            // Handle request exception, e.g., log the error
            // You can access the underlying Guzzle exception using $e->response
            throw $e; // Re-throw the exception to let Laravel handle retries
        }
    }
}
