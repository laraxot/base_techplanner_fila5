<?php

declare(strict_types=1);

namespace Modules\Seo\Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
use Modules\User\Models\User;
use Modules\Xot\Tests\XotBaseTestCase;
=======
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Modules\Xot\Tests\CreatesApplication;
>>>>>>> 7ec200b (.)
=======
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Modules\Xot\Tests\CreatesApplication;
>>>>>>> d20252d (.)
=======
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Modules\Xot\Tests\CreatesApplication;
>>>>>>> 77e0353 (.)
=======
use Illuminate\Support\Facades\DB;
use Modules\Fixcity\Models\User;
use Modules\Xot\Tests\XotBaseTestCase;
>>>>>>> fc52fe0 (.)
=======
use Illuminate\Support\Facades\DB;
use Modules\User\Models\User;
use Modules\Xot\Tests\XotBaseTestCase;
>>>>>>> c101b34 (.)
=======
use Illuminate\Support\Facades\DB;
use Modules\Fixcity\Models\User;
use Modules\Xot\Tests\XotBaseTestCase;
>>>>>>> d0f51b6 (.)

/**
 * Base test case for Seo module.
 */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> fc52fe0 (.)
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
abstract class TestCase extends XotBaseTestCase
{
    use DatabaseTransactions;

    /** @var list<string> */
    protected $connectionsToTransact = [
        'sqlite',
        'user',
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> d20252d (.)
=======
>>>>>>> 77e0353 (.)
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;

    protected $connectionsToTransact = [
        'mysql',
        'seo',
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 7ec200b (.)
=======
>>>>>>> d20252d (.)
=======
>>>>>>> 77e0353 (.)
=======
>>>>>>> fc52fe0 (.)
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
    ];

    protected function setUp(): void
    {
        parent::setUp();

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> fc52fe0 (.)
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
        $database = database_path('fixcity_data.sqlite');

        /** @var array<string, array<string, mixed>> $connections */
        $connections = config('database.connections', []);

        foreach (array_keys($connections) as $connection) {
            $driver = config("database.connections.{$connection}.driver");

            if ($driver === 'sqlite') {
                $this->app['config']->set("database.connections.{$connection}.database", $database);
                DB::purge($connection);

                continue;
            }

            if ($driver === 'mysql') {
                $this->app['config']->set("database.connections.{$connection}.driver", 'sqlite');
                $this->app['config']->set("database.connections.{$connection}.database", $database);
                $this->app['config']->set("database.connections.{$connection}.prefix", '');
                DB::purge($connection);
            }
        }

        config(['auth.providers.users.model' => User::class]);
        config(['xra.pub_theme' => 'Meetup']);
        config(['xra.main_module' => 'Seo']);
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> d20252d (.)
=======
>>>>>>> 77e0353 (.)
        config(['xra.pub_theme' => 'Meetup']);
        config(['xra.main_module' => 'Seo']);

        // Ensure Seo config is loaded/set if needed for tests
        // config(['seo.default_title' => 'Test Site']);
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 7ec200b (.)
=======
>>>>>>> d20252d (.)
=======
>>>>>>> 77e0353 (.)
=======
>>>>>>> fc52fe0 (.)
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
    }
}
