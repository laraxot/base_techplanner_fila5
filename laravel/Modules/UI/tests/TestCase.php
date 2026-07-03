<?php

declare(strict_types=1);

namespace Modules\UI\Tests;

<<<<<<< HEAD
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Modules\UI\Providers\UIServiceProvider;
use Modules\UI\Tests\Support\EnsuresUiDatabaseSchema;
use Modules\User\Providers\UserServiceProvider;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Tests\XotBaseTestCase;
=======
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Modules\UI\Providers\UIServiceProvider;
use Modules\User\Providers\UserServiceProvider;
use Modules\Xot\Providers\XotServiceProvider;
use Modules\Xot\Tests\CreatesApplication;
>>>>>>> c001364 (.)

/**
 * Base test case for UI module.
 *
<<<<<<< HEAD
 * Uses shared sqlite from fixcity_data.sqlite (no RefreshDatabase).
 */
abstract class TestCase extends XotBaseTestCase
{
    use DatabaseTransactions;
    use EnsuresUiDatabaseSchema;

    /** @var list<string> */
    protected $connectionsToTransact = ['xot', 'sqlite', 'user'];

    /**
     * @return array<int, class-string>
     */
    protected function getPackageProviders(Application $app): array
    {
        return [
            ...parent::getPackageProviders($app),
=======
 * Uses MySQL from .env.testing.
 * All module connections are mapped by TenantServiceProvider.
 * Migrations must be run ONCE externally: php artisan migrate --env=testing
 * DatabaseTransactions handles rollback between tests.
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;

    protected function getPackageProviders($app): array
    {
        return [
            XotServiceProvider::class,
>>>>>>> c001364 (.)
            UserServiceProvider::class,
            UIServiceProvider::class,
        ];
    }
<<<<<<< HEAD

    protected function setUp(): void
    {
        parent::setUp();

        $database = database_path('fixcity_data.sqlite');

        /** @var array<string, array<string, mixed>> $connections */
        $connections = config('database.connections', []);

        foreach (array_keys($connections) as $connection) {
            if ('sqlite' !== config("database.connections.{$connection}.driver")) {
                continue;
            }

            $this->app['config']->set("database.connections.{$connection}.database", $database);
            DB::purge($connection);
        }

        config(['auth.providers.users.model' => XotData::make()->getUserClass()]);

        $this->ensureUiSchema();
    }
=======
>>>>>>> c001364 (.)
}
