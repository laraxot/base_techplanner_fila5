---
title: "INDEX ADR — UI"
type: index
module: UI
owner: UI
updated: 2026-11-26
qmd: "UI ADR INDEX 0001-0006 stato decisioni IDColumn blocks CMS"
---

# INDEX ADR — UI

| ADR | Stato | Sintesi |
|---|---|---|
| [0001-block-discovery-by-filament-blocks-folder](0001-block-discovery-by-filament-blocks-folder.md) | accepted | Scoperta blocchi da `app/Filament/Blocks` per modulo |
| [0002-idcolumn-mandatory-on-tables](0002-idcolumn-mandatory-on-tables.md) | accepted (mandato non rispettato: vedi Stato attuale) | Ogni tabella Filament espone `IDColumn` (self-link `#record-{id}`) |
| [0003-missing-block-view-shows-type-not-content](0003-missing-block-view-shows-type-not-content.md) | accepted | Vista mancante: avviso con tipo, mai il contenuto del blocco |
| [0004-optional-cms-delegation-for-block-data](0004-optional-cms-delegation-for-block-data.md) | accepted | Delega opzionale a Cms per dati blocco, senza dipendenza dura |
| [0005-ui-blocks-use-cms-localization](0005-ui-blocks-use-cms-localization.md) | accepted | Blocchi UI localizzati dal CMS con ripiego autonomo |
| [0006-ui-does-not-authorize-domain-data](0006-ui-does-not-authorize-domain-data.md) | proposed (nessun consumer: vedi Stato attuale) | UI è layer condiviso e non autorizza il dominio Geo |
| [id-column-mandatory-on-tables](id-column-mandatory-on-tables.md) | superseded da 0002 | Puntatore al vecchio nome senza numero |
| [optional-cms-delegation-for-block-data](optional-cms-delegation-for-block-data.md) | superseded da 0004 | Puntatore al vecchio nome senza numero |

Formato, copertura e decisioni aperte: [README](README.md).
