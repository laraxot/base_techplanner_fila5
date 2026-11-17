---
title: "BMAD Method v6 — Integrazione On-Demand"
type: how-to
tags: [bmad, installation, on-demand, second-brain, trigger-map]
created: 2026-05-27
updated: 2026-05-27
related:
  - INDEX.md
  - ../rules/00-TRIGGER_MAP.md
  - ../../bashscripts/ai/rules/bmad.md
  - ../../bashscripts/tools/install-bmad-v6-project.sh
  - ../concepts/second-brain-llm-wiki-pattern.md
---

# BMAD Integration — On-Demand per Progetto

## Principio

BMAD segue lo stesso pattern del second brain: **niente precaricato, tutto on-demand**.
Le skill e i comandi BMAD vivono nel wiki e si attivano solo quando servono.

## Installazione Progettuale

```bash
# Clona repo BMAD (se non già presente)
git clone --depth 1 https://github.com/aj-geddes/claude-code-bmad-skills.git /tmp/bmad-repo

# Esegui installer progettuale
bashscripts/tools/install-bmad-v6-project.sh
```

L'installer:
1. Copia skill BMAD in `.opencode/skills/bmad/` (o `.claude/skills/bmad/`)
2. Copia comandi slash in `.claude/commands/bmad/`
3. Copia reference completa in `bmad/v6/`
4. **Non modifica bootstrap** — le skill restano on-demand

## Attivazione On-Demand

### 1. Trigger Map

Quando il task matcha contesto BMAD:

```
qmd search "bmad <topic>" --limit 5
```

La trigger map ha righe dedicate.

### 2. Router Stub

`bashscripts/ai/rules/bmad.md` contiene uno stub minimo che:
- Riconosce comandi BMAD (/workflow-init, /prd, /dev-story, ...)
- Instrada ai wiki page pertinenti
- Richiama la skill corretta via load on-demand

### 3. Caricamento Skill

```markdown
# Per attivare BMAD Master:
Leggi: bashscripts/ai/rules/bmad.md
Poi:  docs/wiki/bmad/method-v6-overview.md
Poi:  Se comando specifico → docs/wiki/bmad/commands-fifteen.md
Poi:  Se agente specifico → docs/wiki/bmad/agents-nine.md
```

## Comandi e Skills — Differenza Progettuale

| Dove | Cosa | Quando |
|------|------|--------|
| `.claude/skills/bmad/` | 9 skill agenti (SKILL.md) | Quando serve un agente specifico |
| `.claude/commands/bmad/` | 15 comandi slash (.md) | Su invocazione esplicita `/comando` |
| `docs/wiki/bmad/` | Documentazione on-demand | Per studio/consultazione |
| `bmad/v6/` | Reference completa | Backup offline del repo |

## GitHub Discussions

Per coordinamento multi-agente su BMAD:
```bash
git remote -v
# Usa l'owner/repo per le discussion
gh api repos/<owner>/<repo>/discussions
```

Firma sempre i messaggi con: `— <nome-agente> / <modello>`
