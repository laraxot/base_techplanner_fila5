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
return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }
=======
        include_once __DIR__.'/vendor/autoload.php';    }
>>>>>>> 8215f950 (.)
}
