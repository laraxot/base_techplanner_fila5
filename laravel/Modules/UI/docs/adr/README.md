---
title: "ADR — UI"
type: index
tags: [adr, decisioni, ui]
created: 2026-11-18
updated: 2026-11-24
---

# ADR — UI

UI è un modulo di base usato da Cms, dai temi e dai pannelli: le sue decisioni riguardano soprattutto **i confini**
(cosa UI può sapere degli altri moduli) e **i blocchi di contenuto** (come si trovano, come si disegnano quando sono rotti).

**Quando leggerli**: prima di importare una classe di un altro modulo in UI, di aggiungere o rinominare un blocco
del page builder, o di cambiare cosa mostra `x-ui::render.block`.

Formato e regole: [action-behavioral-contract](../../../Xot/docs/rules/action-behavioral-contract.md) (5 sezioni,
`## Verifica` obbligatoria, nome = argomento senza date).

## Decisioni

- [Delega opzionale a Cms per i dati dei blocchi](optional-cms-delegation-for-block-data.md) — UI chiama il resolver di Cms per nome stringa, mai con `use`, e funziona senza Cms.
- [Scoperta dei blocchi per cartella](block-discovery-by-filament-blocks-folder.md) — i blocchi sono le classi in `app/Filament/Blocks` di ogni modulo; il nome deriva dalla classe.
- [Vista mancante: tipo sì, contenuto no](missing-block-view-shows-type-not-content.md) — un blocco rotto mostra un avviso con vista e tipo, mai i suoi dati.
