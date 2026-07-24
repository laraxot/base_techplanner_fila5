---
title: "PHPStan Modules — 90→55 dopo composer go, root cause per errore residuo"
type: handoff
tags: [phpstan, composer-go, pest, mockery, view-cache, techplanner]
created: 2026-07-24
updated: 2026-07-24
qmd: "phpstan modules composer go pest bridge uses mockery protected mock undefined variable signature drift"
related:
  - ./session-gate-blockers-2026-07-24.md
  - ../wiki/concepts/filament-v5-form-in-blade.md
---

# PHPStan Modules — stato dopo `composer go` (2026-07-24)

## Contesto

Eseguito `cd laravel && composer go` per intero (autorizzato esplicitamente
dall'utente dopo aver segnalato il rischio: cancella
`resources/views/vendor/`, fa `composer update -W` non pinnato, cancella
`database/migrations/*`, termina con `php artisan serve` in foreground).

## Esito verificato

- **Laravel**: passato a **13.21.1** (era 12.x). **Filament**: resta **v5.7.3**
  (nessun cambio). PHP runtime: **8.4.23**.
- `database/migrations/*` (root, NON `Modules/*/database/migrations/`):
  svuotata. **Verificato non distruttivo**: cartella mai tracciata in git
  (`git ls-tree` vuoto), zero moduli usano quella cartella (tutto vive in
  `Modules/*/database/migrations/`, intatti — verificato conteggio file
  invariato su User/Xot).
- `php artisan migrate:status`: tutte le migrazioni modulari **Ran**, nessuna
  pending.
- **Guard file cancellato e ripristinato**: `rm -rf resources/views/vendor/`
  ha cancellato `filament-schemas/components/form.blade.php` (il workaround
  per il bug `<x-filament-schemas::form>` non esiste, vedi
  `docs/wiki/concepts/filament-v5-form-in-blade.md`). **Il file non è mai
  stato committato in git** (`git log` vuoto per quel path) — root cause
  strutturale del perché sparisce a ogni rebuild ambiente. Ripristinato,
  verificato con `php artisan view:cache` → exit 0.
- **Race di lock osservata**: `bashscripts/lock/check.sh` diceva FREE e
  immediatamente dopo `lock.sh` diceva ALREADY LOCKED sullo stesso file, 2
  volte di fila, prima di stabilizzarsi — altro agente stava probabilmente
  operando sullo stesso path in parallelo. Nessuna azione richiesta, solo
  annotato per consapevolezza multi-agente.

## PHPStan `Modules/` (no `--level`, come da regola): 90 → 55 errori

### Fix applicati e verificati (Pest + PHPStan puliti)

1. **`Modules/Xot/tests/Support/PestFunctionBridge.php`** (25 errori
   `class.notFound`): file generato da
   `bashscripts/tools/generate-pest-phpstan-bridge.php`, stale — conteneva
   stub per `Modules\Comment\Tests` e `Modules\Rating\Tests`, moduli **non
   più presenti** nel repo. Fix: rigenerato (`php
   bashscripts/tools/generate-pest-phpstan-bridge.php`), 214→213 namespace.
   Verificato: `phpstan analyse` su quel file → 0 errori.

2. **`Modules/Xot/tests/Unit/Actions/Blade/RegisterBladeComponentsActionTest.php`**
   (10→7 errori): due bug distinti nello stesso file:
   - `ComponentFileData::collection([$comp1])` passava istanze **già
     costruite** a un metodo che si aspetta array grezzi (`self::collect()`
     interno) — rompeva sia PHPStan (`argument.type`) sia il runtime
     (`BindingResolutionException: Target class [config] does not exist`
     dentro la pipeline di trasformazione Spatie Data). Fix: costruire la
     `DataCollection` direttamente (`new DataCollection(ComponentFileData::class,
     [$comp1])`) invece di passare per `::collection()`.
   - **`uses(TestCase::class)` mancante**: il file dichiara
     `namespace Modules\Xot\Tests\Unit\Actions\Blade;` ma non chiama
     `uses(\Modules\Xot\Tests\TestCase::class);` come richiesto dalla
     convenzione del modulo (vedi commento in
     `Modules/Xot/tests/Pest.php`: "Ogni file test dichiara
     uses(...)"). Senza `uses()`, Pest non lega `$this` alla TestCase reale:
     runtime → `Call to undefined method ...::mock(). Did you forget to use
     the [pest()->extend()] function?`; PHPStan → `$this` tipizzato come
     `Pest\PendingCalls\TestCall` invece della TestCase. Fix: aggiunto
     `uses(TestCase::class);`. **Verificato**: `./vendor/bin/pest` → 2 passed
     (4 assertions), prima 2 failed.

### Residuo 7 errori sullo stesso file — root cause sistemico, NON per-file

Dopo il fix `uses()`, PHPStan correttamente tipizza `$this` come
`Illuminate\Foundation\Testing\TestCase` (era `Pest\PendingCalls\TestCall`),
ma segnala:

```
Call to protected method mock() of class Illuminate\Foundation\Testing\TestCase.
Cannot call method shouldReceive()/with()/once()/andReturn() on mixed.
```

`mock()` è `protected` sulla classe base Laravel; PHPStan applica le regole
di visibilità come se la chiusura passata a `it()` fosse chiamata da fuori la
classe (limite noto dell'integrazione Pest+Larastan: il binding `$this`
via `@param-closure-this` fixa il *tipo* ma non la *visibilità* del contesto
di chiamata). **Non risolvibile per singolo file** senza toccare
`phpstan.neon`/l'estensione Larastan-Pest — e `phpstan.neon` è modificabile
**solo dall'utente** per regola di progetto. Non applicato `@phpstan-ignore`
(vietato dalle istruzioni stesse di PHPStan nell'output).

## Errori NON toccati — root cause diagnosticata, fix rimandato

### `Modules/Notify/tests/Unit/Services/NotificationManagerTest.php` (13 errori)

**Non è un test Pest**: `class NotificationManagerTest extends
\PHPUnit\Framework\TestCase` — PHPUnit puro, in violazione della regola di
progetto "tutti i test in Pest (converti PHPUnit)". Gli errori
`Mockery\CompositeExpectation::with()/once()/times()` derivano dal fatto che
il file non è integrato con l'infrastruttura Pest/Laravel testing. Fix
corretto: conversione completa PHPUnit→Pest (153 righe, non tentata in
questa sessione per rischio di alterare il comportamento degli assert senza
verifica adeguata nel budget residuo).

### `Modules/AI/tests/Unit/Actions/CompletionActionTest.php` (16 errori)

Il file usa `uses(TestCase::class)` e `beforeEach()` correttamente (fissa
`$this->action`), ma **4 blocchi `test(...)` su 7** usano una variabile
locale `$action` mai definita in quel blocco (commento fantasma `// action
instantiated locally` senza codice sotto). Il blocco `test('_handles_technical_prompt', ...)`
(riga ~296) è **strutturalmente incompleto**: oltre ad `$action`, anche
`$prompt` ed `$expectedText` non sono definiti in quel body — sembra un
blocco troncato/copiato a metà. Fix minimo (`$action` → `$this->action`)
applicabile ai 4 blocchi con `Undefined variable: $action`, ma il blocco
troncato richiede di capire cosa il test doveva verificare prima di
scrivere codice — non tentato in questa sessione.

### `Modules/Media/tests/unit/actions/SaveAttachmentsActionTest.php` (14 errori)

Drift reale firma test↔implementazione: i test chiamano
`SaveAttachmentsAction::execute()` con 2 parametri passando un
`SaveAttachmentsData` object; l'implementazione richiede 3-4 parametri e un
`list<string>` per il secondo. Non chiaro dai soli errori PHPStan se sia il
test o l'action ad essere disallineato con l'intento reale — richiede
lettura di `SaveAttachmentsAction::execute()` e della sua ultima modifica
(`git log`) prima di decidere quale lato correggere. Non tentato in questa
sessione.

### File singoli minori (non indagati)

- `Modules/UI/tests/Feature/UIBusinessLogicTest.php` (4)
- `Modules/Tenant/tests/Unit/domaintest.php` (4, nome file non-PSR — probabile
  `DomainTest.php` rinominato/copiato in minuscolo, verificare)
- `Modules/User/tests/Feature/Database/Migrations/UserMigrationSyntaxTest.php` (1)
- `Modules/Employee/app/Models/Admin.php` (1, **unico errore fuori da
  `tests/`** — merita priorità perché è codice applicativo, non test)
- `Modules/AI/tests/Unit/Actions/PredictionDraftFallbackTemplatesActionTest.php` (1)
- `Modules/Activity/tests/Fixtures/ListLogActivitiesActionTestPage.php` (1)

## Prossimi passi suggeriti (per chi riprende)

1. `Modules/Employee/app/Models/Admin.php` — priorità perché è codice
   applicativo, non test.
2. Conversione `NotificationManagerTest.php` a Pest.
3. Fix scoping `$action`→`$this->action` nei 3 blocchi non troncati di
   `CompletionActionTest.php`; investigare a parte il blocco troncato.
4. Leggere `SaveAttachmentsAction::execute()` + git blame prima di toccare
   `SaveAttachmentsActionTest.php`.
5. Il residuo "protected mock() in Pest closure" (7 errori su
   `RegisterBladeComponentsActionTest.php`, probabilmente presente anche
   altrove) richiede una decisione dell'utente su `phpstan.neon`
   (aggiungere l'estensione Larastan-Pest corretta o un
   `ignoreErrors` mirato con motivazione — entrambe le opzioni toccano il
   file sacro, quindi solo l'utente decide).
