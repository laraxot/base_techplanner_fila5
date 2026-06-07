---
title: "BMAD v6 Project-Local Installation"
type: concept
status: active
created: 2026-05-27
updated: 2026-05-27
tags: [bmad, installation, claude, on-demand]
related:
  - ../skills/bmad-on-demand-routing.md
  - ../rules/bmad.md
  - ../../../bashscripts/tools/install-bmad-v6-project.sh
---

# BMAD v6 Project-Local Installation

Decisione: BMAD Method v6 da `aj-geddes/claude-code-bmad-skills` si installa a livello progetto, non globalmente.

Il payload completo resta in `bmad-skills/bmad-v6/`. `.claude/skills/bmad/SKILL.md` e `.claude/commands/bmad/*.md` sono router leggeri che caricano solo il comando o la skill richiesta. Bootstrap e prompt non devono incorporare contenuti BMAD completi.

Comando canonico:

```bash
bashscripts/tools/install-bmad-v6-project.sh
```

La cartella legacy `_bmad/` puo' essere letta solo per artifact storici gia' citati da issue o wiki; non usarla come sorgente per nuovi workflow BMAD v6.
