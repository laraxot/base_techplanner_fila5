---
<<<<<<< .merge_file_R1TYvR
<<<<<<< .merge_file_ImYbgB
title: "Contratti del modulo Activity"
type: index
module: Activity
status: active
created: 2026-11-18
updated: 2026-11-24
qmd: "activity contracts readme azioni invarianti pest group audit log"
---

# Contratti del modulo Activity

Un contract descrive il comportamento promesso da una Action che accede a file di log, applica permessi o cancella dati di audit.
Standard: `Modules/Xot/docs/contracts/contract-authoring-standard.md`; governance: `Modules/Xot/docs/adr/0012-behavioral-contract-governance.md`.

## Formato

- Frontmatter con `type: contract` e `action: "Modules\\Activity\\Actions\\..."`.
- Sezioni nell'ordine: `## Input`, `## Output`, `## Invarianti`, `## Effetti collaterali`, `## Errori`, `## Non fa`.
- Invarianti con ID `ACT-<AREA>-INV-<N>`, ciascuno con test Pest `->group('<ID>')`.

## File presenti

- [resolve-log-file-path-action.md](resolve-log-file-path-action.md) (`ACT-LOGPATH-INV-1..4`)
- [authorize-log-access-action.md](authorize-log-access-action.md) (`ACT-LOGAUTH-INV-1..2`)
- [activity-maintenance-action.md](activity-maintenance-action.md) (`ACT-CLEAN-INV-1..2`)
- `_template.md`: modello per i nuovi contract.

Copertura e backlog: [INDEX.md](INDEX.md).
=======
=======
>>>>>>> .merge_file_7BxcdH
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

<<<<<<< .merge_file_R1TYvR
>>>>>>> .merge_file_23VufC
=======
>>>>>>> .merge_file_7BxcdH
