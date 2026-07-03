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
