<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'], // Allow these paths
    'allowed_methods' => ['*'], // Allow all methods (GET, POST, etc.)
    'allowed_origins' => ['http://localhost:3000'], // Allow requests from your React frontend
    'allowed_origins_patterns' => [], // Regex patterns for origins
    'allowed_headers' => ['*'], // Allow all headers
    'exposed_headers' => [], // Headers to expose to the client
    'max_age' => 0, // Max age for preflight requests
    'supports_credentials' => true, // Allow credentials (cookies, authorization headers)
];