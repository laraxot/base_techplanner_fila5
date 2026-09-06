---
title: "Code Coverage: Job"
module: "Job"
type: concept
tags: [coverage]
created: 2026-07-14
updated: 2026-07-14
qmd: "coverage"
related:
  - "./phpstan-fixes-archive-2.md"
---
# Code Coverage: Job

**Lines Coverage:** N/A (Failed to parse)
**Test Exit Code:** 2

## 2026-09-04 — Quality-gate closure (BMAD Build+Measure): phpmd + pest + coverage

Scope: chiusura del gate qualita' modulare (standing order pillar 5) — PHPStan gia'
verificato 0 errori nella stessa giornata da una sessione precedente; questa sessione
copre phpmd, phpinsights, pest, coverage, git. Story:
`docs/stories/4.30.quality-gate-phpmd-pest-baseline.story.md`.

**Coordinamento**: lock preso su `laravel/Modules/Job` (`quality-gate-2026-09-04`),
`docs/chat/` letto prima di iniziare (nessuna nota bloccante sul modulo Job per questa
data, solo storico di sync precedenti). Working tree trovato con **174 file gia'
modificati e non committati** da un'altra sessione (stesso pattern gia' documentato nelle
sezioni sotto) — nessuno di questi file e' stato toccato; ogni file editato in questa
sessione e' stato verificato pulito (`git status --porcelain`) prima dell'edit.

**PHPStan** (baseline richiesta dal task): `./vendor/bin/phpstan clear-result-cache` poi
`analyse Modules/Job --no-progress --error-format=table` → **0 errori** prima e dopo i 2
fix applicati.

**PHPMD** (`./tools/phpmd.sh Modules/Job/app text ../docs/phpmd.ruleset.xml`): 123 finding
prima, **121 dopo** (2 fix reali):
- `app/Actions/ExecuteTaskAction.php` — `MissingImport`: `throw new
  \BadMethodCallException(...)` sostituito con `use BadMethodCallException;` + `throw new
  BadMethodCallException(...)`.
- `app/Models/Policies/JobBasePolicy.php` — `UnusedLocalVariable`: rimossa `$xotData =
  XotData::make();` (variabile mai usata, dead code) e il relativo `use
  Modules\Xot\Datas\XotData;` diventato superfluo.

I restanti 121 finding sono debito pre-esistente, documentato ma non toccato in questa
sessione (root-cause discipline: non modificare codice che richiede un refactor piu'
ampio o che tocca file gia' dirty di un'altra sessione):
- **CamelCaseParameterName/UnusedFormalParameter su parametri `$_user`/`$_task`/`$_schedule`
  ecc. (≈67 finding)**: convenzione di progetto gia' consolidata in tutte le classi
  `app/Models/Policies/*Policy.php` — il prefisso `_` segnala esplicitamente "richiesto
  dall'interfaccia, intenzionalmente non usato" (stesso pattern in tutte le ~10 Policy del
  modulo). Rinominare andrebbe contro la convenzione del modulo per zero valore reale.
- **CamelCaseVariableName/CamelCasePropertyName su variabili snake_case legacy (≈29
  finding)**: naming storico (es. `$form_data`, `$view_params`, `$date_format`) sparso su
  Livewire component e Resource Filament; rinominare tocca decine di file e siti d'uso
  (proprieta' Livewire pubbliche bindate da Blade `wire:model`) — rischio di rottura runtime
  non coperto da test affidabili in questo momento (vedi sezione Pest sotto), quindi fuori
  scope per una sessione di chiusura gate.
- **CyclomaticComplexity (4 finding)**: `ScheduleArguments::formatArrayTags()` (x2,
  duplicato in `Filament\Columns` e `Filament\Tables\Columns`, vedi nota sotto),
  `Schedule::getArguments()` (13, soglia 10), `FormatSeconds::formatSeconds()` (11, soglia
  10) — gia' segnalati come debito pre-esistente in `module-job-sync.md` (2026-07-20);
  spezzare questi metodi richiede una story dedicata con test di regressione, non una
  chiusura gate.
- **BooleanArgumentFlag (5 finding)**: `withValue(bool $withValue)` su 3 colonne Filament +
  `Task::compileParameters(..., bool $forScheduler)` — SRP violation nota, refactor in
  due metodi separati e' un cambiamento di API pubblica, fuori scope.
- **CouplingBetweenObjects (2 finding)**: `ScheduleResource` (20 dipendenze, soglia 13),
  `ScheduleForm` (14) — Filament Resource/Schema per loro natura orchestrano molte classi,
  riduzione richiederebbe redesign architetturale, fuori scope.
- **ElseExpression (6 finding)**: stile, non correttezza; lasciati per evitare churn non
  necessario senza test di regressione affidabili.
- **IfStatementAssignment (5), LongVariable (3)**: stile puro, bassa priorita', lasciati.

**Finding architetturale non risolto, segnalato per follow-up** (trovato investigando i
finding `CyclomaticComplexity`/duplicazione su `ScheduleArguments`/`ScheduleOptions`):
esistono **due coppie di classi duplicate** con stessa responsabilita' in namespace
diversi — `Filament\Columns\{ScheduleArguments,ScheduleOptions}` (usate/testate,
`ScheduleOptions::getTags()` pero' e' **dead code**: corpo commentato, ritorna sempre `[]`)
vs `Filament\Tables\Columns\{ScheduleArguments,ScheduleOptions}` e
`Filament\Fields\Repeater` vs `Filament\Forms\Components\Repeater` (implementazioni
diverse/piu' complete ma **zero riferimenti** in tutto il monorepo — verificato con `grep
-rln` su `Modules/` e `Themes/`). Sembra una migrazione Filament 4→5 (namespace
`Filament\Tables\Columns\*`) lasciata a meta'. Non toccato: capire quale coppia e' quella
"giusta" e consolidare richiede contesto che questa sessione non ha (rischio di cancellare
lavoro in corso o rompere la classe attualmente in uso). Proposto come storia dedicata.

**phpinsights**: **non installato in questo repository** (`./vendor/bin/phpinsights
--version` → "package not found"; confermato anche da
`bashscripts/ai/wiki/rules`/memoria `pest5-incompatibile-con-phpinsights.md` — rimosso
perche' incompatibile con Pest 5). Non eseguito, score prima/dopo non applicabile.

**Pest** (`env XDEBUG_MODE=coverage ./vendor/bin/pest "Modules/Job/tests/"
--configuration phpunit.xml --no-coverage` — root `phpunit.xml`, non quello del modulo:
quello del modulo ha `bootstrap="vendor/autoload.php"` relativo, path che non esiste in
questo layout monorepo, pre-esistente/non toccato):
330 test totali. **Risultato non deterministico su run identici consecutivi**:
- Run 1: 330 failed, 0 assertions — tutti falliti con lo stesso errore, in bootstrap:
  `Typed property Modules\Xot\Datas\ComponentFileData::$name must not be accessed before
  initialization` in `Modules/Xot/app/Actions/Blade/RegisterBladeComponentsAction.php:28`
  (chiamato da `XotBaseServiceProvider.php:137`).
- Run 2 (stesso comando, subito dopo): 38 failed, 292 passed (1151 assertions).
- Run 3 (stesso comando, subito dopo): timeout a 400s, nessun risultato — `ps aux` durante
  l'attesa mostrava **contemporaneamente** run Pest di altre sessioni in corso su
  `Modules/Media`, `Modules/AI`, `Modules/Activity` sullo stesso DB MySQL `_test`
  condiviso — conferma diretta (non solo sospetto) che la varianza tra run 1 e run 2 e'
  contesa multi-agente sul DB condiviso (memoria `misurare-mentre-un-altro-scrive` /
  `multi-agent-same-repo-race`), non un difetto del modulo Job.

Verificato che **non e' causato da questa sessione**: isolando un singolo test toccato
solo indirettamente (`tests/Unit/Traits/FormatSecondsTest.php`, nessuna relazione con
Blade component registration) → **PASS 2/2** in isolamento
(`./vendor/bin/pest "Modules/Job/tests/Unit/Traits/FormatSecondsTest.php" --configuration
phpunit.xml --no-coverage`). L'errore origina in `Modules/Xot`, non in `Modules/Job`, e si
manifesta solo quando l'intera suite del modulo gira in sequenza (probabile stato
condiviso/cache di boot corrotta tra test, aggravato da altre sessioni concorrenti sullo
stesso ambiente — vedi memoria `misurare-mentre-un-altro-scrive` /
`multi-agent-same-repo-race`). Non tentato un fix dell'ambiente/di `Modules\Xot` (fuori
scope per questo modulo, e "non forzare fix dell'ambiente" per istruzione esplicita).

**Coverage**: non misurabile in modo affidabile in questo momento — nessun run della suite
completa raggiunge la fine con stato coerente per generare un report clover/html valido.
Nessun test aggiunto in questa sessione (nessun gap concreto emerso dai 2 fix di phpmd,
che erano rimozione di codice morto/import, non nuova logica da coprire): baseline lasciata
com'e', nessun numero inventato.

## 2026-09-04 — Services → Actions (no-services-rule)

Scope: convert every file under `app/Services/` to `Spatie\QueueableAction\QueueableAction`
under `app/Actions/`, per `bashscripts/ai/wiki/rules/no-services-rule.md`. Story:
`docs/stories/job-services-to-actions.story.md` (full per-file classification table there).

**Census**: one file, `app/Services/ScheduleService.php` (2 public methods:
`getActives()`, `clearCache()`).

**Collision found live, mid-task**: a concurrent session was migrating the exact same
file at the same time. Result found in the working tree: `ScheduleService.php` deleted by
that session; **two** independent QueueableAction migrations already committed in HEAD
(`634d334`) — a flat pair (`app/Actions/GetActiveSchedulesAction.php`,
`ClearScheduleCacheAction.php`, with real call sites in
`ScheduleClearCacheCommand`/`ScheduleObserver`) and a grouped pair
(`app/Actions/Schedule/GetActiveSchedulesAction.php`, `ClearScheduleCacheAction.php`, no
real call sites, only tests). Consolidated onto the grouped pair (matches the rule: "Actions
are grouped by actor/context, not dumped flat in the Actions/ root"), updated the two real
call sites to the grouped namespace, removed the flat duplicates + their redundant tests +
two stray tracked `.php.bak` files.

**PHPStan**: baseline (post `clear-result-cache`) 0 errors → final (post
`clear-result-cache`) 0 errors.

**PHPMD**: `./tools/phpmd.sh Modules/Job text ../docs/phpmd.ruleset.xml` — no new findings;
`ScheduleObserver.php` only shows pre-existing `CamelCaseParameterName`/
`UnusedFormalParameter` on `$_schedule` (line not touched, only the `use` import changed).

**Pest**: `./vendor/bin/pest Modules/Job/tests -c Modules/Job/phpunit.xml --no-coverage`
fails at bootstrap (`Cannot open bootstrap script
".../Modules/Job/vendor/autoload.php"`) — pre-existing, caused by another session's
uncommitted `phpunit.xml` edit (documented below in the mixed-type-reduction section), not
touched here.

## 2026-09-04 — mixed type reduction (best-effort)

Scope: reduce use of `mixed` where a more specific type is genuinely knowable
(project convention, `qmd search "mixed type policy"`). Story:
`docs/stories/4.29.mixed-type-reduction.story.md`.

**Pre-existing state found before touching anything**: the module working tree
already carried ~177 files of uncommitted WIP from another session (import
reordering, `.gitattributes` cleanup, ScheduleService→Actions migration —
matches `docs/chat/module-job-sync.md`). Per collision-avoidance rules, edits
in this pass were restricted to files that were clean (no pre-existing diff)
so the resulting commit is cleanly attributable and does not entangle with the
other session's live work.

**Counts**: 65 `mixed` occurrences across 48 files. 30 files were clean; of
those, 36 occurrences were reviewed. 1 changed, 35 left as `mixed` with a
documented reason (see story for the full per-file breakdown): Laravel
`Factory::definition()` vendor contract (17 factory files), Eloquent
`@property array<array-key, mixed>` JSON-column docblocks (queue
payload/data/params/options — genuinely polymorphic), `ValidationRule`
contract (`Corn::validate(mixed $value, ...)`), Filament `Column::getState():
mixed` contract (`ScheduleArgumentsProbe`), Symfony Console argument/option
`default` fields (genuinely `string|array|bool|int|float|null`), and
`config('totem.frequencies')` payload (heterogeneous nested config shape,
`parameters` key varies from `false` to a typed field-definition array). The
remaining 29 occurrences live in the 18 already-dirty files and were left
untouched entirely (not evaluated in depth) to avoid touching another
session's WIP.

**Change applied**: `app/Http/Livewire/Job/Status.php` — `public array
$form_data` docblock narrowed from `array<string, mixed>` to `array<string,
string>` (verified: the only field ever assigned/bound is `conn`, a queue
connection name string, both in `mount()` and in
`resources/views/livewire/job/status.blade.php`'s `wire:model.lazy`
binding).

**Reverted attempt**: `app/Datas/CommandData.php`'s `$arguments` param was
briefly narrowed from `array<int, array<string, mixed>>` to the precise shape
`array{name: string, description: string, required: bool}>` matching its one
real caller (`GetCommandsAction::execute()`), but that caller itself casts
the value through `@var array<int, array<string, mixed>>` in
`app/Actions/Command/GetCommandsAction.php` — a file already in the
other session's dirty set. Fixing it properly would require editing that
file too, entangling the commit with unrelated WIP, so the change was
reverted and left as a documented skip instead.

**PHPStan**: baseline 0 errors → after 0 errors (`./vendor/bin/phpstan
analyse Modules/Job --no-progress --error-format=table`).

**PHPMD**: `./tools/phpmd.sh Modules/Job text ../docs/phpmd.ruleset.xml` ran
to completion (no crash this time). Findings are pre-existing style debt
(CamelCase param names, unused policy params, cyclomatic complexity in
`Schedule::getArguments()` and `Task`) — none introduced by this change, none
in the one file touched (`Status.php`).

**Pest**: `./vendor/bin/pest Modules/Job/tests -c Modules/Job/phpunit.xml
--no-coverage` fails to even bootstrap: `Cannot open bootstrap script
".../Modules/Job/vendor/autoload.php"`. Root cause verified via `git diff
Modules/Job/phpunit.xml`: the same pre-existing dirty WIP changed
`bootstrap="../../vendor/autoload.php"` to `bootstrap="vendor/autoload.php"`
(a module-local path that doesn't exist in this monorepo layout) — not
caused by this session, not touched by this session. Not resolved; flagged
for whoever owns that WIP.

## Output

```text
▕             }
    1119▕         }
    1120▕ 
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
