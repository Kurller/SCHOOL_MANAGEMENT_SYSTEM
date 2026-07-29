<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenRouterService
{
    public function chat(string $message)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.openrouter.key'),
            'Content-Type' => 'application/json',
            'HTTP-Referer' => config('app.url'),
            'X-Title' => config('app.name'),
        ])->post(config('services.openrouter.url'), [
            'model' => 'deepseek/deepseek-r1:free',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are an AI assistant for a School Management System.'
                ],
                [
                    'role' => 'user',
                    'content' => $message
                ]
            ]
        ]);

        if ($response->failed()) {
            throw new \Exception(
                $response->json()['error']['message'] ?? 'OpenRouter request failed.'
            );
        }

        return $response->json()['choices'][0]['message']['content'];
    }
}