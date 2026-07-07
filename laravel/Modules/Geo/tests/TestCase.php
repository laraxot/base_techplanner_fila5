<?php

declare(strict_types=1);

namespace Modules\Geo\Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
<<<<<<< HEAD
use Modules\Geo\Providers\GeoServiceProvider;
use Modules\User\Providers\UserServiceProvider;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Providers\XotServiceProvider;
=======
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
>>>>>>> 6ed19256f (.)
use Modules\Xot\Tests\CreatesApplication;

/**
 * Base test case for Geo module.
 *
<<<<<<< HEAD
 * Uses MySQL from .env.testing.
 * All module connections are mapped by TenantServiceProvider.
=======
 * Uses SQLite shared memory database following Activity/TestCase.php pattern.
>>>>>>> 6ed19256f (.)
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;

<<<<<<< HEAD
    protected $connectionsToTransact = [
        'mysql',
        'user',
    ];

=======
>>>>>>> 6ed19256f (.)
    protected function setUp(): void
    {
        parent::setUp();

<<<<<<< HEAD
            'pub_theme' => 'Meetup',
            'main_module' => 'User',
        ]);

        // NOTE: Migrations are NOT run in setUp()
        // They must be run ONCE externally: php artisan migrate --env=testing
        // DatabaseTransactions trait handles rollback automatically between tests
    }

    protected function getPackageProviders($app): array
    {
        return [
            XotServiceProvider::class,
            UserServiceProvider::class,
            GeoServiceProvider::class,
        ];
=======
        $dbName = 'file:memdb_geo_'.Str::random(10).'?mode=memory&cache=shared';

        $connections = [
            'sqlite',
            'mysql',
            'mariadb',
            'pgsql',
            'activity',
            'cms',
            'gdpr',
            'geo',
            'job',
            'lang',
            'media',
            'meetup',
            'notify',
            'seo',
            'tenant',
            'ui',
            'user',
            'xot',
        ];

        foreach ($connections as $conn) {
            $this->app['config']->set("database.connections.{$conn}.driver", 'sqlite');
            $this->app['config']->set("database.connections.{$conn}.database", $dbName);
        }

        foreach ($connections as $conn) {
            DB::purge($conn);
        }

        foreach ($connections as $conn) {
            try {
                $pdo = DB::connection($conn)->getPdo();
                if ($pdo instanceof \PDO && method_exists($pdo, 'sqliteCreateFunction')) {
                    $pdo->sqliteCreateFunction('md5', static fn (?string $value): ?string => null === $value ? null : md5($value));
                    $pdo->sqliteCreateFunction('unhex', static fn (?string $value): ?string => $value);
                }
            } catch (\Throwable) {
            }
        }

        $this->artisan('module:migrate', ['module' => 'Xot', '--force' => true]);
        $this->artisan('module:migrate', ['module' => 'User', '--force' => true]);
        $this->artisan('module:migrate', ['module' => 'Geo', '--force' => true]);
>>>>>>> 6ed19256f (.)
    }
}
