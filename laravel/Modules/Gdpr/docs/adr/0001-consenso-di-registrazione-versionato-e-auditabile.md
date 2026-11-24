---
title: "ADR — Consenso di registrazione versionato e auditabile"
type: decision
status: accepted
created: 2026-11-23
updated: 2026-11-23
module: Gdpr
---

# ADR: consenso di registrazione versionato e auditabile

## Contesto

La registrazione raccoglie privacy, condizioni d'uso e marketing, ma il
consenso deve restare dimostrabile anche dopo la registrazione. La scelta
riguarda dove validare il consenso e come conservare la prova senza separare
la creazione dell'utente dalla sua traccia privacy.

## Driver

- Privacy e condizioni d'uso sono consensi obbligatori; marketing è
  facoltativo.
- La prova deve includere trattamento, versione del documento, momento,
  locale e dati della richiesta.
- Utente, consensi e audit devono essere salvati nello stesso flusso di
  registrazione.

## Alternative scartate

- Salvare solo tre booleani sull'utente: non identifica il documento accettato
  né la sua versione.
- Registrare il consenso soltanto nel browser o nei log applicativi: la prova
  non sarebbe legata al modello `Consent`.
- Salvare i consensi in un secondo momento asincrono: introdurrebbe utenti
  registrati senza una traccia completa.

## Decisione

La registrazione valida privacy e termini, raccoglie il marketing opzionale e
chiama `SaveGdprConsentsAction` nella transazione che crea l'utente. L'action
crea o recupera il trattamento, garantisce una `documentVersion` e registra
nel consenso accettazione, timestamp, versione, URL, locale, IP e user agent.

## Conseguenze

- Buono: la prova è interrogabile e legata all'utente e al trattamento.
- Buono: un trattamento mancante non produce silenziosamente una registrazione
  senza prova.
- Cattivo: i dati del consenso dipendono dalla corretta configurazione della
  versione e aumentano il contenuto sensibile conservato.
- Cattivo: la registrazione deve mantenere disponibili tabelle e modello
  `Treatment`/`Consent`.

## Conferma

- `app/Filament/Widgets/Auth/RegisterWidget.php:128-162` deve validare e
  salvare consensi nella transazione di registrazione.
- `app/Actions/SaveGdprConsentsAction.php:30-89` deve mantenere i tre
  trattamenti, la versione e i metadati della prova.
- Verificare `tests/Feature/RegisterWidgetTest.php` e i test di registrazione;
  il contratto è `docs/contracts/save-gdpr-consents-action.md`.
