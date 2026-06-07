---
title: "Composer — dipendenze modulo + go (merge plugin)"
type: rule
tags: [composer, module, merge-plugin, laraxot, phpstan, dependency]
created: 2026-06-06
updated: 2026-06-06
qmd: "composer module dependency go delete vendor merge plugin phpstan class not found spatie laravel pdf Xot"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/16"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/17"
related:
  - ../memories/composer-module-dependency-go-standing.md
  - ../../laravel/Modules/Xot/docs/wiki/concepts/spatie-laravel-pdf-module-dependency.md
  - ../../laravel/Modules/Xot/docs/composer-module-dependency-management.md
  - ./00-TRIGGER_MAP.md
---

# Composer — dipendenze modulo + go

## Perché (filosofia)

Laraxot tratta ogni modulo come **unità autonoma**: le dipendenze PHP vivono in `Modules/<Owner>/composer.json` e convergono in **`laravel/vendor/`** tramite `wikimedia/composer-merge-plugin`. Il root `laravel/composer.json` non deve diventare un cestino di pacchetti di dominio.

| Principio | Significato |
|-----------|-------------|
| **Politica** | Owner chiaro per ogni pacchetto (es. PDF → Xot, OAuth → User) |
| **Religione** | Un solo vendor autorevole: `laravel/vendor/` |
| **Zen** | `rm module vendor` + `update -W` — niente stub in tests per mascherare `class.notFound` |

## Regola operativa (5 passi)

| # | Azione |
|---|--------|
| 1 | Aggiungi `require` in `laravel/Modules/<Owner>/composer.json` — **mai** `composer require` nel root per pacchetti modulo |
| 2 | `rm -rf laravel/Modules/<Owner>/vendor` (e `Modules/*/vendor` se presenti) |
| 3 | `cd laravel && php -d memory_limit=-1 composer.phar update -W` |
| 4 | Opzionale stack completo: `composer go` (include publish/migrate — usare solo se appropriato) |
| 5 | Verifica `laravel/vendor/<vendor>/<package>` + PHPStan sul file che importa la classe |

## Esempi canon owner (BMAD pilastro 5a)

| Pacchetto | Owner | Vietato in |
|-----------|-------|------------|
| `laravel/folio` | **Cms** | root, Xot |
| `spatie/laravel-activitylog` | **Activity** | root |
| `spatie/laravel-pdf` | **Xot** | root |

Doc modulo: [laravel-folio-module-dependency.md](../../laravel/Modules/Cms/docs/wiki/concepts/laravel-folio-module-dependency.md) · [spatie-activitylog-module-dependency.md](../../laravel/Modules/Activity/docs/wiki/concepts/spatie-activitylog-module-dependency.md) · [spatie-laravel-pdf-module-dependency.md](../../laravel/Modules/Xot/docs/wiki/concepts/spatie-laravel-pdf-module-dependency.md)

## Audit CI / pre-commit

```bash
bash bashscripts/tools/check-composer-module-dependency-owners.sh
```

## Esempio canon: `spatie/laravel-pdf`

- **Owner:** `Modules/Xot`
- **Require:** `"spatie/laravel-pdf": "^2.11"`
- **Uso:** `Spatie\LaravelPdf\Facades\Pdf` in `MakePdfSpatieTestAction.php`
- **Doc modulo:** [spatie-laravel-pdf-module-dependency.md](../../laravel/Modules/Xot/docs/wiki/concepts/spatie-laravel-pdf-module-dependency.md)

```bash
rm -rf laravel/Modules/Xot/vendor
cd laravel && php -d memory_limit=-1 composer.phar update -W
./vendor/bin/phpstan analyse Modules/Xot/app/Actions/Pdf/MakePdfSpatieTestAction.php --memory-limit=-1
```

## PHPStan `class.notFound`

Se PHPStan non trova `Spatie\LaravelPdf\Facades\Pdf`:

1. Investigare — il require è nel modulo **giusto**?
2. Esiste ancora `Modules/*/vendor/` stale?
3. Il pacchetto è in `laravel/vendor/spatie/laravel-pdf`?
4. **Non** spostare l'action in `tests/Support/` come workaround

## Vietato

- `composer require <pkg>` nel root per dipendenze di un solo modulo
- Lasciare `Modules/<Name>/vendor/` dopo merge
- Browsershot manuale nell'action quando il contratto è `laravel-pdf`

## Collegamenti

- `.cursor/rules/composer-module-dependency-go.mdc` (alwaysApply)
- [composer-module-dependency-go-standing.md](../memories/composer-module-dependency-go-standing.md)
- [00-TRIGGER_MAP.md](./00-TRIGGER_MAP.md) — riga Composer / class.notFound
