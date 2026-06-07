---
title: "Second brain TechPlanner — efficienza massima"
type: concept
tags: [second-brain, qmd, llm-wiki, efficiency, on-demand, techplanner]
created: 2026-06-06
updated: 2026-06-06
qmd: "second brain techplanner efficiency qmd tiered collections wiki-only search embed bootstrap"
related:
  - ./llm-wiki-operational-discipline.md
  - ./agent-bootstrap-compact.md
  - ../rules/00-TRIGGER_MAP.md
  - ../how-to/qmd-search-guide.md
  - ../../../laravel/Modules/Xot/docs/wiki/concepts/second-brain-local-discipline.md
---

# Second brain TechPlanner — efficienza massima

## Anti-pattern da evitare

| Errore | Costo |
|--------|--------|
| Collezione QMD su **intero repo** (34k file) | Search lento, rumore, token |
| Preload `AGENTS.md` monolite | 600+ righe per sessione |
| `@codebase` / cartelle `docs/` intere | Context overflow |
| Sync `--delete-after` su `docs/wiki/concepts` | Cancella pagine root-only |

## Modello a 3 livelli

1. **Router** — `00-TRIGGER_MAP` + `-c tp-wiki-root` (~20–600 file)
2. **Wiki modulo/tema** — `-c tp-mod-xot-wiki`, `tp-theme-sixteen-wiki` (~20–200 file)
3. **Deep (solo audit)** — `techplanner-xot-docs` (3000+ file)

## Workflow agente (5 passi)

1. [agent-bootstrap-compact](./agent-bootstrap-compact.md)
2. TRIGGER_MAP → 1 riga
3. `llm-wiki-qmd.sh search "<topic>" -c tp-mod-<scope>-wiki -n 5 --files`
4. Read max 5 file
5. `log.md` + `qmd update` se policy nuova

## Setup

```bash
bash bashscripts/docs/sync-wiki-rules-from-ai.sh      # rules mirror; concepts merge
bash bashscripts/docs/init-techplanner-qmd-collections.sh --wiki-only
bash bashscripts/docs/init-techplanner-qmd-collections.sh --embed-wiki  # opzionale CPU
bash bashscripts/docs/second-brain-healthcheck.sh
```

## Collezioni esistenti (TechPlanner)

| `-c` | File | Uso |
|------|------|-----|
| `tp-wiki-root` | ~20 | Root wiki + router |
| `tp-ai-rules` | ~580 | Regole harness |
| `tp-mod-xot-wiki` | ~86 | XotBase |
| `tp-mod-cms-wiki` | ~23 | CMS |
| `tp-mod-user-wiki` | ~68 | Auth |
| `tp-theme-sixteen-wiki` | ~164 | Tema FO |

**Mai** `-c techplanner-xot-docs` per un fix puntual — usa wiki-tier.

## Ingest obbligatorio

Fix/decisione riusabile → `concepts/` o `memories/` → `index.md` → `log.md` → `qmd update`.

Scripts: [init-techplanner-qmd-collections.sh](../../../bashscripts/docs/init-techplanner-qmd-collections.sh), [qmd-search-guide](../how-to/qmd-search-guide.md)