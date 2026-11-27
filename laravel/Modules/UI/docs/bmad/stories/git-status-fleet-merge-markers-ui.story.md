---
title: "Story — bonifica marker merge residui modulo UI"

title: "Story: bonifica marker merge residui modulo UI"
type: story
module: UI
epic: quality
status: done
related:
  - ../../../Xot/docs/bmad/stories/merge-marker-fleet-residue.story.md

  - ../../../../Xot/docs/bmad/stories/merge-marker-fleet-residue.story.md
updated: 2026-10-23
tags: [docs, ui, bmad]
qmd: "git-status-fleet-merge-markers-ui ui"
---

# git-status-fleet-merge-markers-ui

Bonifica dei marker di merge conflict committati da "laraxot" nel modulo `laravel/Modules/UI`
(``legacy/filament-components-usage.md`, `roadmap/roadmap.md`, `conflitti_merge_risolti.md`,


`legacy/filament-components-usage.md`, `roadmap/roadmap.md`, `conflitti_merge_risolti.md`,
`_archive/conflitti_merge_risolti.md`, `_archive/filament_components_usage.md`.

### Esito verifica

- `grep -rn '^<<<<<<<\|^=======$\|^>>>>>>>\|^|||||||'` su `laravel/Modules/UI` → **0 hit**.
- File con menzioni `<<<<<<<` in prosa/backtick (story/doc sui marker): lasciati intatti.
- `PHILOSOPHY.md` (1311 righe, doc diverso e più ricco di `philosophy.md`) **mantenuto**:
  contenuto distinto, non un duplicato — solo naming non conforme (segnalato).
- Debris `ours+theirs` residui (righe duplicate consecutive) restano in ~35 file NON nel pack
  (es. `readme.md`, `frontend.md`, `studio-card-selector-implementation.md`,
  `overview-extended.md`): non toccati, fuori scope del pack — da instradare a batch dedicato.
- `docs/raw/root-import/` contiene varianti `-1` dei doc importati (es. `changelog-1.md`):
  non toccate, area `raw/` dichiarata immutable dal wiki schema.

  contenuto distinto, non un duplicato: solo naming non conforme (segnalato).
- Debris `ours+theirs` residui (righe duplicate consecutive) restano in ~35 file NON nel pack
  (es. `readme.md`, `frontend.md`, `studio-card-selector-implementation.md`,
  `overview-extended.md`): non toccati, fuori scope del pack — da instradare a batch dedicato.
- `docs/raw/root-import/` contiene varianti `-1` dei doc importati (es. `changelog-1.md`):
  non toccate, area `raw/` dichiarata immutable dal wiki schema.
  `overview-extended.md`): non toccati, fuori scope del pack: da instradare a batch dedicato.
