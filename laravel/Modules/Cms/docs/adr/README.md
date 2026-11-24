---
title: "Architecture Decision Records"
type: index
tags: [adr, decisioni]
created: 2026-11-18
updated: 2026-11-18
---

# Architecture Decision Records

<<<<<<< .merge_file_Xo5G9A
<<<<<<< .merge_file_196srJ
## Metodo Harness

Scrivere un ADR solo per una scelta difficile da invertire, sorprendente o fondata su un trade-off reale. Un ADR deve rendere leggibili contesto, driver, alternative, decisione, conseguenze e una conferma ripetibile; non è un diario né una spiegazione retroattiva inventata.

Le decisioni vanno verificate contro codice e test correnti. Una modifica sostanziale crea un nuovo ADR e collega il precedente come superseded/deprecated.

=======
>>>>>>> .merge_file_MvnUHi
=======
>>>>>>> .merge_file_3sKI9f
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

<<<<<<< .merge_file_Xo5G9A
<<<<<<< .merge_file_196srJ
- [CMS e Folio risolvono le pagine tramite slug](cms-owns-page-resolution.md)

=======
>>>>>>> .merge_file_MvnUHi
=======
>>>>>>> .merge_file_3sKI9f
