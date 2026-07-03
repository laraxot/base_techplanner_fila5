---
title: "Handoff — PHPStan full project 0 errori"
type: chat
tags: [handoff, phpstan, swarm, second-brain]
created: 2026-06-06
updated: 2026-06-06
issues:
  - https://github.com/laraxot/base_techplanner_fila5/issues/7
  - https://github.com/laraxot/base_techplanner_fila5/issues/9
  - https://github.com/laraxot/base_techplanner_fila5/issues/11
discussions:
  - https://github.com/laraxot/base_techplanner_fila5/discussions/8
  - https://github.com/laraxot/base_techplanner_fila5/discussions/10
  - https://github.com/laraxot/base_techplanner_fila5/discussions/12
---

# Handoff — PHPStan 0 + Second Brain

## Stato attuale (aggiornato 2026-07-03, sessione swarm phase 1)

**Nota:** la riga "0 errori" sotto e' storica (2026-06-06/07). Misurato di nuovo il 2026-07-03 con
`./vendor/bin/phpstan analyse Modules --memory-limit=-1 --error-format=json`: **1891 errori** al baseline,
scesi a **1475** dopo la prima ondata di fix `missingType.iterableValue` (swarm parallelo, 7 agenti per modulo).
Vedi `.planning/` (PROJECT.md, ROADMAP.md, STATE.md) per il piano completo a 5 fasi verso zero.

Distribuzione residua per categoria (2026-07-03, post batch 1):
- missingType.generics: 626
- missingType.iterableValue: 606 (era 858)
- larastan.noEnvCallsOutsideOfConfig: 239
- resto (argument.type, trait.unused, return.type, class/property/interface.notFound, ecc.): ~90

Gate qualita' canonico per ogni file modificato: `./tools/post-edit-php.sh <file> [pest-path]`
(phpstan + phpmd se disponibile + phpinsights + pest). phpmd non e' installato in vendor/bin al 2026-07-03
(skip automatico dello script, non e' un blocco).

Coordinamento: issue #22 (`laraxot/base_techplanner_fila5`) per handoff cross-sessione; questo file per bus locale swarm.

## Stato storico (2026-06-06/07, pre-regressione)

| Area | Stato |
|------|-------|
| PHPStan full project (L10) | **0 errori** ✅ (storico, non piu' valido al 2026-07-03) |
| QMD embed | 288/20488 vettori (background, CPU) |
| Verify gate | **40 PASS, 0 FAIL** (2 WARN: archive/backup) |
| BMAD v6 | 9 skills + 15 comandi installati |

## Fix applicati

### Employee (12 errori → 0)
- Rimosso `#[Override]` da widget (parent non aveva metodo)
- Rimosso `TimeclockPage.php` duplicato (merge residue)
- Fix `array_sum` type su WorkHoursBoardWidget

### User
- Rimosso `InteractsWithComments` + `CanComment` da `BaseUser.php` (User non dipende da Comment)

### TechPlanner
- `composer update -W` risolve Safe json_decode parse error

### Package placement
- `laravel/folio` → `Modules/Cms/composer.json` (già corretto)
- `spatie/laravel-activitylog` → `Modules/Activity/composer.json` (già)
- `spatie/laravel-pdf` → `Modules/Xot/composer.json` (installato ora)
- Root `laravel/composer.json` pulito: solo php, filament, nwidart

## Second brain

| Azione | File |
|--------|------|
| Context fix | 3 collections aggiornate |
| Frontmatter issue/discussion | TechPlanner business domain ✅ |
| Memories INDEX | composer, frontmatter, phpstan, user-comment ✅ |
| wiki/log.md | Sessione registrata ✅ |
| QMD update | 23 collections sync ✅ |
| QMD embed | In background (PID in /tmp/opencode/) |

## Da fare (prossimo agente)

1. Pulire 57 cartelle `archive/` e 9 `backup/` dai moduli
2. Completare `qmd embed` (se non ancora finito)
3. Creare issue/discussion per:
   - `module_user_fila5`: InteractsWithComments rimosso
   - `module_employee_fila5`: PHPStan fix (Override, duplicati)
   - `module_xot_fila5`: spatie/laravel-pdf installato

## Repo coordination

| Repo | Argomento | Stato |
|------|-----------|-------|
| `laraxot/base_techplanner_fila5` | Regola package placement, second brain | Issue #7,9,11 + Discussion #8,10,12 |
| `laraxot/module_user_fila5` | InteractsWithComments rimosso | Da creare |
| `laraxot/module_employee_fila5` | PHPStan widget Override fix | Da creare |
| `laraxot/module_xot_fila5` | spatie/laravel-pdf, Safe json_decode | Da creare |

Firma: — opencode (deepseek-v4-flash-free)

### Lang

2026-07-03 status check: `missingType.iterableValue` already at **0** before this session started
(previous commits `ee86c5fc`, `ca288363` had already closed it out). No changes needed.

### Tenant

2026-07-03: `missingType.iterableValue` **20 → 0**. Files changed:
- `app/Actions/Domains/GetDomainsArrayAction.php` — added `@return array<int, array{id: string, name: string}>`
  on `execute()`, `@return array<string, mixed>` on `recurse()`, `@param array<array-key, mixed>` +
  `@return list<string>` on `collapse()`. Used `/** @var array<int, array{id: string, name: string}> */`
  to help PHPStan through `Arr::map()`'s generic inference.
- `app/Models/BaseModelJsons.php` — `@property array $form` → `@property array<string, mixed> $form`.
- `app/Models/Domain.php`, `app/Models/TenantDomain.php` — added
  `@return array<int, array{id: string, name: string}>` to `getRows()` (delegates to `GetDomainsArrayAction`).
- `app/Models/Tenant.php` — `@property array|null $settings` → `array<string, mixed>|null`; `@method`
  tags for `create()`/`firstOrCreate()` given `array<string, mixed>` param types.
- `app/Providers/TenantServiceProvider.php` — three `@var array|float|int|string|null` inline annotations
  → `array<mixed>|float|int|string|null` (bare `array` inside a union still trips
  `missingType.iterableValue`).
- `app/Services/Config/Contracts/ConfigResolverInterface.php`,
  `Resolvers/MorphMapConfigResolver.php`, `Resolvers/StandardConfigResolver.php`,
  `Services/TenantService.php` — the shared signature
  `string|int|array|null $default` / `float|int|string|array|null` return needed
  `@param array<mixed>|int|string|null $default` / `@return float|int|string|array<mixed>|null`
  docblock overrides on every implementation (interface + 2 resolvers + facade), since native PHP
  union types can't carry generics — pattern worth reusing wherever a bare `array` sits inside a
  scalar union type hint.
- `Resolvers/StandardConfigResolver::handleMissingConfig()` — same `array<mixed>|int|string|null $default`
  pattern added.

No files skipped. `./vendor/bin/pint --dirty` run (repo-wide dirty set unrelated to Tenant, Tenant files
came back clean). Full-tree `phpstan analyse Modules/Tenant` intermittently failed to bootstrap during
this session because unrelated concurrent swarm agents were mid-edit on `Modules/UI` (many files showing
`unexpected token "<<"` — heredoc/merge artifacts, not caused by this session); verified instead via
per-file `phpstan analyse <file>` on all 10 changed files, all showing 0 `missingType.iterableValue` and
no new errors. Commit: `635876a2` on branch `dev`.

Second-brain: no new pattern beyond what's already in
`bashscripts/ai/wiki/memories/phpstan-missing-type-patterns-2026-06.md` (the "bare array inside a
union type hint" case is a direct instance of the documented `param/return generico array` row, just
spelled out for scalar unions specifically for future search-ability).

### Xot (continuation, 2026-07-03 later session)

Picked up from prior batch (commit `ee86c5fc`) which had already fixed most of Xot's
`missingType.iterableValue`. Re-measured: 51 remaining across 24 files. Fixed all 51 → **0**.

Files changed (docblock-only, array shapes added, no behavior change):
- `app/Exceptions/Handlers/HandlersRepository.php` — `@var array<int, callable>` on the 3 handler
  properties, `@return array<int, callable>` on the 3 getters.
- `helpers/Helper.php` — `@param array<string, mixed> $params` on `getFilename()`/`in_admin()`/`inAdmin()`,
  `@return array<int, string>` on `getModelFields()`, `@param array<int|string, mixed> $replace` on
  `trans_string()`. (Pre-existing unrelated `isset.offset` errors at line 267 left untouched — out of
  scope for this category.)
- `app/Datas/ArticleData.php`, `AuthData.php`, `FilemanagerData.php`, `MailData.php`,
  `SubscriptionData.php` — Spatie LaravelData classes had their `@param` array-shape tags on the
  **class-level** docblock instead of on `__construct()`; PHPStan only honors constructor-level
  `@param` for promoted properties, so the class-level tags were being silently ignored. Fix: moved
  array-typed `@param` tags down to a `/** @param ... */` block directly above `__construct(`.
  **This is the pattern worth remembering**: for `final class X extends Spatie\LaravelData\Data`,
  put `@param` array shapes on the constructor doc comment, not the class doc comment.
- `app/Datas/PdfData.php` — `@var array<int, int>` on `$margins` (a fixed 4-int array).
- `Services/ArrayService.php` and its duplicate `app/Services/ArrayService.php` (same class/namespace,
  pre-existing duplication, left as-is per no-delete-without-confirmation) — typed `diff_assoc_recursive()`
  params/return as `array<int|string, mixed>` and added explicit `array` type hints (were untyped mixed
  params relying only on docblock).
- `app/Actions/Query/GetFieldnamesByTablenameAction.php` — `@return list<string>` (was bare `list`).
- `app/Events/CommandOutputEvent.php`, `app/Exceptions/ApplicationError.php` — `@return array<string, string>`
  on `broadcastWith()`/`toArray()`/`jsonSerialize()`.
- `app/Exceptions/Handlers/HandlerDecorator.php` — `@param array<int, mixed> $parameters` on `__call()`.
- `app/Filament/Schemas/Components/XotBaseGroup.php`, `XotBaseSection.php` — the `@method static static
  make(...)` PHPDoc tags had a bare `array` in the union; retyped to `array<int|string, mixed>` matching
  the real Filament v4 `Group::make(array|Closure $schema)` / `Section::make(string|array|Htmlable|Closure|null $heading)`
  signatures (the existing `@method` tags were already stale/mismatched with the real parent signatures —
  not fixed further here, out of scope for this category).
- `app/Filament/Widgets/EnvWidget.php` — `@var array<int, string>` on `$only`.
- `app/Filament/Widgets/XotBaseTableWidget.php` — `@param array<string, mixed> $filters` on `updateFilters()`.
- `app/Http/Controllers/XotBaseController.php` — `@param array<string, mixed> $result` /
  `@param array<int|string, mixed> $errorMessages`.
- `app/Http/Middleware/SecurityMiddleware.php` — `@param array<int|string, mixed>` on
  `validateArrayInput()`'s `$value` and `getArrayDepth()`'s `$array`.
- `app/Providers/XotBaseServiceProvider.php` — `@return array<int, string>` on `provides()`.
- `app/Traits/EnumTrait.php` — `@return array<string, string>` on `toArray()` (fixes it for every enum
  using the trait: PdfEngineEnum, DayOfWeek, GenderEnum, YesNoEnum, etc. — one shared trait fix cascades).

Verification: individual `php -l` on every touched file (all pass) plus full
`phpstan analyse Modules/Xot --memory-limit=-1` run, confirming
`missingType.iterableValue` count is **0** for the whole module and no new error categories were
introduced (remaining Xot errors: 73 `missingType.generics`, 17 `argument.type`, 14 `trait.unused`,
7 `class.notFound`, 6 `method.nonObject`, 4 `generics.notSubtype`, 3 `return.type`, 2 `isset.offset`,
1 each of `method.notFound`/`method.abstract`/`return.phpDocType` — all pre-existing, belong to later
phases). `./vendor/bin/pint` run clean on all touched files. Commit: `2cb7c185` on branch `dev`
(HandlersRepository.php/ArticleData.php/AuthData.php/Helper.php landed in an earlier auto-commit during
the same session, content verified intact).

**Blocker hit mid-session** (not caused by this work, now resolved): `Modules/UI` had ~65 files with
unresolved git merge-conflict markers (`<<<<<<< HEAD`) from a concurrent swarm agent's in-progress merge,
which broke PHPStan's app bootstrap (`Modules/UI/app/Providers/Filament/AdminPanelProvider.php` is
required during Filament panel discovery, which every `phpstan analyse` invocation triggers regardless
of the `Modules/Xot` path argument). Waited it out; UI agent resolved its conflicts and bootstrap works
again. Worth noting in second-brain: **a syntax error in ANY module can block phpstan runs scoped to
ANY other module**, because Larastan's bootstrap eagerly loads all Filament panel providers app-wide.

Second-brain: the "Spatie LaravelData class-level vs constructor-level @param" pattern is new and not
yet in `bashscripts/ai/wiki/memories/phpstan-missing-type-patterns-2026-06.md` — worth adding since
Xot/Blog/Cms all use this Data pattern heavily and other modules will likely hit the same silent-ignore
issue.
