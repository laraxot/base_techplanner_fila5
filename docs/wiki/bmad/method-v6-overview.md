---
title: "BMAD Method v6 — Panoramica Metodologia"
type: concept
tags: [bmad, methodology, phases, workflow, token-efficiency]
created: 2026-05-27
updated: 2026-05-27
related:
  - agents-nine.md
  - commands-fifteen.md
  - project-levels.md
  - integration-on-demand.md
  - ../concepts/second-brain-llm-wiki-pattern.md
---

# BMAD Method v6 — Panoramica

## Filosofia

BMAD è una metodologia agile ottimizzata per AI coding. I principi chiave:

1. **Token-optimized**: helper pattern riduce consumo token del 70-85%
2. **On-demand**: skills caricate solo quando serve (stesso pattern del second brain)
3. **No persona overhead**: skills funzionali, niente backstory dei personaggi
4. **Right-sized**: il workflow si adatta alla complessità del progetto (livelli 0-4)

## 4 Fasi

```
Phase 1: Analisi (opzionale)
  /product-brief → Ricerca, discovery, product brief
  Agente: Business Analyst

Phase 2: Pianificazione (richiesta)
  /prd o /tech-spec → Requisiti dettagliati o leggeri
  Agente: Product Manager

Phase 3: Solutioning (condizionale, liv 2+)
  /architecture → Architettura del sistema
  /solutioning-gate-check → Validazione qualità
  Agente: System Architect

Phase 4: Implementazione (richiesta)
  /sprint-planning → Pianificazione sprint
  /create-story → User story atomiche
  /dev-story → Implementazione + test
  Agenti: Scrum Master + Developer
```

## Estensioni

| Modulo | Fase | Comandi |
|--------|------|---------|
| **Builder** | Fase 6 | /create-agent, /create-workflow |
| **Creative Intelligence** | Fase 7 | /brainstorm, /research |
| **UX Designer** | Fase 8 | /create-ux-design |

## Token Optimization

Il segreto del risparmio token: **helpers.md** centrale. Invece di embeddare le stesse utility in ogni skill/command, i comandi referenziano sezioni riutilizzabili:

```markdown
# Invece di ripetere 200+ righe:
"Carica config da ~/.claude/config/bmad/config.yaml"

# I comandi referenziano:
"Per helpers.md#Load-Global-Config"
```

- Skills: ~45.9KB (~11.475 token totali)
- Per conversazione: ~15-25KB effettivi
- **Risparmio: 70-85% vs approccio tradizionale**
