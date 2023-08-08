<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use function Hyperf\Support\env;

return [
    'default' => env('SCOUT_ENGINE', 'elasticsearch'),
    'chunk' => [
        'searchable' => 500,
        'unsearchable' => 500,
    ],
    'prefix' => env('SCOUT_PREFIX', ''),
    'soft_delete' => false,
    'concurrency' => 100,
    'engine' => [
        'elasticsearch' => [
            'driver' => Hyperf\Scout\Provider\ElasticsearchProvider::class,
            'index' => null,
            'hosts' => [
                env('ELASTICSEARCH_HOST', 'https://elastic:shenser@192.168.238.133:9200'),
                // 'host' => env('ELASTICSEARCH_HOST', 'http://192.168.238.133:9200'),
                // 'user' => env('ELASTICSEARCH_USERNAME', 'elastic'),
                // 'pass' => env('ELASTICSEARCH_PASSWORD', 'shenser'),
            ],
        ],
    ],
];
