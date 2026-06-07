<?php

declare(strict_types=1);

namespace Modules\Tenant\Tests;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Modules\Tenant\Providers\TenantServiceProvider;
use Modules\User\Providers\UserServiceProvider;
use Modules\Xot\Providers\XotServiceProvider;
use Modules\Xot\Tests\CreatesApplication;

/**
 * Base test case for Tenant module.
 *
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
            UserServiceProvider::class,
<<<<<<< HEAD
=======
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Tenant\Providers\TenantServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

/**
 * Base test case for Tenant module tests.
 */
abstract class TestCase extends BaseTestCase
{
    /**
     * Define environment setup.
     *
     * @param  Application  $app
     */
    protected function defineEnvironment($app): void
    {
        // Setup default environment variables
        $app['config']->set('app.key', 'AckfSECXIvnK5r28GVIWUAxmbBSjTsmF');

        $dbName = 'file:memdb_tenant_'.Str::random(10).'?mode=memory&cache=shared';
        $connections = [
            'sqlite',
            'mysql',
            'mariadb',
            'pgsql',
            'tenant',
            'user',
            'xot',
            'activity',
            'cms',
            'geo',
            'job',
            'lang',
            'media',
            'notify',
            'ui',
        ];

        foreach ($connections as $conn) {
            $app['config']->set("database.connections.{$conn}.driver", 'sqlite');
            $app['config']->set("database.connections.{$conn}.database", $dbName);
        }
    }

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $connections = [
            'sqlite',
            'mysql',
            'mariadb',
            'pgsql',
            'tenant',
            'user',
            'xot',
            'activity',
            'cms',
            'geo',
            'job',
            'lang',
            'media',
            'notify',
            'ui',
        ];

        foreach ($connections as $conn) {
            DB::purge($conn);
        }

        foreach ($connections as $conn) {
            try {
                $pdo = DB::connection($conn)->getPdo();
                if (method_exists($pdo, 'sqliteCreateFunction')) {
                    $pdo->sqliteCreateFunction('md5', static fn (?string $value): ?string => $value === null ? null : md5($value));
                    $pdo->sqliteCreateFunction('unhex', static fn (?string $value): ?string => $value);
                }
            } catch (\Throwable) {
            }
        }

        // Module migrations (preferred in this codebase)
        $this->artisan('module:migrate', ['module' => 'Xot', '--force' => true]);
        $this->artisan('module:migrate', ['module' => 'User', '--force' => true]);
        $this->artisan('module:migrate', ['module' => 'Tenant', '--force' => true]);
    }

    /**
     * Get package providers.
     *
     * @param  Application  $app
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
            TenantServiceProvider::class,
        ];
    }
}
