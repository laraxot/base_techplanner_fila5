---
title: "Code Redundancy Audit — tracker root"
type: concept
tags: [redundancy, duplication, architecture, audit]
created: 2026-05-21
updated: 2026-05-23
---

# Code Redundancy Audit — indice root

## Scopo

Indice e tracker di **alto livello** per ridondanze nel monorepo. La conoscenza operativa vive nei **docs del modulo/tema owner** (wiki federata), non qui.

## Metodologia

1. **Statica:** hash file (SHA256), nomi migration, FQCN duplicati, file byte-identical cross-owner.
2. **Semantica:** stessi schema Filament, Actions copiate, Blade con logica parallela.
3. **Architetturale:** estensione `XotBase*` vs copy-paste, `HasMedia*` ripetuto.

**Aggiornamento 2026-05-23:** scan checksum `laravel/Modules` + `laravel/Themes` — report **[`Modules/Xot/docs/wiki/redundancy/byte-identical-files-static-scan.md`](../../../laravel/Modules/Xot/docs/wiki/redundancy/byte-identical-files-static-scan.md)**.

## Tracker GitHub

- Umbrella audit DOCS internazionale: [#90](https://github.com/laraxot/base_fixcity_fila5/issues/90)
- Brief audit ridondanza (IT): [#89](https://github.com/laraxot/base_fixcity_fila5/issues/89)
- Governance interazione GH agenti: [#80](https://github.com/laraxot/base_fixcity_fila5/issues/80)
- **Continuazione lavori (A/B/C, 2026-05-23):**
  - [#92](https://github.com/laraxot/base_fixcity_fila5/issues/92) — consolidamento stub `routes/*.php` tra moduli
  - [#93](https://github.com/laraxot/base_fixcity_fila5/issues/93) — alberatura view duplicata in modulo **Xot**
  - [#94](https://github.com/laraxot/base_fixcity_fila5/issues/94) — DRY `placeholder.blade` temi Sixteen/TwentyOne

## Indice dei report per owner

### Moduli

| Modulo | Report | Focus |
|--------|--------|-------|
| Xot | [`docs/wiki/redundancy/byte-identical-files-static-scan.md`](../../../laravel/Modules/Xot/docs/wiki/redundancy/byte-identical-files-static-scan.md) | scan statico + pattern cross-modulo |
| Xot | [`docs/wiki/redundancy/`](../../../laravel/Modules/Xot/docs/wiki/redundancy/) | XotBase abuse, create user, ecc. |
| Xot | [`docs/wiki/concepts/ridondanze-cross-cutting-codebase.md`](../../../laravel/Modules/Xot/docs/wiki/concepts/ridondanze-cross-cutting-codebase.md) | hub aggregato |
| Media | [`docs/wiki/redundancy/has-media-form-duplication.md`](../../../laravel/Modules/Media/docs/wiki/redundancy/has-media-form-duplication.md) | HasMedia form / cluster |
| User | [`docs/wiki/redundancy/`](../../../laravel/Modules/User/docs/wiki/redundancy/) | OAuth dual tree, auth widgets, profile, UsersRelationManager ×6 |
| Fixcity | [`duplicated-comments-relation-manager.md`](../../../laravel/Modules/Fixcity/docs/wiki/redundancy/duplicated-comments-relation-manager.md) | CommentsRelationManager ×2 |
| Rating | [`duplicate-ratings-table-migrations.md`](../../../laravel/Modules/Rating/docs/wiki/redundancy/duplicate-ratings-table-migrations.md) | Table classes + migration |
| Themes | [`scaffold-llm-wiki-duplication.md`](../../../laravel/Themes/docs/wiki/redundancy/scaffold-llm-wiki-duplication.md) | 17 moduli + Sixteen scaffold pieno |

### Temi

| Tema | Report | Focus |
|------|--------|-------|
| Sixteen | [`docs/wiki/redundancy/duplicated-blade-blocks.md`](../../../laravel/Themes/Sixteen/docs/wiki/redundancy/duplicated-blade-blocks.md) | blocchi Blade |
| Sixteen | [`docs/wiki/concepts/ridondanze-documentazione-wizard.md`](../../../laravel/Themes/Sixteen/docs/wiki/concepts/ridondanze-documentazione-wizard.md) | doc wizard / parity |
| TwentyOne | [`docs/wiki/concepts/ridondanze-hub-twentyone-xot.md`](../../../laravel/Themes/TwentyOne/docs/wiki/concepts/ridondanze-hub-twentyone-xot.md) | ponte analisi storiche + cross-tema |
| Meetup | [`cross-theme-redundancy-doc-stub.md`](../../../laravel/Themes/Meetup/docs/wiki/concepts/cross-theme-redundancy-doc-stub.md) | stub `REDUNDANCY_ANALYSIS.md` ripetuti (path «summary» assente nel repo) |

## GitHub Issues – handoff esecuzione (2026-05-22)

**Epic:** [#90](https://github.com/laraxot/base_fixcity_fila5/issues/90) · **Coordinamento IT:** [#89](https://github.com/laraxot/base_fixcity_fila5/issues/89)

### Scan checksum byte-identical (#92–#94)

Issue **operative** dopo lo SHA256 aggregato Modules+Themes (`byte-identical-files-static-scan`): [#92](https://github.com/laraxot/base_fixcity_fila5/issues/92) route stub · [#93](https://github.com/laraxot/base_fixcity_fila5/issues/93) doppio albero view **Xot** · [#94](https://github.com/laraxot/base_fixcity_fila5/issues/94) placeholder cross-tema.

### Cluster refactor codice estesi (#95–#99)

- [#95](https://github.com/laraxot/base_fixcity_fila5/issues/95) — esplosione classi Base* duplicate
- [#96](https://github.com/laraxot/base_fixcity_fila5/issues/96) — RelationManagers
- [#97](https://github.com/laraxot/base_fixcity_fila5/issues/97) — Filament Forms & Resources
- [#98](https://github.com/laraxot/base_fixcity_fila5/issues/98) — Actions (CreateUserAction ×4, …)
- [#99](https://github.com/laraxot/base_fixcity_fila5/issues/99) — Blade / HasMedia / XotBase abuse

### Esecuzione dettagliata con link doc owner (#100–#106)

| Issue | Focus | Doc chiave |
|-------|--------|------------|
| [#100](https://github.com/laraxot/base_fixcity_fila5/issues/100) | **P0** User CreateUserAction + OAuth | [duplicated-create-user-action.md](https://github.com/laraxot/base_fixcity_fila5/blob/dev/laravel/Modules/Xot/docs/wiki/redundancy/duplicated-create-user-action.md), [oauth-dual-resource-trees.md](https://github.com/laraxot/base_fixcity_fila5/blob/dev/laravel/Modules/User/docs/wiki/redundancy/oauth-dual-resource-trees.md) |
| [#101](https://github.com/laraxot/base_fixcity_fila5/issues/101) | P1 UsersRelationManager + widget | [duplicated-users-relation-manager.md](https://github.com/laraxot/base_fixcity_fila5/blob/dev/laravel/Modules/User/docs/wiki/redundancy/duplicated-users-relation-manager.md) |
| [#102](https://github.com/laraxot/base_fixcity_fila5/issues/102) | Docs stub scaffold 17 moduli | [scaffold-llm-wiki-duplication.md](https://github.com/laraxot/base_fixcity_fila5/blob/dev/laravel/Themes/docs/wiki/redundancy/scaffold-llm-wiki-duplication.md) |
| [#103](https://github.com/laraxot/base_fixcity_fila5/issues/103) | Docs User legacy/archive | [ridondanze-docs-legacy-cluster.md](https://github.com/laraxot/base_fixcity_fila5/blob/dev/laravel/Modules/User/docs/wiki/concepts/ridondanze-docs-legacy-cluster.md) |
| [#104](https://github.com/laraxot/base_fixcity_fila5/issues/104) | Docs Sixteen design-comuni | [ridondanze-documentazione-wizard.md](https://github.com/laraxot/base_fixcity_fila5/blob/dev/laravel/Themes/Sixteen/docs/wiki/concepts/ridondanze-documentazione-wizard.md) |
| [#105](https://github.com/laraxot/base_fixcity_fila5/issues/105) | Rating + Media + Fixcity | [duplicate-ratings-table-migrations.md](https://github.com/laraxot/base_fixcity_fila5/blob/dev/laravel/Modules/Rating/docs/wiki/redundancy/duplicate-ratings-table-migrations.md), [duplicated-media-relation-manager.md](https://github.com/laraxot/base_fixcity_fila5/blob/dev/laravel/Modules/Media/docs/wiki/redundancy/duplicated-media-relation-manager.md) |
| [#106](https://github.com/laraxot/base_fixcity_fila5/issues/106) | Gdpr + Blog Profile/Consent | [Gdpr/redundancy-report.md](https://github.com/laraxot/base_fixcity_fila5/blob/dev/laravel/Modules/Gdpr/docs/redundancy-report.md), [duplicated-data-objects-cross-module.md](https://github.com/laraxot/base_fixcity_fila5/blob/dev/laravel/Modules/Xot/docs/wiki/redundancy/duplicated-data-objects-cross-module.md) |

## Prossimi passi

1. Domani: **#100** → **#101** → **#102** (o parallelo doc/codice).
2. Aggiornare schede `wiki/redundancy/` dopo ogni PR; commentare issue owner.
3. Non aprire report globali duplicati — usare hub Xot + epic #90.

## Riferimenti

- Inventario tecnico **`Modules`** (aggregate): [`redundancy-report.md`](../../../laravel/Modules/docs/redundancy-report.md)
- Hub **catalogo/convenzioni** Xot: [`redundancy-catalog.md`](../../../laravel/Modules/Xot/docs/wiki/concepts/redundancy-catalog.md)
- Mappa parity wizard (Sixteen): [`wizard-parity-documentation-map.md`](../../../laravel/Themes/Sixteen/docs/wiki/concepts/wizard-parity-documentation-map.md)
- Pattern duplicazioni doc legacy (**User**): [`legacy-docs-duplication-pattern.md`](../../../laravel/Modules/User/docs/wiki/concepts/legacy-docs-duplication-pattern.md)
- [`agent-conduct-rules.md`](../rules/agent-conduct-rules.md)
- [`docs/chat/INDEX.md`](../../chat/INDEX.md)
