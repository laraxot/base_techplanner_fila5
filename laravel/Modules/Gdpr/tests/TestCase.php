<?php

declare(strict_types=1);

namespace Modules\Gdpr\Tests;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Modules\Gdpr\Providers\GdprServiceProvider;
use Modules\User\Models\User;
use Modules\User\Providers\UserServiceProvider;
use Modules\Xot\Tests\XotBaseTestCase;
use PHPUnit\Framework\Assert;

/**
 * Base test case for Gdpr module.
 *
 * Uses the shared sqlite file of XotBaseTestCase::sharedSqlitePath() (no RefreshDatabase / migrate:fresh).
 * prepareSharedSqliteForTesting() runs before transactions begin.
 *
 * `$currentTest` espone il test in esecuzione alle funzioni helper di `tests/PestHelpers.php`
 * (`gdprGet()`, `gdprPost()`, ...), che vivono fuori dalla closure Pest e quindi senza `$this`.
 * Sostituisce `test()` di Pest, che restituisce la classe `@internal` `HigherOrderTapProxy`.
 */
abstract class TestCase extends XotBaseTestCase
{
    use DatabaseTransactions;

    public static ?self $currentTest = null;

    /**
     * Le connessioni che la transazione di test deve coprire.
     *
     * Qui c'era `['sqlite']`, cioe' **la transazione si apriva dove il modulo
     * non scrive**. I modelli di Gdpr stanno sulla connessione `gdpr`
     * (`Modules\Gdpr\Models\BaseModel`), gli utenti su `user`, e la connessione
     * `sqlite` la riscrive `XotBaseTestCase::prepareSharedSqliteForTesting()`
     * su un file che questi test non usano. Risultato: **niente veniva
     * annullato**, e ogni corsa lasciava le sue righe nel database.
     *
     * Le conseguenze misurate, prima di questa correzione:
     *
     * - 18 righe in `treatments`, 55 in `consents`, 8 in `gdpr_events`, con i
     *   nomi letterali usati dai test (`Email Marketing`, `Data Analytics`,
     *   `Treatment 1`, ...) — e `treatments.name` ha un indice unico, quindi
     *   **8 test di questo modulo** fallivano con
     *   `UniqueConstraintViolationException` su righe scritte dalla corsa
     *   precedente;
     * - una riga `test@example.com` in `quaeris_user_test.users`, scritta da
     *   `Feature/DatabaseConnectionTest`, che faceva fallire **8 test del
     *   modulo Notify** nel loro `beforeEach`. Un modulo che rompe la suite di
     *   un altro, attraverso il database, e' il modo piu' costoso di scoprire
     *   che una transazione non c'era.
     *
     * Le quattro connessioni sono quelle su cui il modulo scrive davvero, non
     * tutte le 27 configurate: avvolgerle tutte vorrebbe dire 27 transazioni
     * sulle stesse righe. E' lo stesso elenco che usano gia' Chart, Media,
     * CloudStorage, Limesurvey e DbForge (STORY-154,
     * `docs/stories/15-4-testcase-sqlite-to-mysql-test-replicas.md`, AC2).
     *
     * @var list<string>
     */
    protected $connectionsToTransact = [
        'mysql',
        'gdpr',
        'user',
        'quaeris_data',
    ];

    protected function setUp(): void
    {
        $this->prepareSharedSqliteForTesting();

        parent::setUp();

        self::$currentTest = $this;

        config(['auth.providers.users.model' => User::class]);
    }

    protected function tearDown(): void
    {
        self::$currentTest = null;

        parent::tearDown();
    }

    /**
     * @return array<int, class-string>
     */
    protected function getPackageProviders(Application $app): array
    {
        return [
            ...parent::getPackageProviders($app),
            UserServiceProvider::class,
            GdprServiceProvider::class,
        ];
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
     * @param  class-string<\Throwable>  $exceptionClass
     */
    public function expectApplicationException(string $exceptionClass, ?string $message = null): void
    {
        $this->expectException($exceptionClass);
        if ($message !== null) {
            $this->expectThrowableMessage($message);
        }
    }

    protected static function uniqueTreatmentName(string $prefix = 'treatment'): string
    {
        return $prefix.'-'.uniqid('', true);
    }
}
