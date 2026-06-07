<?php

declare(strict_types=1);

namespace Modules\Gdpr\Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Modules\Gdpr\Providers\GdprServiceProvider;
use Modules\User\Providers\UserServiceProvider;
use Modules\Xot\Providers\XotServiceProvider;
use Modules\Xot\Tests\CreatesApplication;

/**
 * Base test case for Gdpr module.
 *
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
 * Uses MySQL from .env.testing.
 * All module connections are mapped by TenantServiceProvider.
 * Migrations must be run ONCE externally: php artisan migrate --env=testing
 * DatabaseTransactions handles rollback between tests.
<<<<<<< HEAD
=======
 * Uses MySQL from .env.testing (NOT SQLite).
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
    protected function getPackageProviders($app): array
    {
        return [
            XotServiceProvider::class,
            UserServiceProvider::class,
            GdprServiceProvider::class,
<<<<<<< HEAD
=======
    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate', ['--database' => 'gdpr']);
        $this->artisan('migrate', ['--database' => 'user']);
        $this->artisan('migrate', ['--database' => 'xot']);
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [
            GdprServiceProvider::class,
            UserServiceProvider::class,
            XotServiceProvider::class,
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ];
    }
}
