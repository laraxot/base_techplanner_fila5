---
title: "BMAD Architecture — dipendenze Composer per modulo owner"
type: rule
tags: [bmad, architecture, composer, module, dependency, merge-plugin]
created: 2026-06-06
updated: 2026-06-06
qmd: "bmad architecture composer module dependency owner folio cms activitylog activity root merge plugin"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/11"
  - "https://github.com/laraxot/base_techplanner_fila5/issues/248"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/12"
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/249"
related:
  - ../rules/composer-module-dependency-go.md
  - ../memories/composer-module-dependency-go-standing.md
  - ./architecture.md
  - ../../../laravel/Modules/Xot/docs/composer-module-dependency-management.md
---

# Pilastro BMAD — Composer modulo owner

## Politica (religione Laraxot)

**Un pacchetto = un modulo owner.** La root `laravel/composer.json` gestisce solo:

- PHP, framework shell, Filament globale se necessario
- `nwidart/laravel-modules`
- `wikimedia/composer-merge-plugin` (`Modules/*/composer.json`)

**Mai** `composer require <pkg-dominio>` nel root.

## Tabella owner (esempi verificati)

| Pacchetto | Modulo owner | Motivo |
|-----------|--------------|--------|
| `laravel/folio` | **Cms** | `FolioVoltServiceProvider`, routing FO |
| `spatie/laravel-activitylog` | **Activity** | audit trail dominio |
| `spatie/laravel-pdf` | **Xot** | `MakePdfSpatieTestAction` |
| `socialiteproviders/*` | **User** | OAuth / login |

## Filosofia

| Zen | Significato |
|-----|-------------|
| **Religione** | Modulo = contratto Composer autonomo e pubblicabile |
| **Politica** | Root immutabile per dipendenze di dominio |
| **Visione** | Merge-plugin unifica in un solo `laravel/vendor/` |
| **KISS** | Un owner, un require, zero duplicati cross-modulo |
| **DRY** | Documentazione nel modulo owner; regola cross-cutting in wiki root |

## Workflow obbligatorio

```bash
# 1. Edit Modules/<Owner>/composer.json
# 2. Rimuovi require errato da laravel/composer.json se presente
rm -rf laravel/Modules/<Owner>/vendor
cd laravel && php -d memory_limit=-1 composer.phar update -W
```

## Audit automatico

```bash
bash bashscripts/tools/check-composer-module-dependency-owners.sh
```

Integrato in `bashscripts/quality-gates/verify-llm-wiki.sh`.

## Audit rapido (manuale)

```bash
bashscripts/tools/check-composer-module-dependency-owners.sh
rg 'laravel/folio|spatie/laravel-activitylog' laravel/composer.json   # deve essere vuoto
rg 'laravel/folio' laravel/Modules/Cms/composer.json                   # deve matchare
rg 'spatie/laravel-activitylog' laravel/Modules/Activity/composer.json
```

## Documentazione owner

- [laravel-folio-module-dependency.md](../../../laravel/Modules/Cms/docs/wiki/concepts/laravel-folio-module-dependency.md)
- [spatie-activitylog-module-dependency.md](../../../laravel/Modules/Activity/docs/wiki/concepts/spatie-activitylog-module-dependency.md)
- [spatie-laravel-pdf-module-dependency.md](../../../laravel/Modules/Xot/docs/wiki/concepts/spatie-laravel-pdf-module-dependency.md)

## GitHub (tracciamento)

| Tipo | URL |
|------|-----|
| Issue composer | https://github.com/laraxot/base_techplanner_fila5/issues/11 |
| Issue BMAD | https://github.com/laraxot/base_techplanner_fila5/issues/248 |

## Collegamenti

- [architecture.md](./architecture.md) — indice pilastri
- [composer-module-dependency-go.md](../rules/composer-module-dependency-go.md)
- Trigger: [00-TRIGGER_MAP.md](../rules/00-TRIGGER_MAP.md) → riga Composer
