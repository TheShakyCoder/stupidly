<?php

namespace App\Services;

use ApiVideo\Client\Client;

class ApiVideo
{
    public static function client(): Client
    {
        $apiKey = config('services.apivideo.key');

        if (empty($apiKey)) {
            throw new \RuntimeException('ApiVideo API key is missing. Please set APIVIDEO_API_KEY in your .env file.');
        }

        return new Client(
            'https://sandbox.api.video',
            $apiKey,
            new \Symfony\Component\HttpClient\Psr18Client()
        );
    }
}
