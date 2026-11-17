---
created: 2026-09-26
qmd: "module root uppercase folders archive"
issues: []
discussions: []
<<<<<<< HEAD
title: "Archivio Modules.bak: modulo Notify"
=======
title: "Archivio Modules.bak — modulo Notify"
>>>>>>> laraxot/dev
type: concept
module: Notify
status: active
tags: [module-structure, archive, docs]
updated: "2026-06-30"
related:
  - ../../../../../../docs/project/module-root-structure-analysis.md
  - ../../../../../Xot/docs/wiki/concepts/module-root-uppercase-folders-archive.md
---

<<<<<<< HEAD
# Archivio `Modules.bak/`: Notify
=======
# Archivio `Modules.bak/` — Notify
>>>>>>> laraxot/dev

## Situazione

Path anomalo: `Modules/Xot/docs/llm-wiki-integration.md` sotto Notify (non è un sottomodulo reale).

## Regola

La root di Notify non deve contenere una cartella `Modules/` (PascalCase). Documentazione Xot va in `Modules/Xot/docs/`.

## Azione

`Modules/` → `Modules.bak/` (2026-06-30). Da discutere: spostare il markdown in Xot o in `docs/project/` e poi rimuovere l’archivio.
