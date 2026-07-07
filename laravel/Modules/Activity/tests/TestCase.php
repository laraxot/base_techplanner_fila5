<?php

declare(strict_types=1);

namespace Modules\Activity\Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
>>>>>>> 6ed19256f (.)
use Modules\Activity\Providers\ActivityServiceProvider;
use Modules\User\Providers\UserServiceProvider;
use Modules\Xot\Providers\XotServiceProvider;
use Modules\Xot\Tests\CreatesApplication;
<<<<<<< HEAD
=======
use Spatie\EventSourcing\StoredEvents\EventSubscriber;
use Spatie\EventSourcing\StoredEvents\Repositories\EloquentStoredEventRepository;
>>>>>>> 6ed19256f (.)

/**
 * Base test case for Activity module.
 *
<<<<<<< HEAD
 * Uses MySQL from .env.testing (carbon copy of .env with _test DB names).
 * All module connections are mapped dynamically by TenantServiceProvider.
 * Migrations must be run ONCE externally: php artisan migrate --env=testing
 * DatabaseTransactions handles rollback between tests.
=======
 * Uses MySQL from .env.testing (NOT SQLite).
>>>>>>> 6ed19256f (.)
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;

<<<<<<< HEAD
    /**
     * Connections to wrap in transactions for automatic rollback.
     * MANDATORY: must include every connection used by this module's models.
     * Activity models use $connection = 'activity' (separate PDO handle).
     * Without this, Activity data is NEVER rolled back between tests.
     *
     * @var array<int, string>
     */
    protected $connectionsToTransact = [
        'mysql',
        'activity',
        'user',
    ];

    /**
=======
    protected function setUp(): void
    {
        parent::setUp();

        $dbName = 'file:memdb_activity_'.Str::random(10).'?mode=memory&cache=shared';

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
                    $pdo->sqliteCreateFunction('md5', static fn (?string $value): ?string => $value === null ? null : md5($value));
                    $pdo->sqliteCreateFunction('unhex', static fn (?string $value): ?string => $value);
                }
            } catch (\Throwable) {
            }
        }

        $this->app->bind(EventSubscriber::class, function (): EventSubscriber {
            return new EventSubscriber(EloquentStoredEventRepository::class);
        });

        $this->artisan('module:migrate', ['module' => 'Xot', '--force' => true]);
        $this->artisan('module:migrate', ['module' => 'User', '--force' => true]);
        $this->artisan('module:migrate', ['module' => 'Activity', '--force' => true]);
    }

    /**
     * @param  \Illuminate\Foundation\Application  $app
>>>>>>> 6ed19256f (.)
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [
<<<<<<< HEAD
            XotServiceProvider::class,
            UserServiceProvider::class,
            ActivityServiceProvider::class,
=======
            ActivityServiceProvider::class,
            UserServiceProvider::class,
            XotServiceProvider::class,
>>>>>>> 6ed19256f (.)
        ];
    }
}
