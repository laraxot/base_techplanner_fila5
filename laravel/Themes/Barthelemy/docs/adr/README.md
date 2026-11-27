---
title: "ADR del tema Barthelemy"
type: index
tags: [adr, decisioni, barthelemy]
created: 2026-11-24
updated: 2026-11-24
---

# ADR del tema Barthelemy

Barthelemy e' uno **stub**: `theme.json` lo dichiara `active: false` e il pacchetto contiene solo configurazioni di build
(`package.json`, `vite.config.js`, `tailwind.config.js`) e documentazione; nessuna vista, nessun codice PHP. Non ci sono
ancora scelte tra due forme di codice da motivare, quindi nessun ADR.

**Quando scriverne uno:** alla prima decisione reale (a quale tipo di sito serve, da quale tema parte, come si serve la
build). Formato: [regola del canon](../../../../Modules/Xot/docs/rules/action-behavioral-contract.md). Finche' il tema e'
vuoto, le decisioni valide per tutti i temi sono negli ADR di Xot (es. asset via symlink
`public_html/themes/<Tema>`, `Modules/Xot/docs/wiki/rules/theme-public-symlink.md`).

## Decisioni

Nessuna.
