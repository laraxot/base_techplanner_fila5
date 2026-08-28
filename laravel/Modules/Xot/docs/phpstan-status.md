---
title: "PHPStan status — Xot / Modules"
type: status
module: Xot
updated: 2026-08-28
related:
  - ./stories/5.49.phpstan-modules-gate-ide-helper-neon-user.story.md
  - ./stories/5.48.phpstan-no-stale-ignore-casts-fix.story.md
  - ./phpstan-config-immutability.md
  - ../../../../docs/wiki/memories/phpstan-neon-user-contract.md
---

# PHPStan status

## Gate (neon utente — solo IO)

```bash
cd laravel && ./vendor/bin/phpstan analyse Modules --memory-limit=-1 --no-progress
# [OK] No errors — 2026-08-28 (XOT-5.49)
# 7592 file analizzati (app + tests Pest, no exclude Modules/*/tests)
```

Config: **`laravel/phpstan.neon`** — agenti **non** lo modificano.

### Contratto neon (utente)

| Sezione | Regola |
|---------|--------|
| `ignoreErrors:` | vuoto |
| `excludePaths` | no `Modules/*/tests/**` · no `Modules/*/tests/*` |
| `includes` | no `pest-internal-ignore.neon` |

## Per modulo (2026-08-28)

Tutti verdi: Activity, AI, Cms, Employee, Gdpr, Geo, Job, Lang, Media, Notify, Seo, TechPlanner, Tenant, UI, User, Xot.

## ide-helper

```bash
cd laravel
php artisan ide-helper:generate   # _ide_helper.php
php artisan ide-helper:meta       # .phpstorm.meta.php
php artisan ide-helper:models --nowrite   # _ide_helper_models.php
```

Post refresh: PHPStan Modules **0 errori**.

## Debito residuo (codice, non neon)

~200 `@phpstan-ignore` inline (Geo ComuneTest, UI model tests, trait.unused, …) — bonifica
modulo per modulo con fix tipi / `@method` / helper Pest (`TestCase::$currentTest`), mai
ignore nel neon.

## Storia campagne

- **XOT-5.45**: 848 → 0 (solo codice)
- **XOT-5.48**: ignore stale Media + casts() + Gdpr PestHelpers
- **XOT-5.49**: verifica gate + ide-helper con contratto neon utente
