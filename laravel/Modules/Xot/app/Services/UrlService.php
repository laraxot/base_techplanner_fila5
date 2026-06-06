<?php

/**
 * @see https://www.webslesson.info/2019/02/import-excel-file-in-laravel.html
 * @see https://sweetcode.io/import-and-export-excel-files-data-using-in-laravel/
 */

declare(strict_types=1);

namespace Modules\Xot\Services;

/**
 * Undocumented class.
 */
class UrlService
{
    private static ?self $instance = null;

    public function __construct()
    {
        // ---
<<<<<<< HEAD
        include_once __DIR__.'/vendor/autoload.php';
=======
>>>>>>> origin/dev
    }

    public static function getInstance(): self
    {
        if (! self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Undocumented function.
     */
    public static function make(): self
    {
        return static::getInstance();
    }

    public function checkValidUrl(string $url): bool
    {
<<<<<<< HEAD
        return false !== filter_var($url, FILTER_VALIDATE_URL);
=======
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
>>>>>>> origin/dev
    }
}
