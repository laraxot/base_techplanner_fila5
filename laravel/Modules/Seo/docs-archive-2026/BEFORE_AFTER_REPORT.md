---
title: "Seo Docs Reorganization — Before/After Report"
type: report
issues: []
discussions: []
tags: [docs, bmad, archive, organization]
created: 2026-10-06
updated: 2026-10-06
qmd: "seo-docs-reorg-report"
---

# Seo Module — Docs Reorganization Report

## Before
- docs/ at root: 72 root `.md` files + subdirs (bmad, concepts, llm-wiki, wiki, raw, screenshots)
- Many duplicate uppercase filenames (`PRD.md`/`prd.md`, `INDEX.md`/`index.md`)
- No single `docs/README.md` with BMAD YAML anchoring the root
- Archive folder absent

## After
- `docs/` remains single root; `docs/README.md` has BMAD YAML frontmatter
- `docs/index.md` kept (canonical); duplicate `.md` files moved to `docs-archive-2026/`
- `docs-archive-2026/` holds 70 archived `.md` files + full backup
- BMAD YAML applied to all remaining `.md` in `docs/` (32 files)
- Scope: exactly one docs/ root; archive separated; BMAD applied.
