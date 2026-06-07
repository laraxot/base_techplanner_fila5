# PHPMD Standalone PHAR Rule

## Rule

In this project, PHPMD must be used in standalone `.phar` form.

Do not install PHPMD through Composer for project workflows such as `bmad-create-story`, development checks, or post-change quality gates.

## Why

Using the standalone PHAR keeps the toolchain simpler and avoids polluting module or root Composer dependencies with analysis-only tooling.

This is aligned with:

- DRY: one canonical PHPMD runtime, reused everywhere
- KISS: avoid duplicate installation paths
- Clean Code governance: quality tools should stay explicit and decoupled from application dependencies

## Canonical Expectation

- PHPMD is expected as a standalone PHAR artifact
- project checks should reference that standalone binary
- Composer must not become the installation path for PHPMD here

## Operational Guidance

- if PHPMD is missing, restore or fetch the standalone PHAR
- if a workflow suggests `composer require phpmd/phpmd`, reject that path for this repository
- when documenting quality gates, refer to standalone PHPMD explicitly

## Applies To

- `bmad-create-story`
- post-change verification
- module maintenance flows
- agent-run quality gates

## Anti-Pattern

| Avoid | Use |
|---|---|
| `composer require phpmd/phpmd` | standalone `phpmd.phar` |
| module-local PHPMD dependency drift | one shared PHAR runtime |

## Related

- [post-modifica-verifica-obbligatoria](./post-modifica-verifica-obbligatoria.md)
- [second-brain-canonical-operating-model](./second-brain-canonical-operating-model.md)
