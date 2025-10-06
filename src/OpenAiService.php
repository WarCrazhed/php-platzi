<?php

namespace App;

use OpenAI;

class OpenAiService
{
    protected $client;

    public function __construct()
    {
        $this->client = OpenAI::client($_ENV['OPENAI_API_KEY']);
    }

    public function getResponse(string $question): string
    {
        $response = $this->client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => 'Podrías responder en español la siguiente pregunta: '. $question],
            ],
        ]);

        return $response['choices'][0]['message']['content'];
    }
}
