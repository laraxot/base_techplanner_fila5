<?php

declare(strict_types=1);

namespace Modules\AI\Actions;

use Illuminate\Support\Facades\Http;
use Modules\AI\Datas\CompletionData;
use Spatie\QueueableAction\QueueableAction;

class CompletionAction
{
    use QueueableAction;

    /**
     * Execute the completion action and return structured data.
     */
    public function execute(string $prompt): CompletionData
    {
        $apiKey = config('openai.api_key');
        if (! is_string($apiKey) || $apiKey === '') {
            throw new \RuntimeException('OpenAI API key not configured');
        }

        $response = Http::withToken($apiKey)
            ->post('https://api.openai.com/v1/completions', [
                'model' => 'gpt-3.5-turbo-instruct',
                'prompt' => $prompt,
                'temperature' => 0.5,
                'max_tokens' => 100,
                'top_p' => 1.0,
                'frequency_penalty' => 0.0,
                'presence_penalty' => 0.0,
            ]);

        /** @var array{choices: array{0: array{text: string}}, usage: array{prompt_tokens: int, completion_tokens: int, total_tokens: int}} $data */
        $data = $response->json();

        $choice = $data['choices'][0]['text'];
        $usage = $data['usage'];

        return new CompletionData(
            text: trim($choice),
            promptTokens: $usage['prompt_tokens'],
            completionTokens: $usage['completion_tokens'] ?? 0,
            totalTokens: $usage['total_tokens'],
        );
    }
}

/*
The model `text-davinci-003` has been deprecated, learn more here: https://platform.openai.com/docs/deprecations
---
        +text: " a recursive acronym for "PHP: Hypertext Preprocessor". This means that the"
        +index: 0
        +logprobs: null
        +finishReason: "length"
----
a server-side scripting language designed for web development but also used as a general-purpose programming language.
 It is used to create dynamic and interactive web pages, handle form data, manage databases,
 and perform other server-side tasks. PHP code is executed on the server,
 and the resulting HTML is sent to the client's web browser.
 It is a popular choice for web development due to its ease of use, flexibility,
 and wide range of features and functionalities. It is also open-source and has a large community
usage:
OpenAI\Responses\Completions\CreateResponseUsage {#3695 ▼
      +promptTokens: 2
      +completionTokens: 100
      +totalTokens: 102
    }
*/
