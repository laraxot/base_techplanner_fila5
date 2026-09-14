---
title: "Zero Theme — Documentation Index"
type: index
tags: [documentation, index, theme, zero]
updated: 2026-09-03
---

# Zero Theme — Documentation Index

Canonical entry point for `Themes/Zero/docs/`. Organized by topic, links are relative.
Policy: never delete or rename existing files during index maintenance; duplicates and
superseded files are grouped under [Storico / da consolidare](#storico--da-consolidare)
instead of being removed. See [docs-archive-policy.md](./docs-archive-policy.md).

## Overview and entry points

- [README.md](./README.md) — theme overview (kept uppercase)
- [readme-en.md](./readme-en.md) — English overview
- [philosophy.md](./philosophy.md) — theme philosophy
- [scopo.md](./scopo.md) — scope, boundaries and how to use the theme
- [second-brain.md](./second-brain.md) — pointer to the module second-brain workflow
- [docs-archive-policy.md](./docs-archive-policy.md) — archive/duplication policy for this docs tree
- [docs-confidence-audit.md](./docs-confidence-audit.md) — docs confidence audit
- [docs-deduplication.md](./docs-deduplication.md) — docs deduplication notes
- [doc-first-workflow.md](./doc-first-workflow.md) — doc-first workflow
- [model-docs-governance.md](./model-docs-governance.md) — naming and docs hygiene rules
- [theme-documentation.md](./theme-documentation.md) — theme documentation guide
- [theme-documentation-standard.md](./theme-documentation-standard.md) — documentation standard
- [naming-conventions.md](./naming-conventions.md) — naming conventions
- [CHANGELOG.md](./CHANGELOG.md) — version history (kept uppercase)

## Architecture and theme structure

- [architecture.md](./architecture.md) — theme architecture ("vestito" pattern)
- [architecture-rules.md](./architecture-rules.md) — architecture rules
- [modern-theme-architecture.md](./modern-theme-architecture.md) — modern stack (Livewire, Volt, Flux UI)
- [theme-architecture-best-practices.md](./theme-architecture-best-practices.md) — best practices
- [themes-system-complete-guide.md](./themes-system-complete-guide.md) — themes system guide ("il vestito di Laraxot")
- [comprehensive-theme-analysis.md](./comprehensive-theme-analysis.md) — comprehensive theme analysis
- [gestionale-panels-vs-themes.md](./gestionale-panels-vs-themes.md) — panels SRC vs themes
- [concepts/xotbase-never-extend-filament.md](./concepts/xotbase-never-extend-filament.md) — always XotBase*, never Filament* directly
- [accessor-delegation-pattern.md](./accessor-delegation-pattern.md) — accessor delegation and auto-persistence
- [model-usage-in-themes.md](./model-usage-in-themes.md) — model usage rules in themes
- [components.md](./components.md) — component catalog
- [layouts.md](./layouts.md) — layout system
- [mail-layouts.md](./mail-layouts.md) — mail layouts
- [manage-related-records.md](./manage-related-records.md) — ManageRelatedRecords styling
- [schemaless-attributes.md](./schemaless-attributes.md) — schemaless attributes in themes
- [binary-assets.md](./binary-assets.md) — binary assets
- [readonly-field-styling.md](./readonly-field-styling.md) — readonly field styling pattern
- [customization.md](./customization.md) — theme customization
- [folio-pages-structure.md](./folio-pages-structure.md) — Folio pages structure
- [schema.md](./schema.md) — module schema

## Filament and UI patterns

- [filament-version.md](./filament-version.md) — Filament version declaration
- [filament-table-architecture.md](./filament-table-architecture.md) — where a resource table is configured
- [filament-resource-schemas-tables.md](./filament-resource-schemas-tables.md) — resource schemas and tables
- [filament-infolist-pattern.md](./filament-infolist-pattern.md) — infolist pattern
- [filament-admin-sub-navigation.md](./filament-admin-sub-navigation.md) — admin panel sub navigation
- [filament-chart-integration.md](./filament-chart-integration.md) — ChartWidget integration
- [filament-5-nested-resources-complete-guide.md](./filament-5-nested-resources-complete-guide.md) — nested resources, complete guide
- [filament-5-nested-resources.md](./filament-5-nested-resources.md) — nested resources (shorter variant, see Storico)

## Charts: Chart.js and JPGraph

- [chartjs-datalabels-background-styling.md](./chartjs-datalabels-background-styling.md)
- [chartjs-datalabels-filament5-implementation.md](./chartjs-datalabels-filament5-implementation.md)
- [chartjs-datalabels-multiple-labels-complete-guide.md](./chartjs-datalabels-multiple-labels-complete-guide.md)
- [chartjs-datalabels-theme-integration.md](./chartjs-datalabels-theme-integration.md)
- [chartjs-export-theme-integration.md](./chartjs-export-theme-integration.md)
- [chartjs-plugin-datalabels-filament5.md](./chartjs-plugin-datalabels-filament5.md)
- [dual-label-chart-widget-implementation.md](./dual-label-chart-widget-implementation.md)
- [simplechartwidget-problems-analysis.md](./simplechartwidget-problems-analysis.md)
- [simplechartwidget-quality-analysis.md](./simplechartwidget-quality-analysis.md) — duplicate of dual-label-chart-widget-implementation.md, see Storico
- [jpgraph-guide.md](./jpgraph-guide.md)
- [jpgraph-integration-guide.md](./jpgraph-integration-guide.md)
- [jpgraph-chartjs-theme-integration.md](./jpgraph-chartjs-theme-integration.md)
- [jpgraph-class-reference-comprehensive-analysis.md](./jpgraph-class-reference-comprehensive-analysis.md)
- [limesurvey-charts-pdf-integration.md](./limesurvey-charts-pdf-integration.md)
- [wiki/concepts/jpgraph-guide.md](./wiki/concepts/jpgraph-guide.md) — wiki copy, see Storico

## Code quality, PHPStan and DRY/KISS

- [phpstan.md](./phpstan.md)
- [phpstan-compliance-status.md](./phpstan-compliance-status.md)
- [phpstan-level10-analysis.md](./phpstan-level10-analysis.md)
- [phpstan-level10-theme-compliance.md](./phpstan-level10-theme-compliance.md)
- [phpstan-merge-conflicts.md](./phpstan-merge-conflicts.md)
- [phpstan-dry-kiss-theme-guidelines.md](./phpstan-dry-kiss-theme-guidelines.md)
- [phpstan-dry-kiss-guidelines.md](./phpstan-dry-kiss-guidelines.md) — duplicate content, see Storico
- [php-quality-gates-rule.md](./php-quality-gates-rule.md)
- [no-phpstan-probe-policy.md](./no-phpstan-probe-policy.md)
- [dry-kiss-analysis.md](./dry-kiss-analysis.md)
- [dry-kiss-best-practices.md](./dry-kiss-best-practices.md)
- [code-quality-improvement-report.md](./code-quality-improvement-report.md)
- [code-quality-improvements.md](./code-quality-improvements.md)
- [code-quality-report.md](./code-quality-report.md)
- [code-redundancy-audit.md](./code-redundancy-audit.md)
- [duplicate-methods.md](./duplicate-methods.md)
- [duplicate-methods-report.md](./duplicate-methods-report.md)
- [metodi-duplicati-analisi.md](./metodi-duplicati-analisi.md)
- [quality-audit.md](./quality-audit.md)
- [quality-roadmap.md](./quality-roadmap.md)
- [wiki/concepts/code-redundancy-theme.md](./wiki/concepts/code-redundancy-theme.md)
- [wiki/concepts/duplicate-method-bodies.md](./wiki/concepts/duplicate-method-bodies.md)
- [wiki/concepts/method-name-homonyms.md](./wiki/concepts/method-name-homonyms.md)
- [wiki/concepts/php-method-name-homonyms-theme-impact.md](./wiki/concepts/php-method-name-homonyms-theme-impact.md)

## Product and planning

- [prd.md](./prd.md) — PRD (see product-requirements.md and Storico for variants)
- [product-requirements.md](./product-requirements.md)
- [tech-spec.md](./tech-spec.md)
- [product-launch-plan.md](./product-launch-plan.md)
- [launch-plan.md](./launch-plan.md) — short companion note
- [product-roadmap.md](./product-roadmap.md)
- [roadmap.md](./roadmap.md) — short roadmap note (different scope than product-roadmap.md)
- [product-strategy.md](./product-strategy.md)
- [strategy.md](./strategy.md) — short companion note
- [sprint-planning.md](./sprint-planning.md)
- [sprint-planning-meeting.md](./sprint-planning-meeting.md)
- [user-research.md](./user-research.md)
- [release-marketing-standard.md](./release-marketing-standard.md)
- [cosa-migliorare.md](./cosa-migliorare.md)
- [epics/zero-epics-and-stories.md](./epics/zero-epics-and-stories.md)
- [roadmap/accessibility-standards.md](./roadmap/accessibility-standards.md)
- [roadmap/advanced-features.md](./roadmap/advanced-features.md)
- [roadmap/component-library.md](./roadmap/component-library.md)
- [roadmap/performance-optimization.md](./roadmap/performance-optimization.md)
- [roadmap/responsive-system.md](./roadmap/responsive-system.md)
- [roadmap/theme-customization.md](./roadmap/theme-customization.md)
- [wiki/sources/theme-zero-product-and-roadmap-docs.md](./wiki/sources/theme-zero-product-and-roadmap-docs.md)

## Rules, boundaries and governance

- [database-governance.md](./database-governance.md)
- [composer-modules-not-themes.md](./composer-modules-not-themes.md)
- [one-migration-themes-boundary.md](./one-migration-themes-boundary.md)
- [laravel-13-composer-boundary.md](./laravel-13-composer-boundary.md)
- [laravel-13-upgrade.md](./laravel-13-upgrade.md)
- [ide-helper-phpdoc-boundary.md](./ide-helper-phpdoc-boundary.md)
- [no-ai-tool-scaffold-dirs.md](./no-ai-tool-scaffold-dirs.md)
- [no-git-lfs.md](./no-git-lfs.md)
- [spatie-permission-team-context.md](./spatie-permission-team-context.md)
- [spatie-permission-teams-boundary.md](./spatie-permission-teams-boundary.md)
- [document-root-public-html.md](./document-root-public-html.md)
- [public-path-public-html.md](./public-path-public-html.md)
- [packages-integration.md](./packages-integration.md)
- [wiki/concepts/criteri-gg-theme-boundary-audit.md](./wiki/concepts/criteri-gg-theme-boundary-audit.md)
- [wiki/concepts/gg-integ-params-no-asz-theme-boundary.md](./wiki/concepts/gg-integ-params-no-asz-theme-boundary.md)
- [wiki/concepts/module-directory-structure-boundary.md](./wiki/concepts/module-directory-structure-boundary.md)
- [wiki/concepts/platform-leaf-dependency-and-theme.md](./wiki/concepts/platform-leaf-dependency-and-theme.md)
- [wiki/concepts/filament-nested-resources.md](./wiki/concepts/filament-nested-resources.md)
- [wiki/concepts/filament-v5-schema-not-form.md](./wiki/concepts/filament-v5-schema-not-form.md)
- [wiki/concepts/organizzativa-money.md](./wiki/concepts/organizzativa-money.md)
- [wiki/sources/laravel13-theme-zero-composer-audit.md](./wiki/sources/laravel13-theme-zero-composer-audit.md)

## AI tooling, agents and automation

- [ai-development-guide.md](./ai-development-guide.md)
- [ai-handoff.md](./ai-handoff.md)
- [ai-methodologies.md](./ai-methodologies.md)
- [ai-tooling.md](./ai-tooling.md)
- [agent-confidence-discipline.md](./agent-confidence-discipline.md)
- [agent-confidence-protocol.md](./agent-confidence-protocol.md)
- [agent-edit-discipline.md](./agent-edit-discipline.md)
- [frameworks.md](./frameworks.md) — caveman/graphify/bmad-method/headroom/ponytail integration notes
- [graphify-map.md](./graphify-map.md)
- [graphify/README.md](./graphify/README.md)
- [prompts/push.md](./prompts/push.md)
- [outputs/README.md](./outputs/README.md)
- [raw/README.md](./raw/README.md)
- [skills/README.md](./skills/README.md)
- [headroom/README.md](./headroom/README.md)
- [wiki/concepts/context-overflow-prevention.md](./wiki/concepts/context-overflow-prevention.md)
- [wiki/concepts/ponytail-audit.md](./wiki/concepts/ponytail-audit.md)
- [wiki/concepts/ponytail-docs-lifecycle.md](./wiki/concepts/ponytail-docs-lifecycle.md)
- [wiki/concepts/second-brain-local-discipline.md](./wiki/concepts/second-brain-local-discipline.md)
- [wiki/concepts/theme-zero-operating-focus.md](./wiki/concepts/theme-zero-operating-focus.md)
- [wiki/sources/context-compression-and-retrieval.md](./wiki/sources/context-compression-and-retrieval.md)
- [wiki/bmad-method.md](./wiki/bmad-method.md)

## Git conflicts and multi-org sync history

- [conflict-resolution.md](./conflict-resolution.md)
- [conflict-resolution-summary.md](./conflict-resolution-summary.md)
- [git-conflict-resolution-2026-07-31.md](./git-conflict-resolution-2026-07-31.md)
- [git-collision-audit-bashscripts.md](./git-collision-audit-bashscripts.md)
- [git-collisions-bashscripts-audit.md](./git-collisions-bashscripts-audit.md) — near duplicate of git-collision-audit-bashscripts.md, see Storico
- [git-multi-org-sync-handoff.md](./git-multi-org-sync-handoff.md)
- [multi-org-sync-laraxot-provtv.md](./multi-org-sync-laraxot-provtv.md)
- [wiki/how-to/gitmodules-sync-session.md](./wiki/how-to/gitmodules-sync-session.md)
- [wiki/memories/github-remote-theme-resolve.md](./wiki/memories/github-remote-theme-resolve.md)

## Environment, auth, translations, troubleshooting

- [env-development-configuration.md](./env-development-configuration.md)
- [authentication.md](./authentication.md)
- [auth-examples.md](./auth-examples.md)
- [translations.md](./translations.md)
- [troubleshooting.md](./troubleshooting.md)
- [examples.md](./examples.md)
- [performance-actions-reference.md](./performance-actions-reference.md)
- [performance-calcolo-quota-troubleshooting.md](./performance-calcolo-quota-troubleshooting.md)

## Screenshots and feature analyses

- [screenshots/f1-world-champion-2026-theme-analysis.md](./screenshots/f1-world-champion-2026-theme-analysis.md)
- [screenshots/f1-world-champion-theme-analysis.md](./screenshots/f1-world-champion-theme-analysis.md) — duplicate topic, see Storico

## Wiki (second brain)

The `wiki/` subtree is a self-contained second-brain catalog with its own index.
Entry point: [wiki/index.md](./wiki/index.md) (see also [wiki/overview.md](./wiki/overview.md)
and [wiki/log.md](./wiki/log.md)). Concepts, sources, how-to and memories referenced above are
linked individually by topic; the remaining wiki navigation files are:

- [wiki/commands/index.md](./wiki/commands/index.md)
- [wiki/concepts/index.md](./wiki/concepts/index.md)
- [wiki/memories/index.md](./wiki/memories/index.md)
- [wiki/rules/index.md](./wiki/rules/index.md)
- [wiki/skills/index.md](./wiki/skills/index.md)
- [wiki/schema.md](./wiki/schema.md)

## Storico / da consolidare

Questi file non vengono cancellati ne' rinominati: sono varianti duplicate, stub deprecati
o indici superati, raggruppati qui per evitare di inquinare la navigazione principale.
Restano raggiungibili ai path indicati.

### Indici superati (sostituiti da questo index.md)
- [00-index.md](./00-index.md)
- [00-INDEX.md](./00-INDEX.md)
- [INDEX.md](./INDEX.md)
- [index-consolidated.md](./index-consolidated.md)
- [wiki/commands/INDEX.md](./wiki/commands/INDEX.md) — uppercase duplicate of wiki/commands/index.md
- [wiki/concepts/INDEX.md](./wiki/concepts/INDEX.md) — uppercase duplicate of wiki/concepts/index.md
- [wiki/memories/INDEX.md](./wiki/memories/INDEX.md) — uppercase duplicate of wiki/memories/index.md
- [wiki/rules/INDEX.md](./wiki/rules/INDEX.md) — uppercase duplicate of wiki/rules/index.md
- [wiki/skills/INDEX.md](./wiki/skills/INDEX.md) — uppercase duplicate of wiki/skills/index.md
- [wiki/INDEX.md](./wiki/INDEX.md) — uppercase duplicate of wiki/index.md

### Duplicati uppercase/lowercase esatti (stesso contenuto)
- [ARCHITECTURE.md](./ARCHITECTURE.md) vs [architecture.md](./architecture.md)
- [changelog.md](./changelog.md) vs [CHANGELOG.md](./CHANGELOG.md)
- [FRAMEWORKS.md](./FRAMEWORKS.md) vs [frameworks.md](./frameworks.md)
- [PANDOC_GUIDE.md](./PANDOC_GUIDE.md) vs [pandoc-guide.md](./pandoc-guide.md) — byte-identical
- [TECH_SPEC.md](./TECH_SPEC.md) vs [tech-spec.md](./tech-spec.md) — byte-identical
- [PRD.md](./PRD.md) vs [prd.md](./prd.md)
- [METODI-DUPLICATI-ANALISI.md](./METODI-DUPLICATI-ANALISI.md) vs [metodi-duplicati-analisi.md](./metodi-duplicati-analisi.md)
- [README-en.md](./README-en.md) — stale content mismatched with this theme (unrelated project boilerplate); canonical English readme is [readme-en.md](./readme-en.md)
- [wiki/SCHEMA.md](./wiki/SCHEMA.md) vs [wiki/schema.md](./wiki/schema.md)

### Stub deprecati (snake_case, auto-dichiarati "deprecated", rimandano alla versione kebab-case)
- [duplicate_methods.md](./duplicate_methods.md) → [duplicate-methods.md](./duplicate-methods.md)
- [duplicate_methods_report.md](./duplicate_methods_report.md) → [duplicate-methods-report.md](./duplicate-methods-report.md)
- [METODI_DUPLICATI_ANALISI.md](./METODI_DUPLICATI_ANALISI.md) → [METODI-DUPLICATI-ANALISI.md](./METODI-DUPLICATI-ANALISI.md)
- [conflict_resolution_summary.md](./conflict_resolution_summary.md) → [CONFLICT-RESOLUTION-SUMMARY.md](./CONFLICT-RESOLUTION-SUMMARY.md)
- [CONFLICT_RESOLUTION_SUMMARY.md](./CONFLICT_RESOLUTION_SUMMARY.md) → [CONFLICT-RESOLUTION-SUMMARY.md](./CONFLICT-RESOLUTION-SUMMARY.md)
- [product_launch_plan.md](./product_launch_plan.md) → [product-launch-plan.md](./product-launch-plan.md)
- [product_roadmap.md](./product_roadmap.md) → [product-roadmap.md](./product-roadmap.md)
- [product_strategy.md](./product_strategy.md) → [product-strategy.md](./product-strategy.md)
- [sprint_planning.md](./sprint_planning.md) → [sprint-planning.md](./sprint-planning.md)
- [user_research.md](./user_research.md) → [user-research.md](./user-research.md)

### Famiglia "conflict resolution summary" (gia' archiviata in passato)
- [CONFLICT-RESOLUTION-SUMMARY.md](./CONFLICT-RESOLUTION-SUMMARY.md) — variante canonica storica, vedi [conflict-resolution-summary.md](./conflict-resolution-summary.md) nella sezione Git
- [archive/duplicates/conflict_resolution_summary.md](./archive/duplicates/conflict_resolution_summary.md)
- [root-md-files/conflict-resolution-summary.md](./root-md-files/conflict-resolution-summary.md)
- [root-md-files/CONFLICT_RESOLUTION_SUMMARY.md](./root-md-files/CONFLICT_RESOLUTION_SUMMARY.md)
- [root-md-files/conflict-resolution-summary-relocated.md](./root-md-files/conflict-resolution-summary-relocated.md)

### Altri contenuti duplicati o storici (stesso argomento, versione alternativa/piu' vecchia)
- [analisi-completa-tema.md](./analisi-completa-tema.md) — byte-identical to [comprehensive-theme-analysis.md](./comprehensive-theme-analysis.md)
- [dry-kiss-best-practices-historic.md](./dry-kiss-best-practices-historic.md) — byte-identical to [dry-kiss-best-practices.md](./dry-kiss-best-practices.md)
- [phpstan-dry-kiss-theme-guidelines-historic.md](./phpstan-dry-kiss-theme-guidelines-historic.md) — byte-identical to [phpstan-dry-kiss-guidelines.md](./phpstan-dry-kiss-guidelines.md)
- [filament-5-nested-resources.md](./filament-5-nested-resources.md) — superseded by [filament-5-nested-resources-complete-guide.md](./filament-5-nested-resources-complete-guide.md)

Nota: nessun file .md e' stato cancellato, rinominato o spostato per produrre questo indice.
