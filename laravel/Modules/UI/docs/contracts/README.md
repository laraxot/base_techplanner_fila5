---
title: "Contratti — UI"
type: index
tags: [contracts, actions, ui]
created: 2026-11-18
updated: 2026-11-24
---

# Contratti — UI

Cosa promettono le Action di UI che altri moduli usano o che toccano dati personali: scoperta dei blocchi (usata da
Cms), localizzazione dei dati dei blocchi (delegata a Cms se presente), dati dell'utente autenticato. Le altre Action
di UI sono pure (icone, giorni della settimana) o disattivate (`ApplyCalendarToPanelAction`, no-op con log).

**Quando leggerli**: prima di chiamare, modificare o imitare una di queste Action.

Formato (6 sezioni, tabella invarianti con ID e group Pest, `@contract` nel docblock):
[action-behavioral-contract](../../../Xot/docs/rules/action-behavioral-contract.md). Un'invariante con group si
verifica con `vendor/bin/pest Modules/UI/tests --group=<ID>`; `—` è debito dichiarato.

## Contratti

- [ResolveLocalizedBlockDataAction](resolve-localized-block-data-action.md) — passa i dati del blocco al resolver di Cms se esiste, altrimenti li ritorna invariati.
- [GetAllBlocksAction](get-all-blocks-action.md) — elenca i blocchi del page builder di tutti i moduli installati.
- [GetUserDataAction](get-user-data-action.md) — identità, ruolo, permessi e impostazioni dell'utente autenticato (dati personali).
