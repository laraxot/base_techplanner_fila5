# AGENTS.md — On-Demand Stub

Regole, skill e memorie vivono solo in `docs/wiki/`. Caricamento on-demand via QMD.

## Read First

1. [Bootstrap compatto](docs/wiki/concepts/agent-bootstrap-compact.md)
2. [Trigger Map](docs/wiki/rules/00-TRIGGER_MAP.md) — una riga per task
3. `bashscripts/docs/second-brain-healthcheck.sh "<topic>"`
4. `bashscripts/docs/llm-wiki-qmd.sh search "<topic>" -c techplanner-wiki -n 5 --files`
5. Prompt harness: [bashscripts/tools/prompts/llm-wiki.txt](bashscripts/tools/prompts/llm-wiki.txt)

## Laravel app

- [laravel/AGENTS.md](laravel/AGENTS.md) — entrypoint codice PHP/Filament
- PHPStan L10, Pest, XotBase — dettagli in wiki, non qui

## Critical (always)

- Mai Controllers FO — Folio + Volt + Laraxot
- Mai estendere Filament diretto — XotBase / LangBase
- Mai `RefreshDatabase` — `.env.testing` SQLite
- Committa e pusha su `dev` da solo, senza aspettare la richiesta, quando un blocco di lavoro è verificato (test verdi). Mai segreti, `.env` o file locali/demo nel commit
- Test solo nella cartella `tests/` del modulo (`laravel/Modules/<Modulo>/tests`): mai in `laravel/tests/`
- Stesso task multi-agente → una BMAD story canonica nell'owner corretto (`docs/stories/`, `Modules/*/docs/stories/` o `Themes/*/docs/stories/`) + lock + issue GitHub (`git remote -v`). `docs/chat/` è solo storico legacy.

*Stub ≤50 righe — SSoT: docs/wiki/*
