---
title: "Standing — composer modulo + go + no vendor locale"
type: memory
tags: [composer, module, standing, merge-plugin, phpstan, class-not-found]
created: 2026-06-06
updated: 2026-06-06
qmd: "standing memory composer module dependency go delete vendor merge plugin phpstan class not found spatie laravel pdf folio cms activitylog"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/16"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/17"
related:
  - ../rules/composer-module-dependency-go.md
  - ../bmad/architecture-composer-module-dependency.md
  - ../../../laravel/Modules/Xot/docs/wiki/concepts/spatie-laravel-pdf-module-dependency.md
  - ../../../laravel/Modules/Cms/docs/wiki/concepts/laravel-folio-module-dependency.md
  - ../../../laravel/Modules/Activity/docs/wiki/concepts/spatie-activitylog-module-dependency.md
---

# Standing — non dimenticare composer modulo

## Se PHPStan dice `class.notFound` su pacchetto Spatie/terze parti

1. **Investigare** — il pacchetto è in `Modules/<Owner>/composer.json`?
2. **Non** mettere il require nel root `laravel/composer.json`
3. `rm -rf laravel/Modules/<Owner>/vendor`
4. `cd laravel && php -d memory_limit=-1 composer.phar update -W`
5. Verificare `laravel/vendor/<pkg>` e PHPStan sul file

## Audit (guard automatico)

```bash
bash bashscripts/tools/check-composer-module-dependency-owners.sh
```

Verifica: root pulito; `folio` in Cms; `activitylog` in Activity; nessun `Modules/*/vendor/` stale.

## Anti-pattern da evitare

- Duplicare action in `tests/Support` invece di fixare dipendenza (violazione DRY)
- Bypass con Browsershot diretto quando `spatie/laravel-pdf` è il contratto del modulo
- **`laravel/folio` nel root o in Xot** — owner **Cms** (`FolioVoltServiceProvider`)
- **`spatie/laravel-activitylog` nel root** — owner **Activity**

## Tabella owner rapida

| Pacchetto | Owner |
|-----------|-------|
| `laravel/folio` | Cms |
| `spatie/laravel-activitylog` | Activity |
| `spatie/laravel-pdf` | Xot |

## Trigger

`00-TRIGGER_MAP` → riga **Composer / pacchetto modulo / class.notFound**
