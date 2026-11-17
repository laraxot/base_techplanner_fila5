---
title: "No lang/lang/ and No _docs/ Rule"
type: rule
sources:
  - "Project Architecture Guidelines"
  - "User Request (Tuesday, April 21, 2026)"
confidence: extreme
created: 2026-04-21
updated: 2026-04-21
tags: [architecture, rules, cleanup, directory-structure, laravel-modules]
related:
  - concepts/llm-wiki-governance.md
  - concepts/bmad-method.md
---

# No `lang/lang/` and No `_docs/` Rule

## Rule Definition

**CRITICAL ARCHITECTURE RULE:**
1.  **NO `lang/lang/`**: The folder `lang/lang/` is strictly forbidden within any Module or Theme. Language files should reside directly in `lang/` or appropriate subfolders, avoiding redundant nesting.
2.  **NO `_docs/`**: The folder `_docs/` (with a leading underscore) is strictly forbidden within any Module or Theme. Documentation must always use the standard `docs/` folder name (without the underscore).
3.  **NO `docs/archive/`**: The folder `docs/archive/` is strictly forbidden at root, module and theme level. Only `docs/wiki/_archive/` is allowed as part of the canonical LLM Wiki structure.

## Rationale

- **Redundant Nesting**: `lang/lang/` adds an unnecessary layer of directory depth, making it harder to navigate and breaking standard Laravel/Module expectations for translation discovery.
- **Consistency**: The project standardizes on `docs/` for documentation. Using `_docs/` creates confusion, duplication, and breaks documentation indexing tools like QMD that expect the `docs/` naming convention.
- **Cleanliness**: Preventing these patterns ensures a predictable and clean structure for all reusable components (Modules and Themes).

## Corrective Actions

- If `lang/lang/` is found: Move all its contents to the parent `lang/` directory and delete the now-empty nested `lang/` folder.
- If `_docs/` is found: Rename it to `docs/`. If `docs/` already exists, merge the contents and delete the `_docs/` folder.

## Exceptions

- **External Repositories**: This rule primarily applies to `Modules/` and `Themes/`. Root-level tools (like `bashscripts/`) may have historical patterns, but new code should still aim for consistency.

## Enforcement

- This rule is part of the agent's **Golden Memories**.
- Every session involving directory creation or cleanup MUST verify these patterns.
- Automated linting or pre-commit hooks should be updated to flag these folders.

```bash
find . -type d \( -path '*/docs/archive' -o -name '_docs' -o -path '*/lang/lang' \) -print
```

The command must return no results.

---
*Status: Active. Mandatory for all developers and AI agents.*
