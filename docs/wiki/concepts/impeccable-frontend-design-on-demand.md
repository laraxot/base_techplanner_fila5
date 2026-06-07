---
title: "Impeccable — skill design frontend on-demand"
type: concept
confidence: high
created: 2026-06-03
tags: [impeccable, frontend-design, cursor-skills, cli]
related:
  - https://github.com/pbakaus/impeccable
  - ../../../bashscripts/ai/.agents/skills/impeccable/SKILL.md
---

# Impeccable (on-demand)

Skill + CLI per design frontend: 23 comandi (`/impeccable audit`, `polish`, `critique`, …) e rilevamento anti-pattern senza LLM.

Repo: [pbakaus/impeccable](https://github.com/pbakaus/impeccable)

## Installazione progetto (2026-06-03)

```bash
npx impeccable skills install          # prima install
npx impeccable skills install --force  # reinstall multi-harness
```

Target installati: `.claude/`, `.cursor/skills/impeccable/`, `.gemini/`, `.agents/`, `.github/`, `.opencode/`.

Symlink `.claude` → `bashscripts/ai/.agents/` — skill canonica anche lì.

## Uso in Cursor

- Comando chat: `/impeccable audit`, `/impeccable polish`, …
- Skill path: `.cursor/skills/impeccable/SKILL.md`
- Setup progetto: `/impeccable init` (crea `PRODUCT.md` + `DESIGN.md`) — **mancanti** in Fixcity al 2026-06-03

Skill locale correlata: `bashscripts/ai/skills/teach-impeccable` (gather design context).

## CLI anti-pattern (verificato)

```bash
npx impeccable detect laravel/Themes/Sixteen/resources/css/   # regex su CSS
npx impeccable detect /path/to/page.html                      # HTML statico
curl -s http://127.0.0.1:8000/it/ -o /tmp/it.html
npx impeccable detect /tmp/it.html                            # evita timeout Puppeteer URL
```

Verifica 2026-06-03:
- CSS Sixteen: 15 finding (font stack, contrasto, ecc.)
- `/it` HTML: 1 finding (`skipped-heading` h2→h4)
- `detect http://URL` diretto: timeout Puppeteer 30s — preferire HTML salvato

## Quando caricare (trigger)

- Redesign UI, parity Design Comuni, audit a11y/typography
- Prima di STORY UI (es. legenda mappa STORY-125)
- **Non** per backend PHP puro

## Riferimenti domain

Skill include: typography, color-and-contrast (OKLCH), spatial, motion, interaction, responsive, ux-writing.
