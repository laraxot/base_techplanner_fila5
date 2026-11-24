---
title: "SendNotificationAction — contratto"
type: contract
owner: Notify
status: accepted
updated: 2026-11-24
action: "Modules\\Notify\\Actions\\SendNotificationAction"
qmd: "contract SendNotificationAction notify invio notifica template canali mail sms database NOTIFY-SEND-INV"
---

# SendNotificationAction

Invia una notifica a un destinatario partendo da un `NotificationTemplate` attivo, su uno o piu' canali (`mail`, `database`, `sms`).
Raggiunta da `app/Actions/NotificationManager.php`. Decisione di fondo sul ruolo di Notify: [ADR notify-owns-delivery-contract](../adr/notify-owns-delivery-contract.md) (stato `proposed`).

> Il metodo pubblico si chiama `handle()`, non `execute()`: differisce dalla convenzione delle Queueable Action del progetto (dichiarato qui, non corretto).

## Input

- `Model $recipient`: destinatario (usa `routeNotificationForMail()` / `routeNotificationForSms()` se presenti, `getKey()`, `getAttribute('user_id')`).
- `string $templateCode`: `code` di un `NotificationTemplate` con `is_active = true`.
- `array<string,mixed> $data`: variabili del template.
- `array<int,string> $channels`: canali; se vuoto si usano `$template->channels`.
- `array<string,mixed> $options`: opzioni passate alla notifica.

## Output

- `?NotificationModel`: il primo record creato dal canale `database`; `null` se il template decide di non inviare o se nessun canale `database` e' stato usato (mail e sms non restituiscono record).

## Invarianti

- **NOTIFY-SEND-INV-1** — Se non esiste un template attivo con quel `code` viene lanciata `NotificationTemplateNotFoundException::forCode($templateCode)` prima di qualsiasi invio.
  Verifica non marcata: `Modules/Notify/tests/Unit/Actions/SendNotificationActionTest.php:85` («throws when template is missing»); nessun `->group('NOTIFY-SEND-INV-1')`.
- **NOTIFY-SEND-INV-2** — Se `$template->shouldSend($data)` e' falso l'Action ritorna `null` senza inviare nulla ne' scrivere record.
  Verifica non marcata: `SendNotificationActionTest.php:94`, ma il test asserisce `Assert::assertFalse($result)` mentre il codice ritorna `null` (`SendNotificationAction.php`, `return null`): divergenza tra test e codice, vale il codice; test non eseguito in questa sessione.
- **NOTIFY-SEND-INV-3** — Un canale che fallisce (destinatario senza email o telefono, canale non supportato) non blocca gli altri: l'eccezione e' catturata e registrata con `Log::error`, l'Action non la rilancia.
  Non coperto (nessun test dedicato trovato).
- **NOTIFY-SEND-INV-4** — Il canale `database` salva sempre un `Notification` con `status = sent`, `sent_at = now()`, `channels = ['database']` e il payload (`subject`, corpo, `template_code`, `payload`, `options`).
  Stessa verifica parziale: `SendNotificationActionTest.php:115` («dispatches database notification from template channels»).
- **NOTIFY-SEND-INV-5** — Il testo SMS e' troncato a 320 caratteri (317 piu' `...`), riga 194-195.
  Non coperto.

## Effetti collaterali

- Ordine: lettura template -> `shouldSend` -> `compile($data)` -> per ogni canale: invio (`notify()` / `Notification::send` con `GenericNotification`, che implementa `ShouldQueue`) o `INSERT` su `notifications` per il canale `database`.
- Scrive log di errore per canale fallito.
- Nessuna transazione: i canali gia' inviati non si annullano se uno successivo fallisce.

## Errori

- `NotificationTemplateNotFoundException` (INV-1), unico errore che esce dall'Action.
- Le `Exception` dei canali sono assorbite (INV-3): il chiamante non sa se un canale e' fallito se almeno uno e' riuscito, ne' se tutti sono falliti (ritorna `null`).

## Non fa

- Non ritenta e non traccia lo stato di consegna per mail e sms (nessun record, solo accodamento).
- Non supporta `push`, `whatsapp`, `telegram`: un canale diverso da `mail`, `database`, `sms` fallisce con «Canale ... non supportato» (assorbito).
- Non valida il formato di email o telefono.
- Non controlla il consenso del destinatario.
