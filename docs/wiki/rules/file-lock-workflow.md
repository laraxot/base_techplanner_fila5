---
title: "File Lock Workflow (puntatore FLVP)"
type: rule
confidence: high
created: 2026-05-20
updated: 2026-05-20
tags: [lock-file, flvp, pointer]
related:
  - file-locking-validation-protocol.md
---

# File Lock Workflow — puntatore

**SSoT:** [`file-locking-validation-protocol.md`](file-locking-validation-protocol.md) (FLVP).

Richiesta utente permanente (2026-05-20):

1. **Pre-edit:** stessa cartella → se `<file>.lock` esiste, altro task; altrimenti crea lock → modifica.
2. **Post-edit:** rimuovi lock → phpstan → phpmd (`./tools`) → phpinsights → pest → puppeteer → playwright.
3. **GitHub:** `git remote -v` + **gh + MCP** — issue list/view/comment costante.
4. **Chat:** `./docs/chat/INDEX.md` — coordinamento continuo con altri agenti AI.

Memoria: [`../memories/agent-flvp-github-standing-rule.md`](../memories/agent-flvp-github-standing-rule.md).
