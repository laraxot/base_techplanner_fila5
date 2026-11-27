---
title: "ADR — La tabella jobs nel pannello è in sola lettura: niente create/edit su JobResource"
type: decision
status: accepted
created: 2026-11-16
updated: 2026-11-26
module: Job
tags: [adr, filament, queue, jobs, resource]
related:
qmd: "jobs table read only admin tabella"
decision-makers: [team back office]
---

# ADR: `JobResource` senza create ed edit

## Contesto

La tabella `jobs` è la coda `database` di Laravel: la scrive `dispatch()` e la consuma `queue:work`. Una riga
contiene un `payload` serializzato (classe, comando, tentativi). `JobResource` era nata dallo scaffolding standard
con `CreateJob`, `EditJob` e un form sul payload: una persona poteva creare o modificare un job a mano, cioè
iniettare un comando serializzato che il worker avrebbe eseguito. Decision log D-3 (nota `docs/bmad/decision-log.md`, cancellata nel commit `9079fb5a` e recuperabile con `git -C laravel/Modules/Job show 9079fb5a^:docs/bmad/decision-log.md`).
Il pannello deve permettere di scrivere sulla coda?

## Driver della decisione

- Una riga di `jobs` contiene un `payload` serializzato che il worker esegue: scriverla a mano equivale a iniettare un comando.
- Il rischio non dipende da chi clicca (anche un super-admin) ma dal contenuto del payload.
- Nessun caso d'uso reale richiede di creare o modificare un job dal pannello (decision log D-3, nota `decision-log.md` cancellata nel commit `9079fb5a`).
- Le azioni sulla coda esistono già come comandi `queue:*` in allowlist (ADR 0001).

## Alternative scartate

- **Create/Edit solo per super-admin**: il rischio non è chi clicca ma il contenuto (un payload serializzato
  arbitrario); nessun caso d'uso reale lo richiede.
- **Edit limitato a `queue`/`available_at`**: riprogrammare un job si fa con `queue:retry` o rilanciando il
  dispatch, non riscrivendo la riga.

## Decisione

`app/Filament/Resources/JobResource.php::getPages()` registra solo `index` (`ListJobs`) e `board` (`BoardJobs`),
con il commento `D-3`. Le azioni sulla coda passano dai comandi `queue:*` in allowlist
(`0001-artisan-commands-from-ui-exact-match-allowlist.md`), mai dalla modifica diretta delle righe.

## Conseguenze

- Buono: la coda resta scritta solo dal codice; nessun form da mantenere sul payload.
- Debito: i file `JobResource/Pages/CreateJob.php` e `EditJob.php` esistono ancora ma non sono registrati; non vanno
  ricollegati.

## Stato attuale

Il codice di oggi è più restrittivo della decisione scritta, e il test che la dovrebbe confermare è fermo a una versione precedente (verificato per lettura il 2026-11-26, Pest non eseguito):

- `app/Filament/Resources/JobResource.php::getPages()` restituisce solo `index` (`ListJobs`); il commento in codice dice che `BoardJobs` non esiste più. La Decisione sopra elenca ancora `board`.
- `tests/Unit/Filament/Resources/JobResourceReadOnlyTest.php` (riga 15) si aspetta `['index', 'board']` con `toEqualCanonicalizing`: con il codice attuale non può passare. Va corretto in `['index']`.
- `JobResource/Pages/CreateJob.php` e `EditJob.php` esistono ancora e non sono registrati, come dice Conseguenze.

## Conferma

Nessuna conferma automatica valida oggi: `Modules/Job/tests/Unit/Filament/Resources/JobResourceReadOnlyTest.php` è il controllo previsto (fallisce se `getPages()` registra create o edit) ma la sua attesa `['index', 'board']` non corrisponde più al codice (vedi Stato attuale).

Proposta: cambiare l'attesa in `['index']`; poi `cd laravel && vendor/bin/pest Modules/Job/tests/Unit/Filament/Resources/JobResourceReadOnlyTest.php` torna la conferma. Nel frattempo vale la review: una pagina `create` o `edit` in `JobResource::getPages()` viola questo ADR.
