<?php

namespace App;

use OpenAI;

class OpenAiService implements AiServiceInterface
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
                ['role' => 'system', 'content' => <<<EOT
                    Eres un asistente especializado exclusivamente en PHP.
                    - Si te preguntan algo que no este relacionado con PHP responde "Lo siento, solo puedo responder preguntas relacionadas con PHP."
                    - Si te preguntan algo relacionado con PHPm responde de forma breve y concisa. Sin rodeos"
                    - Responde en español.
                    EOT
                ],
                ['role' => 'user', 'content' => 'Podrías responder en español la siguiente pregunta: '. $question],
            ],
        ]);

        return $response['choices'][0]['message']['content'];
    }
}
