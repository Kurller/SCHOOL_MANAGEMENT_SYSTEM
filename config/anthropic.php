<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Anthropic API Configuration
    |--------------------------------------------------------------------------
    |
    | These options control the connection to the Anthropic Claude API used by
    | the AI chat assistant. Your API key should be stored in the environment
    | and never committed to the repository.
    |
    */

    'api_key' => env('ANTHROPIC_API_KEY'),

    'model' => env('ANTHROPIC_MODEL', 'claude-3-5-sonnet-latest'),

    'base_uri' => env('ANTHROPIC_BASE_URI', 'https://api.anthropic.com'),

    'version' => env('ANTHROPIC_VERSION', '2023-06-01'),

    'max_tokens' => (int) env('ANTHROPIC_MAX_TOKENS', 1024),

    /*
    |--------------------------------------------------------------------------
    | System Prompt
    |--------------------------------------------------------------------------
    |
    | The assistant is scoped to this school management application so it only
    | answers questions relevant to students, teachers, classes, attendance,
    | and results.
    |
    */

    'system_prompt' => env('ANTHROPIC_SYSTEM_PROMPT', 'You are SchoolMate, a helpful AI assistant for a school management system. You help students, teachers, and administrators with questions about students, teachers, classes, subjects, attendance, and academic results. Be concise, friendly, and accurate. If you do not know something, say so.'),

];
