---
title: "ADR — Controlli operativi solo super-admin e con whitelist"
type: decision
status: accepted
created: 2026-11-23
updated: 2026-11-23
module: Job
---

# ADR: controlli operativi solo super-admin e con whitelist

## Contesto

Job espone nel backoffice operazioni distruttive o infrastrutturali sulle
code, sui job falliti e sulla configurazione del worker. Una pagina Filament o
un pulsante nascosto non proteggono da sole le chiamate Livewire già montate.

## Driver

- Ridurre il rischio operativo sui dati delle code e sul worker.
- Autorizzare nuovamente ogni metodo pubblico invocabile dal client.
- Limitare i comandi a quelli esposti e verificati dal modulo.

## Alternative scartate

- Consentire i comandi a ogni utente del pannello: il pannello non equivale a
  privilegio infrastrutturale.
- Proteggere soltanto `canView()`/`canAccess()`: una chiamata Livewire può
  raggiungere metodi pubblici dopo il mount.
- Accettare un comando Artisan arbitrario dal client: amplia inutilmente la
  superficie d'esecuzione.

## Decisione

Le operazioni tecniche di `JobStatus` e `JobStatusWidget` sono
super-admin-only. `JobStatus::artisan()` controlla nuovamente l'accesso e
convalida il comando tramite una whitelist; il widget ripete il controllo per
`artisan`, `saveEnv` e `dummyAction`. La connessione di coda è accettata solo
se è una chiave configurata sicura. Le policy dei modelli mantengono inoltre
il bypass del ruolo `job::admin` per le capacità modello, senza trasformarlo
automaticamente in autorizzazione alle operazioni super-admin-only.

## Conseguenze

- Buono: il controllo resta attivo anche se il client invoca direttamente un
  metodo pubblico.
- Buono: i comandi ammessi sono espliciti e revisionabili.
- Cattivo: le attività ordinarie di coda richiedono un super-admin.
- Cattivo: la configurazione della connessione può modificare `.env` e deve
  essere trattata come operazione ad alto impatto.

## Conferma

- `app/Filament/Pages/JobStatus.php:30-53,59-157` deve mantenere autorizzazione
  ripetuta e lista dei comandi.
- `app/Filament/Widgets/JobStatusWidget.php:68-178` deve autorizzare ogni
  mutazione pubblica e validare le connessioni.
- `tests/Unit/` e `tests/Feature/` del modulo devono coprire whitelist,
  accesso e policy; il commento di `SettingPage.php:11-15` conferma il limite
  super-admin delle impostazioni.
