<?php

namespace App;

class FakeAiService implements AiServiceInterface
{
    public function getResponse(string $question): string
    {
        sleep(2);

        if (stripos($question, 'PHP') !== false) {
            return 'Ai: ' . $question . PHP_EOL;
        } else {
            return 'Ai: I can only question about PHP' . PHP_EOL;
        }
    }
}
