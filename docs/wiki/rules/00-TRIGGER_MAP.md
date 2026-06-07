---
title: "Unified Trigger Map"
type: rule
tags: [trigger-map, on-demand, routing, bootstrap, mandatory-discipline]
created: 2026-05-12
updated: 2026-05-26
qmd: "trigger map bootstrap sessione agente ROUTING mandatory discipline automatic load git merge markers frontmatter github"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/11"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/12"
related:
  - ./wiki-markdown-frontmatter-mandatory.md
  - ../memories/frontmatter-github-links-mandatory-standing.md
---

# 00-TRIGGER_MAP

> **Routing canonico.** Prima il pacchetto **BOOTSTRAP SESSIONE AGENTE** (prima riga della tabella) — così la disciplina diventa **meccanica**, non dalla memoria del modello.

## Contratto automatico (wiki = legge operativa)

1. **Bootstrap** — prima di modificare file nel repo (`.md`, `.php`, config, MCP, ecc.), caricare tutti i path della riga **BOOTSTRAP SESSIONE AGENTE** (prima riga tabella); esclude solo risposte teoricamente «una riga» senza toccare il tree del repo.
2. **Routing incrementale** — individuare la riga più specifica (Compaction, Filament, MySQL…); caricare solo i path elencati, non intere cartelle.
3. **Verifica caricamento** — `qmd search "<trigger keywords>" --limit 5` o `Read` puntuali.
4. **Chiusura** — `docs/wiki/how-to/github-issue-agent-discipline.md` + aggiornare `docs/wiki/log.md` se la policy pubblica cambia.

## Triggers

| Trigger | Load |
|---|---|
| **BOOTSTRAP SESSIONE AGENTE** _(obbligatorio — ≤100 righe, STORY-150)_ | `docs/wiki/concepts/agent-bootstrap-compact.md` _(SSoT unico)_ · `.cursor/rules/agent-bootstrap-on-demand.mdc` · on-demand: `context-overflow-prevention.md`, `github-issue-agent-discipline.md` |
| New module/theme | `docs/wiki/concepts/module-structure.md`, `docs/wiki/rules/theme-module-docs-readme-mandatory.md` |
| Modulo/tema senza `docs/README.md` / manutenzione cartella `docs/` in `Modules/*` o `Themes/*` | `docs/wiki/rules/theme-module-docs-readme-mandatory.md`, `docs/wiki/standards/module-theme-readme-dual.md`, `docs/wiki/rules/markdown-documentation-standard.md` |
| README doppio root + docs / sync batch moduli-temi | `docs/wiki/standards/module-theme-readme-dual.md`, `bashscripts/tools/sync-module-theme-readmes.mjs` |
| Architecture decision | `docs/wiki/concepts/architecture-guardrails.md`, `docs/wiki/rules/on-demand-pattern.md` |
| **Volt + parametri route** / `mount()` / `request()->route()` in Volt / `Undefined variable $container0` / `$this->` dentro `@volt` | `docs/wiki/rules/laravel/volt-route-params-via-mount.md`, `docs/wiki/memories/volt-route-params-mount-contract.md`, `../../../laravel/Themes/Sixteen/docs/wiki/concepts/folio-route-params-mount.md`, `.cursor/rules/folio-route-params-mount.mdc`, `docs/wiki/troubleshooting/volt-this-scope-undefined-variable.md` |
| **Folio `container0.index`** / `container0.list` deprecato / mount lista lineare / Filament way `.index` | `docs/wiki/memories/folio-container0-index-filament-way.md`, `laravel/Themes/Sixteen/docs/folio-page-pattern.md`, `laravel/Themes/Sixteen/docs/wiki/rules/volt-usage-rule.md`, `docs/wiki/memories/container0-pattern-philosophy.md` |
| `/bmad/architecture` / schema DB / migrate / dati sacri / parità modulo | `docs/wiki/bmad/architecture.md`, `docs/wiki/bmad/architecture-composer-module-dependency.md`, `docs/wiki/bmad/architecture-data-sacred-no-destructive-db.md`, `docs/wiki/bmad/architecture-one-migration-per-model.md`, `docs/wiki/bmad/architecture-module-model-artifact-parity.md`, `docs/wiki/bmad/architecture-migration-update-timestamps-only.md`, `docs/wiki/concepts/hackernoon-ai-coding-tips-fixcity-map.md`, `bashscripts/tools/audit-module-artifact-parity.sh`, `bashscripts/tools/check-composer-module-dependency-owners.sh`, `bashscripts/tools/audit-migration-timestamp-redundancy.sh`, `.cursor/rules/data-sacred-no-destructive-db.mdc`, `.cursor/rules/one-migration-per-model.mdc`, `.cursor/rules/module-model-artifact-parity.mdc`, `.cursor/rules/migration-update-timestamps-only.mdc`, `.cursor/rules/composer-module-dependency-go.mdc` |
| HackerNoon tips / AI harness / llm-wiki prompt | `docs/wiki/concepts/hackernoon-ai-coding-tips-fixcity-map.md`, `bashscripts/tools/prompts/llm-wiki.txt`, `docs/wiki/concepts/llm-wiki-operational-discipline.md` |
| Migrazione timestamps / updateTimestamps ridondanza | `migration-update-timestamps-only.md`, `architecture-migration-update-timestamps-only.md`, `audit-migration-timestamp-redundancy.sh`, `.cursor/rules/migration-update-timestamps-only.mdc` |
| Modulo User / BaseUser / auth identity | `laravel/Modules/User/docs/wiki/concepts/no-comment-module-dependency.md`, `.cursor/rules/user-no-comment-module-dependency.mdc`, `bashscripts/tools/check-user-no-comment-dependency.sh` |
| Composer / pacchetto modulo / PHPStan `class.notFound` / folio / activitylog | `composer-module-dependency-go.md`, `composer-module-owners-dry-index.md`, `memories/composer-module-dependency-go-standing.md`, `laravel/Modules/Cms/docs/wiki/concepts/laravel-folio-module-dependency.md`, `laravel/Modules/Activity/docs/wiki/concepts/spatie-activitylog-module-dependency.md`, `laravel/Modules/Xot/docs/wiki/concepts/spatie-laravel-pdf-module-dependency.md`, `.cursor/rules/composer-module-dependency-go.mdc` |
| Nuovo o edit `.md` wiki / modulo / tema | `wiki-markdown-frontmatter-mandatory.md`, `architecture-wiki-frontmatter-github.md`, `skills/wiki-markdown-frontmatter.md`, `bashscripts/tools/validate-wiki-frontmatter.sh`, `.cursor/rules/wiki-markdown-frontmatter-mandatory.mdc` |
| Wiki/doc maintenance | `docs/wiki/concepts/second-brain-operating-model.md`, `docs/wiki/concepts/second-brain-continuous-improvement.md` |
| Nuovo o edit `.md` wiki / standard YAML + atomicità | `docs/wiki/rules/markdown-documentation-standard.md`, `docs/wiki/concepts/markdown-note-minimum-standard.md`, `docs/wiki/concepts/second-brain-operating-model.md` |
| Second brain quality / wiki maintenance | `docs/wiki/concepts/second-brain-operating-model.md`, `docs/wiki/concepts/second-brain-continuous-improvement.md`, `docs/wiki/concepts/second-brain-audit-checks.md` |
| Second brain — Redis / Elasticsearch / QMD stack | `docs/wiki/concepts/second-brain-search-stack.md` |
| Rules on-demand / skill routing | `docs/wiki/rules/on-demand-pattern.md`, `docs/wiki/skills/INDEX.md` |
| Skill needed | `docs/wiki/skills/INDEX.md` |
| Skill authoring / reusable workflow | `docs/wiki/skills/on-demand-skill-maintenance.md`, `docs/wiki/rules/on-demand-pattern.md` |
| Command reference | `docs/wiki/commands/INDEX.md` |
| Multi-agent coordination / stesso task più agenti / docs/chat / per-module repo lock | `docs/wiki/how-to/multi-agent-coordination-discipline.md`, `docs/wiki/memories/multi-agent-coordination-standing.md`, `docs/chat/INDEX.md`, `.cursor/rules/multi-agent-coordination.mdc`, `docs/wiki/how-to/github-issue-agent-discipline.md` |
| Pattern/memory recall | `docs/wiki/memories/INDEX.md` |
| Agent coordination | `docs/wiki/agents/INDEX.md` |
| Massima confidenza agente / verifica prima di concludere | `docs/wiki/rules/agent-confidence-protocol.md`, `docs/wiki/memories/agent-confidence-protocol.md` |
| Ripartenza sessione / handoff agente / «continua da ieri» | `docs/chat/handoff-job-lang-merge-phpstan-confidence.md`, `docs/chat/README.md`, `docs/wiki/memories/module-github-remote-discipline.md` |
| QMD search | `docs/wiki/how-to/qmd-search-guide.md` |
| GitHub issue ↔ wiki (audit trail agent) | `docs/wiki/how-to/github-issue-agent-discipline.md`, `docs/wiki/how-to/multi-agent-coordination-discipline.md` |
| Issue GitHub moduli/temi (`git remote -v` in `Modules/*` / `Themes/*`) | `docs/wiki/how-to/module-theme-github-issues.md`, `docs/chat/module-theme-github-issues-manifest.md` |
| GitHub Actions semantic release / auto release mono | `docs/wiki/how-to/github-actions-semantic-release-stack.md`, `.github/workflows/release.yml`, `.github/workflows/semantic-versioning.yml` |
| Changelog analytics / report contributori / grafici CI | `docs/wiki/how-to/github-actions-changelog-analytics.md`, `.github/workflows/changelog-advanced.yml`, `bashscripts/ci/generate-changelog-report.mjs` |
| PR Dependabot moduli/temi (merge autonomo, remote `laraxot`) | `docs/wiki/how-to/module-theme-dependabot-pr-autonomy.md`, `bashscripts/ci/dependabot-merge-module-prs.sh`, `docs/wiki/how-to/dependabot-discipline.md` |
| Residui conflitto Git (`<<<<<<<` / `>>>>>>>` / separatori, template `docs/` corrotti) | `docs/wiki/how-to/git-merge-marker-sweep.md`, `docs/wiki/memories/merge-collision-filament-table-signature.md`, `laravel/Modules/Notify/docs/wiki/memories/merge-collision-notify-lessons.md`, `docs/wiki/sources/git-collision-docs-cleanup-report.md` |
| Filament `getTableColumns` / classi `*Table` | `docs/wiki/concepts/xotbase-table-columns-enforcement.md`, `docs/wiki/rules/gettablecolumns-keys-rule.md`, `bashscripts/ci/check-get-table-columns-instance.sh` |
| Creare/chiudere issue GitHub senza chiedere all’utente | `docs/wiki/how-to/github-issue-agent-discipline.md`, `docs/wiki/memories/github-issues-proactive.md` |
| GitHub Discussions multi-agente / firma agente AI / abilitare discussions su repo `laraxot/*` | `docs/wiki/memories/github-discussions-agent-signature.md` |
| PHPStan per modulo / report `phpstan*.md` in `Modules/*/docs` | `bashscripts/tools/prompts/phpstan_module.txt`, `docs/wiki/memories/phpstan-module-markdown-naming.md`, `docs/wiki/rules/markdown-documentation-standard.md` |
| PHPStan unknown class Spatie ModelStates / Xot States | `docs/wiki/memories/spatie-model-states-php84.md`, `laravel/Modules/Xot/docs/wiki/concepts/laravel13-modular-package-compatibility-matrix.md` |
| Passaggio MySQL → MariaDB (WSL / datadir) | `docs/wiki/how-to/switch-mysql-to-mariadb.md`, `bashscripts/mysql/switch-to-mariadb.sh` |
| Mutex lock affiancato / validazione PHP post-edit | `docs/wiki/rules/validation-post-edit-rule.md`, `docs/wiki/memories/agent-verification-mandatory-no-dovrebbe.md` |
| Autocompact thrashing / «refilled within 3 turns» / runtime-telemetry token spike post-compact | `docs/wiki/rules/autocompact-thrashing-discipline.md` (**disciplina obbligatoria — caricamento automatico via trigger**), `docs/wiki/how-to/autocompact-thrashing-recovery.md` (**playbook canonico + recovery**), `docs/wiki/concepts/context-overflow-prevention.md` |
| Token overflow / API «maximum context length is 131072» | `docs/wiki/how-to/api-context-length-exceeded-131072.md`, `docs/wiki/concepts/context-overflow-prevention.md`, `docs/chat/context-api-131072-overflow.md` _(CI: opzionale `scripts/ai_token_guard.py`; template issue collegato se serve)_ |
| Token overflow / 262K / API 400 / compaction / Cursor «Compaction exhausted» | `docs/wiki/concepts/context-overflow-prevention.md`, `docs/wiki/memories/compaction-exhausted-recovery.md` _(workflow: `.github/workflows/context-index.yml`; preflight: `scripts/ai_token_guard.py` su letture voluminose)_ |
| Claude usa troppi token per chiamata / tool output troppo largo / `git status` enorme | `docs/wiki/rules/token-optimization-discipline.md` (**disciplina automatica obbligatoria**), `docs/wiki/rules/autocompact-thrashing-discipline.md`, `docs/wiki/concepts/context-overflow-prevention.md` |
| Agent bootstrap / token / second brain on-demand | `docs/wiki/concepts/agent-bootstrap-compact.md`, `docs/wiki/memories/agent-token-bootstrap-slim.md`, `docs/wiki/rules/on-demand-pattern.md` |
| AGENTS.md enorme / BMAD rigenerato / bootstrap troppo grande | `docs/wiki/concepts/agent-bootstrap-compact.md`, `docs/wiki/concepts/context-overflow-prevention.md`, `bashscripts/ai/rules/bmad.md` |
| LLM wiki discipline / git policy / cache discipline / bootstrap stub size | `docs/wiki/concepts/llm-wiki-operational-discipline.md` |
| HackerNoon AI Coding Tips 001–022 / llm-wiki.txt prompt | `docs/wiki/concepts/hackernoon-ai-coding-tips-fixcity-map.md`, `bashscripts/tools/prompts/llm-wiki.txt` |
| MCP minimum stack (context-mode, playwright, puppeteer, token-optimizer, laravel-boost) | `docs/wiki/how-to/mcp-minimum-stack.md`, `docs/wiki/_templates/mcp-minimum-stack.json` |
| UI/UX MCP on-demand (Impeccable, Flowbite, daisyUI Blueprint, Windframe, Tailkit, UI UX Pro Max) | `docs/wiki/concepts/ui-ai-tooling-on-demand.md`, `docs/wiki/concepts/ui-ai-tooling-on-demand-matrix.md`, `docs/wiki/concepts/impeccable-frontend-design-on-demand.md` |
| MCP config contiene path assoluti workspace / `.cursor/mcp.json` non portabile | `docs/wiki/how-to/context-mode-setup.md`, `docs/wiki/how-to/mcp-minimum-stack.md`, `docs/wiki/rules/00-TRIGGER_MAP.md` |
| Attivare/configurare context-mode MCP / `ctx` o `context-mode` non trovato | `docs/wiki/rules/token-optimization-discipline.md`, `docs/wiki/how-to/context-mode-setup.md`, `docs/wiki/concepts/context-mode-optimal-configuration.md` |
| Permission/RBAC | `docs/wiki/concepts/spatie-permission-teams-laravel-13.md` |
| BMAD workflow (generico) / v6 install | `docs/wiki/concepts/bmad-operating-model.md`, `docs/wiki/skills/bmad-on-demand-routing.md`, `docs/wiki/rules/bmad-v6-on-demand.md` |
| BMAD slash `/workflow-init` `/workflow-status` `/architecture` `/dev-story` | `docs/wiki/commands/bmad-slash-commands.md`, `.claude/commands/bmad/<command>.md`, `docs/wiki/skills/bmad-on-demand-routing.md` |
| BMAD ufficiale `_bmad` / `bmad-help` | `bashscripts/ai/rules/bmad.md`, `_bmad/_config/bmad-help.csv` |
| Discussione multi-agente AI / firma issue-discussion | `docs/wiki/how-to/github-issue-agent-discipline.md`, `docs/wiki/memories/github-discussions-agent-signature.md` |
| Laravel upgrade | `docs/wiki/concepts/laravel13-modular-composer-upgrade.md` |
| Accessor/mutator | `docs/wiki/concepts/accessor-auto-persistence.md` |
| Filament ->label() / traduzioni | `docs/wiki/rules/filament-rules-summary.md`, `docs/wiki/rules/schema-conventions.md` |
| Filament class extension / XotBase | `docs/wiki/rules/filament-rules-summary.md`, `docs/wiki/rules/xotbase-critical-rules.md` |
| Filament versione stack (**v5**, non v4) | `docs/wiki/memories/filament-version-policy.md`, `laravel/Modules/Xot/docs/filament-5-laraxot-rules.md` |
| Filament resource/page/widget | `docs/wiki/rules/xotbase-critical-rules.md`, `docs/wiki/rules/ai-guidelines.md` |
| Filament $resource property / visibilità | `docs/wiki/rules/filament-resource-property.md` |
| XotBaseListRecords / getResource auto-resolve | `docs/wiki/rules/filament-resource-property.md` |
| Skill: crea filament page | `laravel/Modules/Xot/docs/wiki/skills/filament-page-creation.md` |
| Namespace modulo / `\app\` nel namespace | `docs/wiki/rules/laraxot-module-namespace.md` |
| User Filament translations / LangServiceProvider | `laravel/Modules/User/docs/wiki/rules/INDEX.md`, `laravel/Modules/User/docs/wiki/skills/filament-translation-audit.md` |
| Lang translation keys / translation ownership | `laravel/Modules/Lang/docs/wiki/rules/translation-key-governance.md`, `laravel/Modules/Lang/docs/wiki/skills/translation-key-audit.md` |
| Stile risposta agenti (sintetico + conciso + italiano obbligatorio) | `docs/wiki/memories/response-style-sintetico-conciso-italiano.md` |
| Dependabot / security alert `laraxot/module_*` / vite npm / PR app/dependabot | `docs/wiki/how-to/dependabot-discipline.md`, `docs/wiki/memories/dependabot-check-discipline.md`, `bashscripts/ci/dependabot-security-repos.sh`, `bashscripts/ci/dependabot-sweep.sh` |
| Activity XotBaseResource zen pattern | `laravel/Modules/Activity/docs/wiki/rules/INDEX.md`, `laravel/Modules/Activity/docs/wiki/concepts/xotbase-resource-zen-pattern.md` |
| Rating Filament resource zen pattern | `laravel/Modules/Rating/docs/wiki/rules/INDEX.md`, `laravel/Modules/Rating/docs/wiki/concepts/filament-resource-zen-pattern.md` |
| Semantic versioning / auto release / auto changelog / README marketing moduli-temi | `docs/wiki/rules/semantic-release-module-theme-standard.md` |
| Dependabot audit & remediation (permanent discipline, all modules + themes) | `docs/wiki/memories/dependabot-audit-permanent-discipline.md`, GitHub #154 |
| Git atomic / forward-only commits | `docs/wiki/rules/git-atomic-operations.md` |
| Memory system / durable decisions | `docs/wiki/how-to/memory-system-usage.md`, `docs/wiki/memories/INDEX.md` |
| Skill discovery | `docs/wiki/how-to/skill-discovery.md`, `docs/wiki/skills/INDEX.md` |
| Rule atomicity / one idea per file | `docs/wiki/rules/rule-atomicity.md` |
| Wiki activity log / audit trail | `docs/wiki/log.md`, `docs/wiki/how-to/github-issue-agent-discipline.md` |
| Wikilink / cross-reference cleanup | `docs/wiki/how-to/wikilink-cross-reference.md` |
| Context-mode / ctx compression / verifica installazione | `docs/wiki/concepts/context-mode-usage.md`, `docs/wiki/how-to/context-mode-setup.md`, `docs/wiki/concepts/context-mode-cli-reference.md` |
| PHPStan module analysis | `docs/wiki/rules/phpstan-rules.md` |
| New module wiki bootstrap | `docs/wiki/how-to/module-wiki-documentation.md`, `docs/wiki/concepts/module-structure.md` |
| Module/Theme semantic release + marketing README (vetrina) | `docs/wiki/standards/module-theme-release-showcase-standard.md` + root `.github/workflows/semantic-release.yml` + `module-release.yml` |
| property_exists on Eloquent | `docs/wiki/rules/coding-standards.md`, `docs/wiki/memories/eloquent-hasattribute-not-property-exists.md` |
| Compaction exhausted / Cursor recovery | `docs/wiki/memories/compaction-exhausted-recovery.md`, `.cursor/rules/cursor-context-discipline.mdc`, `laravel/.cursor/rules/laravel-boost.mdc` (stub — non usare monolite `.bak`) |
| XotBase / no direct Filament extend | `docs/wiki/memories/xotbase-never-extend-filament.md`, `docs/wiki/rules/xotbase-critical-rules.md` |
| Tool selection hierarchy / context-safe usage | `docs/wiki/rules/context-safe-tool-usage.md` |

| Autocompact thrashing | docs/wiki/solutions/context_overflow_prevention.md, docs/wiki/rules/autocompact-thrashing-discipline.md |

## Enforcement (obbligatoria — include bootstrap)

Ogni agente DEVE:

1. **Eseguire il BOOTSTRAP** (prima riga tabella «BOOTSTRAP SESSIONE AGENTE») prima di modifiche sostanziali o di sequenze di tool che toccano la codebase — **nessuna eccezione** «solo quick fix», salvo reply puramente conversazionale senza accesso al tree.
2. **Applicare il trigger dominante**: caricare unicamente i file della/e riga/e corrispondente/i; combinare bootstrap + riga specifica se serve.
3. **`git remote -v`** + **`gh issue list …`** come da `docs/wiki/how-to/github-issue-agent-discipline.md`; commentare l’issue a fine task.
4. **Evitare** letture/integration di contesto larghi prima di aver caricato le policy delle righe scelte (`Read` chunked, MCP `ctx_*` dove configurato).
5. **Propagare qui** ogni fallimento ricorrente: nuova riga trigger o aggiornamento path.

## Usage

```bash
qmd search "<trigger topic>" --limit 5
```

Or browse a whole category:

```javascript
mcp__plugin_qmd_qmd__search("topic", "fixcity-docs")
```

---

## BMAD v6 (on-demand — project-local)
| Model Eloquent modulo | module-basemodel-pattern.md, Fixcity module-basemodel-rule |

| Trigger / Keyword | Carica prima | Poi |
|---|---|---|
| `brief`, `product brief`, `/bmad-product-brief` | `rules/bmad-v6-on-demand.md` | `skills/bmad-on-demand-routing.md` → `.claude/commands/bmad/product-brief.md` |
| `brainstorm`, `ideation`, `/bmad-brainstorm` | `rules/bmad-v6-on-demand.md` | `skills/bmad-on-demand-routing.md` → `.claude/commands/bmad/brainstorm.md` |
| `research`, `/bmad-research` | `rules/bmad-v6-on-demand.md` | `skills/bmad-on-demand-routing.md` → `.claude/commands/bmad/research.md` |
| `PRD`, `tech spec`, `/bmad-prd`, `/bmad-tech-spec` | `rules/bmad-v6-on-demand.md` | `skills/bmad-on-demand-routing.md` → `.claude/commands/bmad/prd.md` |
| `architecture`, `system design`, `/bmad-architecture` | `rules/bmad-v6-on-demand.md` | `skills/bmad-on-demand-routing.md` → `.claude/commands/bmad/architecture.md` |
| `user story`, `create story`, `/bmad-create-story` | `rules/bmad-v6-on-demand.md`, **`rules/bmad-story-github-links-mandatory.md`** | `skills/bmad-on-demand-routing.md` → `.claude/commands/bmad/create-story.md` |
| Modifica `docs/stories/STORY-*.md`, story BMAD senza link GitHub | **`rules/bmad-story-github-links-mandatory.md`**, `memories/bmad-story-github-links-mandatory.md` | — |
| `sprint planning`, `/bmad-sprint-planning` | `rules/bmad-v6-on-demand.md` | `skills/bmad-on-demand-routing.md` → `.claude/commands/bmad/sprint-planning.md` |
| `dev story`, `implement story`, `/bmad-dev-story` | `rules/bmad-v6-on-demand.md` | `skills/bmad-on-demand-routing.md` → `.claude/commands/bmad/dev-story.md` |
| `UX design`, `/bmad-create-ux-design` | `rules/bmad-v6-on-demand.md` | `skills/bmad-on-demand-routing.md` → `.claude/commands/bmad/create-ux-design.md` |
| `create agent`, `/bmad-create-agent` | `rules/bmad-v6-on-demand.md` | `skills/bmad-on-demand-routing.md` → `.claude/commands/bmad/create-agent.md` |
| `workflow init`, `/bmad-workflow-init` | `rules/bmad-v6-on-demand.md` | `skills/bmad-on-demand-routing.md` → `.claude/commands/bmad/workflow-init.md` |
| `workflow status`, `/bmad-workflow-status` | `rules/bmad-v6-on-demand.md` | `skills/bmad-on-demand-routing.md` → `.claude/commands/bmad/workflow-status.md` |

> Mapping completo: `commands/bmad-v6.md`

---

## RULES (152+ files in `docs/wiki/rules/`)

| Trigger / Contesto | Rule File |
|---|---|
| **Multi-repo, git remote moduli/temi, repo GitHub modulo, repo GitHub tema** | **`multi-repo-modules-themes-map.md`** — `cd laravel/Modules/<Nome> && git remote -v` |
| **Architecture QueueableAction, NO Services, spatie/laravel-queueable-action** | **`no-services-rule.md`** — NEVER Services, ALWAYS QueueableActions |
| **`laravel/app/Services`**, **`App\Services`**, **TicketCategoryService**, business logic in `laravel/app/`** | **`no-services-rule.md`**, **`memories/no-laravel-app-services-nwidart.md`**, `.cursor/rules/no-laravel-app-services.mdc` |
| **Frontend stack, Tailwind, Alpine, Lit, DaisyUI, Flowbite, Filament, NO Bootstrap** | **`frontend-stack-canonical.md`** |
| **Naming blocchi CMS, sottocartelle blocks/, Tailwind UI, Flowbite blocks** | **`cms-block-naming-tailwind-flowbite.md`** |
| **View Components standalone in Modules** | **`no-standalone-view-components-in-modules.md`** — ONLY Filament widgets for lists, NO custom Component class |
| Context overflow, 100% context, compaction | `../concepts/context-overflow-prevention.md`, `../memories/cursor-user-rules-slim.md` |
| Translations namespace keys | `translation-navigation-placeholder-rule.md` |
| Lang directory structure | `no-lang-lang-no-underscore-docs.md` |
| Underscore directories | `underscore-directories.md` |
| Migration / schema / columns | `agents/rules/one-migration-per-model.md`, `guidelines/database-migrations-rules.md` |
| **Dati sacri** / migrate `--force` / `migrate --path` singolo file / `RefreshDatabase` | `rules/data-sacred-no-destructive-db.md`, `memories/data-sacred-no-destructive-db.md`, `bmad/architecture-data-sacred-no-destructive-db.md`, `.cursor/rules/data-sacred-no-destructive-db.mdc` |
| One model = one migration / bump timestamp filename | `memories/one-migration-per-model-bump-timestamp.md`, `agents/rules/one-migration-per-model.md` |
| Fixcity `profiles` schema / uuid / credits / owner migration | `laravel/Modules/Fixcity/docs/wiki/concepts/profiles-uuid-contract.md`, `.cursor/rules/one-migration-per-model.mdc` |
| Header del tema Sixteen | `header-auth-state.md` |
| Leaflet in wizard / mappa vuota | `leaflet-wizard-invalidate-size.md` |
| Leaflet container class | `leaflet-container-class-selector.md` |
| Livewire standalone, `app/Livewire`, `@livewire` frontoffice non Filament, `extends VoltComponent` standalone, typed property Livewire PHP 8.4 | `no-standalone-livewire-classes.md` |
| Marker mappa / SVG asset | `map-marker-custom-asset.md` |
| `map-lit`, geo-map-lit-local, fork mappa tema | `no-theme-map-lit-fork.md` |
| Modulo nwidart / PSR-4 / `Actions/` fuori `app/` / composer modulo | `namespace-structure-rules.md` + memoria `memories/incident-nwidart-class-outside-app.md` |
| BMAD dev-story / create-story / implementazione Laraxot | `concepts/bmad-laraxot-implementation-guardrails.md` + `rules/bmad-v6-on-demand.md` |
| Map interaction transparency | `map-interaction-transparency-rule.md` |
| SVG asset location | `svg-asset-location.md` |
| CoordinatePicker multi-col save | `coordinatepicker-multi-column-save.md` |
| CoordinatePicker state binding | `coordinate-picker-state-binding-rule.md` |
| LatLngInput extends XotBaseField | `latitudelongitudeinput-extends-xotbasefield.md` |
| Enum usage / standard Enums / `Modules\Xot\Traits\EnumTrait` obbligatorio | `enum-trait-required.md` + `enum-trait-standard.md` + `filament-enum-standard.md` |
| CSS specifico per pagina | `no-page-specific-css.md` |
| Build/CSS tema Sixteen | `theme-css-build-workflow.md` |
| Hash JS vite «congelato» vs manifest / pubblicazione tema | `memories/sixteen-vite-public-path-alpine-livewire-order.md` |
| Alpine `headerMobileNav` / `geoMapPickerField` undefined nel wizard tema | `memories/sixteen-vite-public-path-alpine-livewire-order.md` + wiki tema [`livewire-alpine-esm-order`](../../../laravel/Themes/Sixteen/docs/wiki/concepts/livewire-alpine-esm-order.md) |
| Tailwind `@apply` / alias CSS tema Sixteen | `tailwind-apply-sixteen-alias-rule.md` |
| Tema Sixteen — Tailwind + DaisyUI (skill) | `skills/sixteen-theme-tailwind-daisyui-governance.md` |
| Blade Icons / registerBladeIcons | `xotbase-blade-icons-auto-registration.md` |
| Filament first, `x-filament::`, tab Mappa/Elenco, preferire Blade Filament vs custom Bootstrap/Alpine | `filament-first-rule.md` |
| Filament 5.x — Section/Grid/Tabs/Wizard | `filament5-patterns.md` |
| Filament Widget + template Blade | `filament-template-as-dress.md` |
| Filament section namespace | concepts/filament5-section-namespace.md |
| Filament schema form access | concepts/filament5-schema-form-access-rule.md |
| Filament widget schema submit state | concepts/filament5-widget-schema-submit-state-rule.md |
| Filament summary in infolist | `filament-summary-infolist-rule.md` |
| Filament wizard summary infolist | `filament-wizard-summary-infolist-rule.md` |
| Filament dashboard filters debug | `filament_dashboard_filters_debug.md` |
| Filament column errors | `filament-column-errors-prevention.md` |
| Filament contacts column rules | `filament-contacts-column-rules.md` |
| Filament critical rules | `filament-critical-rules.md` |
| Filament custom columns rules | `filament-custom-columns-rules.md` |
| Filament list records methods | `filament-list-records-methods.md` |
| Filament method visibility | `filament-method-visibility.md` |
| Filament pages naming | `filament-pages-naming.md` |
| Filament table columns array keys | `filament-table-columns-array-keys.md` |
| XotBaseResourceTable / niente configure in sottoclassi | `xot-base-resource-table-no-configure.md` |
| Skill: XotBaseResourceTable | `skills/xot-base-resource-table.md` |
| Filament viewcolumn rules | `filament-viewcolumn-rules.md` |
| Filament template conventions | `filament-template-conventions.md` |
| Estrazione partial header Blade | `blade-component-extraction.md` |
| Component extraction header | `component-extraction-header.md` |
| Web Component canonical name | `web-component-canonical-name.md` |
| Lit element placement | `lit-element-placement.md` |
| Lit icons filament way | `lit-icons-filament-way.md` |
| Delete/remove file → rename `.old` | `no-rm-rename-to-old.md` |
| No root folders | `no-root-folders-rule.md` (concepts) |
| No root test docs | `no-root-test-docs-rule.md` (concepts) |
| **JS filename italiano / `segnalazione` nel path JS / filename Geo inglese / `popup-segnalazione`** | **`Modules/Geo/docs/wiki/rules/js-file-english-naming-rule.md`** — VIETATO italiano nei path `.js`; `segnalazione`→`ticket`, `buildSegnalazione*`→`buildTicket*` |
| No case-only variations | `no-case-only-variations.md` |
| No case variations | `no-case-variations.md` |
| No numbered filenames | `no-numbered-filenames.md` |
| No lang/lang path | `no-lang-lang-no-underscore-docs.md` |
| No composer simple UI | `no-composer-simple-ui.md` |
| No module folio pages | `no-module-folio-pages.md` |
| No refresh database in tests | `no-refresh-database-in-tests.md` |
| Never use refresh-database | `never-use-refresh-database.md` |
| **Prima di modificare un file (Lock + Quality Gate + GitHub + Chat)** | `rules/file-locking-validation-protocol.md` |
| **Lock file check pre-edit** | `rules/file-locking-validation-protocol.md` §1 |
| **Quality gate post-edit (6 tool)** | `rules/file-locking-validation-protocol.md` §2 |
| **GitHub issues interaction (gh + MCP)** | `rules/file-locking-validation-protocol.md` §3 |
| **Chat multi-agente `./docs/chat/`** | `rules/file-locking-validation-protocol.md` §4 |
| **Quality gate after edit (legacy)** | `rules/quality-gate-after-edit.md` |
| **Post-modifica verifica** | `rules/post-modifica-verifica-obbligatoria.md` |

### Second Brain Workflow (OBBLIGATORIO)

| Trigger / Contesto | Rule/Concept |
|---|---|
| Domanda architetturale | `qmd search "<topic>" --limit 5` PRIMA di rispondere |
| Decisione tecnica stabile | Dual write: `memory/` + `docs/wiki/concepts/` con cross-link |
| Fine sessione lavoro | Aggiorna `docs/wiki/log.md` + `docs/chat/INDEX.md` |
| Wiki modificato (>10 pagine) | `bashscripts/docs/llm-wiki-qmd.sh update` |
| Ricerca multi-step | `ctx_batch_execute` (NON Bash/Grep per >20 linee) |
| Lavoro non banale / multi-agente | Leggi `docs/chat/INDEX.md` prima di iniziare |
| Second brain usage audit | `concepts/second-brain-usage-gaps-and-improvements.md` |

### Module & Dependency Management

| Trigger / Contesto | Rule/Concept |
|---|---|
| PHPStan "unknown class" in modulo | `rules/module-vendor-isolation-rule.md` |
| Vendor locale in modulo | `rm -rf laravel/Modules/<Name>/vendor/` + `composer update -W` |
| Dipendenze modulo non risolte | Verificare `composer.json` del modulo, poi vendor isolation |
| Audit vendor locali | `find laravel/Modules -name "vendor" -type d` |

### Context & Token Management

| Trigger / Contesto | Rule/Concept/Skill |
|---|---|
| Token overflow error | `concepts/context-management.md` |
| Errore Cursor reasoning / output limit / nessuna risposta utile | `rules/agent-model-guards.md` |
| Argomento senza issue GitHub / non chiedere conferma per `issue create` | `memories/agent-github-issue-mandatory-cycle.md`, issue [#83](https://github.com/laraxot/base_fixcity_fila5/issues/83) |
| Context compression | `skills/context-compression.md` |
| Compress responses | `skills/context-compression.md` |
| Reduce token usage | `skills/context-compression.md` |
| Token budget allocation | `concepts/context-management.md` |
| Laraxot docs (sharded) | `laravel/Modules/Xot/docs/shards/INDEX.md` |

| Never use refreshDatabase with memory DB | `never-use-refreshdatabase-with-memory-db.md` |
| No docs archive | `no-docs-archive-rule.md` |
| No absolute paths in config | `no-absolute-paths-in-config.md` |
| PHPStan critical rules | `phpstan_critical_rules.md` |
| PHPStan execution | `phpstan_execution.md` |
| PHPStan usage | `phpstan_usage.md` |
| PHPStan config | `phpstan-config.md` |
| PHPStan no level parameter | `phpstan-no-level-parameter.md` |
| PHPMD standalone phar | `phpmd-standalone-phar-rule.md` |
| Pre-edit docs first | `pre-edit-docs-first.md` |
| Post-modifica verifica obbligatoria | `post-modifica-verifica-obbligatoria.md` |
| Quality gate dopo modifica | `quality-gate-after-edit.md` |
| Doc-005: Index file required | `docs-index-file.md` |
| Forced folders zero tolerance | `forbidden-folders-zero-tolerance-rule.md` |
| Forbidden folders | `forbidden-folders.md` |
| Coding standards | `coding-standards.md` |
| Acronym naming conventions | `acronym-naming-conventions.md` |
| Action execution pattern | `action-execution-pattern.md` |
| DRY actions/rules | `DRY-actions-rules.md` |
| Namespace rules | `namespace-rules.md` |
| Module documentation | `module-documentation.md` |
| Modularity | `modularity.md` |
| Eloquent properties | `eloquent-properties.md` |
| Deprecated casts property | `deprecated-casts-property.md` |
| Property exists eloquent | `property_exists_eloquent.md` |
| Model naming standards | `model_naming_standards.md` |
| Model naming singular | `model-naming-singular.md` |
| Foreign key constraints | `foreign-key-constraints.md` |
| Migration safety | `migration-safety.md` |
| Form schema conventions | `form-schema-conventions.md` |
| Configurations usage principles | `configurations-usage-principles.md` |
| Directory structure | `directory_structure.md` |
| Conventions | `conventions.md` |
| Trans-trait pattern | `trans-trait-pattern.md` |
| Email templates | `email-templates.md` |
| Service providers | `service-providers.md` |
| Volt component pattern | `volt-component-pattern.md` |
| Laraxot rules | `laraxot.md` |
| Laraxot docs standards | `laraxot-docs-standards.md` |
| Dependency documentation | `dependency-documentation.md` |
| Logging performance | `logging-performance.md` |
| Login redirect rules | `login-redirect-rules.md` |
| Validations | `validations.md` |
| Debugging | `debugging.md` |
| Architecture | `architecture.md` |
| Fundamental xotbase rule | `fundamental-xotbase-rule.md` |
| XotBase table columns enforcement | concepts/xotbase-table-columns-enforcement.md |
| Wiki sacred structure | `wiki-sacred-structure-rule.md` |
| Runtime URL verification | `runtime-url-verification-rule.md` |
| Verification discipline | `verification-discipline-always-check-the-exact-url.md` |
| Git solo avanti / mai rollback come fix agent | `git-forward-only.md` |
| **Mai creare/cambiare branch** / `checkout -b` / `feature branch` / PR head nuovo | **`agent-no-git-branch-creation.md`** · memoria `agent-no-git-branch-creation.md` |
| Script placement credentials | `script-placement-and-credentials-rule.md` |
| Docker | `docker.md` |
| Vim | `vim.md` |
| Merge conflict marker resolution | `merge-conflict-marker-resolution.md` |
| Merge marker / taskboard pattern | `merge-marker-taskboard-pattern.md` |
| Checklist di ripartenza | `checklist-di-ripartenza.md` |
| GSD oc work hard | `gsd-oc-work-hard.md` |
| Autonomous priority management | `autonomous-priority-management.md` |
| Project agnostic | `project-agnostic.md` |
| Final method override | `final-method-override.md` |
| Method visibility inheritance | `method-visibility-inheritance.md` |
| Class inheritance principles | `class-inheritance-principles.md` |
| Database error resolution | `database-error-resolution.md` |
| Saluteora conventions | `saluteora-conventions.md` |
| Saluteora translation rules | `saluteora_translation_rules.md` |
| Quaeris custom charts rules | `quaeris-custom-charts-rules.md` |
| Jpgraph chart generation | `jpgraph-chart-generation.md` |
| Charting libraries | `charting-libraries.md` |
| Socialite no column | `socialite-no-column.md` |
| Spatie patterns | `spatie_patterns.md` |
| Laravel timestamps | `laravel-timestamps.md` |
| Laravel path conventions | `laravel-path-conventions.md` |
| Localization standard | `localization_standard.md` |
| 5-elements translation | `translation-5-elements.md` |
| Translation 5-level protocol | `008-translation-5-level-protocol.md` |
| Translation format | `translations-format.md` |
| Translation discipline | `translation-discipline-rule.md` |
| Documentation naming convention | `documentation-naming-convention.md` |
| QMD cache outside project | `qmd-cache-outside-project.md` |
| QMD project system | concepts/llm-wiki-qmd-project-system.md |
| No underscore docs in code | `underscore-directories.md` |
| Case sensitive naming critical | `case_sensitive_naming_critical.md` |
| No label/placeholder on Filament | referenced in QWEN.md |
| Container loop prevention | referenced in concepts |
| Norme di condotta agente / docs chat / second brain / quality gate completo | `agent-conduct-rules.md` |
| Struttura namespace moduli / file fuori da app | `namespace-structure-rules.md` |
| Second brain al massimo / bootstrap sessione Cursor / workflow QMD+mem | `skills/cursor-second-brain-max-workflow.md` |
| Second brain — consultare sempre prima | `second-brain-always-first.md` |
| Agent chat / docs/chat / inter-agent local communication | `agent-chat-directory.md` |
| Multi-agent harmony | `MULTI_AGENT_HARMONY.md` |
| Multi-agent collaboration | `multi-agent-collaboration.md` |
| Multi-agent coordination critical | `multi-agent-coordination-critical.md` |
| GitHub multi-agent comms | `GITHUB_MULTI_AGENT_COMMUNICATION.md` |
| GitHub agent coordination | `github-agent-coordination.md` |
| GitHub bot integration | `github-bot-integration.md` |
| **Filament auth widgets vs Blade manuali** | `filament-auth-widgets-rule.md` |
| Pest testing patterns | `pest-testing-patterns.md` |
| Laravel boost MCP server | concepts/context-engineering-local-tooling.md |
| Visual inspector promotion | `014-visual-inspection-script-promotion.md` |
| Map picker default coordinates | `map-picker-default-coordinates.md` |
| VisComp mastery | `visual-control-mastery.md` |
| Visual testing tools | `visual-testing-tools-overview.md` |
| Parity safe CSS scoping | `015-parity-safe-css-scoping.md` |
| Design Comuni HTML match | `013-design-comuni-html-match.md` |
| Design Comuni header auth state | `design-comuni-header-auth-state.md` |
| Header slim logged HTML+visual parity / `logged.png` / STORY-147 / R21 | `design-comuni-header-parity.md`, `../memories/header-html-visual-parity-rule.md`, `../skills/header-design-comuni-parity.md`, `.cursor/rules/design-comuni-header-parity.mdc`, `../../stories/STORY-147-ux-design-header-logged-in.md`, `../../../laravel/Themes/Sixteen/docs/wiki/concepts/header-logged-in-parity-delta.md` |
| Link FO multilingua / `FrontofficeUrl::personalArea*` / `route('user.services')` / `/it/` hardcoded / header dropdown | `folio-frontoffice-navigation-links.md`, `../memories/folio-frontoffice-links-localize-url.md`, `../../../laravel/Themes/Sixteen/docs/wiki/concepts/fo-folio-named-routes-header.md`, `../../../laravel/Themes/Sixteen/docs/wiki/concepts/fo-header-url-and-translation-contract.md`, `.cursor/rules/folio-frontoffice-navigation-links.mdc`, `../../../laravel/Themes/Sixteen/tests/Unit/HeaderAreaPersonaleLinksContractTest.php` |
| Design Comuni header style layer | `design-comuni-header-style-layer-rule.md` |
| Design Comuni theme CSS only | `design-comuni-theme-css-only-rule.md` |
| FO PA tokens / auth login hex / `#007A52 !important` per pagina | `../decisions/fo-pa-tokens-no-per-page-hex.md`, `../memories/fo-pa-tokens-uniformity.md`, `../../laravel/Themes/Sixteen/docs/architecture/fo-pa-tokens-uniformity.md` |
| Nomi file CSS/JS solo inglese / `segnalazione-parity` / `design-comuni-*.css` | `../decisions/css-filenames-english-no-italian.md`, `../memories/css-filenames-english-no-italian.md`, `../../laravel/Themes/Sixteen/docs/architecture/css-filename-english-naming.md`, `.cursor/rules/no-italian-filenames-in-code.mdc` |
| Theme-owned CSS parity | `theme-owned-css-parity-rule.md` |
| Global CSS rule | `global-css-rule.md` |
| Header section owner rule | `header-section-owner-rule.md` |
| Header external components | `header-external-components.md` |
| Header section | `header-section.md` |
| XVI layout rules | `theme-sixteen-layout-rules.md` |
| Wizard widgets use XotBaseWizardWidget | `016-wizard-widgets-use-xotbasewizardwidget.md` |
| XotBaseWidget/`XotBaseWizardWidget` — no `$view` sul dominio (`GetViewByClassAction`) | `../../../laravel/Modules/Fixcity/docs/wiki/concepts/xotbasewidget-child-no-explicit-widget-view.md` |
| No wizard step page blades (01/02/03) | `018-no-wizard-step-page-blades.md` |
| Folio `tests/[slug]` shell CMS / no mapping in view | `no-hardcoded-mappings-in-views.md`, `concepts/clean-volt-route-files-pattern.md` |
| `<x-page>` vs `@foreach` in route Folio | `concepts/use-x-page-component-in-route-files.md` |
| `<x-page>` solo `side`/`slug`/`data` (no `:container0`) | `cms-x-page-data-bag-only.md`, `../../docs/wiki/decisions/cms-x-page-opaque-data-bag.md` |
| FO dettaglio ticket / read-only CMS | `../../docs/wiki/decisions/ticket-fo-detail-filament-widget-infolist.md`, `TicketViewWidget` |
| RegisterWidget / auth form / widget schema SSoT | `../../docs/wiki/decisions/filament-widget-resource-form-delegation.md`, `UserForm::getRegisterFormSchema`, `.cursor/rules/filament-widget-resource-form.mdc` |
| Widget submit / RegisterWidget / no Action CRUD | `docs/wiki/decisions/filament-widget-no-validate-form.md`, `docs/wiki/decisions/filament-widget-linear-crud-model-create.md`, `docs/wiki/memories/filament-widget-linear-crud-model-create.md`, `.cursor/rules/filament-widget-linear-crud-model-create.mdc`, `.cursor/rules/filament-widget-resource-form.mdc`, `laravel/Modules/User/docs/wiki/concepts/filament-widget-linear-crud-model-create.md` |
| Component self-containment (no :blocks prop) | `component-self-containment-rule.md` |
| XotBaseWizardWidget getParentWizardComponent | `xotbasewizardwidget-getparentwizardcomponent.md` |
| Filament widget sexy styling | guidelines/filament-widgets-frontend.md |
| Widget method visibility | `filament-method-visibility.md` |
| Widget properties | `memories/widget-properties.md` |
| Widget JavaScript heredoc pattern | `memories/widget-javascript-heredoc-pattern.md` |
| Widget heading property pattern | `memories/widget-heading-property-pattern.md` |
| Filform components deep dive | `memories/custom-charts-deep-learnings.md` |
| Filament form components | `memories/filament-form-components.mdc` |
| Filament table widgets overview | `memories/filament-table-widgets-overview.md` |
| Filament extension memory | `memories/filament-extension-memory.mdc` |
| Filament panel provider | `memories/filament-panel-provider.mdc` |
| Filament form widget data | `memories/filament-widget-data.md` |
| Filament resources | `memories/filament-resources.md` |
| Filament translations | `memories/filament-translations.md` |
| Laraxot architecture principles | `memories/laraxot-architecture-principles.mdc` |
| Laraxot policy inheritance | concepts/laraxot-policy-inheritance.md |
| Laraxot field integration | concepts/laraxot-filament-xotbasefield-governance.md |
| Laravel boost guidelines | `guidelines/laravel-boost-guidelines.md` |
| Laravel boost blade | `guidelines/laravel-boost.blade.php` (guidelines) |
| XotBase extension rules | `guidelines/xotbase-extension-rules.md` |
| XotBase resource rules | `guidelines/xotbase-resource-rules.md` |
| XotBase page inheritance | `rules/xotbasepage-inheritance.md` |
| XotBase critical violations | `rules/xotbaseresource-critical-violations.md` |
| XotBase table method | `agents/rules/xotbase-table-method.md` |
| XotBase extension rule | `agents/rules/xotbase-extension-rule.md` |

---

## SKILLS (directory: `docs/wiki/skills/`)
| Model Eloquent modulo | module-basemodel-pattern.md, Fixcity module-basemodel-rule |

> 215+ skills, tutti in formato flat `docs/wiki/skills/<name>.md`.
> Cerca con `qmd search "<topic>"` per trovare la skill pertinente.

| Trigger / Contesto | Skill File |
|---|---|
| BMAD — qualsiasi aspetto | `bmad-on-demand-routing.md` |
| Creazione storia | `bmad-create-story.md` |
| Analisi del codice | `agent-analyze-code-quality.md` |
| Agent — architettura di sistema | `agent-arch-system-design.md` |
| Agent — autenticazione | `agent-authentication.md` |
| Agent — benchmark suite | `agent-benchmark-suite.md` |
| Agent — code review swarm | `agent-code-review-swarm.md` |
| Agent — goal planner | `agent-goal-planner.md` |
| Agent — memory coordinator | `agent-memory-coordinator.md` |
| Agent — paesaggio (topology) | `agent-safla-neural.md` |
| Agent — ricerca | `agent-researcher.md` |
| Agent — swarming | `agent-swarm.md` |
| Agent — testing | `agent-tester.md` |
| Agent — UX design | `agent-ux-designer.md` |
| BMAD — correzione del corso | `bmad-correct-course.md` |
| BMAD — creazione PRD | `bmad-create-prd.md` |
| BMAD — creazione architettura | `bmad-create-architecture.md` |
| BMAD — documentazione progetto | `bmad-document-project.md` |
| BMAD — elicitazione avanzata | `bmad-advanced-elicitation.md` |
| BMAD — gestione brainstorming | `bmad-brainstorming.md` |
| BMAD — index docs | `bmad-index-docs.md` |
| BMAD — market research | `bmad-market-research.md` |
| BMAD — modulo builder | `bmad-module-builder.md` |
| BMAD — quality assurance | `bmad-agent-qa.md` |
| BMAD — quick dev | `bmad-quick-dev.md` |
| BMAD — retrospettiva | `bmad-retrospective.md` |
| BMAD — revisione edge-case | `bmad-review-edge-case-hunter.md` |
| BMAD — sprint planning | `bmad-sprint-planning.md` |
| BMAD — stato sprint | `bmad-sprint-status.md` |
| BMAD — test architettura | `bmad-testarch-atdd.md` |
| BMAD — CI/CD test | `bmad-testarch-ci.md` |
| BMAD — framework di test | `bmad-testarch-framework.md` |
| BMAD — NFR test | `bmad-testarch-nfr.md` |
| BMAD — trace requirements | `bmad-testarch-trace.md` |
| BMAD — validazione PRD | `bmad-validate-prd.md` |
| BMAD — workflow builder | `bmad-workflow-builder.md` |
| Conversione contesto compressione | `context-compression.md` |
| Critica e revisione design | `critique.md` |
| Gestione memory (agentdb) | `agentdb-memory-patterns.md` |
| Gestione claims (affermazioni) | `claims.md` |
| Memory management | `memory-management.md` |
| Pair programming | `pair-programming.md` |
| Performance analysis | `performance-analysis.md` |
| Raccolta conoscenza (knowledge bank) | `reasoningbank-intelligence.md` |
| Schema (template generazione) | `skill-creator.md` |
| Sicurezza — audit | `security-audit.md` |
| Test — qualità verifica | `verification-quality.md` |
| Workflow — automazione | `agent-workflow-automation.md` |
| Workflow — gestione flussi | `agent-workflow.md` |
| WDS — 3 scenari | `wds-3-scenarios.md` |
| Webapp — testing | `webapp-testing.md` |
| Volt — sviluppo componenti | `volt-development.md` |
| **Frontend UI/UX / componente web / pagina / UI nova / design estetica** | **`frontend-design/SKILL.md`** + **`frontend-design-civic-pa.md`** — parity Design Comuni su superfici PA; distinctive solo su blocchi CMS non vincolati |
| Tema Sixteen — Tailwind, DaisyUI, parity PA | `sixteen-theme-tailwind-daisyui-governance.md` |
| Cursor — second brain top / bootstrap / QMD wrapper / claude-mem | `cursor-second-brain-max-workflow.md` |

> 📝 **Regola Formato Skill**: Ogni skill deve avere `name`, `description`, `type: skill` nel frontmatter.  
> Vedi anche: `docs/wiki/rules/skill-file-format.md`

## COMMANDS (directory: `docs/wiki/commands/`)
| Model Eloquent modulo | module-basemodel-pattern.md, Fixcity module-basemodel-rule |

| Trigger / Contesto | Command File |
|---|---|
| Creazione storia BMAD | `bmad-create-story.md` |
| Aggiornamento traduzioni | `update-translations.md` |
| Tooling Ollama | `ollama.md` |

## MEMORIES (directory: `docs/wiki/memories/`)
| Model Eloquent modulo | module-basemodel-pattern.md, Fixcity module-basemodel-rule |

| Trigger / Contesto | Memory File |
|---|---|
| Fixcity architettura | `fixcity-architecture-overview.md` |
| QMD cache fuori progetto | `feedback_qmd_cache_outside_repo.md` |
| Git forward-only | `reference_gsd_get_shit_done.md` |
| MAI usare migrate:fresh / migrate --force / db:wipe | `never-use-migrate-fresh.md`, `data-sacred-no-destructive-db.md` |
| Dati sacri (migrazioni + test) | `data-sacred-no-destructive-db.md`, `.cursor/rules/data-sacred-no-destructive-db.mdc` |
| RefreshDatabase nei test | `never-use-refresh-database.md`, `NO-REFRESH-DATABASE-ABSOLUTE.md` |
| Lang directory fix | `lang-directory-fix.md` |
| Docs first before code | `docs-first-before-code.md` |
| FLVP lock + GitHub issues | `agent-flvp-github-standing-rule.md` |
| **Rischio dimenticanza GitHub backlog** | `agent-github-issue-mandatory-cycle.md` — issue **[#80](https://github.com/laraxot/base_fixcity_fila5/issues/80)** |
| Goal progetto (minimo) | `../../goal/goal-minimal.md` |
| **NO Bootstrap — stack frontend** | `../../goal/goal-no-bootstrap-modern-stack.md` — Tailwind + Alpine + Lit + DaisyUI + Filament |
| **Design Comuni — reference ufficiale** | `../../goal/goal-design-comuni-usage.md` — GitHub + demo live design-comuni-pagine-statiche |
| **docs/goal/ append-only** | `rules/docs-goal-append-only-rule.md` — solo nuovi file, mai edit esistenti |
| Goal progetto unificato | `../../goal/goal-unified.md` — sintesi migliorativa (start here) |
| Norme condotta agente (complete) | `memories/agent-complete-conduct-standing-rule.md` |
| Agent conduct (norme permanenti) | `agent-conduct-rules.md` |
| GitHub: creare issue se manca traccia backlog (#83) | `memories/agent-github-issue-mandatory-cycle.md` |
| UI components pattern | `ui-components.mdc` |
| CSS/JS consistency | `css-js-consistency.mdc` |
| Bug injection readiness | `bug-injection-readiness.md` |
| Chaos monkey patterns | `chaos-monkey-response-patterns.md` |
| Container0 pattern | `container0-pattern-philosophy.md` |
| **`mkdir pages/tickets`** / pagina Folio dominio / `/it/tickets/{id}` nuova blade tema | `no-semantic-folio-page-directories.md`, `../../../laravel/Themes/Sixteen/docs/page-directory-structure.md`, `.cursor/rules/no-semantic-folio-page-dirs.mdc`, `bashscripts/tools/verify-no-semantic-folio-pages.sh` |
| Custom charts learnings | `custom-charts-learnings.md` |
| Deployment validation | `deployment-validation-sottana.md` |
| Docs naming convention | `docs-naming-convention.md` |
| Dry violation prevention | `dry-violation-prevention.md` |
| nwidart / PHP fuori `app/` modulo | `memories/incident-nwidart-class-outside-app.md` |
| geo-map-lit fork tema | `memories/incident-geo-map-lit-local-fork.md` |
| **JS Geo filename solo inglese / `popup-ticket` / `buildTicket*` / no `segnalazione` nei path JS** | **`../../../laravel/Modules/Geo/docs/wiki/memories/js-file-english-naming-standing-rule.md`** — STORY-132; regola permanente |
| Env testing creates app | `env-testing-creates-application.md` |
| Filament critical errors | `filament-critical-errors.md` |
| Filament method visibility | `filament-method-visibility-error.md` |
| Filament widget data | `filament-widget-data.md` |
| Filament risorse | `filament-resources.md` |
| Filament translations | `filament-translations.md` |
| Filament xotbase rules | `filament-xotbase-complete-rules.md` |
| **Filament-First (Rule 019)** | `rules/filament-first-rule.md` — prefer Filament components over custom HTML/CSS/Blade (#82) |
| Git push/pack errors | `git-push-pack-errors.md` |
| GitHub mirroring | `github-mirroring-governance.md` |
| Localization | `localization.md` |
| Login redirect error | `login-redirect-error.md` |
| Migrazione pattern | `migration-patterns.md` |
| Model naming english | `model_naming_english_only.md` |
| No docs archive | `no-docs-archive-folders.md` |
| No tmp usage | `no-tmp-usage.md` |
| PHPStan rules | `phpstan_rules.md` |
| Project structure | `project-structure.md` |
| Quality gate memory | `quality-gate-memory.mdc` |
| Script positioning | `script-positioning.mdc` |
| Service provider memory | `service-provider-memory.md` |
| Task completion verification | `task-completion-verification.md` |
| Testing modules pest | `testing-modules-pest.md` |
| Token efficiency | `token-efficiency.md` |
| Translation hardcoding | `translation-hardcoding.md` |
| Underscore docs cleanup | `underscore-docs-cleanup.md` |
| Verified work committato | `verified-work-must-be-committed.md` |
| VHost superpowers | `vhost-superpowers-setup-2026-03-31.md` |
| Widget properties | `widget-properties.md` |
| Sixteen / Tailwind + DaisyUI + GitHub #42 | `sixteen-tailwind-daisyui-coordination.md` |
| Sixteen vite / `public_html` manifest vs build cart tema | `sixteen-vite-public-path-alpine-livewire-order.md` |
| Workspace naming | `workspace-naming.md` |

---

## BMAD Method v6
| Model Eloquent modulo | module-basemodel-pattern.md, Fixcity module-basemodel-rule |

| Trigger / Contesto | File |
|---|---|
| `/workflow-init`, `/workflow-status` | `bashscripts/ai/.agents/bmad-skills/bmad-orchestrator/CLAUDE.md` |
| `/product-brief`, `/prd`, `/tech-spec` | `bashscripts/ai/.agents/bmad-skills/product-manager/CLAUDE.md` |
| `/architecture`, `/solutioning-gate-check` | `bashscripts/ai/.agents/bmad-skills/system-architect/CLAUDE.md` |
| `/sprint-planning`, `/create-story`, `/dev-story` | `bashscripts/ai/.agents/bmad-skills/scrum-master/CLAUDE.md` |
| `/create-agent`, `/create-workflow` | `bashscripts/ai/.agents/bmad-skills/builder/CLAUDE.md` |
| `/brainstorm`, `/research` | `bashscripts/ai/.agents/bmad-skills/business-analyst/CLAUDE.md` |
| `/create-ux-design` | `bashscripts/ai/.agents/bmad-skills/ux-designer/CLAUDE.md` |
| `/verify-work`, code review | `bashscripts/ai/.agents/bmad-skills/developer/CLAUDE.md` |
| BMAD on-demand routing | `docs/wiki/skills/bmad-on-demand-routing.md` |
| BMAD skills directory | `bashscripts/ai/.agents/bmad-skills/` (8 skills: bmad-orchestrator, business-analyst, product-manager, system-architect, scrum-master, developer, ux-designer, builder) |

> 📝 **Nota**: le memorie seguono le convenzioni wiki con frontmatter. Non duplicare in `MEMORY.md` o bootstrap.

---

## Second Brain Canonical Layer
| Model Eloquent modulo | module-basemodel-pattern.md, Fixcity module-basemodel-rule |

For deeper conceptual understanding, always check `docs/wiki/concepts/` (the canonical layer) when rules don't fully explain the *why*.

Key concept files:

- [second-brain-llm-wiki-pattern.md](../concepts/second-brain-llm-wiki-pattern.md) — Overall pattern
- [tailwind-apply-sixteen-alias-rule.md](../rules/tailwind-apply-sixteen-alias-rule.md) — `@apply` tema Sixteen (on-demand)
- [context-engineering.md](../concepts/context-engineering.md) — Context engineering methodology
- [second-brain-always-on-rule.md](../concepts/second-brain-always-on-rule.md) — Mandatory second brain rule
- [llm-wiki-governance.md](../concepts/llm-wiki-governance.md) — Wiki governance
- [context-memory-compaction-rule.md](../concepts/context-memory-compaction-rule.md) — Memory efficiency
- [context-compression-discipline.md](../concepts/context-compression-discipline.md) — Compression discipline
- [llm-wiki-qmd-project-system.md](../concepts/llm-wiki-qmd-project-system.md) — QMD project system
- [ruflo-integration.md](../concepts/ruflo-integration.md) — Ruflo AI orchestration
- [context-mode-integration.md](../concepts/context-mode-integration.md) — Context Mode MCP

### On-Demand Loading Rule

Rules, skills, commands, and memories are **NOT** pre-loaded into context.
They live exclusively in the wiki and load on-demand via QMD search or trigger map lookup.

> This is the **canonical source of truth**. Do not duplicate this mapping elsewhere.