<?php
use Barryvdh\Cors\Middleware\HandleCors;

return [

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowedOrigins' => ['https://torontocondomania.ca'],

    'supports_credentials' => true,

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,
];
