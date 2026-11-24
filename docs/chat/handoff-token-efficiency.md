---
title: "Handoff — token efficiency 2026 + tool install"
type: chat
tags: [handoff, tokens, qmd, context-mode, second-brain]
created: 2026-07-24
updated: 2026-07-24
qmd: "handoff token efficiency query min-score context-mode obsidian"
---

# Handoff — token efficiency

## Fatto

- Install: `context-mode` globale (`~/.npm-global/bin`), `qmd skill install` → `.agents/skills/qmd` + symlink `.claude/skills/qmd`
- Wrapper: `bashscripts/docs/llm-wiki-qmd.sh` → subcomando **`query`** (default `-n 5 --min-score 0.5`)
- Canon: `token-efficiency-2026.md`, aggiornati disciplina/bootstrap/TRIGGER/max-workflow/skill
- Write-back: AI `token-efficiency-local.md`, Xot `token-efficiency-local.md`, Sixteen `token-efficiency-agent.md`
- Vault lean: `docs/.obsidian/{app,appearance}.json` (Obsidian = IDE umano)

## Comandi

```bash
export PATH="$HOME/.npm-global/bin:$PATH"
bashscripts/docs/llm-wiki-qmd.sh query "<topic>"
context-mode doctor
```

## Follow-up

- `llm-wiki-qmd.sh update` dopo sync docs
- Embed backlog ~25% docs (warning QMD)
- Commit solo su richiesta utente
