<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
---
title: "Conflict resolution — MetatagFacadeAdapter"
type: troubleshooting
module: Seo
tags: [git, merge-conflict, metatag, facade, forward-only]
created: 2026-07-24
updated: 2026-07-24
qmd: "Seo merge conflict MetatagManager MetatagFacadeAdapter SocialShareWidget"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/42"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/43"
related:
  - ./wiki/concepts/metatag-data-contract.md
  - ./wiki/concepts/no-app-support-queueable-actions.md
  - ../../../../docs/chat/gitmodules-multi-repo-sync.md
  - ../../../../bashscripts/tools/prompts/17-gitmodules-path-iteration.md
---

# Conflict resolution — Metatag facade

## Perché

Durante l’iterazione `gitmodules.ini` (prompt 17) risultavano marker `<<<<<<<` in provider, facade, widget e test Seo. HEAD usava `MetatagManager`; `laraxot/dev` usava `MetatagFacadeAdapter` + `MetatagState` + Actions.

## Canone scelto

| Pezzo | Scelta | Motivo |
|-------|--------|--------|
| Binding | `MetatagFacadeAdapter` + `MetatagState` | Docs modulo + test Feature già su Adapter |
| Facade accessor | `MetatagFacadeAdapter::class` | API facade → Actions via adapter |
| Widget | `$view` esplicito + `XotBaseSchemaWidget` | View Blade social-share |
| Test action | `app(...)->execute()` | Convenzione QueueableAction |

`MetatagManager.php` resta nel tree come codice legacy non wired (candidato Ponytail, non cancellato qui).

## File toccati

- `app/Providers/SeoServiceProvider.php`
- `app/Facades/Metatag.php`
- `app/Filament/Widgets/SocialShareWidget.php`
- test Unit: Providers, Facades, Actions, SocialShareWidget

## Validazione

- Marker PHP Seo: **0**
- `php -l` OK sui file risolti
- Pest Seo: fallito per bootstrap Tenant → `Modules/Blog/.../Article.php` mancante (preesistente, fuori Seo)

## Collegamenti

- [metatag-data-contract.md](./wiki/concepts/metatag-data-contract.md)
- Prompt: [17-gitmodules-path-iteration.md](../../../../bashscripts/tools/prompts/17-gitmodules-path-iteration.md)
=======
=======
>>>>>>> 7ec200b (.)
=======
>>>>>>> d20252d (.)
=======
>>>>>>> 77e0353 (.)
=======
>>>>>>> fc52fe0 (.)
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
# Conflict Resolution — Module Seo

## Summary
- **Files resolved**: 4
- **Strategy**: Keep HEAD/local (ours) side
- **Root cause**: Nested stash-on-merge conflicts

## Documentation Files
- docs/README.md
- docs/cyclomatic-complexity-report.md
- docs/duplicate-methods-analysis.md

## Config Files
- composer.json

## Backlinks
- [Root conflict resolution report](../../../../docs/conflict-resolution-report.md)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> cf01f0b (.)
=======
>>>>>>> 7ec200b (.)
=======
>>>>>>> d20252d (.)
=======
>>>>>>> 77e0353 (.)
=======
>>>>>>> fc52fe0 (.)
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
