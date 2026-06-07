<?php

declare(strict_types=1);

namespace Modules\Cms\Tests;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Modules\Cms\Providers\CmsServiceProvider;
use Modules\User\Providers\UserServiceProvider;
<<<<<<< HEAD
=======
use Modules\Xot\Datas\XotData;
>>>>>>> dev
use Modules\Xot\Providers\XotServiceProvider;
use Modules\Xot\Tests\CreatesApplication;

/**
 * Base test case for Cms module.
 *
 * Uses MySQL from .env.testing.
 * All module connections are mapped by TenantServiceProvider.
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;

    protected $connectionsToTransact = [
        'mysql',
        'user',
    ];

    protected function setUp(): void
    {
        parent::setUp();

<<<<<<< HEAD
        config(['xra.pub_theme' => 'Meetup']);
        config(['xra.main_module' => 'User']);

        \Modules\Xot\Datas\XotData::make()->update([
            'pub_theme' => 'Meetup',
=======
        config(['xra.pub_theme' => 'TwentyOne']);
        config(['xra.main_module' => 'User']);

        XotData::make()->update([
            'pub_theme' => 'TwentyOne',
>>>>>>> dev
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
            CmsServiceProvider::class,
        ];
    }
<<<<<<< HEAD
=======
use Modules\Xot\Tests\TestCase as BaseTestCase;

/**
 * TestCase base per il modulo Cms.
 */
abstract class TestCase extends BaseTestCase
{
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
}
