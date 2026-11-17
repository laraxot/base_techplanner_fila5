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
=======
        include_once __DIR__.'/vendor/autoload.php';
>>>>>>> 6ed19256f (.)
    }

    public static function getInstance(): self
    {
<<<<<<< HEAD
        if (! self::$instance instanceof self) {
=======
        if (! (self::$instance instanceof self)) {
>>>>>>> 6ed19256f (.)
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
>>>>>>> 6ed19256f (.)
    }
}
