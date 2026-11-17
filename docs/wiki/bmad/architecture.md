---
title: "BMAD Architecture — indice"
type: index
tags: [bmad, architecture, migrations, data, frontmatter, github]
created: 2026-06-05
updated: 2026-06-06
qmd: "bmad architecture index data sacred one migration N models N migrations module parity frontmatter github"
story: STORY-140
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/23"
  - "https://github.com/laraxot/base_techplanner_fila5/issues/21"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/19"
related:
  - ./architecture-data-sacred-no-destructive-db.md
  - ./architecture-one-migration-per-model.md
  - ./architecture-migration-update-timestamps-only.md
  - ./architecture-module-model-artifact-parity.md
  - ./architecture-wiki-frontmatter-github.md
  - ./architecture-r12-english-only-view-paths.md
  - ./architecture-composer-module-dependency.md
  - ./architecture-module-providers-manifest.md
  - ./architecture-folio-page-shell.md
  - ./architecture-models-contracts-placement.md
  - ../concepts/hackernoon-ai-coding-tips-fixcity-map.md
  - ../rules/wiki-markdown-frontmatter-mandatory.md
---

# `/bmad/architecture` — indice

Cinque pilastri **non negoziabili** prima di toccare schema DB, migrazioni, test o nuova documentazione wiki.

## 1. I dati sono sacri

**Mai** comandi che forzano, resettano o cherry-pickano migrazioni.

| Vietato | Consentito |
|---------|------------|
| `migrate --force` | `php artisan migrate` |
| `migrate --path=.../singolo_file.php` | `php artisan migrate --database=fixcity` |
| `migrate:fresh` / `refresh` / `db:wipe` | Edit migrazione owner + bump timestamp + `migrate` |
| `RefreshDatabase` nei test | `DatabaseTransactions` |

→ [architecture-data-sacred-no-destructive-db.md](./architecture-data-sacred-no-destructive-db.md)  
→ [data-sacred-no-destructive-db.md](../rules/data-sacred-no-destructive-db.md)  
→ `.cursor/rules/data-sacred-no-destructive-db.mdc` (alwaysApply)

## 2. Un modello = una migrazione (N modelli = N `create_*`)

**Un solo** `create_{table}_table.php` per modello/tabella owner nel modulo. Se il modulo **Pippo** ha **20** modelli owner → **20** migrazioni `create_*` (né di più, né di meno). Evoluzione = edit file + **bump timestamp** nel nome.

→ [architecture-one-migration-per-model.md](./architecture-one-migration-per-model.md)  
→ [one-migration-per-model.md](../rules/one-migration-per-model.md)  
→ `.cursor/rules/one-migration-per-model.mdc` (alwaysApply)  
→ Issue [#23](https://github.com/laraxot/base_techplanner_fila5/issues/23)

### 2b. Colonne audit — solo `updateTimestamps`

**Mai** `$table->timestamps()` / `softDeletes()` / `string created_by` se usi già `updateTimestamps()` in `tableUpdate`.

→ [architecture-migration-update-timestamps-only.md](./architecture-migration-update-timestamps-only.md)  
→ `.cursor/rules/migration-update-timestamps-only.mdc` (alwaysApply)

## 3. Parità per modulo (N = N = N = N)

**N** modelli persistibili owner ⇒ **N** `create_*` + **N** factory + **N** seeder entità.

```bash
bashscripts/tools/audit-module-artifact-parity.sh <ModuleName>
bashscripts/tools/audit-all-modules-artifact-parity.sh
```

→ [architecture-module-model-artifact-parity.md](./architecture-module-model-artifact-parity.md)  
→ `.cursor/rules/module-model-artifact-parity.mdc` (alwaysApply)

## 4. Frontmatter YAML + GitHub (ogni `.md`)

Ogni pagina wiki creata/aggiornata dall’agente: `title`, `type`, `tags`, `created`, `updated`, `qmd`, **`issues`**, **`discussions`** (URL completi).

→ [architecture-wiki-frontmatter-github.md](./architecture-wiki-frontmatter-github.md)  
→ [wiki-markdown-frontmatter-mandatory.md](../rules/wiki-markdown-frontmatter-mandatory.md)  
→ `.cursor/rules/wiki-markdown-frontmatter-mandatory.mdc` (alwaysApply)

## 5a. Composer — pacchetto nel modulo owner

**Mai** `composer require <pkg-dominio>` nel root. Owner dichiara in `Modules/<Owner>/composer.json`; merge-plugin installa in `laravel/vendor/`.

| Pacchetto | Owner |
|-----------|-------|
| `laravel/folio` | Cms |
| `spatie/laravel-activitylog` | Activity |
| `spatie/laravel-pdf` | Xot |

→ [architecture-composer-module-dependency.md](./architecture-composer-module-dependency.md)  
→ [composer-module-dependency-go.md](../rules/composer-module-dependency-go.md)  
→ `.cursor/rules/composer-module-dependency-go.mdc` (alwaysApply)

## 5b. Module providers — manifest SSoT

Provider di dominio in **`module.json`** + **`composer.json`** `extra.laravel.providers`. **Vietato** `$this->app->register(FooServiceProvider::class)` nel provider padre del modulo.

Eccezione: `XotBaseServiceProvider` registra solo `RouteServiceProvider` + `EventServiceProvider`.

```bash
bash bashscripts/tools/audit-module-provider-manifest.sh Comment
```

→ [module-providers-manifest.md](../rules/module-providers-manifest.md) · [memory](../memories/module-providers-manifest-not-manual-register.md) · `.cursor/rules/module-providers-manifest.mdc`

## FO ticket — commenti Spatie

→ [architecture-ticket-fo-spatie-comments.md](./architecture-ticket-fo-spatie-comments.md) · STORY-157

## 5. R12 — view path Blade solo inglese

Path file, `@include`, `<x-*>`: **inglese** (`ticket`, `cta/ticket`). Mai token italiani (`segnalazione`) nel codice — l'italiano è in `lang/`.

Caso `/it` 500: include `cta.segnalazione` su file inesistente; canonico `cta.ticket` + `ticket.blade.php`.

→ [architecture-r12-english-only-view-paths.md](./architecture-r12-english-only-view-paths.md)  
→ [no-italian-component-names.md](../../../laravel/Themes/Sixteen/docs/wiki/rules/no-italian-component-names.md)  
→ [STORY-146](../../stories/STORY-146-r12-sixteen-full-rename-plan.md)

## Filosofia (zen)

Il database è **memoria viva** del dominio e del cliente. Gli agenti non la bruciano per comodità. Le migrazioni sono **promesse in sequenza** (`migrate`), non scorciatoie (`--path` + `--force`). La documentazione senza frontmatter + GitHub è **memoria senza radici**.

## LLM wiki (second brain)

Conoscenza in `docs/wiki/` + moduli; retrieval: `bashscripts/docs/llm-wiki-qmd.sh search "dati sacri migrate"` poi `update` dopo edit.

→ [hackernoon-ai-coding-tips-fixcity-map.md](../concepts/hackernoon-ai-coding-tips-fixcity-map.md) — Tips 001–022 + code review adattati  
→ [llm-wiki-operational-discipline.md](../concepts/llm-wiki-operational-discipline.md)  
→ `bashscripts/tools/prompts/llm-wiki.txt` (router compatto, no dump URL)

## 6. Provider modulo — `module.json` + `composer.json`

**Vietato** `$this->app->register(FooServiceProvider::class)` nel provider padre del modulo. Ogni provider di dominio → manifest nwidart + `extra.laravel.providers`.

```bash
bashscripts/tools/audit-module-provider-manifest.sh <ModuleName>
```

→ [architecture-module-providers-manifest.md](./architecture-module-providers-manifest.md)  
→ `.cursor/rules/module-providers-manifest.mdc` (alwaysApply)

## 7. Folio FO shell (Sixteen)

Lista `[container0]/index` → `name('container0.index')`, mount lineare `$pageSlug = $container0.'.index'`. **Mai** `container0.list`, **mai** logica dominio (`CmsPage`, locale→`home`) nel mount — semantica in JSON CMS; home in `pages/index.blade.php`.

**Shell pagina:** file Folio = blocco PHP (`name()` + `mount()`) + `<x-layouts.app>` + `@volt` statico. **Vietato** `@props`, `@extends('layouts.app')`, `@section`, `@php $pageSlug`.

```bash
bashscripts/tools/audit-folio-page-shell.sh Sixteen
```

→ [architecture-folio-page-shell.md](./architecture-folio-page-shell.md)  
→ [folio-container0-index-filament-way.md](../memories/folio-container0-index-filament-way.md)  
→ `.cursor/rules/folio-page-shell-no-props-extends.mdc` (alwaysApply)

## 9. Models/Contracts vs `app/Contracts`

Capacità **solo Model** → `app/Models/Contracts/`. Boundary cross-modulo → `app/Contracts/` o `Modules\Xot\Contracts\`.

Caso `CanComment`: `Modules\Comment\Models\Contracts\CanComment` (non `app/Contracts/`).

→ [architecture-models-contracts-placement.md](./architecture-models-contracts-placement.md)  
→ [adr-models-contracts-vs-app-contracts.md](../../../laravel/Modules/Comment/docs/wiki/decisions/adr-models-contracts-vs-app-contracts.md)

## 8. AI harness (Tips 001–022)

Prima di sessioni lunghe o refactor cross-module:

| Obbligo | Path |
|---------|------|
| Mappa tips | [hackernoon-ai-coding-tips-fixcity-map.md](../concepts/hackernoon-ai-coding-tips-fixcity-map.md) |
| Piano read-only (Tip 003) | Story/dev-story approvata |
| Context compact (Tip 009) | QMD `--limit 5`, context-mode |
| No workslop (Tip 006/021) | PHPStan + diff umano |

Owner locali: Xot (canon), Fixcity, Sixteen — vedi tabella in mappa HackerNoon.

## Collegamenti

- [bmad INDEX](./INDEX.md)
- [00-TRIGGER_MAP](../rules/00-TRIGGER_MAP.md)
- [memories/data-sacred-no-destructive-db.md](../memories/data-sacred-no-destructive-db.md)
