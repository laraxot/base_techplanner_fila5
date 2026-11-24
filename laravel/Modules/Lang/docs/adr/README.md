---
<<<<<<< .merge_file_c39BWS
<<<<<<< .merge_file_uo80EH
title: "ADR — Lang"
type: index
owner: Lang
updated: 2026-11-24
qmd: "Lang ADR architecture decision record MADR formato localizzazione etichette traduzioni"
---

# ADR — Lang

Un ADR del modulo Lang registra una scelta difficile da invertire, sorprendente o frutto di un trade-off reale su localizzazione, traduzioni e cambio lingua. Ogni affermazione ha un file di prova. Template condiviso: [0000-template](../../../Xot/docs/adr/0000-template.md); standard: [Xot ADR](../../../Xot/docs/adr/README.md).

## Formato MADR

Frontmatter (`title`, `type: decision`, `status`, `created`, `updated`, `decision-makers`, `module`, `qmd`) e sezioni nell'ordine: `## Contesto`, `## Driver della decisione`, `## Alternative scartate`, `## Decisione`, `## Conseguenze`, `## Conferma`. Nome file in kebab-case; il file storico `0001-cambio-lingua-con-url-localizzato.md` mantiene il numero.

## ADR presenti

Elenco con stato: [INDEX.md](INDEX.md). Ultimo aggiunto: [filament-labels-are-autoconfigured-by-lang-provider](filament-labels-are-autoconfigured-by-lang-provider.md).

Policy trasversale su dati sacri e test isolati: [0013-dati-sacri-migrazioni-e-test](../../../Xot/docs/adr/0013-dati-sacri-migrazioni-e-test.md).
=======
=======
>>>>>>> .merge_file_99decW
title: "Architecture Decision Records"
type: index
tags: [adr, decisioni]
created: 2026-11-18
updated: 2026-11-18
---

# Architecture Decision Records

Il **perche'** delle scelte di questo pacchetto: una decisione per file, con le alternative scartate.
Il nome del file e' l'argomento, senza date ne' numeri (la data sta nella frontmatter).

## Formato

```markdown
---
title: "ADR — <decisione in una riga>"
type: decision
status: accepted | superseded | deprecated
created: AAAA-MM-GG
updated: AAAA-MM-GG
issues: []
---

# ADR: <decisione>

## Contesto
Fatti e vincoli che hanno reso necessaria la scelta (misure, norme, policy, incidenti).

## Decisione
Cosa si fa, in concreto, e dove sta nel codice.

## Alternative scartate
Ogni alternativa seria, con il motivo per cui non e' stata scelta.

## Conseguenze
Pro, contro, debito che resta, cosa misurare. Chi cambia la decisione scrive un nuovo ADR e segna questo `superseded`.
```

## Decisioni

<<<<<<< .merge_file_c39BWS
>>>>>>> .merge_file_gYMjL1
=======
>>>>>>> .merge_file_99decW
