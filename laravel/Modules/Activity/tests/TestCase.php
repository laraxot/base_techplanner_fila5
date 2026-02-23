<?php

declare(strict_types=1);

namespace Modules\Activity\Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Modules\Activity\Models\Activity;
use Modules\Activity\Providers\ActivityServiceProvider;
use Modules\Tenant\Providers\TenantServiceProvider;
use Modules\User\Providers\UserServiceProvider;
use Modules\Xot\Providers\XotServiceProvider;
use Modules\Xot\Tests\CreatesApplication;

/**
 * Base test case for Activity module.
 *
 * Uses MySQL from .env.testing (carbon copy of .env with _test DB names).
 * All module connections are mapped dynamically by TenantServiceProvider.
 * Migrations must be run ONCE externally: php artisan migrate --env=testing
 * DatabaseTransactions handles rollback between tests.
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;

    /**
     * Connections to wrap in transactions for automatic rollback.
     * MANDATORY: must include every connection used by this module's models.
     * Activity models use default connection (mysql). User models use 'user'.
     *
     * @var array<int, string>
     */
    protected $connectionsToTransact = [
        'mysql',
        'user',
    ];

    protected function setUp(): void
    {
        parent::setUp();
        // NO manual delete: DatabaseTransactions rollback provides isolation.
        // Deleting here would be rolled back and cause data accumulation.
    }

    /**
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [
            XotServiceProvider::class,
            TenantServiceProvider::class,
            UserServiceProvider::class,
            ActivityServiceProvider::class,
        ];
    }
}
