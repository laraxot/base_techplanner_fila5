<?php

declare(strict_types=1);

namespace Modules\Media\Tests;

<<<<<<< HEAD
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Modules\Media\Providers\MediaServiceProvider;
use Modules\User\Providers\UserServiceProvider;
use Modules\Xot\Providers\XotServiceProvider;
use Modules\Xot\Tests\CreatesApplication;

/**
 * Base test case for Media module.
 *
 * Uses MySQL from .env.testing.
 * All module connections are mapped by TenantServiceProvider.
 * Migrations must be run ONCE externally: php artisan migrate --env=testing
 * DatabaseTransactions handles rollback between tests.
=======
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Media\Providers\MediaServiceProvider;
use Modules\Xot\Tests\CreatesApplication;

/**
 * Base test case for Media module tests.
>>>>>>> 6ed19256f (.)
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;

<<<<<<< HEAD
    protected function getPackageProviders($app): array
    {
        return [
            XotServiceProvider::class,
            UserServiceProvider::class,
=======
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Il sito funziona, quindi i test devono riflettere il comportamento reale
        // Usiamo SQLite shared memory seguendo pattern Activity/TestCase.php
        $dbName = 'file:memdb_media_'.Str::random(10).'?mode=memory&cache=shared';

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

        $this->artisan('module:migrate', ['module' => 'Xot', '--force' => true]);
        $this->artisan('module:migrate', ['module' => 'User', '--force' => true]);
        $this->artisan('module:migrate', ['module' => 'Media', '--force' => true]);
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
>>>>>>> 6ed19256f (.)
            MediaServiceProvider::class,
        ];
    }
}
