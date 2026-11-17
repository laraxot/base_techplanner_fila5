---
description: Composer package audit (composer show) + lock drift protocol
---

# Composer package audit + lock drift protocol

## Scope

Applies to:

- `docs/packages/` (installed packages catalog)
- `docs/dependencies.md` (lock-based canonical map + drift notice)
- `docs/architecture/dependency-debug-skills.md`

## Source of truth

- **Installed vendor state** (what is actually running):

  - `composer show -f json`
  - Documented in: `docs/packages/index.md`

- **Expected state** (pinned / reproducible):

  - `composer.lock`
  - Documented in: `docs/dependencies.md`

## Required audit steps

1. Generate/refresh installed catalog:

   - Run `composer show -f json`
   - Update `docs/packages/`

2. Detect drift:

   - Compare `composer.lock` vs `composer show -f json`.
   - If versions differ, treat environment as **non-deterministic** for chaos testing.

3. Recovery (preferred):

   - Use `composer install` to restore deterministic vendor state.
   - Avoid `composer update` during recovery unless explicitly required and documented.

## Documentation requirements

- Modules/themes must not duplicate the full package list.
- Each module/theme should only link to canonical docs:

  - `../../../../docs/dependencies.md`
  - `../../../../docs/packages/index.md`

and add only module-specific notes.
