---
title: "ADR — Notify possiede l'orchestrazione della consegna"
status: proposed
type: decision
date: 2026-11-23
decision-makers: [Notify module owner]
created: 2026-11-23
updated: 2026-11-26
qmd: "notify owns delivery contract contesto driver decisione alternative scartate conseguenze conferma adr"
module: Notify
---

# Notify centralizza template e consegna delle notifiche

## Contesto

L'invio richiede ricerca del template attivo, compilazione dei dati, selezione dei
canali e gestione degli esiti. `SendNotificationAction` concentra l'orchestrazione
e implementa i canali `mail`, `database` e `sms`; `SendNotificationToRecipientAction`
offre un invio diretto con validazione dell'indirizzo. Il modulo non espone una UI
web nelle proprie route: l'API contiene endpoint tecnici per inbound e provider.

## Driver della decisione

- un solo punto per template, dati, canali ed error handling;
- supporto a più canali senza duplicare l'orchestrazione nei consumer;
- esecuzione in coda tramite `QueueableAction`;
- separazione tra pannello Filament ed endpoint tecnici dei provider.

## Alternative scartate

- Chiamare SDK dei provider direttamente nei moduli di dominio: duplicherrebbe
  template, validazione e gestione degli errori.
- Mettere l'invio nelle view o in controller web generici: legherebbe la consegna
  alla presentazione.
- Modellare ogni canale come flusso autonomo senza Action centrale: impedirebbe di
  riusare selezione del template e dei canali.

## Decisione

Notify **possiede l'orchestrazione della consegna**: le Actions caricano e compilano
il template, scelgono i canali supportati e delegano l'invio al meccanismo appropriato.
`routes/web.php` non aggiunge UI; `routes/api.php` espone solo endpoint tecnici per
eventi inbound e callback dei provider.

## Conseguenze

- Buono, perché i consumer invocano un contratto operativo comune.
- Buono, perché un fallimento di un canale viene registrato (`Log::error`) senza interrompere gli altri canali selezionati (`SendNotificationAction::handle`, `try/catch` per canale).
- Cattivo, perché un nuovo canale richiede modifica all'Action e verifica del provider.
- Cattivo, perché gli endpoint inbound devono restare protetti da token e controlli (ADR 0004).
- Debito: l'ADR è ancora `proposed` pur descrivendo codice in uso; l'isolamento dei canali non ha un test (NOTIFY-SEND-INV-3).

## Stato attuale

Il codice segue la decisione; due test citati dalla versione precedente non provano più nulla (lettura del 2026-11-26, Pest non eseguito):

- `tests/Unit/Actions/SendNotificationActionTest.php` («returns false when template should not send», riga 94; «dispatches database notification from template channels», riga 115) si aspetta `false`/`true`, ma `SendNotificationAction::handle()` ritorna `?Notification` (`null` se il template non va inviato, il modello salvato per il canale `database`): i due test sono obsoleti.
- `tests/Unit/Actions/SendNotificationFlowTest.php` prova quasi solo query sul modello e un mock di `handle`; l'unico controllo reale è il template assente.

## Conferma

- `cd laravel && vendor/bin/pest Modules/Notify/tests --group=NOTIFY-SEND-INV-1` (`NotificationManagerTest.php`, «throws exception when template not found»): fallisce se un template assente non lancia `NotificationTemplateNotFoundException`.
- `cd laravel && vendor/bin/pest Modules/Notify/tests/Unit/NotifyHighestMissCoverageTest.php --filter 'SendNotificationAction handle works with sqlite notify schema'`: canale `mail` che ritorna `null` e invia una `GenericNotification`.
- `cd laravel && vendor/bin/pest Modules/Notify/tests --group=NOTIFY-RECIPIENT-INV-1` (e `-2`, `-3`): invio a destinatario con validazione dell'indirizzo (`SendNotificationToRecipientActionTest.php`).
- Confine HTTP, review ripetibile: `cd laravel && rg -n '^Route::' Modules/Notify/routes/web.php` non deve trovare nulla; `Modules/Notify/routes/api.php` ha solo `/inbound/{provider}/{token}` e `/notify/mailjet/events/{token}`.
- Nessuna conferma automatica per l'isolamento dei canali (NOTIFY-SEND-INV-3, non dimostrato); proposta: un test con tre canali di cui uno fallisce.
