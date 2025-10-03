<?php

namespace App;

use ArdaGnsrn\Ollama\Ollama;

class OllamaService
{
    protected $client;

    public function __construct()
    {
        $this->client = Ollama::client();
    }

    public function getResponse(string $question): string
    {
        $response = $this->client->chat()->create([
            'model' => 'deepseek-r1:1.5b',
            'messages' => [
                ['role' => 'user', 'content' => 'Podrías responder en español la siguiente pregunta: '. $question],
            ],
        ]);

        return $response->message->content;
    }
}
