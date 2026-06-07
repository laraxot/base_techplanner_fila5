---
title: "Memory — bootstrap second brain TechPlanner 2026-06-06"
type: memory
tags: [second-brain, bootstrap, qmd, folio, llm-wiki]
created: 2026-06-06
updated: 2026-06-06
qmd: "techplanner second brain bootstrap 2026 wiki qmd collections folio semantic dirs sync delete"
related:
  - ../concepts/second-brain-techplanner-efficiency.md
  - ../how-to/qmd-search-guide.md
---

# Memory — bootstrap second brain 2026-06-06

## Gap iniziale

- Root `docs/wiki/` assente; QMD con 34k file repo-wide; 0 embed; stub monolitici.

## Fix applicati

- Bootstrap wiki root, tier collections, rimosso `base_techplanner_fila5` (34k file).
- Sync rules mirror; **concepts merge** (no `--delete-after` su concepts).
- Folio Sixteen: semantic dirs → tests / `[container0]`.

## Lezione critica

`sync-wiki-rules-from-ai.sh` con `--delete-after` su concepts **cancella** pagine scritte solo in `docs/wiki/`. Rules = mirror; concepts root = merge + pagine locali.
