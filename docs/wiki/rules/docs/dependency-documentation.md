---
description: Dependency documentation + chaos impact notes
---

# Dependency documentation + chaos impact notes

## Scope

Applies to:

- `docs/dependencies.md` (canonical)
- `laravel/Modules/*/docs/dependencies.md`
- `laravel/Themes/*/docs/dependencies.md`

## Canonical dependency map

- The canonical dependency map MUST live at:

  - `docs/dependencies.md`

- It MUST be generated from `composer.json` + `composer.lock`.
- It MUST include:

  - runtime-critical packages
  - safe diagnostic commands
  - failure modes for chaos/bug injection

## Validation (lock vs installed)

Before relying on version-specific behavior, validate that the installed vendor state matches the lock:

- Compare `composer.lock` vs `composer show -f json`.
- If there is drift (version mismatches or missing packages), treat the environment as **non-deterministic** for chaos testing.

Recommended recovery:

- Run `composer install` to restore a consistent state.
- Avoid `composer update` during recovery unless explicitly required and documented.

## Module/theme dependency docs

- Each module/theme MUST have `docs/dependencies.md`.
- It MUST link (relative path) to `../../../../docs/dependencies.md`.
- It MAY contain only module/theme-specific notes.

## Chaos recovery constraints

- During bug injection recovery:

  - Prefer `composer validate` and `composer dump-autoload`.
  - Avoid `composer update` unless explicitly required and documented.
  - Prefer docs-first: consult the module docs before touching code.

## Naming rules

- All docs filenames must be lowercase.
- Do not introduce dated filenames.
