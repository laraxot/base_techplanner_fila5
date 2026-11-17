<?php

declare(strict_types=1);

return [
    'http' => [
        401 => [
            'title' => 'Unauthorized',
            'message' => 'Unauthorized',
        ],
        402 => [
            'title' => 'Payment Required',
            'message' => 'Payment Required',
        ],
        403 => [
            'title' => 'Forbidden',
            'message' => 'Forbidden',
        ],
        404 => [
            'title' => 'Not Found',
            'message' => 'Not Found',
        ],
        419 => [
            'title' => 'Page Expired',
            'message' => 'Page Expired',
        ],
        429 => [
            'title' => 'Too Many Requests',
            'message' => 'Too Many Requests',
        ],
        500 => [
            'title' => 'Server Error',
            'message' => 'Server Error',
        ],
        503 => [
            'title' => 'Service Unavailable',
            'message' => 'Service Unavailable',
        ],
    ],
];
