# Merge Conflict Marker Coordination Rule

> Updated: 2026-04-21
> Scope: repository root, Laravel modules, themes, agent workflows

## Rule

When many AI agents are cleaning merge conflict markers in parallel, never start by editing the first file in a deterministic full-list order.

Use this workflow:

1. Generate a current inventory with `rg -l '<<<<<<< HEAD'`.
2. Treat the inventory as volatile: other agents may edit any file at any time.
3. Pick a non-contiguous working batch, preferably mixing runtime PHP, translations, tests, theme assets, and docs.
4. Before editing each file, re-open the current content and resolve the actual local state.
5. Prefer runtime blockers first when `php artisan` or the dev server fails.
6. After every batch, run targeted syntax checks for touched PHP files.
7. Refresh the inventory before taking the next batch.

## Conflict Resolution Policy

- Keep valid domain behavior over generated or placeholder fragments.
- If one side is syntactically corrupted placeholder code, discard that side.
- If one side only changes formatting, keep the style already used by the surrounding file.
- If both sides are valid and behavior differs, choose the smaller runtime-safe change and document the decision.
- Do not remove unrelated user changes.

## Documentation Policy

Every conflict cleanup batch that changes behavior or governance must update:

- affected module or theme docs;
- root LLM Wiki concept page;
- relevant docs index;
- persistent memory/rules when the pattern must be remembered across sessions.