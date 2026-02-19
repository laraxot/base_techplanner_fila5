# AI Rules and Skills

## Consolidated Rules from Learned Patterns

### Documentation
- **Naming Convention**: All documentation files must be lowercase and use delimiters (hyphens or underscores) only. No dates in filenames.
    - Correct: `roadmap.md`, `analysis-summary.md`
    - Incorrect: `ROADMAP.md`, `analysis-2025-01-01.md`
- **Roadmaps**: Every module and theme MUST have a `docs/roadmap.md` file.
- **Structure**: Documentation should be placed in `Modules/{Module}/docs` or `Themes/{Theme}/docs`.

### Architecture & Coding Standards
- **DRY & KISS**: Don't Repeat Yourself, Keep It Simple Stupid.
- **Strict Typing**: Use strict types in PHP.
- **Filament**:
    - Extend `XotBase*` classes, never base Filament classes directly.
    - `getInfolistSchema` must return `array<string, Component>`.
- **Testing**:
    - Use Pest.
    - No `RefreshDatabase`.
    - 100% coverage goal.
- **Static Analysis**:
    - PHPStan level 10 (via `phpstan.neon`).
    - Zero errors policy.

### Workflow
- **Super Mucca**:
    - Understand business logic first.
    - Update docs *before* and *after* changes.
    - Run quality checks (PHPStan, Pint, Rector) after every change.

## Skills

(Refer to individual SKILL.md files in the `.gemini/antigravity/skills` directory, if available)
