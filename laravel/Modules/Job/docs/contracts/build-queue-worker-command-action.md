---
title: "Contratto — BuildQueueWorkerCommandAction"
type: contract
action: "Modules\\Job\\Actions\\BuildQueueWorkerCommandAction"
module: Job
status: accepted
created: 2026-11-24
updated: 2026-11-26
---

# BuildQueueWorkerCommandAction

La riga finisce in `Safe\exec()` (`Console/Commands/WorkerCheck.php`, riga `exec(app(BuildQueueWorkerCommandAction::class)->execute())`): qualunque testo scelto da un utente
sarebbe un'iniezione di shell. Perché: [ADR 0003](../adr/0003-queue-worker-flags-from-tenant-settings.md). Sorgente: `app/Actions/BuildQueueWorkerCommandAction.php`.

## Input

- Nessun parametro. Legge `JobConfigData::make()` (config `job` del tenant corrente): `timeout_seconds`, `sleep_seconds`, `max_attempts`, tutti `int` (default 60, 5, 3).

## Output

- `string`: ` /usr/local/bin/php <base_path>/artisan queue:work --timeout=<int> --sleep=<int> --tries=<int> > /dev/null & echo $!`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| JOB-WORKER-CMD-INV-1 | Senza impostazioni salvate la riga è identica byte per byte a quella storica (`--timeout=60 --sleep=5 --tries=3`). | `JOB-WORKER-CMD-INV-1` |
| JOB-WORKER-CMD-INV-2 | I tre flag sono i valori salvati in `JobConfigData` (`timeout_seconds`, `sleep_seconds`, `max_attempts`). | `JOB-WORKER-CMD-INV-2` |
| JOB-WORKER-CMD-INV-3 | Nella riga entrano solo interi (proprietà `int` della Data) e `base_path()`: nessun testo scelto da un utente. Se cade, la riga passata a `exec()` diventa iniettabile. | — (non dimostrato) |
## Effetti collaterali

- Nessuno: costruisce una stringa. L'esecuzione (`exec`) e il salvataggio del PID in `queue.pid` sul disco `cache` sono di `WorkerCheck`.

## Errori

- Nessuna eccezione propria: un valore non intero nel file del tenant fa fallire la costruzione di `JobConfigData`, non questa Action.

## Non fa

- Non esegue il comando e non verifica se un worker è già attivo.
- Non controlla che `timeout_seconds` resti sotto `retry_after` della connessione di coda.
- Limite noto: il percorso `/usr/local/bin/php` è scritto nell'Action; `base_path()` non è escapato per la shell, quindi un percorso con spazi o metacaratteri romperebbe la riga (non verificato a runtime).

## Riconciliazione documentale (2026-11-27)

Questo file aveva un conflitto Git irrisolto. La base è la variante più recente del contratto, con il riferimento a `app/Actions/BuildQueueWorkerCommandAction.php` **esistente su `dev`**; la sua semantica, i group Pest citati e gli eventuali effetti non sono stati rieseguiti in questa sessione. Il confronto con il codice e i test resta il gate ECC della story owner. [Tracciamento root #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
