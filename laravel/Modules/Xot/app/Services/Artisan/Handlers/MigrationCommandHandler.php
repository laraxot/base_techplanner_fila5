<?php

declare(strict_types=1);

namespace Modules\Xot\Services\Artisan\Handlers;

use Illuminate\Support\Facades\Config;
        $defaultConn = Config::get('database.default');
        $purgeConn = \is_string($defaultConn) && $defaultConn !== '' ? $defaultConn : 'mysql';
        DB::purge($purgeConn);
        DB::reconnect($purgeConn);

        if ($moduleName !== '') {
            echo '<h3>Module '.$moduleName.'</h3>';

            return ArtisanService::exe('module:migrate '.$moduleName.' --force');
        }

        return ArtisanService::exe('migrate --force');
    }

    public function supports(string $command): bool
    {
return $command === 'migrate';
    }
}
