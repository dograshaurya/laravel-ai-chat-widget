<?php

return [

    'provider' => env('AI_CHAT_PROVIDER', 'openai'),

    'openai' => [
        'api_key' => env('OPENAI_API_KEY'),
        'model' => env('AI_CHAT_MODEL', 'gpt-4o-mini'),
    ],

    'theme' => [
        'position' => 'right',
        'primary_color' => '#2563eb',
    ],
];