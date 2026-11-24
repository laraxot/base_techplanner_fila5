---
<<<<<<< .merge_file_TDpkX7
title: "Contratti del modulo Notify"
type: index
module: Notify
status: active
created: 2026-11-18
updated: 2026-11-24
qmd: "notify contracts readme azioni invarianti pest group notifiche invio"
---

# Contratti del modulo Notify

Un contract descrive il comportamento promesso da una Action che invia comunicazioni ai destinatari (dati personali: email, telefono) o scrive lo stato delle notifiche.
Standard: `Modules/Xot/docs/contracts/contract-authoring-standard.md`; governance: `Modules/Xot/docs/adr/0012-behavioral-contract-governance.md`.

## Formato

- Frontmatter con `type: contract` e `action: "Modules\\Notify\\Actions\\..."`.
- Sezioni nell'ordine: `## Input`, `## Output`, `## Invarianti`, `## Effetti collaterali`, `## Errori`, `## Non fa`.
- Invarianti con ID `NOTIFY-<AREA>-INV-<N>`, ciascuno con test Pest `->group('<ID>')`.

## File presenti

- [send-notification-action.md](send-notification-action.md) (`NOTIFY-SEND-INV-1..5`)
- [modelwithstatuscontract.md](modelwithstatuscontract.md): nota legacy (`type: note`, `status: draft`) che rimanda a `Modules/Xot/app/Contracts/ModelWithStatusContract.php`; non e' un contract di Action e non segue il formato a sei sezioni.
- `_template.md`: modello per i nuovi contract.

Copertura e backlog: [INDEX.md](INDEX.md).
=======
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

>>>>>>> .merge_file_XNGWHQ
