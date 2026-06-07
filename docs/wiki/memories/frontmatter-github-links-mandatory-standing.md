---
title: "Standing — frontmatter GitHub obbligatorio su ogni .md wiki"
type: memory
tags: [frontmatter, github, issues, discussions, standing, mandatory, agent]
created: 2026-06-06
updated: 2026-06-06
qmd: "standing memory frontmatter github issues discussions mandatory every md wiki agent never forget"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/11"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/12"
related:
  - ../rules/wiki-markdown-frontmatter-mandatory.md
  - ../skills/wiki-markdown-frontmatter.md
  - ../bmad/architecture-wiki-frontmatter-github.md
  - ../concepts/agent-bootstrap-compact.md
---

# Standing — non dimenticare mai issues + discussions

## Regola (legge operativa)

**Ogni** creazione o modifica di `.md` in `docs/wiki/`, `Modules/*/docs/`, `Themes/*/docs/`, `bashscripts/docs/wiki/`:

| Passo | Azione |
|-------|--------|
| 0 | **Prima di scrivere** — nessun `.md` wiki esce senza `issues:` + `discussions:` |
| 1 | `git remote -v` → identifica repo owner (modulo: remote in `Modules/*`; se 404 → monorepo) |
| 2 | `gh issue list --repo OWNER/REPO --search "<topic>"` |
| 3 | Se assente → `gh issue create` + discussion pertinente (`gh api` graphql se serve) |
| 4 | Frontmatter: `issues:` e `discussions:` con URL **completi** sull'**stesso argomento** del file |
| 5 | Body (consigliato): `## GitHub (tracciamento)` con tabella link numerati |
| 6 | `validate-wiki-frontmatter.sh` → `llm-wiki-qmd.sh update` |

## Perché

- Doc senza issue = lavoro invisibile al team
- QMD e Obsidian collegano wiki ↔ tracciamento sociale GitHub
- BMAD pilastro 4: frontmatter = contratto validabile

## Trigger

`00-TRIGGER_MAP` riga **Nuovo o edit `.md` wiki** — caricare sempre prima di scrivere.

## Vietato

- File wiki senza `issues:` / `discussions:`
- URL senza numero (`.../issues/`)
- Issue di altro tema non collegato al contenuto
