<?php

declare(strict_types=1);

<<<<<<< .merge_file_PnKfoq
/*
 * Bootstrap Pest — modulo Notify.
 *
 * Questo file NON viene caricato. `Pest\Bootstrappers\BootFiles` legge `Pest.php`,
 * `Helpers.php` ed `Expectations.php` da un solo percorso per run — quello della root —
 * quindi ogni funzione o `pest()->extend()` dichiarato qui è codice morto.
 *
 * Regole, non negoziabili:
 * - zero funzioni libere qui dentro (`grep -c '^function ' ` deve dare 0);
 * - vietati `pest()->extend()` e `pest()->uses()` (PHPStan `method.internalClass`);
 * - ogni file di test dichiara `uses(\Modules\Notify\Tests\TestCase::class)` dopo il blocco `use` —
 *   un `pest()->extend()` scritto qui non verrebbe applicato;
 * - vietata la cartella `tests/Support/` per helper Pest (ADR-002): helper condivisi
 *   vanno in `Modules\Xot\Tests\XotBasePest` o in `Tests\TestCase`.
 */
=======
<<<<<<< HEAD
=======
require_once __DIR__.'/TestCase.php';

>>>>>>> 6ed19256f (.)
use Modules\Notify\Models\MailTemplate;
use Modules\Notify\Models\Notification;
use Modules\Notify\Tests\TestCase;

<<<<<<< HEAD
=======
/*
 * |--------------------------------------------------------------------------
 * | Test Case
 * |--------------------------------------------------------------------------
 * |
 * | The closure you provide to your test functions is always bound to a specific PHPUnit test
 * | case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
 * | need to change it using the "pest()" function to bind a different classes or traits.
 * |
 */

pest()->extend(TestCase::class)->in('Feature');

/*
 * |--------------------------------------------------------------------------
 * | Expectations
 * |--------------------------------------------------------------------------
 * |
 * | When you're writing tests, you often need to check that values meet certain conditions. The
 * | "expect()" function gives you access to a set of "expectations" methods that you can use
 * | to assert different things. Of course, you may extend the Expectation API at any time.
 * |
 */

expect()->extend('toBeNotification', fn () => $this->toBeInstanceOf(Notification::class));

expect()->extend('toBeMailTemplate', fn () => $this->toBeInstanceOf(MailTemplate::class));

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
>>>>>>> 6ed19256f (.)

function createNotification(array $attributes = []): Notification
{
    return Notification::factory()->create($attributes);
}

function makeNotification(array $attributes = []): Notification
{
    return Notification::factory()->make($attributes);
}

function createMailTemplate(array $attributes = []): MailTemplate
{
    return MailTemplate::factory()->create($attributes);
}

function makeMailTemplate(array $attributes = []): MailTemplate
{
    return MailTemplate::factory()->make($attributes);
}
>>>>>>> .merge_file_0bEijt
