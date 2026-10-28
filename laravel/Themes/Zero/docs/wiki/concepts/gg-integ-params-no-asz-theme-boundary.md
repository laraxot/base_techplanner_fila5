---
title: "Tema Zero — campi gg integ / esperienza (consumo only)"
type: concept
module: Zero
tags: [theme, performance, gg_integ_params_no_asz, display]
created: 2026-07-22
updated: 2026-07-22
qmd: "theme zero gg_integ_params_no_asz gg_esperienza_no_asz FieldRefresh display"
related:
  - ../../bmad/performance-actions-reference.md
  - ./method-name-homonyms.md
  - ../../../../Modules/Sigma/docs/wiki/concepts/gg-integ-params-no-asz.md
  - ../../../../../../docs/wiki/rules/criterio-esclusione-field-isomorphism.md
id: zero-docs-wiki-concepts-gg-integ-params-no-asz-theme-boundary
slug: gg-integ-params-no-asz-theme-boundary
description: "Il tema mostra valori già calcolati dai moduli (Sigma/Ptv/Progressioni/Performance). Non inventa sinonimi tra campi."
document_type: concept
category: architecture
status: active
issues: []
discussions: []
---

> Nota di verifica 2026-10-20 (docs-temi): questa pagina cita i moduli `Ptv`, `Sigma`, che non esistono in `laravel/Modules` di questo repository (controllato con `ls`). Il contenuto viene da un altro progetto della famiglia Laraxot e non e' stato riscritto: leggilo come pattern di riferimento, non come descrizione di codice presente. I link verso quei moduli non risolvono.

# Campi gg integ vs esperienza (tema Zero)

## Scopo

Il tema **mostra** valori già calcolati dai moduli (Sigma/Ptv/Progressioni/Performance). Non inventa sinonimi tra campi.

## Confusione da non ripetere in UI

| Label / campo | Fonte | Non sostituire con |
|---------------|-------|--------------------|
| `gg_integ_params_no_asz` | Sigma accessor + persist su `schede` | `gg_esperienza_no_asz` |
| `gg_esperienza_no_asz` | materializzato/report | `gg_integ_params_no_asz` |

Se una Blade/report mescola i due, la soglia di diritto e i totali PDF divergono.

Il tema **non** ricalcola né scrive colonne: consuma il valore già materializzato dall’accessor Sigma / form Filament.

Audit moduli (replica vs unione): [criteri-gg-theme-boundary-audit](./criteri-gg-theme-boundary-audit.md) · [Ptv taxonomy](../../../../../Modules/Ptv/docs/wiki/concepts/criteri-esclusione-action-taxonomy.md).

## Regola tema

- Nessuna formula `integ − asz` nel tema
- Nessun alias “esperienza” → “integ no asz”
- Refresh form: `FieldRefreshAction` chiama getter sul record

## Collegamenti

- [performance-actions-reference](../../bmad/performance-actions-reference.md)
- [Sigma gg-integ-params-no-asz](../../../../../Modules/Sigma/docs/wiki/concepts/gg-integ-params-no-asz.md)
- [Regola isomorfismo](../../../../../../docs/wiki/rules/criterio-esclusione-field-isomorphism.md)
