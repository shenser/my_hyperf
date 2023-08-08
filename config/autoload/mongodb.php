<?php

return [
    'default' => [
        'host' => env('MONGODB_HOST', 'localhost'),
        'port' => env('MONGODB_PORT', 27017),
        'username' => env('MONGODB_USERNAME', ''),
        'password' => env('MONGODB_PASSWORD', ''),
        'db' => env('MONGODB_DB', 'test'),
        'options' => [
            // 这里可以配置 MongoDB 驱动的选项，例如认证、副本集等
        ],
    ],
];
