---
<<<<<<< .merge_file_wMmbBm
<<<<<<< .merge_file_rL4Uiz
<<<<<<< .merge_file_h28Y83
title: "ADR del modulo Activity"
type: index
module: Activity
status: active
created: 2026-11-18
updated: 2026-11-24
qmd: "Activity adr architecture decision records madr formato"
---

# ADR del modulo Activity

Un ADR registra una scelta difficile da invertire, sorprendente o frutto di un trade-off reale, e il suo perche'.
Non e' un diario ne' una spiegazione retroattiva: se la decisione non e' dimostrabile dal codice o da una story/doc del repo, non si scrive.
Il nome del file e' l'argomento in kebab-case, senza date (la data sta nella frontmatter).

## Formato (MADR breve)

Frontmatter: `title`, `type: decision`, `status` (`proposed` | `accepted` | `superseded` | `deprecated`), `created`, `updated`, `decision-makers`, `module`, `qmd`.

Sezioni obbligatorie, in quest'ordine:

```markdown
## Contesto
## Driver della decisione
## Alternative scartate
## Decisione
## Conseguenze
## Conferma
```

Template condiviso: `laravel/Modules/Xot/docs/adr/0000-template.md`. Guard: `Modules/Xot/tests/Unit/Docs/PackagesHaveContractsAndAdrTest.php`.
Chi cambia una decisione scrive un nuovo ADR e segna il precedente `superseded by <file>`.

## ADR presenti

- [activity-audit-is-append-oriented](activity-audit-is-append-oriented.md)

Elenco con stato: [INDEX.md](INDEX.md).
=======
=======
>>>>>>> .merge_file_A3Gb32
=======
>>>>>>> .merge_file_EfAEp3
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

<<<<<<< .merge_file_wMmbBm
<<<<<<< .merge_file_rL4Uiz
>>>>>>> .merge_file_SCk99H
=======
>>>>>>> .merge_file_A3Gb32
=======
>>>>>>> .merge_file_EfAEp3
