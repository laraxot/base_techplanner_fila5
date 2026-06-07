---
<<<<<<< HEAD
title: "QMD search guide"
type: how-to
tags: [qmd, search, wiki]
created: 2026-06-06
updated: 2026-06-06
qmd: "qmd search guide wiki healthcheck"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/21"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/19"
=======
title: "QMD search guide — TechPlanner"
type: how-to
tags: [qmd, search, second-brain, on-demand]
created: 2026-06-06
updated: 2026-06-06
qmd: "qmd search guide collection filter tp-wiki tp-mod techplanner second brain"
related:
  - ../concepts/second-brain-techplanner-efficiency.md
  - ../rules/00-TRIGGER_MAP.md
>>>>>>> dev
---

# QMD search guide

<<<<<<< HEAD
Use QMD for targeted retrieval, then read the owner file before editing.

```bash
bashscripts/docs/second-brain-healthcheck.sh "<topic>"
bashscripts/docs/llm-wiki-qmd.sh search "<topic>" -c tp-wiki-root -n 5 --files
qmd status
```

If a collection is missing or stale, fall back to `rg` and update the wiki after the fix.
=======
Wrapper: `bashscripts/docs/llm-wiki-qmd.sh`

## Pattern corretto

```bash
bashscripts/docs/llm-wiki-qmd.sh search "folio container0 mount" \
  -c tp-theme-sixteen-wiki -n 5 --files
```

## Collezioni wiki-tier (usare sempre `-c`)

| Collection | Scope |
|------------|--------|
| `tp-wiki-root` | `docs/wiki/` |
| `tp-ai-rules` | `bashscripts/ai/rules/` |
| `tp-ai-concepts` | `bashscripts/ai/concepts/` |
| `tp-mod-xot-wiki` | Xot |
| `tp-mod-cms-wiki` | Cms |
| `tp-mod-user-wiki` | User |
| `tp-theme-sixteen-wiki` | Sixteen |
| `tp-wiki-bashscripts` | bashscripts wiki |

## Evitare

- `base_techplanner_fila5` — intero repo (rimuovere se ricreato)
- `techplanner-xot-docs` — 3659 file per fix puntuali
- Search senza `-c`

## Manutenzione

```bash
bash bashscripts/docs/init-techplanner-qmd-collections.sh --wiki-only
bash bashscripts/docs/llm-wiki-qmd.sh update
bash bashscripts/docs/init-techplanner-qmd-collections.sh --embed-wiki
```
>>>>>>> dev
