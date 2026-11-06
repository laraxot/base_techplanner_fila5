<?php

declare(strict_types=1);

namespace Modules\Activity\Tests;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseTransactions;
<<<<<<< .merge_file_lSPw0c
use Illuminate\Support\ServiceProvider;
use Modules\Activity\Filament\Pages\ListLogActivities;
=======
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_nkQGeH
use Modules\Activity\Providers\ActivityServiceProvider;
use Modules\Activity\Providers\EventServiceProvider;
use Modules\User\Models\User;
use Modules\User\Providers\UserServiceProvider;
<<<<<<< .merge_file_lSPw0c
use Modules\Xot\Tests\XotBaseTestCase;
=======
use Modules\Xot\Providers\XotServiceProvider;
use Modules\Xot\Tests\CreatesApplication;
<<<<<<< HEAD
=======
use Spatie\EventSourcing\StoredEvents\EventSubscriber;
use Spatie\EventSourcing\StoredEvents\Repositories\EloquentStoredEventRepository;
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_nkQGeH

/**
 * Base test case for Activity module.
 *
<<<<<<< .merge_file_lSPw0c
 * Uses shared fixcity_data.sqlite (no RefreshDatabase / migrate:fresh).
 * prepareSharedFixcitySqliteForTesting() runs before transactions begin.
 *
 * @property ListLogActivities|null $page
=======
<<<<<<< HEAD
 * Uses MySQL from .env.testing (carbon copy of .env with _test DB names).
 * All module connections are mapped dynamically by TenantServiceProvider.
 * Migrations must be run ONCE externally: php artisan migrate --env=testing
 * DatabaseTransactions handles rollback between tests.
=======
 * Uses MySQL from .env.testing (NOT SQLite).
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_nkQGeH
 */
abstract class TestCase extends XotBaseTestCase
{
    use DatabaseTransactions;

<<<<<<< .merge_file_lSPw0c
    public ?ListLogActivities $page = null;

    /**
     * Shared test data for Activity entity.
     *
     * @var array<string, mixed>
     */
    public array $activityData = [];

    /**
     * Shared test data for stored event entity.
     *
     * @var array<string, mixed>
     */
    public array $storedEventData = [];

=======
<<<<<<< HEAD
>>>>>>> .merge_file_nkQGeH
    /**
     * Shared test data for snapshot entity.
     *
     * @var array<string, mixed>
     */
    public array $snapshotData = [];

    /** @var list<string> */
    protected $connectionsToTransact = ['sqlite', 'activity', 'user'];

    protected function setUp(): void
    {
        $this->prepareSharedSqliteForTesting();

        parent::setUp();

        config(['auth.providers.users.model' => User::class]);
    }

    /**
<<<<<<< .merge_file_lSPw0c
     * @return array<int, class-string<ServiceProvider>>
=======
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
>>>>>>> .merge_file_nkQGeH
     */
    protected function getPackageProviders(Application $app): array
    {
        return [
<<<<<<< .merge_file_lSPw0c
            ...parent::getPackageProviders($app),
            UserServiceProvider::class,
            ActivityServiceProvider::class,
            EventServiceProvider::class,
=======
<<<<<<< HEAD
            XotServiceProvider::class,
            UserServiceProvider::class,
            ActivityServiceProvider::class,
=======
            ActivityServiceProvider::class,
            UserServiceProvider::class,
            XotServiceProvider::class,
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_nkQGeH
        ];
    }

    public function requirePage(): ListLogActivities
    {
        if ($this->page === null) {
            $this->fail('ListLogActivities page is not initialized.');
        }

        return $this->page;
    }
}
