---
title: "Handoff — quality gates execution prompt 03"
type: handoff
tags: [quality-gates, phpstan, pest, pint, preflight]
created: 2026-07-24
updated: 2026-07-24
qmd: "quality gates pint phpstan pest preflight prompt 03 v3"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/18"
discussions: []
related:
  - ./INDEX.md
  - ../wiki/concepts/quality-gate-canonical-commands.md
  - ../wiki/bmad/architecture-env-testing-parity.md
  - ../../bashscripts/tools/prompts/03-quality-gates.md
---

# Handoff — audit quality gates + prompt 03 v3

## Completato

| Voce | Esito |
|------|--------|
| Parse Xot `RegisterBladeComponentsActionTest` | `ComponentFileData::from([` OK (`php -l`) |
| Job `tests/feature/` | rimossa (dupe di `Feature/`) |
| Job `tests/unit/` | rimossa (dupe di `Unit/`; 20/23 identici, 3 preferiti da `Unit/`) |
| Prompt 03 | **v3.0.0** it-IT DRY (~134 righe): Pint → PHPStan → Pest, lock, `build/`, no RefreshDatabase |
| Lock prompt 03 | unlocked |

## Drift da conoscere

- BMAD: `.env.testing` = MySQL `*_test`; `phpunit.xml` **non** dovrebbe forzare DB.
- Reale: `phpunit.xml` setta ancora `sqlite` + `:memory:` → override vs `.env.testing`.
- Pest "Connection refused" = MySQL down **oppure** confusione env; non inventare canon SQLite in contrasto con BMAD senza decisione utente.

## Gate snapshot (agent paralleli)

| Gate | Exit | Note |
|------|------|------|
| PHPStan Modules | ≠0 / incompleto | ignoreErrors neon / scope; **non** editare `phpstan.neon` |
| Pint | OK su subset / fail su full se parse | |
| PHPMD `./tools/phpmd.sh` | 0 | |
| PHPInsights | spesso 1 | `composer.lock` / `--composer` |
| Merge `<<<<<<<` PHP | 0 | |

## Aperti (altri moduli)

Duplicati lowercase ancora presenti: `Media`, `Lang` (`tests/feature`+`unit`); `Activity` (`tests/tests/feature`+`unit`). Stesso pattern Job — dedupe prima di Pest full.

## Verifica rapida

```bash
test ! -d laravel/Modules/Job/tests/feature
test ! -d laravel/Modules/Job/tests/unit
php -l laravel/Modules/Xot/tests/Unit/Actions/Blade/RegisterBladeComponentsActionTest.php
```

— follow-up Composer dopo [Execute and improve 03-quality-gates](a7c80b47-b797-4734-ac6f-e33ad5c57625)
