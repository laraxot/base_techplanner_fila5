<?php

declare(strict_types=1);
/*
 * Bootstrap Pest — modulo Tenant.
 *
 * Questo file NON viene caricato. `Pest\Bootstrappers\BootFiles` legge `Pest.php`,
 * `Helpers.php` ed `Expectations.php` da un solo percorso per run — quello della root —
 * quindi ogni funzione dichiarata qui è codice morto e i test che la chiamano falliscono
 * con `Call to undefined function`.
 *
 * Regole, non negoziabili:
 * - zero funzioni libere qui dentro (`grep -c '^function ' ` deve dare 0);
 * - helper condivisi: metodi statici su `Modules\Xot\Tests\XotBasePest` (autoload PSR-4,
 *   niente `require_once`);
 * - helper di dominio: metodi statici su `Modules\Tenant\Tests\TestCase`;
 * - ogni file di test dichiara `uses(\Modules\Tenant\Tests\TestCase::class)` in testa —
 *   un `uses()->in(...)` scritto qui non verrebbe applicato;
 * - `pest()->extend(TestCase::class)->in(...)` e' la forma consigliata (il divieto
 *   storico per `method.internalClass` e' decaduto con pest-plugin-phpstan, story
 *   XOT-5.41); vincolo XOR con gli `uses()` per-file (`TestCaseAlreadyInUse`):
 *   migrare per directory, non mescolare;
 * - vietata la cartella `tests/Support/` (ADR-002).
 */
<<<<<<< .merge_file_CzkEMk
=======

// NOTE: The 'toBeTenant' expectation was removed as it was not used elsewhere
// and caused PHPStan errors related to '$this' binding.

/*
 * |--------------------------------------------------------------------------
 * | Functions
 * |--------------------------------------------------------------------------
 * |
 * | While Pest is very powerful out-of-the-box, you may have some testing code specific to your
 * | project that you don't want to repeat in every file. Here you can also expose helpers as
 * | global functions to help you to reduce the number of lines of code in your test files.
 * |
 */

function createTenant(array $attributes = []): Tenant
{
    /** @var Tenant $tenant */
    $tenant = Tenant::factory()->create($attributes);
    Assert::isInstanceOf($tenant, Tenant::class); // Added for PHPStan
<<<<<<< HEAD

=======
>>>>>>> 6ed19256f (.)
    return $tenant;
}

function makeTenant(array $attributes = []): Tenant
{
    /** @var Tenant $tenant */
    $tenant = Tenant::factory()->make($attributes);
    Assert::isInstanceOf($tenant, Tenant::class); // Added for PHPStan
<<<<<<< HEAD

    return $tenant;
}

// Removed TenantUser functions as the model doesn't exist in this module
=======
    return $tenant;
}

// Removed TenantUser functions as the model doesn't exist in this module
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_xajnfQ
