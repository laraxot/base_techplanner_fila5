<?php

declare(strict_types=1);

namespace Modules\Xot\Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
<<<<<<< HEAD
use Modules\Xot\Providers\XotServiceProvider;
=======
>>>>>>> 6ed19256f (.)

/**
 * Base test case for Xot module.
 *
<<<<<<< HEAD
 * Uses MySQL from .env.testing.
 * All module connections are mapped by TenantServiceProvider.
 * Migrations must be run ONCE externally: php artisan migrate --env=testing
 * DatabaseTransactions handles rollback between tests.
 */
abstract class TestCase extends BaseTestCase
{
    use DatabaseTransactions;

    protected function getPackageProviders($app): array
    {
        return [
            XotServiceProvider::class,
        ];
=======
 * Uses MySQL from .env.testing (NOT SQLite).
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;

    protected static bool $migrated = false;

    protected function setUp(): void
    {
        parent::setUp();

        if (!self::$migrated) {
            $this->artisan('module:migrate', ['module' => 'Xot', '--force' => true]);
            self::$migrated = true;
        }
>>>>>>> 6ed19256f (.)
    }
}
