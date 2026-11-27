---
title: "Confronto con laravelday-harness-workshop"
type: memory
created: 2026-11-27
updated: 2026-11-27
source: "https://github.com/robertogallea/laravelday-harness-workshop"
related:
  - ../bin/guard
  - ../../docs/adr/0002-harness-compatibility-boundary.md
  - ../../docs/contracts/harness-guard.md
---

# Confronto

## Evidenza upstream

Il workshop separa l'impianto dall'adattamento al progetto:

- `.harness/config.php` contiene path gated, path sempre scrivibili, path dell'harness,
  colonne protette, marker di attesa, budget, timeout e comandi di verifica.
- `.harness/rules/guard.php` contiene policy eseguibili caricate da `bin/pre-tool`;
  le regole ricevono un payload tipizzato e un contesto (`config`, task, file tracciati
  e scritture shell).
- `.harness/memory/{facts,decisions,lessons,progress}.md` separa fatti verificabili,
  decisioni, lezioni e stato della sessione.

Fonte consultata il 2026-11-27: repository e file raw su GitHub.

## Differenza locale

Il nostro `.harness/bin/guard` è già un guard PHP autonomo: legge JSON da stdin con
`tool_name` e `tool_input`, applica quattro regole inline (`secrets.env`,
`migration.destructive`, `db.fresh`, `git.rewind`) e lascia passare payload illeggibili.
Non importa `.harness/config.php` e non carica `.harness/rules/*`.

## Decisione operativa

Non vengono aggiunti `config.php` o regole PHP upstream come policy attive: senza un
consumer compatibile sarebbero file inattivi e potrebbero suggerire una protezione che
il guard non applica. La compatibilità resta quindi preservata mantenendo invariato il
guard esistente e registrando il confronto in questa memoria e nei documenti canonici.

Un porting runtime futuro richiede prima un adapter/test del payload e una modifica
esplicita del guard, fuori dallo scope di questo task.
