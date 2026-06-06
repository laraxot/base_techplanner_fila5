---
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
---

# QMD search guide

Use QMD for targeted retrieval, then read the owner file before editing.

```bash
bashscripts/docs/second-brain-healthcheck.sh "<topic>"
bashscripts/docs/llm-wiki-qmd.sh search "<topic>" -c tp-wiki-root -n 5 --files
qmd status
```

If a collection is missing or stale, fall back to `rg` and update the wiki after the fix.
