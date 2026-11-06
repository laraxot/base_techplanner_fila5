---
title: "Zero — purpose (EN bridge to scopo)"
type: concept
document_type: concept
theme: Zero
status: active
version: 1.1.0
language: en
created: 2026-09-09
updated: 2026-10-20
tags: [tema, purpose, pub-theme, dry]
qmd: "theme zero purpose why pub_theme presentation only cms xot lang bridge to scopo"
issues: []
discussions: []
related:
  - ./scopo.md
  - ../README.md
  - ../wiki/concepts/theme-zero-operating-focus.md
  - ../../../Modules/Cms/docs/scopo.md
  - ../../../Modules/Xot/docs/00-index.md
id: zero-docs-bmad-purpose
slug: purpose
description: "English bridge: why Theme Zero exists. Canonical Italian detail lives in scopo.md."
category: product-planning
---

# Zero — why it exists

**Canonical (IT, measured against this repo):** [scopo.md](./scopo.md).

## One sentence

Theme Zero is the **public presentation shell** for Quaeris: Blade layouts, UI tokens, Vite/Tailwind build. It does **not** own page resolution, domain data, or Filament base classes.

## Why (business)

- Operators need one predictable FO skin across Quaeris hosts (`pub_theme => Zero`).
- Survey/auth/domain logic stays in modules so the theme can change without rewriting business rules.
- Cms owns *what* a page is; Zero owns *how it looks* when rendered.

## Boundaries (do not duplicate)

| Concern | Owner |
|---|---|
| Page/block JSON resolution | [Cms scopo](./scopo.md) |
| Filament mirrors / foundation | [Xot 00-index](../../../Modules/Xot/docs/00-index.md) |
| Autolabel / locale plumbing | [Lang scopo](./scopo.md) |
| Never extend `Filament\*` here | [xotbase-never-extend-filament](../concepts/xotbase-never-extend-filament.md) |

## Stack truth (this checkout)

Tailwind 3.4 · Alpine 3 · Flowbite 4 · Vite 6 · empty `app/` · only theme under `laravel/Themes/`.

Older prose in this file that described One/Three forks or restaurant hosts was from another Laraxot checkout; it was replaced by this bridge on 2026-10-20 to stop lying to agents (DRY: one purpose page = [scopo.md](./scopo.md)).
