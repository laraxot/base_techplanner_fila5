---
<<<<<<< .merge_file_rRs7Ul
<<<<<<< .merge_file_d1A1L8
title: "Contratti del modulo Media"
type: index
module: Media
status: active
created: 2026-11-18
updated: 2026-11-24
qmd: "media contracts readme azioni invarianti pest group upload percorsi"
---

# Contratti del modulo Media

Un contract descrive il comportamento promesso da una Action che gestisce upload, percorsi di storage o dati personali nei file (es. GPS nelle immagini).
Standard: `Modules/Xot/docs/contracts/contract-authoring-standard.md`; governance: `Modules/Xot/docs/adr/0012-behavioral-contract-governance.md`.

## Formato

- Frontmatter con `type: contract` e `action: "Modules\\Media\\Actions\\..."`.
- Sezioni nell'ordine: `## Input`, `## Output`, `## Invarianti`, `## Effetti collaterali`, `## Errori`, `## Non fa`.
- Invarianti con ID `MEDIA-<AREA>-INV-<N>`, ciascuno con test Pest `->group('<ID>')`.

## File presenti

- [generate-temporary-upload-path-action.md](generate-temporary-upload-path-action.md) (`MEDIA-PATH-INV-1..4`)
- [strip-image-metadata-action.md](strip-image-metadata-action.md) (`MEDIA-STRIP-INV-1..3`)
- [path-generator.md](path-generator.md): documento legacy (`type: concept`, 2026-07-14) sull'interfaccia `PathGenerator`; non segue il formato a sei sezioni e non ha invarianti con ID. Non riscritto.
- `_template.md`: modello per i nuovi contract.

Copertura e backlog: [INDEX.md](INDEX.md).
=======
=======
>>>>>>> .merge_file_4XODU0
title: "Contratti"
type: index
tags: [contracts, actions, interfaces]
created: 2026-11-18
updated: 2026-11-18
---

# Contratti

Cosa promette la superficie pubblica di questo pacchetto: le Action che scrivono dati, chiamano servizi esterni o hanno
effetti collaterali, e le interfacce (`app/Contracts`). Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`.

## Contratto di comportamento di un'Action

Un file per Action, nome in kebab-case della classe (`create-ticket-action.md`), frontmatter `type: contract` e
`action: <FQCN>`, e queste sei sezioni nell'ordine:

```markdown
## Input
## Output
## Invarianti
## Effetti collaterali
## Errori
## Non fa
```

Il docblock dell'Action rimanda al file con la riga `Contratto di comportamento: docs/contracts/<file>.md`.
Chi cambia il comportamento aggiorna il contratto nello stesso commit.

## Contratti

<<<<<<< .merge_file_rRs7Ul
>>>>>>> .merge_file_SFhc2E
=======
>>>>>>> .merge_file_4XODU0
