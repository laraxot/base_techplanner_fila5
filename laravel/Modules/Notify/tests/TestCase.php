<?php

declare(strict_types=1);

namespace Modules\Notify\Tests;

<<<<<<< .merge_file_1XNgc9
use Illuminate\Foundation\Application;
=======
<<<<<<< HEAD
>>>>>>> .merge_file_XHA4b9
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;
use Mockery;
use Mockery\Expectation;
use Mockery\MockInterface;
use Modules\Notify\Models\NotificationType;
use Modules\Notify\Models\NotifyTheme;
use Modules\Notify\Models\NotifyThemeable;
use Modules\Notify\Providers\NotifyServiceProvider;
use Modules\Xot\Tests\CreatesApplication;
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;
use ReflectionClass;
use ReflectionProperty;

use function Safe\file_get_contents;
use function Safe\json_decode;

/**
 * Base test case for Notify module tests.
 *
<<<<<<< .merge_file_1XNgc9
 * Lo schema (migrate) e i seeder del DB di test si eseguono una volta dall'esterno
 * (`php artisan migrate --env=testing`): `loadLaravelMigrations()` e' di Testbench,
 * non di `Illuminate\Foundation\Testing\TestCase`, e non esiste qui.
 * Mai RefreshDatabase: wipea il MariaDB `*_test` condiviso con Fixcity.
=======
 * Uses MySQL from .env.testing.
 * All module connections are mapped by TenantServiceProvider.
 * Migrations must be run ONCE externally: php artisan migrate --env=testing
 * DatabaseTransactions handles rollback between tests.
=======
require_once __DIR__.'/../../Xot/tests/CreatesApplication.php';

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Notify\Providers\NotifyServiceProvider;
use Modules\Xot\Tests\CreatesApplication;

/**
 * Base test case for Notify module tests.
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_XHA4b9
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;

<<<<<<< .merge_file_1XNgc9
    /** @var list<string> */
    protected $connectionsToTransact = ['user', 'notify'];

    /**
     * Type-guard: accetta un valore arbitrario e asserisce che sia un array.
     *
     * @return array<string, mixed>
     */
    public static function assertNotifyArray(mixed $value): array
    {
        Assert::assertIsArray($value);

        /** @var array<string, mixed> $value */
        return $value;
    }

    /**
     * @template T of object
     *
     * @param  ReflectionClass<T>  $reflection
     * @return list<string>
     */
    public static function notifyReflectionPropertyNames(ReflectionClass $reflection): array
    {
        return array_map(
            static fn (ReflectionProperty $property): string => $property->getName(),
            $reflection->getProperties(),
        );
    }

    /**
     * Sorgente PHP della classe riflessa, per i test che ne ispezionano il codice.
     *
     * @template T of object
     *
     * @param  ReflectionClass<T>  $reflection
     */
    public static function notifyReflectionSource(ReflectionClass $reflection): string
    {
        $filename = $reflection->getFileName();
        Assert::assertNotFalse($filename);

        return file_get_contents($filename);
    }

    /**
     * Legge una catena di chiavi annidate, asserendo a ogni livello che esista.
     *
     * @param  array<mixed, mixed>|null  $array
     * @return mixed Il valore in fondo alla catena di chiavi e' eterogeneo per definizione
     */
    public static function notifyArrayGet(?array $array, int|string ...$keys): mixed
    {
        Assert::assertIsArray($array);

        /** @var array<mixed, mixed> $current */
        $current = $array;

        if ($keys === []) {
            return $current;
        }

        $lastKey = array_pop($keys);

        foreach ($keys as $key) {
            Assert::assertArrayHasKey($key, $current);
            $nested = $current[$key];
            Assert::assertIsArray($nested);
            /** @var array<mixed, mixed> $nested */
            $current = $nested;
        }

        Assert::assertArrayHasKey($lastKey, $current);

        return $current[$lastKey];
    }

    /**
     * Impostazioni del tipo di notifica rilette dal DB (non quelle in memoria).
     *
     * @return array<string, mixed>
     */
    public static function notifyFreshTypeSettings(NotificationType $type): array
    {
        $settings = XotBasePest::assertFreshModel($type, NotificationType::class)->settings;
        Assert::assertIsArray($settings);

        return $settings;
    }

    /**
     * Tema collegato al themeable tramite `notify_theme_id`.
     */
    public static function notifyThemeForThemeable(NotifyThemeable $themeable): NotifyTheme
    {
        $themeId = $themeable->notify_theme_id;
        Assert::assertNotNull($themeId);
        $theme = NotifyTheme::query()->find($themeId);
        Assert::assertInstanceOf(NotifyTheme::class, $theme);

        return $theme;
    }

    /**
     * Mock tipizzato: restituisce T&MockInterface, cosi' il mock passa a firme che richiedono T.
     *
     * @template T of object
     *
     * @param  class-string<T>  $class
     * @return T&MockInterface
     */
    public static function typedMock(string $class): MockInterface
    {
        $mock = Mockery::mock($class);
        Assert::assertInstanceOf($class, $mock);
        Assert::assertInstanceOf(MockInterface::class, $mock);

        return $mock;
    }

    /**
     * Expectation concreta per un singolo metodo (stesso pattern di Media TestCase::mockExpectation).
     */
    public static function mockExpectation(MockInterface $mock, string $method): Expectation
    {
        $mock->shouldReceive($method);
        $director = $mock->mockery_getExpectationsFor($method);
        Assert::assertNotNull($director);
        $expectations = $director->getExpectations();
        $expectation = end($expectations);
        Assert::assertInstanceOf(Expectation::class, $expectation);

        return $expectation;
    }

    /**
     * Confronta una colonna JSON per contenuto, non per testo: MySQL normalizza il JSON
     * salvato (spazi, ordine chiavi) e un `where col = 'stringa'` su colonna JSON non trova mai la riga.
     *
     * @param  array<array-key, mixed>  $expected
     */
    public static function assertNotifyJsonColumn(string $table, int|string $id, string $column, array $expected): void
    {
        $raw = DB::connection('notify')->table($table)->where('id', $id)->value($column);
        Assert::assertIsString($raw);
        Assert::assertEquals($expected, json_decode($raw, true));
    }

    /**
     * Get package providers.
     *
     * @return array<int, class-string>
     */
    protected function getPackageProviders(Application $app): array
    {
        return [
=======
<<<<<<< HEAD
    protected function getPackageProviders($app): array
    {
        return [
            XotServiceProvider::class,
            UserServiceProvider::class,
=======
    /**
     * Setup the test environment.
     * Il sito funziona, quindi i test devono riflettere il comportamento reale
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Usiamo SQLite shared memory seguendo pattern Activity/TestCase.php
        $dbName = 'file:memdb_notify_'.Str::random(10).'?mode=memory&cache=shared';

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
        $this->artisan('module:migrate', ['module' => 'Notify', '--force' => true]);
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
>>>>>>> .merge_file_XHA4b9
            NotifyServiceProvider::class,
        ];
    }
}
