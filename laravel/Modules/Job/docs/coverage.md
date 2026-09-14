---
title: "Code Coverage: Job"
module: "Job"
type: concept
tags: [coverage]
created: 2026-07-14
updated: 2026-09-06
qmd: "coverage"
related:
  - "./phpstan-fixes-archive-2.md"
  - "./stories/01.Job-phpstan-fix.story.md"
---

## 2026-09-11 — Dead Table class + `$model` bug follow-up (`JobBatchResource`/`JobsWaitingResource`)

Scope (story root, righe Job):
`docs/stories/xotbaseresourcetable-dead-code-duplicate-table-classes-followup.story.md`.

1. `app/Filament/Resources/JobBatchResource/Tables/JobBatchsTable.php` (typo di
   pluralizzazione, mai risolta da `XotBaseResource::getTableClass()`): confermato
   dead code via `git log --follow` (creato nello stesso commit `a1d95ea2` di
   `JobBatchesTable.php`, contenuto sempre un sottoinsieme — nessuna
   `getTableHeaderActions()`/`getTableBulkActions()` — mai divergente/mid-refactor) e
   `grep -rn JobBatchsTable` repo-wide (zero riferimenti in codice, solo docs).
   **Cancellato.**
2. `JobsWaitingResource::$model` era `Job::class` invece di `JobsWaiting::class` — bug
   reale, non solo un file morto: `JobsWaiting` è un model reale (estende `Job`,
   stessa tabella) con una `JobsWaitingFactory` dedicata e una `JobsWaitingPolicy`
   dedicata mai raggiunta (`Gate::getPolicyFor()` risolveva `JobPolicy` invece di
   `JobsWaitingPolicy`, verificato via tinker prima/dopo il fix). `JobResource` possiede
   già `Job::class` con CRUD completo (`BoardJobs`, `JobStatsOverview`); far puntare
   `JobsWaitingResource` allo stesso model lo rendeva un doppione accidentale.
   **Fix**: `$model = JobsWaiting::class`. Conseguenza verificata via tinker:
   `getTableClass()` ora risolve `JobsWaitingsTable` (prima dead code, ora vivo) invece
   di `JobsWaitingResource\Tables\JobsTable` (byte-identico a
   `JobResource\Tables\JobsTable`, creato nello stesso commit `a1d95ea2` — duplicato,
   non mid-refactor). `JobsTable.php` in `JobsWaitingResource/Tables/` **cancellato**
   (diventato dead code dal fix); `JobsWaitingsTable::$model` aggiornato da `Job::class`
   a `JobsWaiting::class` (property non usata da `XotBaseResourceTable` — verificato
   `grep -n model` sul base — ma fuorviante se lasciata sbagliata).
3. Guard test nuovo: `tests/Unit/Filament/Resources/JobsWaitingResourceModelTest.php`
   (4 assert, gruppo `no-job-db`) — blocca la regressione di entrambi i casi:
   `JobsWaitingResource::getModel() === JobsWaiting::class`,
   `JobsWaitingResource::getTableClass() === JobsWaitingsTable::class`,
   `JobBatchResource::getModel() === JobBatch::class`,
   `JobBatchResource::getTableClass() === JobBatchesTable::class`.

Verifica:
- `vendor/bin/phpstan analyse Modules/Job --no-progress`: **[OK] No errors**.
- `tools/phpmd.sh` (ruleset `docs/phpmd.ruleset.xml`) sui 4 file toccati: **0 violazioni**
  (unico finding pre-esistente, non toccato da questo diff:
  `JobsWaitingResource.php:24 LongVariable $shouldRegisterNavigation`, proprietà
  standard Filament, non rinominabile).
- `XDEBUG_MODE=coverage vendor/bin/pest Modules/Job`: **323 passed, 27 failed (976
  assertions, 180.23s)**. I 27 fallimenti sono **pre-esistenti e non toccati da questo
  diff** (verificato leggendo ogni stack trace):
  - `JobExecuteCoverage50Test`/`JobPolicyBehaviorTest`/`JobPolicyTest`/
    `JobScheduleFormCoverageTest`/`ScheduleFormCoverage100Test` (23 test):
    `Modules\Job\Tests\Unit\expectMethod(): Return value must be of type
    Mockery\Expectation, Mockery\CompositeExpectation returned` — incompatibilità di
    versione Mockery nell'helper condiviso `JobExecuteCoverage50Test.php:70`, e un
    secondo bug indipendente nello stesso file (`getFormSchemaOld()` chiamato
    staticamente su un metodo non statico di `XotBaseResource`, fallisce già sul primo
    elemento dell'array `$classi`, prima di arrivare a `JobBatchResource`/
    `JobsWaitingResource`).
  - `JobBatchBusinessLogicTest`/`ScheduleBusinessLogicTest`/`JobModelsCoverageTest`/
    `Enums\StatusTest` (4 test): asserzioni su stato DB/trait di `Task`/`Status`, nulla
    a che fare con `JobBatch`/`JobsWaiting`/le Table toccate.
  - Prima run del giorno: 193 failed/153 passed per un crash di bootstrap
    (`Modules\Notify\...\ListNotificationLogs not found`) causato da un altro agente
    in scrittura concorrente su `Modules/Notify` nello stesso momento (pattern
    "misurare mentre un altro scrive"); risolto da solo al retry + `composer
    dump-autoload`, non è mai stato un problema del modulo Job.

## 2026-09-06 — PHPStan zero-errors pass (this session)

Scope: `app/Filament/Columns/ScheduleArguments.php`,
`app/Filament/Resources/JobManagerResource/Widgets/JobStatsOverview.php`,
`app/Filament/Resources/ScheduleResource.php`,
`app/Filament/Resources/ScheduleResource/Schemas/ScheduleForm.php`,
`app/Models/JobBatch.php`, `app/Models/Task.php`. Full detail:
`docs/stories/01.Job-phpstan-fix.story.md`.

- Targeted test files that directly cover the changed code:
  `tests/Unit/Filament/Columns/ScheduleArgumentsTest.php` — **11/11 passed** (ran
  clean, confirms `getTags()`/`formatArrayTags()`/`withValue()` behavior unchanged
  after switching to `SafeStringCastAction::cast()`).
- `tests/Feature/JobBatchBusinessLogicTest.php`, `tests/Feature/TaskBusinessLogicTest.php`,
  `tests/Unit/ScheduleFormCoverage100Test.php`, `tests/Unit/JobScheduleFormCoverageTest.php`,
  `tests/Unit/Models/JobModelsCoverageTest.php`: **could not run** — Pest bootstraps
  the whole monorepo (all Filament panels across all `Modules/*`), and
  `Modules/Platform/app/Filament/Resources/AuditLogResource.php` was mid-refactor by
  another agent for the entire session (locked via `bashscripts/lock`, `LOCKED at
  2026-09-06T22:04:52+02:00`, 23+ minutes), causing a fatal
  `Could not check compatibility between
  Modules\Platform\Filament\Resources\AuditLogResource::table(...)` on every
  full-app bootstrap attempt (reproduced twice). Not caused by, or fixable from,
  this Job-module story — flagging as an environment blocker for whoever owns
  Platform's concurrent refactor. Full-tree run for `Modules/Job/tests` (background
  PID 2140515) also never completed in this session due to the same shared-bootstrap
  contention plus general system load from the many concurrent agents active on this
  repo (dozens of other `pest`/`phpstan` processes observed running in parallel via
  `ps aux` throughout this session).
- PHPStan (`clear-result-cache` + `analyse Modules/Job`, module-scoped, not affected
  by the Platform bootstrap issue): **15 -> 0 errors**, reverified 3 times.
- No behavior change intended or expected in any of the 5 untested files: JobBatch's
  fix is a pure refactor from `$this->attributes[...]` to the model's own typed
  accessor (documented in `docs/typed-model-properties-over-raw-attributes.md` as
  runtime-equivalent); `ScheduleResource`/`ScheduleForm`'s fix
  (`->toCollection()->where()->first()`) is exactly Spatie's own documented
  replacement for the deprecated `DataCollection::where()/first()`; `Task::compileParameters()`
  and `JobStatsOverview` now delegate to the same `SafeStringCastAction`/
  `SafeEloquentCastAction` helpers already used elsewhere in this module for
  identical semantics.

# Code Coverage: Job

**Lines Coverage:** N/A (Failed to parse)
**Test Exit Code:** 2

## Output

```text
▕             }
    1119▕         }
    1120▕ 
## Status

**2026-09-06**: philosophy.md created. PHPStan analyzed (OK). Pest suite (TBD). Coverage target: +5% per module.

    1121▕         try {
  ➜ 1122▕             $reflector = new ReflectionClass($concrete);
    1123▕         } catch (ReflectionException $e) {
    1124▕             throw new BindingResolutionException("Target class [$concrete] does not exist.", 0, $e);
    1125▕         }
    1126▕

      [2m+7 vendor frames [22m
  8   Modules/Job/tests/Feature/TaskFrequenciesIntegrationTest.php:204

  ──────────────────────────────────────────────────────────────────────────────────────  
   FAILED  Modules\Job\tests\Feature\TaskFrequenciesIntegr…  BindingResolutionException   
  Target class [config] does not exist.

  at vendor/laravel/framework/src/Illuminate/Container/Container.php:1122
    1118▕             }
    1119▕         }
    1120▕ 
    1121▕         try {
  ➜ 1122▕             $reflector = new ReflectionClass($concrete);
    1123▕         } catch (ReflectionException $e) {
    1124▕             throw new BindingResolutionException("Target class [$concrete] does not exist.", 0, $e);
    1125▕         }
    1126▕

      [2m+7 vendor frames [22m
  8   Modules/Job/tests/Feature/TaskFrequenciesIntegrationTest.php:211

  ──────────────────────────────────────────────────────────────────────────────────────  
   FAILED  Modules\Job\tests\Feature\TaskFrequenciesIntegr…  BindingResolutionException   
  Target class [config] does not exist.

  at vendor/laravel/framework/src/Illuminate/Container/Container.php:1122
    1118▕             }
    1119▕         }
    1120▕ 
    1121▕         try {
  ➜ 1122▕             $reflector = new ReflectionClass($concrete);
    1123▕         } catch (ReflectionException $e) {
    1124▕             throw new BindingResolutionException("Target class [$concrete] does not exist.", 0, $e);
    1125▕         }
    1126▕

      [2m+7 vendor frames [22m
  8   Modules/Job/tests/Feature/TaskFrequenciesIntegrationTest.php:229

  ──────────────────────────────────────────────────────────────────────────────────────  
   FAILED  Modules\Job\tests\Unit\Models\BaseModelTest > b…  BindingResolutionException   
  Unresolvable dependency resolving [Parameter #0 [ <required> string $storedEventRepository ]] in class Spatie\EventSourcing\StoredEvents\EventSubscriber

  at vendor/laravel/framework/src/Illuminate/Container/Container.php:1429
    1425▕     protected function unresolvablePrimitive(ReflectionParameter $parameter)
    1426▕     {
    1427▕         $message = "Unresolvable dependency resolving [$parameter] in class {$parameter->getDeclaringClass()->getName()}";
    1428▕ 
  ➜ 1429▕         throw new BindingResolutionException($message);
    1430▕     }
    1431▕ 
    1432▕     /**
    1433▕      * Register a new before resolving callback for all types.

      [2m+15 vendor frames [22m
  16  Modules/Job/app/Models/BaseModel.php:72
  17  Modules/Job/tests/Unit/Models/BaseModelTest.php:11


  Tests:    26 failed, 11 warnings, 38 skipped, 20 passed (47 assertions)
  Duration: 9.72s


```
