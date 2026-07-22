<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Config;
use RuntimeException;

class AnthropicService
{
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('anthropic.base_uri'),
            'timeout' => 120,
            'headers' => [
                'x-api-key' => config('anthropic.api_key'),
                'anthropic-version' => config('anthropic.version'),
                'content-type' => 'application/json',
            ],
        ]);
    }

    /**
     * Send a conversation to Claude and stream the response token-by-token
     * through the provided callback. Each chunk is a raw text delta.
     *
     * @param  array<int, array{role: string, content: string}>  $messages
     * @param  callable(string): void  $onToken
     */
    public function stream(array $messages, callable $onToken): void
    {
        $apiKey = config('anthropic.api_key');

        if (empty($apiKey)) {
            throw new RuntimeException('The ANTHROPIC_API_KEY environment variable is not set.');
        }

        $body = [
            'model' => config('anthropic.model'),
            'max_tokens' => config('anthropic.max_tokens'),
            'system' => config('anthropic.system_prompt'),
            'stream' => true,
            'messages' => $messages,
        ];

        try {
            $response = $this->client->post('/v1/messages', [
                'json' => $body,
                'stream' => true,
            ]);
        } catch (GuzzleException $e) {
            throw new RuntimeException('Anthropic request failed: '.$e->getMessage(), 0, $e);
        }

        $buffer = '';

        foreach ($response->getBody() as $chunk) {
            $buffer .= $chunk;

            while (($newline = strpos($buffer, "\n")) !== false) {
                $line = substr($buffer, 0, $newline);
                $buffer = substr($buffer, $newline + 1);

                if (! str_starts_with($line, 'data:')) {
                    continue;
                }

                $payload = trim(substr($line, 5));

                if ($payload === '[DONE]') {
                    return;
                }

                $data = json_decode($payload, true);

                if (! is_array($data)) {
                    continue;
                }

                if ($data['type'] === 'content_block_delta' &&
                    ($data['delta']['type'] ?? null) === 'text_delta') {
                    $onToken($data['delta']['text'] ?? '');
                }

                if ($data['type'] === 'error') {
                    throw new RuntimeException('Anthropic error: '.$data['error']['message']);
                }
            }
        }
    }
}
