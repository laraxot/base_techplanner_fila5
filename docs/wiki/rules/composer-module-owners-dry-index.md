---
title: "Composer Module Owners — DRY Index"
type: concept
tags: [composer, module, owner, index, dry, standing, canonical]
created: 2026-06-06
updated: 2026-06-06
qmd: "composer module owners index dry executable shell"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/17"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/18"
related:
  - ../rules/composer-module-dependency-go.md
  - ../memories/composer-module-dependency-go-standing.md
---

# Composer Module Owners — DRY Index (eseguibile)

## Regola

Ogni pacchetto PHP ha **un solo owner modulo**. Mai nel root `laravel/composer.json`.

## Tabella owner canone

| Pacchetto | Owner | Module composer.json |
|-----------|-------|---------------------|
| `laravel/folio` | Cms | `laravel/Modules/Cms/composer.json` |
| `spatie/laravel-activitylog` | Activity | `laravel/Modules/Activity/composer.json` |
| `spatie/laravel-pdf` | Xot | `laravel/Modules/Xot/composer.json` |
| `spatie/laravel-schemaless-attributes` | Xot | `laravel/Modules/Xot/composer.json` |
| `spatie/laravel-model-states` | Xot | `laravel/Modules/Xot/composer.json` |
| `spatie/laravel-tags` | Xot | `laravel/Modules/Xot/composer.json` |
| `spatie/laravel-sluggable` | Xot | `laravel/Modules/Xot/composer.json` |
| `spatie/laravel-health` | Xot | `laravel/Modules/Xot/composer.json` |
| `spatie/laravel-data` | Xot | `laravel/Modules/Xot/composer.json` |
| `spatie/laravel-queueable-action` | Xot | `laravel/Modules/Xot/composer.json` |
| `spatie/laravel-permission` | Xot | `laravel/Modules/Xot/composer.json` |
| `spatie/laravel-medialibrary` | Media | `laravel/Modules/Media/composer.json` |
| `spatie/laravel-sitemap` | Seo | `laravel/Modules/Seo/composer.json` |
| `coolsam/panel-modules` | Xot | `laravel/Modules/Xot/composer.json` |
| `livewire/volt` | Cms | `laravel/Modules/Cms/composer.json` |

## Script DRY

```bash
bash bashscripts/tools/composer-owners-index.sh --list    # mostra tabella
bash bashscripts/tools/composer-owners-index.sh --check  # verifica root composer
bash bashscripts/tools/composer-owners-index.sh --find folio  # trova owner
```

## Workflow corretto

1. Require in `laravel/Modules/<Owner>/composer.json`
2. `rm -rf laravel/Modules/<Owner>/vendor`
3. `cd laravel && php -d memory_limit=-1 composer.phar update -W`
4. Verifica `laravel/vendor/<package>` + PHPStan sul file che importa

## Anti-pattern

- `composer require <pkg>` nel root Laravel — **mai**
- Pacchetto in `laravel/composer.json` ma usato solo da un modulo
- `Modules/*/vendor/` stale dopo merge

## See Also

- [rules/composer-module-dependency-go.md](../rules/composer-module-dependency-go.md)
- [CMS/laravel-folio-module-dependency.md](../../laravel/Modules/Cms/docs/wiki/concepts/laravel-folio-module-dependency.md)
- [Activity/spatie-activitylog-module-dependency.md](../../laravel/Modules/Activity/docs/wiki/concepts/spatie-activitylog-module-dependency.md)