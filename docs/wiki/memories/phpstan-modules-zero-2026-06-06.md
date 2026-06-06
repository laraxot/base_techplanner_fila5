---
title: "PHPStan Modules — zero errori sessione swarm"
type: memory
tags: [phpstan, swarm, quality-gate, fatal, override, comment]
created: 2026-06-06
updated: 2026-06-06
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

# PHPStan Modules — 103 → 0 (swarm)

## Comando canon

```bash
cd laravel && ./vendor/bin/phpstan analyse --memory-limit=-1
```

**Mai** modificare `phpstan.neon` né baseline per mascherare errori.

## Blocker prima dell'analisi (fatal PHP)

| Problema | Fix |
|----------|-----|
| `Blog\Article` + `Spatie\Comments\HasComments` (pacchetto assente) | Rimuovere trait/import Comment |
| `User\BaseUser` + `Modules\Comment\InteractsWithComments` | User non dipende da Comment |
| `Employee` widget `#[Override]` su metodi assenti nel parent | Estendere `XotBaseSchemaWidget`; rimuovere Override invalidi |

PHPStan **non parte** se un fatal blocca l'autoload — fixare prima dei tipi.

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
./vendor/bin/phpstan analyse --memory-limit=-1
# [OK] No errors — 4914 file
```
