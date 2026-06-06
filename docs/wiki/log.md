# Wiki Log — TechPlanner Root

## [2026-06-06] composer | owners DRY index + script guard

- Creato `docs/wiki/rules/composer-module-owners-dry-index.md` — tabella eseguibile con owner canon
- Creato `bashscripts/tools/check-composer-module-dependency-owners.sh` + `composer-owners-index.sh`
- Verificato: root composer pulito, folio→Cms, activitylog→Activity

## [2026-06-06] bmad/architecture | 1 modello = 1 migrazione (N = N)

- Regola: modulo Pippo con 20 modelli owner → 20 file `create_*` (esistenza + unicità)
- SSoT: `docs/wiki/bmad/architecture-one-migration-per-model.md`, `docs/wiki/rules/one-migration-per-model.md`
- Tool: `bashscripts/tools/audit-duplicate-create-migrations.sh` (duplicati per tabella)
- Snapshot: `docs/wiki/concepts/module-artifact-parity-snapshot.md` — 16 moduli GAP, Seo OK
- Handoff: `docs/chat/handoff-bmad-one-migration-per-model.md` · Issue [#23](https://github.com/laraxot/base_techplanner_fila5/issues/23)

## [2026-06-06] migrate | SQLite user connection + PHPStan 0

- `php artisan migrate` → OK (Nothing to migrate; batch [2] Ran)
- Fix: `config/database.php` (no user MySQL hardcoded), `TenantServiceProvider` alias `connections.user`, migrazione `team_user` SQLite-safe
- PHPStan: 12→0 (`final` su *Data.php, `HasDynamicFillable` senza `isset`)
- Handoff: `docs/chat/handoff-phpstan-migrate-2026-06-06.md` · Issue [#22](https://github.com/laraxot/base_techplanner_fila5/issues/22)

## [2026-06-06] phpstan | 13 errori + handoff migrate coordinazione

- Errori: Xot/*Data.php `new static()` unsafe (11), TechPlanner Client `isset.property`
- Handoff: `docs/chat/handoff-phpstan-migrate-2026-06-06.md`
- Issue: [#22](https://github.com/laraxot/base_techplanner_fila5/issues/22)
- Regola: `data-sacred-no-destructive-db.md` vieta `--force`

## [2026-06-06] phpstan | swarm remediation 103 → 0 errori

- Fatal pre-scan: Employee widgets `XotBaseSchemaWidget`, enum merge corruption, `WorkHoursSummaryWidget` Override
- Swarm fix: Media Merge (Intervention v3), GeoTrait, TechPlanner profiles migration, Employee User senza LogsActivity
- Bootstrap: `phpstan_bootstrap.php` pin `main_module=TechPlanner` per Larastan Profile
- Memoria: `laravel/Modules/Xot/docs/wiki/memories/phpstan-remediation-swarm.md` (issue #28)

## [2026-06-06] frontmatter | techplanner-business-domain + bootstrap passo 0

- SSoT: sezione `## GitHub (tracciamento)` + `repo` in frontmatter · issue [#7](https://github.com/laraxot/base_techplanner_fila5/issues/7) · discussion [#8](https://github.com/laraxot/base_techplanner_fila5/discussions/8)
- `agent-bootstrap-compact.md`: passo 0 obbligatorio (gh + issues/discussions prima di salvare `.md`)
- Cursor rule rafforzata: `.cursor/rules/wiki-markdown-frontmatter-mandatory.mdc`

## [2026-06-06] multi-agent | docs/chat + GitHub — stesso task più agenti

- Regola standing utente: coordinamento via `docs/chat/` + issue/discussion (`git remote -v`)
- SSoT: [multi-agent-coordination-discipline.md](./how-to/multi-agent-coordination-discipline.md), [github-issue-agent-discipline.md](./how-to/github-issue-agent-discipline.md)
- Memoria: [multi-agent-coordination-standing.md](./memories/multi-agent-coordination-standing.md)
- Cursor: `.cursor/rules/multi-agent-coordination.mdc` (alwaysApply)
- Issue [#18](https://github.com/laraxot/base_techplanner_fila5/issues/18) · Discussion [#19](https://github.com/laraxot/base_techplanner_fila5/discussions/19)
- Handoff: `docs/chat/handoff-multi-agent-coordination.md`

## [2026-06-06] bmad/architecture | composer owner guard + verifica stato

- **Verificato**: `laravel/composer.json` root pulito (solo php, filament, nwidart)
- **Owner**: `laravel/folio` → Cms · `spatie/laravel-activitylog` → Activity
- **Guard**: `bashscripts/tools/check-composer-module-dependency-owners.sh` + integrazione `verify-llm-wiki.sh`
- Pilastro: [architecture-composer-module-dependency.md](./bmad/architecture-composer-module-dependency.md)

## [2026-06-06] multi-agent | docs/chat + GitHub issue/discussion

- Disciplina: `how-to/multi-agent-coordination-discipline.md`, `how-to/github-issue-agent-discipline.md` (creato — era referenziato ma mancante)
- Memoria standing + cursor rule `multi-agent-coordination.mdc`
- Bootstrap passo 0 multi-agente; trigger map aggiornato
- Handoff composer: `docs/chat/handoff-composer-module-dependency-2026-06-06.md` · issue [#20](https://github.com/laraxot/base_techplanner_fila5/issues/20)

## [2026-06-06] composer | folio→Cms, activitylog→Activity — pilastro BMAD

- Rimosso `laravel/folio` e `spatie/laravel-activitylog` da `laravel/composer.json` (anti-pattern root)
- Aggiunto `laravel/folio` in `Modules/Cms/composer.json`; rimosso da `Modules/Xot/composer.json`
- Activity già owner di `spatie/laravel-activitylog` in `Modules/Activity/composer.json`
- Pilastro BMAD: [architecture-composer-module-dependency.md](./bmad/architecture-composer-module-dependency.md)
- Wiki owner: Cms [laravel-folio-module-dependency.md](../laravel/Modules/Cms/docs/wiki/concepts/laravel-folio-module-dependency.md), Activity [spatie-activitylog-module-dependency.md](../laravel/Modules/Activity/docs/wiki/concepts/spatie-activitylog-module-dependency.md)
- Trigger map + standing memory + cursor rule aggiornati

## [2026-06-06] composer | spatie/laravel-pdf owner Xot + regola merge

- Ripristinato `MakePdfSpatieTestAction` con `Pdf::view()` (non bypass Browsershot)
- `spatie/laravel-pdf` già in `Modules/Xot/composer.json` — sync `composer update -W`
- Regola: `docs/wiki/rules/composer-module-dependency-go.md` + Cursor rule + memoria standing
- Wiki Xot: `concepts/spatie-laravel-pdf-module-dependency.md`
- Rimosso duplicato `tests/Support/Actions/Pdf/MakePdfSpatieTestAction.php` (DRY)

## [2026-06-06] phpstan | swarm Modules 103 → 0 errori

- Sbloccati fatal: Blog/Spatie Comments, User/Comment, Employee `#[Override]`
- Swarm parallelo: Xot, User, Employee, TechPlanner, Blog, Media, Geo, Notify, UI, Seo
- Cross-trait: HasDynamicFillable, EnumTrait, GeoTrait whereRaw bindings, HasGdpr
- Memoria: [phpstan-modules-zero-2026-06-06.md](./memories/phpstan-modules-zero-2026-06-06.md)
- Comando: `cd laravel && ./vendor/bin/phpstan analyse --memory-limit=-1` → **OK**

## [2026-06-06] frontmatter | issues + discussions obbligatori su wiki TechPlanner

- Corretto `techplanner-business-domain.md` e tutti i `.md` in `Modules/TechPlanner/docs/wiki/`
- Issue [#7](https://github.com/laraxot/base_techplanner_fila5/issues/7) + Discussion [#8](https://github.com/laraxot/base_techplanner_fila5/discussions/8) (dominio business)
- Issue [#9](https://github.com/laraxot/base_techplanner_fila5/issues/9) + Discussion [#10](https://github.com/laraxot/base_techplanner_fila5/discussions/10) (AI harness)
- Regola standing [#11](https://github.com/laraxot/base_techplanner_fila5/issues/11) + Discussion [#12](https://github.com/laraxot/base_techplanner_fila5/discussions/12)
- Memoria: `docs/wiki/memories/frontmatter-github-links-mandatory-standing.md`
- Cursor rule: `.cursor/rules/wiki-markdown-frontmatter-mandatory.mdc`

## [2026-06-06] bmad | reinstall v6.0.2 aj-geddes (commit b5c6403)

- Global: `./install-v6.sh` → `~/.claude/skills/bmad`, 15 comandi `~/.claude/commands/bmad/`
- Progetto: `install-bmad-v6-project.sh --force` → `bmad/v6/`, router `.claude/skills/bmad/`, 16 wrapper comandi
- Config: `bmad/config.yaml`, `docs/bmm-workflow-status.yaml`, `docs/stories/`
- Source: https://github.com/aj-geddes/claude-code-bmad-skills

## [2026-06-06] bmad | install v6.0.2 aj-geddes + workflow-init progetto

- Global: `~/.claude/skills/bmad`, 15 slash commands in `~/.claude/commands/bmad/`
- Progetto: `bmad/config.yaml`, `docs/bmm-workflow-status.yaml`, `docs/stories/`
- Wiki: `docs/wiki/bmad/architecture.md` + pilastri copiati da canon Laraxot
- Source: https://github.com/aj-geddes/claude-code-bmad-skills

## [2026-06-06] wiki | modulo TechPlanner (dominio business)

- Creato `laravel/Modules/TechPlanner/docs/wiki/` (index, concepts, entities, harness)
- QMD: `tp-mod-techplanner-wiki`
- SSoT business: `techplanner-business-domain.md`

## [2026-06-06] second-brain | massimizzazione efficienza QMD + workflow

- Fix `llm-wiki-qmd.sh`: usa qmd v25 (v22 falliva con Node 25)
- Collection `base_techplanner_fila5` (34k+ md) + `techplanner-wiki` (regole root)
- Collection per modulo/tema: `tp-mod-*-wiki`, `tp-theme-*-wiki`
- Script: `setup-techplanner-qmd-collections.sh`, healthcheck aggiornato
- Skill: `cursor-second-brain-max-workflow.md`, `docs/chat/INDEX.md`
- Bootstrap: search `-c techplanner-wiki` (non più fixcity collections)
- Pending: `qmd embed` per ricerca semantica (18489 hash)

## [2026-06-06] bootstrap | llm-wiki prompt execution
- Created root `docs/wiki/` structure (was missing)
- Copied canonical files from `bashscripts/ai/`
- Triggered by `bashscripts/tools/prompts/llm-wiki.txt`
- QMD collections: `techplanner-root-docs`, `techplanner-bashscripts-docs`, `techplanner-xot-docs`
- `qmd update` OK — embed pending (3754 hashes, CPU-only)
- `verify-llm-wiki.sh`: wiki structure PASS; MCP stack + Folio semantic dirs FAIL (pre-existing)

## [2026-06-06] second brain optimization | tier QMD + ingest
- Concept: `concepts/second-brain-techplanner-efficiency.md`, `how-to/qmd-search-guide.md`
- Memory: `memories/techplanner-second-brain-bootstrap-2026-06-06.md`
- Scripts: `init-techplanner-qmd-collections.sh`, `sync-wiki-rules-from-ai.sh` (concepts merge, no delete)
- Removed QMD bloat collection `base_techplanner_fila5` (34k files)
- Embed wiki-tier avviato in background (`init-techplanner-qmd-collections.sh --embed-wiki`, CPU-only)
- Fixed merge conflicts in `bashscripts/docs/setup-llm-wiki-structure.sh`
- Root `.mcp.json`: minimum stack (context-mode, playwright, puppeteer, token-optimizer, laravel-boost)
- `.gitignore`: added `.cache/` and `*.cache`
- Slim stubs: `AGENTS.md`, `CLAUDE.md`, `laravel/AGENTS.md`, `laravel/CLAUDE.md` (≤50 righe)
- Sixteen Folio: removed 13 forbidden semantic dirs; showcase → `pages/tests/`; `pages.view` → `container0.detail` in partials/auth
- `pages.view` reference preserved in `Themes/Sixteen/.../tests/pages-view-reference.blade.php`

## [2026-06-06] phpstan | full project 0 errori + swarm definitivo
- Employee: 12 errori (Override, return.type, class.notFound) → 0
- TechPlanner: da 1 errore (Safe json_decode Worker.php) → 0 (composer update risolve)
- Full project: 6 → 0 errori ✅
- Fix: rimosso `TimeclockPage.php` duplicato (merge residue)
- Fix: `InteractsWithComments` rimosso da BaseUser.php (User non dipende da Comment)
- Pkg: `spatie/laravel-pdf` installato in Modules/Xot (MakePdfSpatieTestAction)
- Pkg: `spatie/laravel-activitylog` già in Modules/Activity (verificato)
- Pkg: `laravel/folio` già in Modules/Cms (verificato, root già pulito)
- Rule: `docs/wiki/rules/composer-module-dependency-go.md` + memoria standing
- QMD embed: 288/20488 vettori (CPU, in background)
- BMAD v6: installato aj-geddes/claude-code-bmad-skills v6.0.2 (9 skills, 15 comandi)
