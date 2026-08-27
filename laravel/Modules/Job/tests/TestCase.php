<?php

declare(strict_types=1);

namespace Modules\Job\Tests;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Modules\Job\Providers\JobServiceProvider;
use Modules\User\Models\User;
use Modules\User\Providers\UserServiceProvider;
use Modules\Xot\Tests\XotBaseTestCase;
use PHPUnit\Framework\Assert;

/**
 * Base test case for Job module.
 *
 * Uses MySQL from .env.testing.
 * All module connections are mapped by TenantServiceProvider.
 * Migrations must be run ONCE externally: php artisan migrate --env=testing
 * DatabaseTransactions handles rollback between tests.
 */
abstract class TestCase extends XotBaseTestCase
{
    use DatabaseTransactions;

    /** @var list<string> */
    protected $connectionsToTransact = ['job', 'sqlite', 'xot', 'user'];

    public mixed $action = null;

    /**
     * Lo sqlite condiviso non contiene per forza le tabelle del modulo Job.
     * Anche se le tabelle esistono, fixcity_data.sqlite non è uno schema di dominio
     * affidabile per i Feature (assert su seed/history falliscono): trattalo come offline.
     */
    public static function jobDbUnavailable(): bool
    {
        try {
            $connection = DB::connection('job');
            $connection->getPdo();
            $database = (string) $connection->getDatabaseName();
            if (str_contains($database, 'fixcity_data.sqlite')) {
                return true;
            }

            $schema = $connection->getSchemaBuilder();

            // I feature test del modulo usano tasks, jobs, schedules, results, job_batches.
            foreach (['tasks', 'jobs', 'schedules', 'results', 'job_batches'] as $table) {
                if (! $schema->hasTable($table)) {
                    return true;
                }
            }

            return false;
        } catch (\Throwable) {
            return true;
        }
    }

    /**
     * @return array<int, class-string>
     */
    protected function getPackageProviders(Application $app): array
    {
        return [
            ...parent::getPackageProviders($app),
            UserServiceProvider::class,
            JobServiceProvider::class,
        ];
    }

    protected function setUp(): void
    {
        $this->prepareSharedFixcitySqliteForTesting();

        parent::setUp();

        config(['auth.providers.users.model' => User::class]);

        if ($this->shouldSkipForMissingJobDb()) {
            $this->markTestSkipped('DB `job` non disponibile in ambiente test condiviso.');
        }
    }

    protected function shouldSkipForMissingJobDb(): bool
    {
        if (! static::jobDbUnavailable()) {
            return false;
        }

        $testFile = $this->resolvePestTestFile();

        // Unit: esegui offline; i test DB-dependent usano gruppo `job-db`.
        if ($testFile !== null && str_contains($testFile, '/tests/Unit/')) {
            return false;
        }

        return true;
    }

    private function resolvePestTestFile(): ?string
    {
        $class = static::class;

        if (property_exists($class, '__filename')) {
            /** @var string $filename */
            $filename = $class::$__filename;

            return $filename;
        }

        $file = (new \ReflectionClass($this))->getFileName();

        return $file !== false ? $file : null;
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function assertDatabaseHasRow(string $table, array $data, ?string $connection = null): void
    {
        $this->assertDatabaseHas($table, $data, $connection);
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function assertDatabaseMissingRow(string $table, array $data, ?string $connection = null): void
    {
        $query = DB::connection($connection)->table($table);

        foreach ($data as $column => $value) {
            $query->where((string) $column, $value);
        }

        Assert::assertFalse($query->exists());
    }

    /**
     * @template T of object
     *
     * @param  class-string<T>  $class
     * @return T
     */
    public function getAction(string $class): object
    {
        Assert::assertInstanceOf($class, $this->action);

        return $this->action;
    }

    /**
     * @param  class-string<\Throwable>  $exceptionClass
     */
    public function expectApplicationException(string $exceptionClass, ?string $message = null): void
    {
        $this->expectException($exceptionClass);
        if ($message !== null) {
            $this->expectThrowableMessage($message);
        }
    }
}
