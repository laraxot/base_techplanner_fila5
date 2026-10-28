---
title: "Architecture — Theme Zero"
type: index
theme: Zero
status: active
created: 2026-10-21
updated: 2026-10-21
tags: [theme, zero, architecture, index]
qmd: "theme zero architecture index presentazione blade asset confini xotbase"
related:
  - ../bmad/architecture.md
  - ../wiki/rules/architecture-rules.md
---

# Architettura — Theme Zero

Ingresso della cartella `architecture/`. Zero e' l'unico tema frontend attivo:
possiede viste Blade, asset e traduzioni; `app/` e' vuota e non contiene business
logic.

- [Architettura del tema](../bmad/architecture.md)
- [Regole architetturali](../wiki/rules/architecture-rules.md)
- [Focus operativo](../wiki/concepts/theme-zero-operating-focus.md)
- [Mai estendere Filament direttamente](../concepts/xotbase-never-extend-filament.md)
- [Filament blueprint](../bmad/filament-blueprint.md)

Le decisioni di dominio restano nei moduli owner (Cms per pagine e blocchi,
Quaeris per survey e autorizzazione, Lang per autolabel e locale).
