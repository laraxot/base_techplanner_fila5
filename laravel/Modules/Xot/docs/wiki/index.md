---
title: "Xot Module Wiki Index"
type: index
module: Xot
tags: [xot, wiki, index, xotbase, migrations, phpstan]
created: 2026-04-28
updated: 2026-07-24
qmd: "xot module wiki index XotBase migrations phpstan filament actions pest domain ownership"
issues:
  - "https://github.com/laraxot/module_xot_fila5/issues/28"
discussions:
  - "https://github.com/laraxot/module_xot_fila5/discussions/29"
related:
  - ./concepts/migration-update-timestamps-only.md
  - ./concepts/module-model-artifact-parity.md
  - ./concepts/ai-harness-xot-discipline.md
  - ./concepts/second-brain-local-discipline.md
  - ./concepts/no-domain-actions-in-xot.md
  - ./rules/module-testcase-xotbase-hierarchy.md
  - ../../../../../docs/wiki/concepts/hackernoon-ai-coding-tips-map.md
  - ../../../../../docs/wiki/rules/wiki-markdown-frontmatter-mandatory.md
  - ../../../../../docs/wiki/rules/domain-actions-belong-to-domain-module.md
---

# Xot Module LLM Wiki

## Boundaries (2026-07-24)

- [no-domain-actions-in-xot](./concepts/no-domain-actions-in-xot.md) — niente `Actions/AI|Geo|…`
- Raw: [no-domain-logic-in-xot.md](../no-domain-logic-in-xot.md)
- AI owner: [ollama-actions-ownership](../../AI/docs/wiki/concepts/ollama-actions-ownership.md)

Indice operativo del wiki Xot (core framework).

## Struttura canonica (sacred)

- [module-directory-structure-rule.md](../module-directory-structure-rule.md) — regola cartelle modulo (PHP solo in `app/`)
- [concepts/](./concepts/): pattern architetturali e metodologie Xot/Laraxot.
- [entities/](./entities/): modelli e componenti chiave.
- [sources/](./sources/): dati di ricerca e link esterni.
- [comparisons/](./comparisons/): implementazioni alternative.
- [decisions/](./decisions/): ADL (Architectural Decision Log).
- [troubleshooting/](./troubleshooting/): problemi noti e soluzioni.
- [_archive/](./_archive/): documentazione legacy.
- [_templates/](./_templates/): template standard.

## Regole collegate

- [ai-harness-xot-discipline.md](./concepts/ai-harness-xot-discipline.md) — harness agenti (canon moduli)
- [module-testcase-xotbase-hierarchy.md](./rules/module-testcase-xotbase-hierarchy.md) — TestCase dei moduli estendono `XotBaseTestCase`; nWidart Tests è dev-only nel package installato
- [composer-root-skeleton-modular.md](./concepts/composer-root-skeleton-modular.md) — root Composer minimo, merge solo `Modules/*/composer.json`
- [pest-global-class-imports.md](./rules/pest-global-class-imports.md) — nei test senza namespace rimuovere import globali inutili
- [second-brain-local-discipline.md](./concepts/second-brain-local-discipline.md)
- [hackernoon-ai-coding-tips-map](../../../../../docs/wiki/concepts/hackernoon-ai-coding-tips-map.md) (root)
- [forbidden-folders-rule](../../../../docs/wiki/concepts/forbidden-folders.md): vincoli strutturali strict.
- [llm-wiki-standard](../../../../docs/project/karpathy-llm-wiki-adoption.md): mapping repository e ciclo di vita conoscenza.
- [laraxot-core](../../../../docs/wiki/concepts/laraxot-core.md): regole delle classi core XotBase.
- [xotbase-check](../../../../docs/wiki/concepts/xotbase-check.md): verifica uso XotBase.

## Scopo Xot Module

Core framework Laraxot: XotBase classes, Actions, PHPStan Level 10, Filament integration, migrations, translations.

## Completamento piattaforma

- [overviews/platform-completion-roadmap.md](./overviews/platform-completion-roadmap.md) — SSoT roadmap moduli e temi
- [phpstan-best-practices.md](./phpstan-best-practices.md)

## Compiled Pages

| Pagina | Tipo | Argomento | Data |
|--------|------|-----------|------|
| [platform-completion-roadmap](./overviews/platform-completion-roadmap.md) | Overview | Hub completamento piattaforma | 2026-06-13 |
| [phpstan-best-practices](./phpstan-best-practices.md) | Guideline | Pattern test PHPStan L10 | 2026-06-13 |
| [ridondanze-cross-cutting-codebase](./concepts/ridondanze-cross-cutting-codebase.md) | Concept | DRY codebase e duplicazioni cross-modulo | 2026-05-21 |
| [policy-inheritance-boundary](../../User/docs/wiki/concepts/policy-inheritance-boundary.md) | Decision | Cross-module | 2026-04-27 |
| [redundancy-catalog](./concepts/redundancy-catalog.md) | Concept | Indice ridondanza | 2026-05-21 |
| [unit-test-case-pattern](./concepts/unit-test-case-pattern.md) | Concept | Test patterns | 2026-04-21 |
| [phpstan-cluster-map-and-false-friends](./concepts/phpstan-cluster-map-and-false-friends.md) | Concept | PHPStan cluster | 2026-04-23 |
| [phpstan-pest-bridge-discipline](./concepts/phpstan-pest-bridge-discipline.md) | Concept | Pest bridge discipline | 2026-06-10 |
| [xotbasefield-calculated-view-rule](./concepts/xotbasefield-calculated-view-rule.md) | Concept | XotBaseField | 2026-04-23 |
| [policy-base-strategy](./concepts/policy-base-strategy.md) | Concept | Policy strategy | 2026-04-27 |
| [policy-module-matrix](./concepts/policy-module-matrix.md) | Concept | Policy matrix | 2026-04-27 |
| [laravel13-modular-package-compatibility-matrix](./concepts/laravel13-modular-package-compatibility-matrix.md) | Concept | Compatibilità pacchetti modulo | 2026-04-28 |
| [module-config-php-religion](./concepts/module-config-php-religion.md) | Concept | `config/config.php` obbligatorio | 2026-07-27 |
| [module-model-artifact-parity](./concepts/module-model-artifact-parity.md) | Concept | Parità artefatti modello | 2026-06-05 |
| [module-testcase-xotbase-hierarchy](./rules/module-testcase-xotbase-hierarchy.md) | Rule | Gerarchia TestCase modulo | 2026-06-10 |
| [pest-global-class-imports](./rules/pest-global-class-imports.md) | Rule | Import globali nei test Pest | 2026-06-12 |
| [composer-root-skeleton-modular](./concepts/composer-root-skeleton-modular.md) | Concept | Root Composer minimo | 2026-06-30 |

## Best Practices

- Ogni modulo Nwidart deve avere `config/config.php`.
- Usare Actions, non Services.
- Implementare `casts()` method, non `$casts` property.
- Applicare PHPStan Level 10.
- Pest resta Pest; bridge/helper condivisi solo quando riducono duplicazione cross-modulo.

## Bad Practices

- NON creare Service classes: usare Actions.
- NON usare `dehydrated(false)` nei trait: blocca il salvataggio.
- NON dichiarare `$view` statica in XotBaseField: si calcola via `GetViewByClassAction`.

## False Friends

- `dehydrated(false)` sembra mantenere il campo nei dati ma blocca il salvataggio.
- `live()` in Filament non rende il campo sempre live: serve `$applyStateBindingModifiers()`.

## Troubleshooting

| Pagina | Tipo | Argomento |
|--------|------|-----------|
| [xotbasefield-calculated-view-rule](./concepts/xotbasefield-calculated-view-rule.md) | Concept | XotBaseField runtime |

## Lezioni 2026-07-27 (hub)

| Argomento | Doc |
|-----------|-----|
| Doppia registrazione provider | [module-providers-dual-registration-mandatory.md](./concepts/module-providers-dual-registration-mandatory.md) |
| Trinità panel Filament | [module-filament-panel-triad.md](./concepts/module-filament-panel-triad.md) |
| `config/config.php` | [module-config-php-religion.md](./concepts/module-config-php-religion.md) |
| `AdminPanelProvider` | [module-admin-panel-provider-mandatory.md](./concepts/module-admin-panel-provider-mandatory.md) |
| `Dashboard.php` | [module-dashboard-page-mandatory.md](./concepts/module-dashboard-page-mandatory.md) |
| Hub runtime cross-modulo | [runtime-config-religion-hub](../../../../Themes/docs/shared-components/runtime-config-religion-hub.md) |
| Tenant `modules_statuses` | [tenant-module-status-registry](../../Tenant/docs/tenant-module-status-registry.md) |
