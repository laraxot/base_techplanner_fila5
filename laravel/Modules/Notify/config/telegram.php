<?php

declare(strict_types=1);

return [
    /*
     * |--------------------------------------------------------------------------
     * | Default Telegram Driver
     * |--------------------------------------------------------------------------
     * |
     * | Supported drivers: "official", "botman", "nutgram"
     * |
     */
    'default' => env('TELEGRAM_DRIVER', 'official'),
    /*
     * |--------------------------------------------------------------------------
     * | Telegram Drivers
     * |--------------------------------------------------------------------------
     */
    'drivers' => [
        'official' => [
            'token' => env('TELEGRAM_BOT_TOKEN'),
            'api_url' => env('TELEGRAM_API_URL', 'https://api.telegram.org'),
        ],
        'botman' => [
            'token' => env('TELEGRAM_BOT_TOKEN'),
            'api_url' => env('TELEGRAM_API_URL', 'https://api.telegram.org'),
            'webhook_url' => env('TELEGRAM_WEBHOOK_URL'),
        ],
        'nutgram' => [
            'token' => env('TELEGRAM_BOT_TOKEN'),
            'api_url' => env('TELEGRAM_API_URL', 'https://api.telegram.org'),
            'webhook_url' => env('TELEGRAM_WEBHOOK_URL'),
            'polling' => env('TELEGRAM_POLLING', false),
        ],
    ],
    /*
     * |--------------------------------------------------------------------------
     * | Global Debug Mode
     * |--------------------------------------------------------------------------
     */
    'debug' => env('TELEGRAM_DEBUG', false),
    /*
     * |--------------------------------------------------------------------------
     * | Telegram Queue
     * |--------------------------------------------------------------------------
     */
    'queue' => env('TELEGRAM_QUEUE', 'default'),
    /*
     * |--------------------------------------------------------------------------
     * | Global Timeout
     * |--------------------------------------------------------------------------
     */
    'timeout' => env('TELEGRAM_TIMEOUT', 30),
    /*
     * |--------------------------------------------------------------------------
     * | Default Parse Mode
     * |--------------------------------------------------------------------------
     * |
     * | Supported modes: "Markdown", "MarkdownV2", "HTML"
     * |
     */
    'parse_mode' => env('TELEGRAM_PARSE_MODE', 'HTML'),
    /*
     * |--------------------------------------------------------------------------
     * | Retry Configuration
     * |--------------------------------------------------------------------------
     */
    'retry' => [
        'attempts' => config('notify.telegram.retry.attempts', 3),
        'delay' => config('notify.telegram.retry.delay', 60),
    ],
    /*
     * |--------------------------------------------------------------------------
     * | Rate Limiting
     * |--------------------------------------------------------------------------
     */
    'rate_limit' => [
        'enabled' => config('notify.telegram.rate_limit.enabled', true),
        'max_attempts' => config('notify.telegram.rate_limit.max_attempts', 30),
        'decay_minutes' => config('notify.telegram.rate_limit.decay_minutes', 1),
    ],
];
