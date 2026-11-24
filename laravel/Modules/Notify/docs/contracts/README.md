---
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
