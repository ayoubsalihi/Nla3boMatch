<?php

return [
    // routes accepted (cors)
    'paths' => ['api/*', 'sanctum/csrf-cookie', 'login', 'logout'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['Content-Type', 'X-XSRF-TOKEN', 'Authorization'],

    'exposed_headers' => [],

    'max_age' => 0,
    
    'supports_credentials' => true,
];
