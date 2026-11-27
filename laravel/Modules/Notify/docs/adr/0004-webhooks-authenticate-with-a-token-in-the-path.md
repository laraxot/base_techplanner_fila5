---
title: "ADR — I webhook in ingresso si autenticano con un token segreto nel percorso"
type: decision
status: accepted
module: Notify
tags: [adr, notify, webhook, mailjet, inbound, sicurezza]
created: 2026-11-24
updated: 2026-11-26
related:
  - ../contracts/handle-mailjet-events-action.md
  - ../contracts/process-inbound-mail-action.md
  - ../email/mailjet.md
qmd: "webhooks authenticate with token path webhook"
decision-makers: [team back office]
---

# ADR: i webhook in ingresso si autenticano con un token segreto nel percorso

## Contesto

- Notify riceve chiamate da fornitori email: esiti Mailjet (`POST /api/notify/mailjet/events/{token}`) e posta in arrivo da Postmark,
  Mailgun o MIME grezzo (`POST /api/inbound/{provider}/{token}`), rotte in `routes/api.php`, senza sessione né utente.
- I fornitori si configurano con un solo URL nel loro pannello; il modulo gira in più progetti e non può dipendere dal meccanismo di
  firma di ciascun fornitore.
- Mailjet riprova ogni 30 secondi per 24 ore una risposta non 200 e poi sospende l'URL (`docs/email/mailjet.md`).
- Domanda: come si rifiutano le chiamate false senza perdere quelle vere?

## Driver della decisione

- Un solo URL da configurare nel pannello del fornitore: niente header o firma aggiuntivi.
- L'installazione deve poter vivere senza segreto configurato senza accettare tutto: fail-closed.
- Un errore 4xx non deve far sospendere l'URL Mailjet dopo 24 ore di retry.

## Alternative scartate

- Verifica della firma di ogni fornitore: un'implementazione per fornitore, e non tutti la offrono nello stesso modo.
- Basic Auth o header personalizzato: non tutti i pannelli permettono di impostarli; il percorso sì.
- Lista di IP del fornitore: cambiano senza preavviso e non distinguono due account dello stesso fornitore.
- Rispondere 4xx agli eventi sconosciuti: con Mailjet porta alla sospensione dell'URL.

## Decisione

- Il segreto sta nel percorso: `notify.notify.mailjet_webhook_token` (`MAILJET_WEBHOOK_TOKEN`) e `notify.notify.inbound_token`
  (`MAIL_INBOUND_TOKEN`), `config/notify.php`.
- Confronto con `hash_equals`; token non configurato o vuoto = **401 per tutti** (un'installazione senza segreto non accetta nulla).
- Superato il token, il webhook Mailjet risponde 200 anche a eventi sconosciuti o malformati (li salta): un errore non deve far sospendere
  l'URL. Il webhook inbound risponde 422 solo a un payload che non sa leggere.

## Conseguenze

- Pro: un solo meccanismo, configurabile per installazione, senza dipendenze.
- Contro: il token finisce nei log di accesso del server e del fornitore; ruotarlo vuol dire cambiare l'URL nel pannello.
- Debito: nessun limite di frequenza sulle due rotte.

## Conferma

- `cd laravel && vendor/bin/pest Modules/Notify/tests --group=NOTIFY-MAILJET-INV-1` e `--group=NOTIFY-INBOUND-INV-1`: falliscono se un token errato, mancante o non configurato passa (`MailjetEventsWebhookTest.php`, `InboundMailWebhookTest.php`).
- `--group=NOTIFY-MAILJET-INV-4`: fallisce se un evento sconosciuto non riceve 200.
- Nessuna conferma automatica per il 422 dell'inbound (NOTIFY-INBOUND-INV-4, non dimostrato) né per l'assenza di un limite di frequenza; review ripetibile: `cd laravel && rg -n 'throttle' Modules/Notify/routes Modules/Notify/app/Providers bootstrap/app.php` non trova nulla (2026-11-26).
