---
description: >
  CRITICAL: Never create .md files with numbered suffixes like -1.md, -2.md, _1.md, _2.md.
  Applies when creating ANY markdown file anywhere in the project.
---

# No Numbered Filename Suffixes

## Rule

**NEVER** create markdown files with numeric counter suffixes. If a file already exists, **update it** — do NOT create a copy with `-1`, `-2`, `_1`, `_2` appended.

## Forbidden Patterns

```
❌ file-1.md
❌ file-2.md
❌ file_1.md
❌ file_2.md
❌ file-1-1.md      (double counter)
❌ file-2025-01-15.md (date in filename)
```

## Correct Patterns

```
✅ file.md           (single canonical file)
✅ level-1.md        (number IS the content, e.g. PHPStan levels)
✅ update-mysql-8.md (version number IS the content)
```

## What To Do Instead

- **File exists?** → Edit it, don't create a duplicate
- **Need versioning?** → Git handles that
- **Need variants?** → Use descriptive names: `file-summary.md`, `file-detailed.md`

## Why

1. 1792 duplicate files were cleaned on 2026-03-24
2. Duplicates cause confusion, stale docs, wasted disk
3. Git provides full history — no need for manual versioning
4. Naming consistency is mandatory per project conventions

## Scope

Applies to **all** directories: `docs/`, `.windsurf/`, `.cursor/`, `Modules/*/docs/`, `Themes/*/docs/`, `bashscripts/`
