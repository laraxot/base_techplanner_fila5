---
title: "Contratto — ExecuteTaskAction"
type: contract
action: "Modules\\Job\\Actions\\ExecuteTaskAction"
module: Job
status: accepted
created: 2026-11-24
updated: 2026-11-26
---

# ExecuteTaskAction

Documenta il comportamento di oggi: l'Action non esegue nulla. Sorgente: `app/Actions/ExecuteTaskAction.php`.
Chiamanti in produzione: `app/Filament/Widgets/ScheduleCrudWidget.php` (riga 92) e `app/Http/Livewire/Schedule/Crud.php` (riga 114).

## Input

- `string $taskId`: non letto, nessuna validazione.

## Output

- Nessuno: il tipo dichiarato è `string` ma il metodo non restituisce mai, lancia sempre.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| JOB-EXEC-INV-1 | `execute()` lancia sempre `BadMethodCallException` («Method ExecuteTaskAction::execute() not implemented yet. See ROADMAP-2026.md») senza alcun effetto collaterale prima del lancio. | — (non dimostrato) |
## Effetti collaterali

- Nessuno.

## Errori

- `BadMethodCallException` sempre (INV-1).

## Non fa

- Non esegue alcun task: non è un contratto implementato, il comportamento atteso non è definito qui.
- Limite noto: i due chiamanti elencati sopra passano `$task_id` a questa Action, quindi il pulsante di esecuzione di un task lancia sempre. Difetto da segnalare.
- Limite noto: `ROADMAP-2026.md`, citato nel messaggio, non esiste né in `laravel/` né nella radice del repo (verificato con `ls` il 2026-11-26).
