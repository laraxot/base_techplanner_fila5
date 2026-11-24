---
title: "Job — manuale d'uso per attori"
type: manual
---

# Scopo

Job è un modulo tecnico di backoffice per code, job falliti, batch e
configurazione del worker. Non espone un flusso cittadino.

## Attori e capacità effettive

| Attore | Dominio | Capacità verificata |
| --- | --- | --- |
| Ospite | Cittadino/front office | N/A. |
| Utente autenticato normale | Cittadino/front office | N/A: Job è un modulo tecnico e non espone capacità cittadine. |
| Gruppo/ruolo con permessi | Backoffice | Le policy dei modelli possono usare i permessi del modello, ma il modulo non documenta qui un elenco autorizzativo più ampio. |
| `job::admin` | Backoffice | Bypass delle policy dei modelli Job. |
| `super-admin` | Backoffice | Accesso alle policy e alle pagine tecniche; è richiesto per JobStatus e per le operazioni del widget. |
| Operatore/moderatore | — | N/A: non sono ruoli tecnici dichiarati dal modulo. |

## Flussi

Il super-admin apre la pagina di stato, osserva code/job falliti e usa solo i
comandi in whitelist: `queue:clear`, `queue:failed`, `queue:flush`,
`queue:prune-batches`, `queue:prune-failed`, `queue:restart`, `queue:retry`,
`worker:check` e `route:list`. Il widget mostra contatori e consente le
operazioni di coda solo dopo una nuova autorizzazione super-admin.

La pagina impostazioni modifica i parametri del worker (`max_attempts`,
`timeout_seconds`, `sleep_seconds`); la fonte la descrive come solo
super-admin. La modifica della connessione di coda scrive il valore ammesso
in `.env`, quindi è un'operazione infrastrutturale.

## Prerequisiti e limiti

- Serve un account backoffice autorizzato; nessuna capacità è prevista nel
  dominio cittadino.
- `JobStatus::artisan()` convalida il comando contro la whitelist e ripete
  l'autorizzazione anche dopo il mount Livewire.
- Il widget nasconde la vista ai non super-admin e protegge anche i metodi
  pubblici Livewire; non basta nascondere un pulsante.
- `job::admin` è un bypass delle policy dei modelli, non prova di accesso alle
  operazioni esplicitamente super-admin-only.
- N/A: moderazione di segnalazioni, profili cittadini e gestione traduzioni.

## Riferimenti verificabili

- `app/Models/Policies/JobBasePolicy.php:10-26` — ruoli bypass dei modelli.
- `app/Filament/Pages/JobStatus.php:15-53,74-157` — pagina, autorizzazione
  ripetuta e comandi ammessi.
- `app/Filament/Widgets/JobStatusWidget.php:68-90,100-178` — visibilità,
  protezione Livewire e operazioni tecniche.
- `app/Filament/Pages/SettingPage.php:11-28` — impostazioni e limiti dei
  parametri worker.
