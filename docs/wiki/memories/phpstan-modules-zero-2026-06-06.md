---
title: "PHPStan Modules — zero errori sessione swarm"
type: memory
tags: [phpstan, swarm, quality-gate, fatal, override, comment]
created: 2026-06-06
updated: 2026-06-07
qmd: "phpstan level max zero errors modules swarm fatal override comment spatie blog employee"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/11"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/12"
related:
  - ../../../laravel/Modules/Xot/docs/wiki/concepts/phpstan-fixes-log.md
  - ../../../laravel/Modules/User/docs/wiki/concepts/no-comment-module-dependency.md
  - ../skills/cursor-second-brain-max-workflow.md
---

# PHPStan Modules — quality gate post-merge

## Comando canon

```bash
cd laravel && ./vendor/bin/phpstan analyse Modules --memory-limit=-1
```

**Mai** modificare `phpstan.neon` né baseline per mascherare errori.

## Stato 2026-06-07 (TechPlanner Modules)

| Metrica | Valore |
|---------|--------|
| File analizzati | 4993 |
| Errori PHPStan | **0** |
| Comando | `cd laravel && ./vendor/bin/phpstan analyse Modules --memory-limit=-1` |

Fix riusabili applicati:

- **Comment** — collection generic costruite da liste tipizzate, `view-string` prima di `view()`, `class_exists()` per produrre `class-string`, niente `@var` su variabili inesistenti.
- **Blog** — residui `Modules\Fixcity\Models\Profile` sostituiti con `ProfileContract` nel PHPDoc `$deleter`.
- **Xot** — `formClass()` nullable invece di stringa vuota, normalizzazione `getFormFill()` a chiavi stringa, palette colori sempre `array<int,string>`.
- **Geo** — distanza con `selectRaw/orderByRaw` + binding invece di `Expression` con SQL interpolato.
- **Notify** — shape attachment costruite come array costanti e `NotificationTypeEnum::getLabel()` in `mapWithKeys()`.
- **Employee** — rimosso duplicato case-only `TimeclockPage.php` mantenendo `TimeClockPage`.

### Fix sessione 2026-06-07

- **SmsData `@property` mismatch** — `@property string|null $from/recipient/body` causava `argument.type` quando le proprietà (sempre `string`, default `''`) venivano passate a funzioni che richiedono `string`. Fix: allineare `@property` a `string`.
- **`??` su proprietà non-nullable** — dopo il fix sopra, `$smsData->from ?? $default` scatenava `nullCoalesce.property`. Sostituire con `?:` (empty coalesce) quando l'intento è fallback a default per valori vuoti/falsy.
- **Form state `array<string, mixed>` a DTO** — `SmsData::from(array<string, mixed>)` viola `@param array<string, string>`. Costruire array con cast espliciti `(string) ($data['key'] ?? '')` invece di passare `getState()` direttamente.
- **Notifica `toNetfun()` mixed return** — il valore di `$notification->toNetfun($notifiable)` può essere `string|object`. Castare a `(string)` il ramo object con `getContent()` per garantire tipo stringa nell'array passato a `SmsData::from()`.

### Re-check no-flag (2026-06-07)

```bash
cd laravel && ./vendor/bin/phpstan analyse Modules
# 4993 file, [OK] No errors
```

Pattern DTO: per DTO concreti con factory locali `make()`/`from()`, usare ritorno `self` e `new self()`.
Non usare `new static()` se la factory non deve supportare late static binding: PHPStan puo' segnalarlo come `new.static`, oppure come `return.type` se si forza `new self()` mantenendo `static`.

## Stato 2026-06-06 (post STORY-GIT-001)

| Metrica | Valore |
|---------|--------|
| File analizzati | 4800 |
| Errori tipizzati | **413** |
| Blocker parse/fatal | **0** (risolti in questa sessione) |

Priorità swarm residua: **User** (13) → **Cms** (10) → **Notify** (8) → **Xot** (7).

## Blocker prima dell'analisi (fatal / parse)

PHPStan **non completa** se `phpstan.parse` blocca l'autoload.

| Problema | Fix |
|----------|-----|
| **Alias `Builder` duplicato** (stesso short name) | Tenere un solo `use …\Builder`; alias o FQCN per il secondo |
| `Schema\Builder` + `Eloquent\Builder` in stesso file | `Schema\Builder` per `getConn()`; rimuovere Eloquent se inutile |
| `Query\Builder` + `Eloquent\Builder` in contract/model | Rimuovere uno; PHPDoc con FQCN (`\Illuminate\Database\Query\Builder`) |
| `Filament\Forms\Components\Builder` + `Eloquent\Builder` | Rimuovere Eloquent — il return type è il Filament Builder |
| `Staudenmeir\…\Builder` + `Eloquent\Builder` in `Menu` | Solo `Eloquent\Builder` in import; PHPDoc `@method static Builder` |
| `XotBaseMigration` con `Filament\Table` + doppio Builder | Restore master; solo `Schema\Builder` |
| `HasRecursiveRelationshipsContract` | No `Query\Builder` + `Eloquent\Builder` insieme — vedi master |
| `QueueableAction` senza import Spatie | `use Spatie\QueueableAction\QueueableAction;` |
| `Blog\Article` + `HasComments` (pacchetto assente) | Rimuovere trait Comment |
| `Employee` widget `#[Override]` invalido | Allineare parent `XotBaseSchemaWidget` |

### Scan alias duplicati

```bash
cd laravel && python3 - <<'PY'
import re
from pathlib import Path
for f in Path('Modules').rglob('*.php'):
    if '/tests/' in str(f): continue
    aliases = {}
    for imp in re.findall(r'^use ([^;]+);', f.read_text(), re.M):
        name = imp.split(' as ')[-1].strip().split('\\')[-1]
        aliases.setdefault(name, []).append(imp)
    for name, imps in aliases.items():
        if len(imps) > 1: print(f'{f}: {name} -> {imps}')
PY
```

## Blocker storici (swarm precedente)

| Problema | Fix |
|----------|-----|
| `User\BaseUser` + `Modules\Comment\InteractsWithComments` | User non dipende da Comment |
| `Employee` widget `#[Override]` su metodi assenti nel parent | Estendere `XotBaseSchemaWidget`; rimuovere Override invalidi |

## Ordine swarm (dipendenze)

1. **Xot** — wrapper/base (sblocca cascata)
2. **User** + **Employee** — auth + widget Override
3. **TechPlanner** — dominio business
4. **Blog** + **Media** — PHPDoc `ProfileContract` (no Fixcity)
5. **Geo** + **Notify** + **UI** + **Seo**

## Errori cross-trait (full run, non visibili per-modulo)

- `HasDynamicFillable` — `property_exists` se enum property opzionale
- `EnumTrait::getColumnNames()` — `array_values()` per `array<int, string>`
- `GeoTrait::whereRaw` — SQL statico `literal-string` + binding per coordinate
- `HasGdpr::array_diff` — `Assert::allString()` su pluck

## Verifica

```bash
cd laravel && ./vendor/bin/phpstan analyse Modules --memory-limit=-1
# [OK] No errors — 4822 file, level max (phpstan.neon)
cd laravel
./vendor/bin/phpstan clear-result-cache
./vendor/bin/phpstan analyse Modules --memory-limit=-1
# Target: [OK] No errors
```

## Re-verifica post-merge (2026-06-06, sessione 5)

### Blocker bootstrap (fatal prima di PHPStan)

| File | Sintomo | Fix |
|------|---------|-----|
| `Xot/app/Providers/XotBaseServiceProvider.php` | `syntax error, unexpected token "<<"` (marker `<<<<<<<`) | Ripristino da `ce96248f` |

### 35 errori tipizzati (dopo fix bootstrap)

| Modulo | File | Causa | Fix |
|--------|------|-------|-----|
| User | `2026_01_12_114416_create_team_user_table.php` | Logica UPDATE incollata dentro closure CREATE (`$this` undefined) | Ripristino `ce96248f` — `tableCreate` + `tableUpdate` separati |
| TechPlanner | `2024_12_26_000008_create_client_table.php` | `AddressItemEnum::columns()` con 3 argomenti (API obsoleta) | `columnsWithLegacy($table, null)` / `columnsWithLegacy($table, $this)` |
| TechPlanner | `2026_02_22_000000_create_profiles_table.php` | PHPDoc rimossi, `getColumnListing` su Connection, `use ($tableName)` inutili | Ripristino `ce96248f` (Schema + tipizzazione `stdClass`) |
| Xot | `XotBaseWizardWidget.php` | `view()` richiede `view-string` | `@var view-string $publicWizardView` prima di `->view()` |

### Lezione

Dopo sweep marker Git: **sempre** rieseguire PHPStan su `Modules` — i marker in `XotBaseServiceProvider` bloccano l'intero bootstrap Larastan; le migrazioni corrotte passano `php -l` ma falliscono a livello 10.

## File corretti in sessione merge (parse unblock)

- `XotBaseMigration.php` — rimossi `Filament\Table`, `Eloquent\Builder` spurii
- `HasRecursiveRelationshipsContract.php` — rimossi doppi `Builder`
- `SetDefaultRolesBySocialiteUserAction.php` — solo `Eloquent\Builder`
- `ArticleContent.php` + campi Filament Blog/Cms — rimosso `Eloquent\Builder`
- `Result.php`, `ImportCsvAction.php` — un solo tipo `Builder`
- `Cms\Models\Menu.php` — `Eloquent\Builder` al posto di Staudenmeir import
- `GenerateFormByFileAction.php` — import `QueueableAction`
- `UserSeeder.php`, `User/database/seeders/UserSeeder.php` — restore master

Dettaglio: [phpstan-fixes-log](../../../laravel/Modules/Xot/docs/wiki/concepts/phpstan-fixes-log.md) Fix #2.
