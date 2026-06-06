---
title: "PHPStan class.notFound — spatie/laravel-pdf / Browsershot"
type: troubleshooting
module: Xot
tags: [phpstan, spatie, laravel-pdf, browsershot, composer]
created: 2026-06-05
updated: 2026-06-06
qmd: "phpstan class not found spatie laravel pdf browsershot composer module vendor merge"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/11"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/12"
related:
  - ../concepts/spatie-laravel-pdf-module-dependency.md
  - ../../../../../../docs/wiki/rules/composer-module-dependency-go.md
---

# class.notFound su Pdf / Browsershot

## Sintomo

```
Call to static method view() on an unknown class Spatie\LaravelPdf\Facades\Pdf
```

## Causa

- Pacchetto non in `Modules/Xot/composer.json`, oppure
- `Modules/Xot/vendor/` locale stale, oppure
- Merge-plugin non rieseguito dopo edit `composer.json`

## Fix (canon)

1. Conferma `"spatie/laravel-pdf": "^2.11"` in `Modules/Xot/composer.json`
2. `rm -rf laravel/Modules/Xot/vendor`
3. `cd laravel && php -d memory_limit=-1 composer.phar update -W`
4. Action usa `Pdf::view()` — vedi [spatie-laravel-pdf-module-dependency.md](../concepts/spatie-laravel-pdf-module-dependency.md)

## Verifica

```bash
cd laravel && ./vendor/bin/phpstan analyse Modules/Xot/app/Actions/Pdf/MakePdfSpatieTestAction.php --memory-limit=-1
```

**Non** sostituire con Browsershot manuale se il contratto modulo è `laravel-pdf`.
