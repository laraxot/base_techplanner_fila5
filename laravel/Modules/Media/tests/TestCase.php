<?php

declare(strict_types=1);

namespace Modules\Media\Tests;

<<<<<<< .merge_file_FXT6yr
use Illuminate\Foundation\Application;
=======
<<<<<<< HEAD
>>>>>>> .merge_file_DRqwWa
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Schema;
use Mockery\Expectation;
use Mockery\MockInterface;
use Modules\Media\Providers\MediaServiceProvider;
use Modules\User\Providers\UserServiceProvider;
use Modules\Xot\Providers\XotServiceProvider;
use Modules\Xot\Tests\XotBasePest;
use Modules\Xot\Tests\XotBaseTestCase;
use PHPUnit\Framework\Assert;
use ReflectionClass;
use Spatie\MediaLibrary\HasMedia;
use Spatie\QueueableAction\QueueableAction;

use function Safe\file_get_contents;

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
abstract class TestCase extends XotBaseTestCase
{
    use DatabaseTransactions;

<<<<<<< .merge_file_FXT6yr
    public static function mockExpectation(MockInterface $mock, string $method): Expectation
    {
        return self::singleExpectation($mock, $method);
    }

    /**
     * @param  array<string, mixed>  $where
     */
    public function assertMediaTableHas(string $table, array $where, string $connection = 'media'): void
    {
        $this->assertDatabaseHas($table, $where, $connection);
    }

    /**
     * Controparte di {@see self::assertMediaTableHas()}: la riga non deve esistere.
     *
     * @param  array<string, mixed>  $where
     */
    public function assertMediaTableMissing(string $table, array $where, string $connection = 'media'): void
    {
        $this->assertDatabaseMissing($table, $where, $connection);
    }

    /**
     * Colonne della tabella `media`, filtrate e riindicizzate per l'inferenza PHPStan.
     *
     * @return array<int, string>
     */
    public static function mediaTableColumns(): array
    {
        $columns = Schema::getColumnListing('media');

        return array_values(array_filter(
            $columns,
            static fn (mixed $column): bool => is_string($column) && $column !== '', // mixed: getColumnListing() non dichiara value type
        ));
    }

    /**
     * Aggiunge `$column` al payload solo se la tabella `media` ha davvero quella colonna:
     * lo schema varia fra installazioni e un insert cieco fallirebbe.
     *
     * @param  array<string, mixed>  $payload
     * @param  array<int, string>  $columns
     * @param  mixed  $value  Valore di colonna eterogeneo (string, int, Carbon, null)
     * @return array<string, mixed>
     */
    public static function mediaPayloadSet(array $payload, array $columns, string $column, mixed $value): array
    {
        if (in_array($column, $columns, true)) {
            $payload[$column] = $value;
        }

        return $payload;
    }

    /**
     * @param  class-string  $class
     */
    public static function assertMediaUsesQueueableAction(string $class): void
    {
        XotBasePest::assertListContains(
            QueueableAction::class,
            (new ReflectionClass($class))->getTraitNames(),
        );
    }

    /**
     * @param  class-string  $class
     */
    public static function assertMediaDeclaresStrictTypes(string $class): void
    {
        Assert::assertStringContainsString(
            'declare(strict_types=1);',
            XotBasePest::reflectionSource($class),
        );
    }

    /**
     * @template T of object
     *
     * @param  class-string<T>  $class
     * @return T&\PHPUnit\Framework\MockObject\MockObject
     */
    public function makeTestMock(string $class): object
    {
        return $this->createMock($class);
    }

    /**
     * @return array<int, class-string>
     */
    protected function getPackageProviders(Application $app): array
=======
<<<<<<< HEAD
    protected function getPackageProviders($app): array
>>>>>>> .merge_file_DRqwWa
    {
        return [
            ...parent::getPackageProviders($app),
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
