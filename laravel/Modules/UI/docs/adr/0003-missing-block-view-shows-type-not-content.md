---
title: "ADR — Un blocco con vista mancante mostra vista e tipo, mai il contenuto"
type: decision
status: accepted
created: 2026-11-24
updated: 2026-11-26
module: UI
decision-makers: UI module owner
tags: [adr, blocks, privacy, rendering, front-office]
qmd: "missing block view shows type not"
---

# ADR: vista mancante = avviso senza dati del blocco

## Contesto

`app/View/Components/Render/Block.php::render()` disegna blocchi salvati nei contenuti delle pagine. Se la vista in
`data.view` non esiste (tema cambiato, blocco rinominato, modulo rimosso) qualcosa va mostrato al posto del blocco, e
la tentazione per il debug è stampare il blocco intero. Ma il componente gira nel front office, davanti a chi visita
il sito: `data` può contenere testi in bozza, indirizzi email, configurazioni. Cosa mostra un blocco rotto?

## Driver della decisione

- Il front office è pubblico: nessun dato del blocco (bozze, email, configurazioni) deve uscire per un errore di vista.
- Una pagina con un blocco rotto deve restare raggiungibile.
- Chi gestisce il sito deve poter capire quale vista manca e di che blocco si tratta.

## Alternative scartate

- **Dump del blocco (`dd`, JSON di `data`) nell'avviso**: espone dati non pubblicati o personali.
- **Eccezione / pagina 500**: un solo blocco rotto renderebbe irraggiungibile l'intera pagina.
- **Niente del tutto (vista vuota)**: il problema diventerebbe invisibile anche a chi gestisce il contenuto.

## Decisione

- Senza `type` → vista `ui::empty`.
- Con vista inesistente → vista `ui::alert` con soli `title = 'deprecated'` e
  `message = 'view not exists [<vista>] (block type: <tipo>)'` (commento nel codice, `Block.php:47`: "il contenuto del blocco non va
  mostrato a chi visita il sito").
- Nessuna eccezione per la vista mancante: una pagina con un blocco rotto resta visibile.

## Conseguenze

- Buono: chi gestisce il sito vede quale vista manca e di che tipo è il blocco, senza fughe di dati.
- Cattivo: l'avviso è visibile anche ai visitatori (nessuna distinzione per ruolo).
- Cattivo: `title` e `message` sono stringhe fisse in inglese, non chiavi di traduzione.

## Conferma

- `cd laravel && vendor/bin/pest Modules/UI/tests/Unit/View/RenderBlockMissingViewTest.php`: fallisce se la vista non è
  `ui::alert`, se i dati passati alla vista sono altri oltre `title` e `message`, se mancano vista o tipo nel messaggio o se compaiono valori di `data`.
  Il test ha un solo caso (vista mancante): il ramo «senza `type` → `ui::empty`» non è coperto.

## Stato attuale

Il codice rispetta la decisione per la vista mancante (`Render/Block.php:46-56`), con due scarti rispetto al testo:

- «Nessuna eccezione» vale solo per la vista mancante. Il costruttore lancia `InvalidArgumentException` se `data.view` non è una stringa (`Block.php:35`, `Assert::string`)
  e `normalizeViewData()` lancia `UnexpectedValueException` per chiavi non stringa (`Block.php:77`): in quei casi la pagina non si disegna.
- `'deprecated'` e `'view not exists'` (`Block.php:49-52`) sono testo scritto nel codice, non chiavi nei file lingua: il front office è multilingua (it/en/de/es).
