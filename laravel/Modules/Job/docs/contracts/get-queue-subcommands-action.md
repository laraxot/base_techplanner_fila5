---
title: "Contratto — GetQueueSubcommandsAction"
type: contract
action: "Modules\\Job\\Actions\\Console\\GetQueueSubcommandsAction"
module: Job
status: accepted
created: 2026-11-24
updated: 2026-11-26
---

# GetQueueSubcommandsAction

Sorgente: `app/Actions/Console/GetQueueSubcommandsAction.php`. Limite noto: nessun chiamante nel codice (`rg` del 2026-11-26); `JobStatusWidget::artisan()` costruisce `queue:<sub>` da solo (ADR 0001).

## Input

- Nessun parametro.

## Output

- `list<string>`: `clear`, `failed`, `flush`, `prune-batches`, `prune-failed`, `restart`, `retry`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| JOB-QSUB-INV-1 | L'elenco è costante e contiene solo il suffisso dopo `queue:`, senza argomenti né opzioni. | — (non dimostrato) |
## Effetti collaterali

- Nessuno.

## Errori

- Nessuna eccezione propria.

## Non fa

- Non verifica che il comando esista e non è la whitelist applicata dal widget.
