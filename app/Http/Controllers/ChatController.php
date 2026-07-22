<?php

namespace App\Http\Controllers;

use App\Services\AnthropicService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ChatController extends Controller
{
    public function __construct(
        protected AnthropicService $anthropic
    ) {}

    public function index()
    {
        return view('chat');
    }

    /**
     * Stream a chat completion back to the browser as Server-Sent Events.
     */
    public function send(Request $request): StreamedResponse|JsonResponse
    {
        $data = $request->validate([
            'messages' => ['required', 'array', 'min:1'],
            'messages.*.role' => ['required', 'in:user,assistant'],
            'messages.*.content' => ['required', 'string'],
        ]);

        return Response::stream(function () use ($data) {
            try {
                $this->anthropic->stream($data['messages'], function (string $token) {
                    echo 'data: '.json_encode(['token' => $token])."\n\n";
                    ob_flush();
                    flush();
                });

                echo "data: ".json_encode(['done' => true])."\n\n";
                ob_flush();
                flush();
            } catch (\Throwable $e) {
                echo 'data: '.json_encode(['error' => $e->getMessage()])."\n\n";
                ob_flush();
                flush();
            }
        }, 200, [
            'Content-Type' => 'text/event-stream',
            'Cache-Control' => 'no-cache',
            'X-Accel-Buffering' => 'no',
            'Connection' => 'keep-alive',
        ]);
    }
}
