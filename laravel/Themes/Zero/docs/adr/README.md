---
title: "ADR — Theme Zero"
type: index
owner: Zero
updated: 2026-11-24
qmd: "Theme Zero ADR architecture decision record MADR formato asset Vite symlink"
---

# ADR — Theme Zero

Un ADR del tema Zero registra una scelta difficile da invertire, sorprendente o frutto di un trade-off reale su struttura del tema, build degli asset e confini tra tema e moduli. Ogni affermazione ha un file di prova. Le decisioni di business restano negli ADR del modulo interessato. Template condiviso: [0000-template](../../../../Modules/Xot/docs/adr/0000-template.md).

## Formato MADR

Frontmatter (`title`, `type: decision`, `status`, `created`, `updated`, `decision-makers`, `module`, `qmd`) e sezioni nell'ordine: `## Contesto`, `## Driver della decisione`, `## Alternative scartate`, `## Decisione`, `## Conseguenze`, `## Conferma`. Nome file canonico `NNNN-slug.md` in kebab-case senza data; eccezioni: `README.md`, `INDEX.md` (stub superseded), `0000-template.md`, `index.md`.

## ADR presenti

Inventario canonico: [index.md](index.md). Presenti: [0001-auth-pages-render-module-widgets-with-panel-css](0001-auth-pages-render-module-widgets-with-panel-css.md), [0002-theme-as-dress-no-php](0002-theme-as-dress-no-php.md), [0003-theme-assets-are-built-in-theme-and-served-by-symlink](0003-theme-assets-are-built-in-theme-and-served-by-symlink.md).
