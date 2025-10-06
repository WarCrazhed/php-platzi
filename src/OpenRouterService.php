<?php

namespace App;

use GuzzleHttp\Client;

class OpenRouterService
{
    protected $client;

    public function __construct()

    {
        $this->client = new Client([
            'base_uri' => 'https://openrouter.ai/api/v1/',
            'headers' => [
                'Authorization' => 'Bearer ' . $_ENV['OPENROUTER_API_KEY'],
                'Content-Type' => 'application/json',
            ],

            'curl' => [
                CURLOPT_VERBOSE => false,
                CURLOPT_STDERR => fopen('/dev/null', 'w'),
            ],
        ]);
    }

    public function getResponse(string $question): string
    {
        $result = $this->client->post('chat/completions', [

            'json' => [
                'model' => 'deepseek/deepseek-chat-v3.1:free',
                'messages' => [
                    ['role' => 'system', 'content' => 'Eres un profesor de programación. Explica conceptos de manera clara y didáctica, siempre en español.'],
                    ['role' => 'user', 'content' => $question],

                ],
            ],

        ]);

        $body = json_decode($result->getBody(), true);
        return $body['choices'][0]['message']['content'];
    }
}
