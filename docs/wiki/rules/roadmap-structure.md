---
description: Roadmap documentation standard (modules and themes)
trigger: always_on
---

# Roadmap documentation standard

## Scope

This rule applies to:

- `laravel/Modules/*/docs/`
- `laravel/Themes/*/docs/`

## Required structure

Each module/theme MUST contain:

- `docs/roadmap.md` (index)
- `docs/roadmap/` directory with small focused documents

Recommended minimal files:

- `docs/roadmap/00-overview.md`
- `docs/roadmap/01-now.md`
- `docs/roadmap/02-next.md`
- `docs/roadmap/03-later.md`
- `docs/roadmap/04-risks.md`

## Index contract (`docs/roadmap.md`)

- Must link to the current roadmap chapters above.
- Must include a section `Legacy / existing roadmap docs` with relative links to legacy roadmap documents.

## Naming rules

- Filenames must be lowercase.
- Do not use dates in filenames.
- Allowed exceptions: `README.md`, `CHANGELOG.md`.

## Legacy roadmaps normalization

If legacy roadmaps exist (examples):

- `ROADMAP.md`
- `roadmap-old-*.md`
- `roadmap-2026-*.md`

They must be moved to:

- `docs/roadmap/legacy/`

and renamed to:

- `legacy-roadmap*.md`

## Links

All links in roadmaps MUST be relative to the `docs/` directory of the module/theme.
