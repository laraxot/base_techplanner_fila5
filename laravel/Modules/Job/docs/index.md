---
title: "Indice documentazione — Modulo Job"
module: "Job"
type: index
updated: 2026-09-03
---

# Indice documentazione — Modulo Job

`docs/` contiene 517 file `.md`. Una parte consistente e' cresciuta nel tempo per
merge/import ripetuti (conflitti git, conversioni `.txt`→`.md`, copie
"archiviate") e non e' piu' documentazione attiva. Questo indice:

1. elenca per argomento i file **rilevanti/attivi**;
2. raggruppa in fondo, senza cancellare nulla, i cluster di **duplicati/storico
   da consolidare** (vedi [Storico / da consolidare](#storico--da-consolidare)).

Nessun file e' stato spostato, rinominato o cancellato in questo audit.

## 1. Panoramica del modulo

- [README.md](README.md) — panoramica modulo, modelli, servizi, collegamenti
- [00-index.md](00-index.md) — indice curato precedente (mantenuto, si sovrappone a questo file)
- [architecture.md](architecture.md) — architettura del modulo Job
- [architecture/structure.md](architecture/structure.md)
- [structure.md](structure.md) — struttura del modulo
- [project-structure.md](project-structure.md)
- [purpose.md](purpose.md) / [scopo.md](scopo.md) — scopo e confini del modulo
- [philosophy.md](philosophy.md) — filosofia e principi di design
- [business-logic-overview.md](business-logic-overview.md)
- [core-functionality.md](core-functionality.md)
- [concepts/xotbase-never-extend-filament.md](concepts/xotbase-never-extend-filament.md) — regola: mai `Filament*`, sempre `XotBase*`
- [data-models.md](data-models.md)
- [schema.md](schema.md) — schema del modulo (vedi anche `wiki/schema.md`, storico)

## 2. Architettura e pattern

- [architecture-rules.md](architecture-rules.md)
- [patterns.md](patterns.md)
- [contracts-naming.md](contracts-naming.md) — naming e collocazione dei Contracts
- [directory-structure-rules.md](directory-structure-rules.md)
- [typed-model-properties-over-raw-attributes.md](typed-model-properties-over-raw-attributes.md)
- [queueable-action.md](queueable-action.md) / [queueable-actions.md](queueable-actions.md) — Spatie Queueable Actions
- [providers/job-service-provider.md](providers/job-service-provider.md)
- [nestedset-migration-best-practices.md](nestedset-migration-best-practices.md)
- [multi-org-sync-laraxot-provtv.md](multi-org-sync-laraxot-provtv.md)

### Filament

- [filament.md](filament.md)
- [filament-table-architecture.md](filament-table-architecture.md)
- [filament-version.md](filament-version.md)
- [filament-widget-implementation.md](filament-widget-implementation.md)
- [filament-5x-compatibility.md](filament-5x-compatibility.md)
- [filament-4x-compatibility.md](filament-4x-compatibility.md)
- [filament-best-practices.md](filament-best-practices.md)
- [migration-filament.md](migration-filament.md) / [migration-filament-4.md](migration-filament-4.md)
- [migrazione-filament.md](migrazione-filament.md) / [migrazione-filament-4.md](migrazione-filament-4.md) *(equivalenti IT dei due sopra)*

## 3. Qualita', PHPStan e test

- [phpstan.md](phpstan.md) — roadmap PHPStan Level 10 generale
- [phpstan-level-10-compliance.md](phpstan-level-10-compliance.md)
- [phpstan-compliance.md](phpstan-compliance.md) / [phpstan-compliance-status.md](phpstan-compliance-status.md)
- [phpstan-corrections.md](phpstan-corrections.md)
- [phpstan-errors-roadmap.md](phpstan-errors-roadmap.md)
- [phpstan-iterable-types.md](phpstan-iterable-types.md)
- [phpstan-analysis-job.md](phpstan-analysis-job.md)
- [phpstan-completion-job.md](phpstan-completion-job.md)
- [phpstan-syntax-fixes.md](phpstan-syntax-fixes.md)
- [phpstan-level-10-fixes.md](phpstan-level-10-fixes.md) / [phpstan-level10-fixes.md](phpstan-level10-fixes.md)
- [cyclomatic-complexity-report.md](cyclomatic-complexity-report.md)
- [code-quality-report.md](code-quality-report.md) / [code-quality-improvement-report.md](code-quality-improvement-report.md)
- [code-redundancy-audit.md](code-redundancy-audit.md)
- [quality-audit.md](quality-audit.md)
- [coverage.md](coverage.md)
- [docs-health.md](docs-health.md)
- [ponytail-audit-over-engineering.md](ponytail-audit-over-engineering.md)
- [cosa-migliorare.md](cosa-migliorare.md)

Molti report datati `phpstan-fixes-*`, `phpstan-correzioni-*` e
`phpstan-sessione-completa-*` sono log di sessioni di lavoro storiche e sono
raggruppati in [Storico](#storico--da-consolidare).

### Testing

- [testing.md](testing.md)
- [testing-guidelines.md](testing-guidelines.md)
- [testing-rules.md](testing-rules.md)
- [testing-philosophy-refactor.md](testing-philosophy-refactor.md)
- [testcase-philosophy-analysis.md](testcase-philosophy-analysis.md)
- [rules-testing-no-migrate-fresh.md](rules-testing-no-migrate-fresh.md)
- [task-aumentare-copertura-test.md](task-aumentare-copertura-test.md)

## 4. Roadmap, prodotto e pianificazione (BMAD)

- [roadmap/00-index.md](roadmap/00-index.md) — indice della roadmap corrente (usare questo come punto di ingresso)
- [roadmap/README.md](roadmap/README.md)
- [roadmap/00-overview.md](roadmap/00-overview.md), [roadmap/overview.md](roadmap/overview.md)
- [roadmap/01-current-state.md](roadmap/01-current-state.md), [roadmap/current-state.md](roadmap/current-state.md)
- [roadmap/02-goals.md](roadmap/02-goals.md), [roadmap/goals.md](roadmap/goals.md)
- [roadmap/01-now.md](roadmap/01-now.md), [roadmap/now.md](roadmap/now.md)
- [roadmap/02-next.md](roadmap/02-next.md), [roadmap/next.md](roadmap/next.md)
- [roadmap/03-later.md](roadmap/03-later.md), [roadmap/later.md](roadmap/later.md)
- [roadmap/03-workstreams.md](roadmap/03-workstreams.md), [roadmap/workstreams.md](roadmap/workstreams.md)
- [roadmap/04-milestones.md](roadmap/04-milestones.md), [roadmap/milestones.md](roadmap/milestones.md)
- [roadmap/04-risks.md](roadmap/04-risks.md), [roadmap/05-risks.md](roadmap/05-risks.md), [roadmap/risks.md](roadmap/risks.md)
- [roadmap/phases.md](roadmap/phases.md)
- [roadmap/quality.md](roadmap/quality.md)
- [roadmap/vision.md](roadmap/vision.md)

Nota: dentro `roadmap/` esistono coppie numerate/non numerate (es.
`01-now.md` e `now.md`) che sembrano la stessa sezione duplicata due volte;
non sono state toccate ma andrebbero consolidate in un secondo momento.

- [enterprise-job-system-roadmap.md](enterprise-job-system-roadmap.md) — roadmap sistema job enterprise (documento distinto, non nella dir `roadmap/`)
- [navigation-translations-completion-roadmap.md](navigation-translations-completion-roadmap.md)
- [roadmap.md](roadmap.md) *(227 righe, top-level; vedi nota Storico su `roadmap-archive-1.md`)*

### Prodotto / strategia

- [prd.md](prd.md) e [product-requirements.md](product-requirements.md) — due PRD di taglio diverso (50 vs 132 righe), non confermati come duplicati esatti: verificare in un consolidamento futuro
- [strategy.md](strategy.md) e [product-strategy.md](product-strategy.md) — idem (18 vs 64 righe)
- [launch-plan.md](launch-plan.md) e [product-launch-plan.md](product-launch-plan.md) — idem (19 vs 67 righe)
- [sprint-planning.md](sprint-planning.md), [sprint-planning-meeting.md](sprint-planning-meeting.md)
- [product-roadmap.md](product-roadmap.md)
- [user-research.md](user-research.md)

### BMAD: epics, stories, task

- [epics/job-epics-and-stories.md](epics/job-epics-and-stories.md)
- [stories/4.26.phpstan-regression-remediation.story.md](stories/4.26.phpstan-regression-remediation.story.md)
- [stories/4.27.phpstan-paramtype-coverage.story.md](stories/4.27.phpstan-paramtype-coverage.story.md)
- [stories/4.28.phpstan-mixed-cleanup.story.md](stories/4.28.phpstan-mixed-cleanup.story.md)
- [stories/docs-index-audit.story.md](stories/docs-index-audit.story.md) — questa story (audit indice docs)
- [tasks/tasks-index.md](tasks/tasks-index.md)
- [tasks/job-filament-v5.md](tasks/job-filament-v5.md)
- [tasks/queue-and-job-management.md](tasks/queue-and-job-management.md)
- [tasks/cleanup-job-docs.md](tasks/cleanup-job-docs.md) — task storico di consolidamento docs (precursore di questo audit)
- [task-consolidare-documentazione.md](task-consolidare-documentazione.md) — task root omonimo, verificare sovrapposizione con `tasks/cleanup-job-docs.md`
- [task-dashboard-monitoring.md](task-dashboard-monitoring.md)

## 5. Funzionalita' del modulo

- [schedule.md](schedule.md) — scheduling/cron (molte copie storiche, vedi Storico)
- [components/schedule-crud.md](components/schedule-crud.md)
- [soketi.md](soketi.md) — monitoraggio realtime via websocket (copie storiche in Storico)
- [storage-server.md](storage-server.md) (copie storiche in Storico)
- [artisan.md](artisan.md) — comandi artisan (copie storiche in Storico)
- [job-reports.md](job-reports.md) — report PDF (html2pdf)
- [performance/bottlenecks.md](performance/bottlenecks.md)
- [bottlenecks-detailed.md](bottlenecks-detailed.md) — dettaglio correlato
- [packages/queue.md](packages/queue.md)
- [packages/monitoring.md](packages/monitoring.md)
- [packages/performance.md](packages/performance.md)
- [packages/integrations.md](packages/integrations.md)
- [packages.md](packages.md)
- [translations.md](translations.md)
- [translation-navigation-structure.md](translation-navigation-structure.md)
- [translation-fields-critical-error.md](translation-fields-critical-error.md)
- [user-interface.md](user-interface.md)

### HTML2PDF (stub locali, canonico su Themes shared-components)

I file sotto `html2pdf/` sono stub che puntano al doc condiviso in
`Themes/docs/shared-components/` (campo `canonical:` nel front-matter):

- [html2pdf/index.md](html2pdf/index.md)
- [html2pdf/usage.md](html2pdf/usage.md)
- [html2pdf/advanced.md](html2pdf/advanced.md)
- [html2pdf/laravel.md](html2pdf/laravel.md)
- [html2pdf/security.md](html2pdf/security.md)
- [html2pdf/styling.md](html2pdf/styling.md)

## 6. Integrazioni e infrastruttura

- [integration.md](integration.md) / [api-integration.md](api-integration.md)
- [laravel-13-upgrade.md](laravel-13-upgrade.md)
- [migrations.md](migrations.md)
- [migration-patterns.md](migration-patterns.md)
- [guida-migrazione-step-by-step.md](guida-migrazione-step-by-step.md)
- [mcp-configuration.md](mcp-configuration.md)
- [mcp-server-recommended.md](mcp-server-recommended.md)
- [git-multi-org-sync-handoff.md](git-multi-org-sync-handoff.md)
- [no-git-lfs.md](no-git-lfs.md)
- [binary-assets.md](binary-assets.md)
- [implementation.md](implementation.md)
- [solutions.md](solutions.md)
- [model-factory-seeder-audit.md](model-factory-seeder-audit.md) / [models-factory-seeder-analysis.md](models-factory-seeder-analysis.md) — stesso argomento in due file (+ variante IT in Storico)
- [module-analysis.md](module-analysis.md)
- [duplicate-methods-analysis.md](duplicate-methods-analysis.md)
- [dependencies.md](dependencies.md)
- [dependency-intelligence.md](dependency-intelligence.md)

## 7. Governance della documentazione e regole del modulo

- [root-file-policy.md](root-file-policy.md)
- [root-files-hygiene.md](root-files-hygiene.md)
- [file-naming-rules.md](file-naming-rules.md)
- [no-ai-tool-scaffold-dirs.md](no-ai-tool-scaffold-dirs.md)
- [no-phpstan-probe-policy.md](no-phpstan-probe-policy.md)
- [docs-archive-policy.md](docs-archive-policy.md)
- [case-conflicts.md](case-conflicts.md) — documenta proprio il problema dei duplicati case-insensitive risolto solo a livello di indice qui
- [merge-conflict-files-list.md](merge-conflict-files-list.md) / [merge-conflicts-list.md](merge-conflicts-list.md)
- [conflicts.md](conflicts.md) / [conflict-resolution.md](conflict-resolution.md)
- [rules-index.md](rules-index.md)
- [on-demand-pattern.md](on-demand-pattern.md)
- [agent-confidence-discipline.md](agent-confidence-discipline.md)
- [agent-confidence-protocol.md](agent-confidence-protocol.md)
- [agent-edit-discipline.md](agent-edit-discipline.md)
- [ai-methodologies.md](ai-methodologies.md)
- [second-brain.md](second-brain.md)
- [qmd-setup.md](qmd-setup.md)
- [codex-error-fix.md](codex-error-fix.md)
- [release-marketing-standard.md](release-marketing-standard.md)
- [troubleshooting.md](troubleshooting.md)

## 8. Wiki / second brain locale

`docs/wiki/` e' il second brain locale del modulo, con una propria indicizzazione interna:

- [wiki/index.md](wiki/index.md) — indice del wiki
- [wiki/README.md](wiki/README.md)
- [wiki/overview.md](wiki/overview.md)
- [wiki/bmad-method.md](wiki/bmad-method.md)
- [wiki/schema.md](wiki/schema.md)
- [wiki/log.md](wiki/log.md)
- [wiki/commands/index.md](wiki/commands/index.md)
- [wiki/rules/index.md](wiki/rules/index.md)
- [wiki/skills/index.md](wiki/skills/index.md)
- [wiki/memories/index.md](wiki/memories/index.md)
  - [wiki/memories/lang-split-job-claude-audit.md](wiki/memories/lang-split-job-claude-audit.md)
  - [wiki/memories/session-confidence-checkpoint.md](wiki/memories/session-confidence-checkpoint.md)
- [wiki/how-to/gitmodules-sync-session.md](wiki/how-to/gitmodules-sync-session.md)
- [wiki/tips/optimization-tips.md](wiki/tips/optimization-tips.md)
- [wiki/integrations/api-integration.md](wiki/integrations/api-integration.md)
- [wiki/integrations/integration.md](wiki/integrations/integration.md)
- [wiki/integrations/laravel-13-upgrade.md](wiki/integrations/laravel-13-upgrade.md)
- [wiki/journals/phpstan-roadmap.md](wiki/journals/phpstan-roadmap.md)
- [wiki/troubleshooting/git-merge-conflict-inventory.md](wiki/troubleshooting/git-merge-conflict-inventory.md)

### wiki/concepts (note tecniche puntuali)

- [wiki/concepts/index.md](wiki/concepts/index.md)
- [wiki/concepts/claude-audit-static.md](wiki/concepts/claude-audit-static.md)
- [wiki/concepts/composer-root-minimal-nwidart.md](wiki/concepts/composer-root-minimal-nwidart.md)
- [wiki/concepts/context-overflow-prevention.md](wiki/concepts/context-overflow-prevention.md)
- [wiki/concepts/duplicate-method-bodies.md](wiki/concepts/duplicate-method-bodies.md)
- [wiki/concepts/method-name-homonyms.md](wiki/concepts/method-name-homonyms.md)
- [wiki/concepts/model-policy-laravel-contract.md](wiki/concepts/model-policy-laravel-contract.md)
- [wiki/concepts/no-app-support-queueable-actions.md](wiki/concepts/no-app-support-queueable-actions.md)
- [wiki/concepts/no-services-no-support-queueable-actions.md](wiki/concepts/no-services-no-support-queueable-actions.md)
- [wiki/concepts/organizzativa-money.md](wiki/concepts/organizzativa-money.md)
- [wiki/concepts/phpstan-compliance.md](wiki/concepts/phpstan-compliance.md) *(vedi anche `phpstan-compliance.md` root)*
- [wiki/concepts/phpstan-format-seconds-trait-probe.md](wiki/concepts/phpstan-format-seconds-trait-probe.md)
- [wiki/concepts/phpstan-schedule-schema-return-type.md](wiki/concepts/phpstan-schedule-schema-return-type.md)
- [wiki/concepts/policy-restoration-incident.md](wiki/concepts/policy-restoration-incident.md)
- [wiki/concepts/ponytail-audit.md](wiki/concepts/ponytail-audit.md)
- [wiki/concepts/schedule-service-to-actions.md](wiki/concepts/schedule-service-to-actions.md)
- [wiki/concepts/second-brain-local-discipline.md](wiki/concepts/second-brain-local-discipline.md)
- [wiki/concepts/testing.md](wiki/concepts/testing.md) *(vedi anche `testing.md` root)*
- [wiki/concepts/visual-testing-playwright-puppeteer.md](wiki/concepts/visual-testing-playwright-puppeteer.md)
- [wiki/concepts/xotbase-table-columns-enforcement.md](wiki/concepts/xotbase-table-columns-enforcement.md)

Template del wiki (non contenuto, solo scheletri): `wiki/_templates/concept.md`,
`wiki/_templates/entity.md`, `wiki/_templates/source.md`.

## 9. Altre risorse

- [headroom/README.md](headroom/README.md)
- [graphify/README.md](graphify/README.md) *(`graphify/graphify-out/` contiene solo output generato, nessun `.md`)*
- [outputs/README.md](outputs/README.md)
- [github/links.md](github/links.md) / [.github/links.md](.github/links.md) *(vedi anche `links.md` root, in Storico)*

---

## Storico / da consolidare

Nulla di quanto segue e' stato cancellato, rinominato o spostato. Sono
raggruppamenti per facilitare un futuro consolidamento manuale.

### A. Dump da conflitti/importazioni grezze (contenuto duplicato piu' volte)

- `raw/root-import/` (48 file) — importazioni grezze multi-round di artisan,
  changelog, filament, links, optimization, phpstan-roadmap, progress, repo,
  schedule, soketi, storage-server, test, test3, tips (varianti `-1`, `-2`, `-3`)
- `raw/notes/*-dup.md` (11 file) — copie esplicitamente marcate "dup"
- `root-md-files/` (29 file) — dump storico di file `.md` di root
- `root-txt-files/` (23 file) — dump storico da conversione `.txt` → `.md`
- `_integration/` incl. `_integration/archive/` (16 file) — note di integrazione duplicate
- `archived/` (12 file) — copie archiviate di links/optimization/phpstan-roadmap/progress/repo/schedule/soketi/storage-server/test/test3/tips
- `analysis/archive/` + `analysis/legacy/` (4 file) — versioni precedenti di `code-quality-analysis`
- `roadmap/legacy/` (2 file: `legacy-roadmap.md`, `legacy-roadmap-x.md`)
- `llm-wiki/` (7 file) — copia parallela precedente di `wiki/` (`agents.md`/`AGENTS.md`, `index.md`, `log.md`, `_templates/*`)
- `wiki/product/_da-riconciliare/` (`index.md`/`INDEX.md`) — segnata esplicitamente "da riconciliare"
- `build_local/` — export statico generato di un sito docs (assets, 404,
  algolia-docsearch); i soli 3 `.md` presenti (`index.md`, `INDEX.md`,
  `architecture-rules.md`) sono copie dei corrispettivi in root, non contenuto originale

### B. Coppie case/underscore duplicate a livello root

Stesso contenuto, solo casing o separatore diverso (per standard modulo la
forma minuscola-con-trattini e' quella da considerare canonica, salvo
`README.md`/`CHANGELOG.md`):

`00-INDEX.md`/`00-index.md` · `ACTIONS.md`/`actions.md` ·
`ARCHITECTURE.md`/`architecture.md` · `CHANGELOG.md`/`changelog.md` ·
`FRAMEWORKS.md`/`frameworks.md` · `INDEX.md`/`INDEX_GENERATED.md`/`index.md`/`index_generated.md` ·
`MIGRATIONS.md`/`migrations.md` · `ON-DEMAND-PATTERN.md`/`on-demand-pattern.md` ·
`PATTERNS.md`/`patterns.md` · `PERFORMANCE-OPTIMIZATION.md`/`performance-optimization.md` ·
`PROJECT-STRUCTURE.md`/`project-structure.md` · `QMD-SETUP.md`/`qmd-setup.md` ·
`QUALITY_REPORT.md`/`quality_report.md` ·
`REDUNDANCY_ANALYSIS.md`/`redundancy-analysis.md`/`redundancy_analysis.md` ·
`SPRINT_PLANNING.md`/`sprint-planning.md`/`sprint_planning.md` ·
`TECH_SPEC.md`/`tech_spec.md` ·
`USER_RESEARCH.md`/`user-research.md`/`user_research.md` ·
`PRODUCT_LAUNCH_PLAN.md`/`product-launch-plan.md`/`product_launch_plan.md` ·
`PRODUCT_ROADMAP.md`/`product-roadmap.md`/`product_roadmap.md` ·
`PRODUCT_STRATEGY.md`/`product-strategy.md`/`product_strategy.md` ·
`METODI_DUPLICATI_ANALISI.md`/`metodi-duplicati-analisi.md`/`metodi_duplicati_analisi.md` ·
`boost-skill-fix-summary.md`/`boost_skill_fix_summary.md` ·
`confidence-guidelines.md`/`confidence_guidelines.md` ·
`mcp-server-recommended.md`/`mcp_server_recommended.md` ·
`duplicate-methods.md`/`duplicate_methods.md` ·
`duplicate-methods-report.md`/`duplicate_methods_report.md` ·
`filament-4x-compatibility.md`/`filament_4x_compatibility.md` ·
`filament-best-practices.md`/`filament-best-practices-1.md` ·
`lang-link.md`/`lang_link.md`/`lang-link-1.md` ·
`modelli-factory-seeder-analisi.md`/`modelli_factory_seeder_analisi.md` ·
`module-job.md`/`module-job-1.md` ·
`schema.md`/`wiki/schema.md`/`wiki/SCHEMA.md` ·
`conflict-resolution.md`/`conflict-resolution-1.md` ·
`bottlenecks-detailed.md`/`bottlenecks-detailed-1.md` ·
`providers/job-service-provider.md`/`providers/job-service-provider-1.md` ·
`components/schedule-crud.md`/`components/schedule-crud-1.md` ·
`root-md-files/testing.md`/`root-md-files/TESTING.md`

Varianti a livello root di `schedule`/`soketi`/`storage-server`/`artisan`/`links`/
`progress`/`repo`/`tips`/`optimization`/`filament`/`test`/`test3` (root, `-1`, `_1`,
`-1-1`) sono copie ripetute dello stesso contenuto: le versioni canoniche restano
`schedule.md`, `soketi.md`, `storage-server.md`, `artisan.md`, `links.md`,
`progress.md`, `repo.md`, `tips.md`, `optimization.md`, `filament.md`, `test.md`,
`test3.md` gia' elencate nelle sezioni sopra.

### C. Serie di report/fix PHPStan datate o rinominate (log di sessioni storiche)

`phpstan-fixes.md`, `phpstan-fixes-archive-1.md`, `phpstan-fixes-archive-2.md`,
`phpstan-fixes-conflict.md`, `phpstan-fixes-renamed.md`, `phpstan-fixes-session.md` ·
`phpstan-fixes-gennaio.md`, `phpstan-fixes-gennaio-2025.md`,
`phpstan-fixes-gennaio-archive-1.md`, `phpstan-fixes-gennaio-.md` ·
`phpstan-fixes-january.md`, `phpstan-fixes-january-2025.md`,
`phpstan-fixes-january-archive-1.md`, `phpstan-fixes-january-conflict.md`,
`phpstan-fixes-january-.md` ·
`phpstan-correzioni.md`, `phpstan-correzioni-11.md`, `phpstan-correzioni-2025-11.md`,
`phpstan-correzioni-nov.md` ·
`phpstan-sessione-completa.md`, `phpstan-sessione-completa-11.md`,
`phpstan-sessione-completa-2025-11.md`, `phpstan-sessione-completa-nov.md` ·
`phpstan-filament-fixes.md`, `phpstan-filament-fixes-1.md` ·
`phpstan-level-10es.md` (probabile refuso/variante) ·
`phpstan-roadmap.md` e le sue copie in `archived/`, `raw/root-import/`,
`root-md-files/`, `wiki/journals/`

### D. Audit qualita'/ridondanza sovrapposti nel tempo

`dry-kiss.md`, `dry-kiss-analysis.md`, `dry-kiss-analysis-.md`,
`dry-kiss-analysis-conflict.md`, `dry-kiss-analysis-2025-10-15.md` ·
`redundancy-audit.md`, `redundancy-audit-2026-05-21.md` ·
`copilot-redundancy-audit.md`, `copilot-redundancy-audit-2026-05-25.md` ·
`redundancy-report.md`, `redundancy-analysis.md` (+ varianti case in B)

### E. Indice generato precedente (superato)

- `index_generated.md`/`INDEX_GENERATED.md` — tentativo di indice automatico del
  2026-07-28 su 483 file; oggi i file sono 517: numeri e categorie non sono piu'
  affidabili, sostituito da questo `index.md`

---

*Indice aggiornato il 2026-09-03. Nessun file `.md` esistente e' stato
cancellato, rinominato o spostato durante questo audit.*
