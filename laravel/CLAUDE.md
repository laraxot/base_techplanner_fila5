# CLAUDE.md — Laravel On-Demand Stub

Boost MCP: `php artisan boost:mcp` · guidelines on-demand via Boost tools, non preloadare monolite qui.

## Read First

1. [../docs/wiki/concepts/agent-bootstrap-compact.md](../docs/wiki/concepts/agent-bootstrap-compact.md)
2. [../docs/wiki/rules/00-TRIGGER_MAP.md](../docs/wiki/rules/00-TRIGGER_MAP.md)
3. `bashscripts/docs/llm-wiki-qmd.sh search "<topic>" -n 5`

## Stack (this app)

Laravel 12 · Filament v4/v5 · Folio · Volt · Livewire 3 · Pest · PHPStan max

## Commands

```bash
composer dev | composer test
./vendor/bin/pint --dirty
./vendor/bin/phpstan analyse Modules --memory-limit=-1
php artisan test --filter="Name"
```

Usa `search-docs` (Boost) prima di modifiche framework. Regole Laraxot: wiki on-demand.

*Stub ≤50 righe — 2026-06-06*
