---
title: "ADR — UI"
type: index
owner: UI
updated: 2026-11-24
qmd: "UI ADR architecture decision record MADR formato blocchi layer condiviso"
---

# ADR — UI

Un ADR del modulo UI registra una scelta difficile da invertire, sorprendente o frutto di un trade-off reale sul layer di presentazione condiviso. Ogni affermazione ha un file di prova. Template condiviso: [0000-template](../../../Xot/docs/adr/0000-template.md); standard: [Xot ADR](../../../Xot/docs/adr/README.md).

## Formato MADR

Frontmatter (`title`, `type: decision`, `status`, `created`, `updated`, `decision-makers`, `module`, `qmd`) e sezioni nell'ordine: `## Contesto`, `## Driver della decisione`, `## Alternative scartate`, `## Decisione`, `## Conseguenze`, `## Conferma`. Nome file in kebab-case senza data né numero.

## ADR presenti

Elenco con stato: [INDEX.md](INDEX.md). Nessun ADR nuovo in questa passata: la scelta verificabile nel codice (delega al CMS per i blocchi, `ResolveLocalizedBlockDataAction` con ripiego sui parametri originali) è già in [ui-blocks-use-cms-localization](ui-blocks-use-cms-localization.md); il confine con il dominio in [ui-does-not-authorize-domain-data](ui-does-not-authorize-domain-data.md).

Policy trasversale su dati sacri e test isolati: [0013-dati-sacri-migrazioni-e-test](../../../Xot/docs/adr/0013-dati-sacri-migrazioni-e-test.md).
