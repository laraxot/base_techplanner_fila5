<?php

declare(strict_types=1);

namespace Modules\Seo\Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Modules\Fixcity\Models\User;
use Modules\Xot\Tests\XotBaseTestCase;

/**
 * Base test case for Seo module.
 */
abstract class TestCase extends XotBaseTestCase
{
    use DatabaseTransactions;

    /** @var list<string> */
    protected $connectionsToTransact = [
        'sqlite',
        'user',
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;

    protected $connectionsToTransact = [
        'mysql',
        'seo',
    ];

    protected function setUp(): void
    {
        parent::setUp();

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
        config(['xra.pub_theme' => 'Meetup']);
        config(['xra.main_module' => 'Seo']);

        // Ensure Seo config is loaded/set if needed for tests
        // config(['seo.default_title' => 'Test Site']);
    }
}
