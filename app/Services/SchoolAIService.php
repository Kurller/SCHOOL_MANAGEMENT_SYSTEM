<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SchoolAIService
{

    public function ask($message, $context = null)
    {

        $systemPrompt = "
You are SchoolAI, an assistant inside a school management system.

Rules:
1. Always use the provided database information first.
2. Do not say you cannot access the database.
3. If the answer exists in the database context, provide the answer directly.
4. If the information is missing, clearly say it is not available.
5. Never invent students, results, teachers, or school records.

Database Context:

" . ($context ?? 'No database information available');


        $response = Http::timeout(60)
            ->withHeaders([
                'Authorization' => 'Bearer ' . env('OPENROUTER_API_KEY'),
                'Content-Type' => 'application/json',
                'HTTP-Referer' => 'http://127.0.0.1:8000',
                'X-Title' => 'School Management AI',
            ])
            ->post(
                'https://openrouter.ai/api/v1/chat/completions',
                [

                    'model' => 'qwen/qwen3.7-flash',

                    'messages' => [

                        [
                            'role' => 'system',
                            'content' => $systemPrompt
                        ],

                        [
                            'role' => 'user',
                            'content' => $message
                        ]

                    ]

                ]
            );


        $data = $response->json();


        if (!$response->successful()) {
    return 'OpenRouter Error (' . $response->status() . '): ' . $response->body();
}


        return $data['choices'][0]['message']['content']
            ?? 'No response generated.';

    }

}