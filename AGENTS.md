# AGENTS.md — On-Demand Stub

Regole, skill e memorie vivono solo in `docs/wiki/`. Caricamento on-demand via QMD.

## Read First

1. [Bootstrap compatto](bashscripts/ai/wiki/concepts/agents-harness-tooling.md#agent-bootstrap-compact)
2. [Trigger Map](bashscripts/ai/wiki/rules/00-TRIGGER_MAP.md) — una riga per task
3. `bashscripts/docs/second-brain-healthcheck.sh "<topic>"`
4. `bashscripts/docs/llm-wiki-qmd.sh search "<topic>" -n 5 --files`
5. Prompt harness: [bashscripts/tools/prompts/llm-wiki.txt](bashscripts/tools/prompts/llm-wiki.txt)

## Laravel app

- [laravel/AGENTS.md](laravel/AGENTS.md) — entrypoint codice PHP/Filament
- PHPStan L10, Pest, XotBase — dettagli in wiki, non qui

## Critical (always)

- **Harness** ([guida](laravel/Modules/Xot/docs/concepts/agent-harness-guide.md)): prima di toccare un modulo/tema leggi il suo `docs/adr/README.md` (perché) e `docs/contracts/README.md` (cosa promette); un'Action con effetti collaterali ha `@contract` nel docblock: leggilo prima di cambiarla, aggiornalo nello stesso commit. Prima di dire «fatto»: `cd laravel && composer harness:check` + test del pacchetto. Se `.harness/bin/guard` blocca, fai ciò che dice o fermati con `[ATTESA-UMANO]: <domanda>`
- Mai Controllers FO — Folio + Volt + Laraxot
- Mai estendere Filament diretto — XotBase / LangBase
- Mai `RefreshDatabase` — `.env.testing` SQLite
- Committa e pusha su `dev` da solo, senza aspettare la richiesta, quando un blocco di lavoro è verificato (test verdi). Mai segreti, `.env` o file locali/demo nel commit
- Commit degli agenti AI: ognuno cita la GitHub issue a cui appartiene (`Refs #<n>` o `Closes #<n>` nel messaggio); se non esiste, aprila prima di committare. Vale per gli agenti, non per i commit di Marco. Niente git hook nel progetto: i controlli automatici, se servono, vanno in GitHub Actions.
- Test solo nella cartella `tests/` del modulo (`laravel/Modules/<Modulo>/tests`): mai in `laravel/tests/`
- `public_html` è la document root (non si cancella). Asset solo via symlink relativi: `public_html/themes/<Tema>` → `../../laravel/Themes/<Tema>/public`, `public_html/assets/<modulo minuscolo>` → `../../laravel/Modules/<Modulo>/public`; link creati con `php artisan xot:module-link` / `xot:theme-link` (o da `deploy.sh`) e versionati con `git add -f`; `.gitignore` accanto con `<nome>/` (ignora le copie vere) e `<nome>`. `AssetAction` non copia: i file vanno in `Modules/<Modulo>/public`. Niente `npm run copy`. Dettagli: `laravel/Modules/Xot/docs/wiki/concepts/public-html-symlink-assets.md`
- Stesso task multi-agente → una BMAD story canonica nell'owner corretto (`docs/stories/`, `Modules/*/docs/stories/` o `Themes/*/docs/stories/`) + lock + issue GitHub (`git remote -v`). `docs/chat/` è solo storico legacy.

*Stub ≤50 righe — SSoT: docs/wiki/*
