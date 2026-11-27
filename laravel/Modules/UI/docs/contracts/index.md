---
title: "INDEX contratti — UI"
type: index
module: UI
owner: UI
updated: 2026-11-26
qmd: "UI contract INDEX invarianti copertura pest group UI-BLOCKS UI-BLOCKDATA UI-USERDATA UI-ICONS UI-DAYS UI-CALENDAR"
---

# INDEX contratti — UI

Registro dei contratti: per ciascuno quante invarianti ci sono e quali hanno un test con `->group('<ID>')`. I comandi si eseguono da `laravel/`. Elenco completo, scopo e backlog: [README](README.md).

| Classe | Contratto | Invarianti | Con group (`INV-n`) | Comando di esempio |
|---|---|---|---|---|
| GetAllBlocksAction | [get-all-blocks-action](get-all-blocks-action.md) | 2 | 1, 2 | `vendor/bin/pest --group=UI-BLOCKS-INV-1` |
| GetLocalizedBlockDataAction | [resolve-localized-block-data-action](resolve-localized-block-data-action.md) | 4 | 1, 2, 3, 4 | `vendor/bin/pest --group=UI-BLOCKDATA-INV-1` |
| GetUserDataAction | [get-user-data-action](get-user-data-action.md) | 5 | 1, 2, 3, 4, 5 | `vendor/bin/pest --group=UI-USERDATA-INV-1` |
| GetAllIconsAction | [get-all-icons-action](get-all-icons-action.md) | 6 | 1, 2, 3, 4, 5 | `vendor/bin/pest --group=UI-ICONS-INV-1` |
| GetDaysMappingAction | [get-days-mapping-action](get-days-mapping-action.md) | 4 | nessuno | — |
| ApplyCalendarToPanelAction | [apply-calendar-to-panel-action](apply-calendar-to-panel-action.md) | 3 | nessuno | — |

Un'invariante è dimostrata solo se esiste un test con `->group('<ID>')` (`rg -n "group\('UI-" Modules/UI/tests`); un test che prova il comportamento senza il group conta come non dimostrato.
