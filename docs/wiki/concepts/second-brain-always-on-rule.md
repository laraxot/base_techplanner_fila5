---
title: Second Brain Always-On Rule
type: concept
tags: [second-brain, llm-wiki, qmd, workflow]
sources:
  - ../../raw/articles/2026-04-28-second-brain-qmd-verification.md
  - ../../project/qmd-local-docs-search.md
  - ../../../AGENTS.md
created: 2026-04-28
updated: 2026-05-29
related:
  - ../rules/agent-no-git-branch-creation.md
  - second-brain-canonical-operating-model.md
  - second-brain-llm-wiki-pattern.md
  - llm-wiki-operational-discipline.md
---

# Second Brain Always-On Rule

The project second brain must be used by default, not only when someone explicitly asks for documentation work.

## Rule

Before technical analysis, architectural answers, agent workflow changes, or reusable fixes:

0. **Git (agenti):** mai creare/cambiare branch — [`agent-no-git-branch-creation.md`](../rules/agent-no-git-branch-creation.md).
0b. **HTTP:** mai `Http\Controllers` — [`no-controllers-rule.md`](../rules/no-controllers-rule.md) prima di endpoint o `RatingController`.
0c. **CMS blocks:** `type` = cartella in `data.view` — [`cms-block-type-view-convention.md`](../rules/cms-block-type-view-convention.md).
1. Read the nearest `docs/wiki/index.md`.
2. Search the relevant corpus with QMD or `rg`.
3. Read only the narrowed set of raw/code/runtime sources.
4. Write reusable conclusions back into the wiki.
5. Append the change to the nearest `log.md`.
6. Re-index with `bashscripts/docs/llm-wiki-qmd.sh update`.

## Canonical command path

Use the repository wrapper, not a random `qmd` binary from PATH:

```bash
bashscripts/docs/llm-wiki-qmd.sh status
bashscripts/docs/llm-wiki-qmd.sh search "query" -c fixcity-root-docs -n 10 --files
bashscripts/docs/llm-wiki-qmd.sh get "docs/wiki/index.md" -l 40
bashscripts/docs/second-brain-healthcheck.sh
```

`bashscripts/docs/second-brain-healthcheck.sh` is the minimum end-to-end smoke path after any second-brain setup or docs ingest work.

## Why

- Chat memory is transient.
- Agent memories help, but they are not the source of truth.
- The versioned wiki is reviewable, linkable, and shared across sessions.
- QMD makes the wiki and raw corpus searchable at project scale.

## Non-goals

- Do not create a parallel note vault outside the repository.
- Do not treat QMD retrieval as a substitute for wiki synthesis.
- Do not leave durable findings only in stories, chat, or ad-hoc scratch files.

## Current runtime status

Verified on 2026-04-28:

- QMD is installed under Node 22.
- Codex MCP config already points to `qmd mcp`.
- Four FixCity collections are indexed.
- All four collections now have descriptive QMD contexts.
- BM25 search is working now.
- The repository wrapper now defaults to `QMD_LLAMA_GPU=off` to keep QMD CPU-first on this machine.
- The first `qmd query` may bootstrap local models before hybrid search becomes fast enough to use routinely.
- Embeddings are still optional and currently pending on CPU.
