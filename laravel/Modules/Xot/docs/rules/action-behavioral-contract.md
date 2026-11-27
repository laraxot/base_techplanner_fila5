---
qmd: "contratto comportamento Action input output invarianti effetti collaterali errori ADR verifica harness Pest"
title: "Regola — Contratti di comportamento delle Action"
type: rule
module: Xot
tags: [rule, actions, contract, adr, harness, testing]
created: 2026-11-18
updated: 2026-11-26
status: active
related:
  - ../adr/0012-behavioral-contract-governance.md
  - ../concepts/agent-harness-guide.md
  - ../../tests/Unit/Docs/ActionContractsAreCompleteTest.php
  - ../../tests/Unit/Docs/PackagesHaveContractsAndAdrTest.php
  - ../../../../../docs/harness-porting.md
---

# ADR e contratti di comportamento

Un agente o uno sviluppatore nuovo copia il codice più vicino. Per rendere
esplicito il comportamento, ogni modulo e tema mantiene due fonti distinte:

| Cartella | Risponde a | Si legge quando |
|---|---|---|
| `docs/adr/` | perché il codice ha questa forma | si valuta una decisione difficile da invertire o sorprendente |
| `docs/contracts/` | cosa promette un'Action e cosa non fa | prima di chiamare, modificare o imitare un'Action con effetti esterni |

Ciascuna cartella ha un `README.md` che elenca i propri file; i test del modulo
Xot controllano la struttura.

## ADR

Scrivere un ADR solo per una decisione difficile da invertire, sorprendente o
frutto di un trade-off reale. Il nome è kebab-case, senza date o numeri.
L'ADR contiene almeno Contesto, Decisione, Alternative scartate, Conseguenze e
Verifica. Quando la decisione cambia, creare un nuovo ADR e segnare il vecchio
come `superseded` con `superseded_by`.

## Contratto di un'Action

Un file per Action, in `docs/contracts/`, usa nome kebab-case e frontmatter
`type: contract` e `action: "<FQCN>"`. Le sezioni sono, nell'ordine:

```markdown
## Input
## Output
## Invarianti
## Effetti collaterali
## Errori
## Non fa
```

Le invarianti hanno ID stabile `<SCOPE>-INV-<N>` e una colonna `Group Pest`.
Un group valorizzato deve esistere nei test; `— (non dimostrato)` espone il
debito invece di dichiarare una garanzia non verificata. Gli ID non si riusano.

Il docblock dell'Action contiene entrambi i riferimenti:

```php
/**
 * @see docs/contracts/create-ticket-action.md
 * @contract docs/contracts/create-ticket-action.md
 */
```

Un contratto legacy descrive il comportamento reale, compresi i limiti: la
documentazione non autorizza a replicare un difetto.

## Quando

- Action nuova o modificata che scrive dati, chiama servizi esterni o produce
  effetti collaterali: contratto obbligatorio.
- Effetti collaterali includono notifiche, code, file, cache, denaro, permessi
  e dati personali.
- Action pure di formattazione/calcolo possono non avere contratto.
- Una scelta architetturale contestabile richiede anche un ADR.

## Verifica

```bash
cd laravel && vendor/bin/pest Modules/Xot/tests/Unit/Docs/PackagesHaveContractsAndAdrTest.php \
  Modules/Xot/tests/Unit/Docs/ActionContractsAreCompleteTest.php
```

I test verificano cartelle, frontmatter, sezioni, Action esistente, marker
`@contract`, invarianti e ADR completi. Un contratto non più allineato al codice
va aggiornato nello stesso commit dell'Action.
