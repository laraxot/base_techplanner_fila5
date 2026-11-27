---
title: "Contratti del tema Barthelemy"
type: index
tags: [contracts, barthelemy]
created: 2026-11-24
updated: 2026-11-24
---

# Contratti del tema Barthelemy

Barthelemy e' uno stub senza codice (`theme.json`: `active: false`, nessuna cartella `app/`): non ha Action ne'
interfacce, quindi nessun contratto.

**Dove stanno i contratti applicativi:** nei moduli (`Modules/<Modulo>/docs/contracts/`). Se il tema acquisisce un'Action
che scrive dati o chiama l'esterno, il contratto va qui nel formato del
[canon](../../../../Modules/Xot/docs/rules/action-behavioral-contract.md).

## Contratti

Nessuno. Inventario machine-readable: [INDEX.md](INDEX.md); tabella di lavoro: [index.md](index.md); template per un futuro contratto: [_template.md](_template.md).

## Harness minimo: ownership, evidenza e recupero (2026-11-27)

I contratti di **theme_barthelemy_fila5** restano accanto alle Action, interfacce o superfici di questo package; root e Xot definiscono lo standard, non copiano le promesse. Un contratto comportamentale esplicita **Input, Output, Invarianti, Effetti collaterali, Errori, Non fa**; ogni ID di invariante punta a un group Pest effettivo oppure segnala `non dimostrata`. Se esiste la classe, il docblock deve rimandare al file con `@contract` e `@see`; per temi senza classi PHP non inventare Action/contratti.

- [Standard Xot](https://github.com/laraxot/module_xot_fila5/blob/dev/docs/contracts/contract-authoring-standard.md) · [ownership root](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/adr/0001-harness-minimo-e-ownership.md) · [runbook ECC/Second Brain](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/harness/README.md).
- **BMAD**: prima di cambiare una promessa, fissa nella story owner scope, esclusioni, evidenza e approvazioni richieste.
- **ECC**: i marker di merge rendono invalido l'indice; citare una suite non significa averla eseguita. Distingui `pass`, `fail`, `non eseguito` e registra il debito in [rollout #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
