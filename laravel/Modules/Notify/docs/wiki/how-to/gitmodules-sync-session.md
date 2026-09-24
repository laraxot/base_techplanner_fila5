---
title: "Gitmodules sync session — note modulo/tema"
type: how-to
tags: [git, gitmodules, sync, quality-gates, merge-conflict]
created: 2026-07-21
<<<<<<< HEAD
updated: 2026-09-21
qmd: "gitmodules sync session module theme git-C nested repo not submodule"
issues:
  - "https://github.com/laraxot/module_notify_fila5/issues/115"
discussions: []
related:
  - "../../../../../../docs/wiki/memories/no-git-submodules-module-repos.md"
  - "../../../../../../docs/wiki/rules/gitmodules-ini-paths-only.md"
  - "../../../../../../docs/wiki/how-to/per-module-git-sync-verification.md"
=======
updated: 2026-07-21
qmd: "gitmodules sync session module theme note story-003"
issues:
  - "https://github.com/provtv/base_ptv_fila5/issues/201"
discussions: []
related:
  - "../../../../../../docs/stories/STORY-003-gitmodules-sync-conflict-sweep.md"
  - "../../../../../../docs/chat/gitmodules-sync.md"
>>>>>>> laraxot/dev
---

# Gitmodules sync session

<<<<<<< HEAD
Notify è una **repository Git autonoma** (`path` in `gitmodules.ini`), non un submodule.
Isolamento: `git -C laravel/Modules/Notify` + `rev-parse --show-toplevel` uguale al path.
Mai Shell `working_directory`. Git solo avanti: fetch + merge (no rebase, no restore).

## Cosa fare su questo owner

1. `git -C laravel/Modules/Notify remote -v` — verità runtime (`laraxot/module_notify_fila5`).
2. `git -C laravel/Modules/Notify fetch laraxot` poi merge `laraxot/dev` se behind; push se ahead.
3. Quality gates da `laravel/`: phpstan → phpmd → phpinsights. Mai `phpunit.xml` in root modulo.
4. Marker Git: risoluzione manuale forward-only.

## Canon

- [no-git-submodules-module-repos.md](../../../../../../docs/wiki/memories/no-git-submodules-module-repos.md)
- Prompt: [17-gitmodules-path-iteration.md](../../../../../../bashscripts/docs/prompts/17-gitmodules-path-iteration.md)
=======
Sessione orchestrata dal prompt `bashscripts/tools/prompts/02-gitmodules-sync.md` (v5.1) e da **STORY-003**.

## Cosa fare su questo owner

1. `git remote -v` — sync **tutte** le organizzazioni (`fetch` + `pull --ff-only` + `push`, mai `--force`).
2. Quality gates da `laravel/`: phpstan → phpmd → phpinsights (`--composer=composer.lock`).
3. Marker Git: risoluzione manuale forward-only (no `git restore`).

## Canon

- Story: [../../../../../../docs/stories/STORY-003-gitmodules-sync-conflict-sweep.md](../../../../../../docs/stories/STORY-003-gitmodules-sync-conflict-sweep.md)
- Report: [../../../../../../docs/chat/gitmodules-sync.md](../../../../../../docs/chat/gitmodules-sync.md)
- Issue base: https://github.com/provtv/base_ptv_fila5/issues/201
>>>>>>> laraxot/dev
