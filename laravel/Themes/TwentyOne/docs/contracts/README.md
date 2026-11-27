---
title: "Contratti del tema TwentyOne"
type: index
tags: [contracts, twentyone]
created: 2026-11-24
updated: 2026-11-24
---

# Contratti del tema TwentyOne

TwentyOne ha due Action, entrambe **di sola lettura** (preparano i dati di un blocco, non scrivono nulla, non chiamano
servizi esterni): per la regola del canon non servono contratti, e la cartella resta vuota.

| Action | Cosa fa | Perche' niente contratto |
|---|---|---|
| `app/Actions/Hero/ResolveCinematicHeroDataAction.php` | testi, CTA, statistiche e card del blocco `blocks/hero/cinematic` | legge `Modules\Predict` (conteggi, card), nessuna scrittura |
| `app/Actions/Markets/ResolveFeaturedMarketsGridDataAction.php` | etichette e card del blocco `blocks/markets/featured` | delega a `GetHomepageMarketCardsAction` di `Modules\Predict` |

Da sapere prima di imitarle:

- Dipendono da `Modules\Predict`, che non e' installato in ogni progetto che usa il tema: dove manca, i due blocchi non
  si rendono (il tema resta usabile solo se il JSON non li nomina).
- `ResolveFeaturedMarketsGridDataAction::execute()` chiama `$this__(...)` (11 occorrenze) invece di `$this->tx(...)`:
  e' una variabile indefinita, l'Action fallisce a runtime. Difetto da correggere, non uno stile da copiare.

**Dove stanno i contratti applicativi:** nei moduli (`Modules/Cms/docs/contracts/` per la risoluzione delle pagine, il
modulo di dominio per mercati e quote). Se il tema acquisisce un'Action che scrive dati o chiama l'esterno, il contratto va
qui nel formato del [canon](../../../../Modules/Xot/docs/rules/action-behavioral-contract.md).

## Contratti

Nessuno (le Action del tema sono di sola lettura). Inventario machine-readable: [INDEX.md](INDEX.md); tabella di lavoro: [index.md](index.md); template per un futuro contratto: [_template.md](_template.md).

## Harness minimo: ownership, evidenza e recupero (2026-11-27)

I contratti di **theme_twentyone_fila5** restano accanto alle Action, interfacce o superfici di questo package; root e Xot definiscono lo standard, non copiano le promesse. Un contratto comportamentale esplicita **Input, Output, Invarianti, Effetti collaterali, Errori, Non fa**; ogni ID di invariante punta a un group Pest effettivo oppure segnala `non dimostrata`. Se esiste la classe, il docblock deve rimandare al file con `@contract` e `@see`; per temi senza classi PHP non inventare Action/contratti.

- [Standard Xot](https://github.com/laraxot/module_xot_fila5/blob/dev/docs/contracts/contract-authoring-standard.md) · [ownership root](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/adr/0001-harness-minimo-e-ownership.md) · [runbook ECC/Second Brain](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/harness/README.md).
- **BMAD**: prima di cambiare una promessa, fissa nella story owner scope, esclusioni, evidenza e approvazioni richieste.
- **ECC**: i marker di merge rendono invalido l'indice; citare una suite non significa averla eseguita. Distingui `pass`, `fail`, `non eseguito` e registra il debito in [rollout #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
