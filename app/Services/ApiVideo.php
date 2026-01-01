<?php

namespace App\Services;

use ApiVideo\Client\Client;
use App\Models\Lesson;

class ApiVideo
{
    public static function client(): Client
    {
        $apiKey = config('services.apivideo.key');
        $apiUrl = config('services.apivideo.url');

        if (empty($apiKey)) {
            throw new \RuntimeException('ApiVideo API key is missing. Please set APIVIDEO_API_KEY in your .env file.');
        }

        return new Client(
            $apiUrl,
            $apiKey,
            new \Symfony\Component\HttpClient\Psr18Client()
        );
    }

    public static function createLivestream(Lesson $lesson): string
    {
        $client = \App\Services\ApiVideo::client();

        $livestream = $client->livestreams()->create(new \ApiVideo\Client\Model\LiveStreamCreationPayload([
            'name' => 'Subscriber Live Show',
            'public' => false, // 🔐 critical
        ]));

        return $livestream;
    }
}
