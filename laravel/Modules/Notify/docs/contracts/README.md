---
title: "Contratti del modulo Notify"
type: index
module: Notify
status: active
tags: [contracts, actions, interfaces, notify]
created: 2026-11-18
updated: 2026-11-26
qmd: "notify contracts readme azioni invarianti pest group notifiche invio"
---

# Contratti del modulo Notify

Cosa promette la superficie pubblica di Notify: le Action che scrivono dati, chiamano servizi esterni o hanno effetti collaterali,
e le interfacce (`app/Contracts`). Un contratto descrive il comportamento promesso da una Action che invia comunicazioni ai
destinatari (dati personali: email, telefono) o scrive lo stato delle notifiche.
Regola e governance: `Modules/Xot/docs/adr/0012-behavioral-contract-governance.md` e
`Modules/Xot/docs/adr/0011-contract-docblock-reference.md`; standard: `Modules/Xot/docs/contracts/README.md`.

## Metodo Harness

Un contratto descrive una singola operazione pubblica con effetti collaterali, chiamate esterne o invarianti di dominio. Documenta il comportamento osservabile, inclusi errori e non-goals, senza trasformare ogni metodo interno in un contratto.

Ogni invariante ha un ID stabile; il test Pest corrispondente usa lo stesso ID come group. Le Action usano
`NOTIFY-<OPERAZIONE>-INV-<N>`; il formato breve `NOTIFY-INV-N` resta nella tabella di [INDEX](index.md). La classe
implementatrice deve contenere `@contract docs/contracts/<file>.md`; contratto, codice e test cambiano nello stesso commit.

Cosa promettono le Action di Notify che parlano con l'esterno o scrivono dati: orchestrazione da template, webhook dei
provider email (esiti Mailjet, posta in arrivo), invio mail/SMS/push/Telegram/WhatsApp verso i gateway configurati.
Con un group Pest si lancia `vendor/bin/pest Modules/Notify/tests --group=<ID>`; una cella «— (non dimostrato)» nella colonna
Group Pest del contratto è debito dichiarato.

Quando leggerli: prima di chiamare, modificare o imitare una di queste Action, e prima di aggiungere un fornitore o un canale.
Le interfacce di `app/Contracts` (SMS, Telegram, WhatsApp, push) non hanno ancora un documento qui.

## Contratto di comportamento di un'Action

Un file per Action, nome in kebab-case della classe (`create-ticket-action.md`), frontmatter `type: contract` e
`action: <FQCN>` (es. `Modules\Notify\Actions\...`), e queste sei sezioni nell'ordine:

```markdown
## Input
## Output
## Invarianti
## Effetti collaterali
## Errori
## Non fa
```

Il docblock dell'Action rimanda al file con il marker `@contract docs/contracts/<file>.md`, quello verificato dai test; la
riga legacy `Contratto di comportamento: docs/contracts/<file>.md` può restare. Chi cambia il comportamento aggiorna il
contratto nello stesso commit.

## Contratti

54 contratti, uno per Action referenziata da un docblock `@contract`. L'inventario completo con classe e invarianti
e' in [INDEX.md](INDEX.md); l'elenco file in [index.md](index.md). Riepilogo per area:

- **Orchestrazione e template** (11): `SendNotificationAction`, `SendNotificationToRecipientAction`, `NotificationManager`,
  `SendRecordNotificationAction`, `SendRecordsNotificationAction`, `SendAppointmentNotificationAction` (stub),
  `RenderNotificationTemplateStringAction`, `BuildMailMessageAction`, `DetermineSeasonalContentViewPathAction`,
  `NotifyTheme\Get`, `NotifyTheme\Attachment\Pdf`.
- **Mail** (11): `HandleMailjetEventsAction`, `ProcessInboundMailAction`, `SendMailAction`, `TryMailAction`,
  `SendMailtrapMailAction`, `GetMailLayoutAction`, `CheckMailDnsAction`, `CreateMailjetTransportAction`,
  `SendDuocircleMailAction` (WIP), `TryDuocircleMailAction` (IMAP), `SmtpMailSendAction` (tombstone).
- **SMS** (15): dispatcher `SendSmsAction`, `FormatSmsMessageAction`, due `NormalizePhoneNumberAction`,
  provider Agile Telecom (alias + v1 + v2), Gammu, Netfun (due varianti), Esendex, Nexmo, Plivo, SMSFactor, Twilio.
- **Push** (10): `SendPushToAllUsers`/`ToDevice`/`ToDevices`/`ToPlatform`/`ToTopic`, `SendPushWithTargeting`
  (stub) e `SendPushWithTemplate`, `Schedule`/`SendScheduledPushNotification`, `LogSimulatedPushDelivery`.
- **Telegram** (3): `SendOfficialTelegramAction`, `SendBotmanTelegramAction`, `SendNutgramTelegramAction`.
- **WhatsApp** (4): `Send360dialogWhatsAppAction`, `SendFacebookWhatsAppAction`, `SendTwilioWhatsAppAction`,
  `SendVonageWhatsAppAction`.
- **Note**: [modelwithstatuscontract.md](modelwithstatuscontract.md) — rinvio all'interfaccia di Xot
  `Modules\Xot\Contracts\ModelWithStatusContract`; `type: note`, non un contratto di comportamento.

## Stato di copertura

Contratti: 54 (uno per Action di `app/Actions` referenziata da un docblock `@contract`). Invarianti: 215, dimostrate da un test `->group('<ID>')`: 45 (alcune solo in parte, con «Limite noto» nella regola). Le altre 170 portano «— (non dimostrato)» nella colonna Group Pest.

Prima del 2026-11-26 la colonna si chiamava «Verifica» e citava un file di test anche quando quel test controllava solo la struttura della classe (reflection: trait, namespace, firma); quei test non provano le regole, perciò le righe sono tornate «non dimostrato» e sono segnate con † nel Backlog test.

## Backlog contract

Nessuna Action di `app/Actions` è senza contratto. Restano fuori, perché non sono Action, queste classi che inviano comunicazioni:

- `app/Channels/SmsChannel.php`, `TelegramChannel.php`, `WhatsAppChannel.php`, `NetfunChannel.php`: canali Laravel che chiamano le Action dei fornitori.
- `app/Filament/Actions/SendRecordsNotificationBulkAction.php`: azione Filament che delega a `SendRecordsNotificationAction` (contratto già presente).
- Le interfacce di `app/Contracts` (SMS, Telegram, WhatsApp, push) non hanno un documento.

## Backlog test

Invarianti senza test con group (da scrivere, o da annotare con `->group('<ID>')` quando un test esistente le prova davvero). † = il contratto citava un test solo strutturale.

- [build-mail-message-action](build-mail-message-action.md): `NOTIFY-MAILMSG-INV-1` †, `NOTIFY-MAILMSG-INV-2` †, `NOTIFY-MAILMSG-INV-3` †, `NOTIFY-MAILMSG-INV-4`, `NOTIFY-MAILMSG-INV-5`
- [check-mail-dns-action](check-mail-dns-action.md): `NOTIFY-DNS-INV-4`
- [create-mailjet-transport-action](create-mailjet-transport-action.md): `NOTIFY-MAILJET-TR-INV-4` †
- [determine-seasonal-content-view-path-action](determine-seasonal-content-view-path-action.md): `NOTIFY-SEASON-INV-1` †, `NOTIFY-SEASON-INV-2` †, `NOTIFY-SEASON-INV-3` †, `NOTIFY-SEASON-INV-4` †, `NOTIFY-SEASON-INV-5`
- [esendex-send-action](esendex-send-action.md): `NOTIFY-ESENDEX-INV-1` †, `NOTIFY-ESENDEX-INV-2` †, `NOTIFY-ESENDEX-INV-3` †, `NOTIFY-ESENDEX-INV-4`
- [format-sms-message-action](format-sms-message-action.md): `NOTIFY-FORMAT-INV-2` †, `NOTIFY-FORMAT-INV-4`
- [get-mail-layout-action](get-mail-layout-action.md): `NOTIFY-LAYOUT-INV-1` †, `NOTIFY-LAYOUT-INV-2`, `NOTIFY-LAYOUT-INV-3`
- [log-simulated-push-delivery-action](log-simulated-push-delivery-action.md): `NOTIFY-SIMPUSH-INV-2`, `NOTIFY-SIMPUSH-INV-3`
- [netfun-send-action](netfun-send-action.md): `NOTIFY-NETFUN-INV-1` †, `NOTIFY-NETFUN-INV-2` †, `NOTIFY-NETFUN-INV-3` †, `NOTIFY-NETFUN-INV-4`
- [normalize-phone-number-action](normalize-phone-number-action.md): `NOTIFY-NORMPHONE-INV-1` †, `NOTIFY-NORMPHONE-INV-2` †, `NOTIFY-NORMPHONE-INV-3` †, `NOTIFY-NORMPHONE-INV-4`
- [notification-manager](notification-manager.md): `NOTIFY-MANAGER-INV-1` †, `NOTIFY-MANAGER-INV-2`, `NOTIFY-MANAGER-INV-3`, `NOTIFY-MANAGER-INV-4`
- [notify-theme-attachment-pdf](notify-theme-attachment-pdf.md): `NOTIFY-THEME-PDF-INV-1` †, `NOTIFY-THEME-PDF-INV-2`, `NOTIFY-THEME-PDF-INV-3`, `NOTIFY-THEME-PDF-INV-4`
- [notify-theme-get](notify-theme-get.md): `NOTIFY-THEME-INV-1` †, `NOTIFY-THEME-INV-2` †, `NOTIFY-THEME-INV-3` †, `NOTIFY-THEME-INV-4`, `NOTIFY-THEME-INV-5`
- [process-inbound-mail-action](process-inbound-mail-action.md): `NOTIFY-INBOUND-INV-3`, `NOTIFY-INBOUND-INV-4`
- [render-notification-template-string-action](render-notification-template-string-action.md): `NOTIFY-TPL-INV-6`
- [schedule-push-notification-action](schedule-push-notification-action.md): `NOTIFY-PUSHSCHED-INV-1` †, `NOTIFY-PUSHSCHED-INV-2` †, `NOTIFY-PUSHSCHED-INV-3`
- [send-360dialog-whatsapp-action](send-360dialog-whatsapp-action.md): `NOTIFY-WA360-INV-1` †, `NOTIFY-WA360-INV-2` †, `NOTIFY-WA360-INV-3`, `NOTIFY-WA360-INV-4` †
- [send-agiletelecom-sms-action](send-agiletelecom-sms-action.md): `NOTIFY-AGILE-INV-1` †, `NOTIFY-AGILE-INV-2` †, `NOTIFY-AGILE-INV-3`
- [send-agiletelecom-sms-v1-action](send-agiletelecom-sms-v1-action.md): `NOTIFY-AGILEV1-INV-1` †, `NOTIFY-AGILEV1-INV-2` †, `NOTIFY-AGILEV1-INV-3` †, `NOTIFY-AGILEV1-INV-4`
- [send-agiletelecom-sms-v2-action](send-agiletelecom-sms-v2-action.md): `NOTIFY-AGILEV2-INV-1` †, `NOTIFY-AGILEV2-INV-2` †, `NOTIFY-AGILEV2-INV-3` †, `NOTIFY-AGILEV2-INV-4`
- [send-appointment-notification-action](send-appointment-notification-action.md): `NOTIFY-APPT-INV-2`, `NOTIFY-APPT-INV-3`
- [send-botman-telegram-action](send-botman-telegram-action.md): `NOTIFY-TGBOT-INV-1` †, `NOTIFY-TGBOT-INV-2` †, `NOTIFY-TGBOT-INV-3`, `NOTIFY-TGBOT-INV-4`
- [send-duocircle-mail-action](send-duocircle-mail-action.md): `NOTIFY-DUOCIRCLE-INV-1` †, `NOTIFY-DUOCIRCLE-INV-2`
- [send-facebook-whatsapp-action](send-facebook-whatsapp-action.md): `NOTIFY-WAFB-INV-1` †, `NOTIFY-WAFB-INV-2` †, `NOTIFY-WAFB-INV-3`, `NOTIFY-WAFB-INV-4` †
- [send-gammu-sms-action](send-gammu-sms-action.md): `NOTIFY-GAMMU-INV-1` †, `NOTIFY-GAMMU-INV-2` †, `NOTIFY-GAMMU-INV-3` †, `NOTIFY-GAMMU-INV-4`, `NOTIFY-GAMMU-INV-5`
- [send-mail-action](send-mail-action.md): `NOTIFY-MAIL-INV-1`, `NOTIFY-MAIL-INV-2`, `NOTIFY-MAIL-INV-3`
- [send-mailtrap-mail-action](send-mailtrap-mail-action.md): `NOTIFY-MAILTRAP-INV-1`, `NOTIFY-MAILTRAP-INV-2`, `NOTIFY-MAILTRAP-INV-3`
- [send-netfun-sms-action](send-netfun-sms-action.md): `NOTIFY-NETFUNSMS-INV-1` †, `NOTIFY-NETFUNSMS-INV-2` †, `NOTIFY-NETFUNSMS-INV-3` †, `NOTIFY-NETFUNSMS-INV-5`
- [send-nexmo-sms-action](send-nexmo-sms-action.md): `NOTIFY-NEXMO-INV-1` †, `NOTIFY-NEXMO-INV-2` †, `NOTIFY-NEXMO-INV-3` †, `NOTIFY-NEXMO-INV-4`
- [send-notification-action](send-notification-action.md): `NOTIFY-SEND-INV-2`, `NOTIFY-SEND-INV-3`, `NOTIFY-SEND-INV-4`, `NOTIFY-SEND-INV-5`
- [send-notification-to-recipient-action](send-notification-to-recipient-action.md): `NOTIFY-RECIPIENT-INV-4`
- [send-nutgram-telegram-action](send-nutgram-telegram-action.md): `NOTIFY-TGNUT-INV-1` †, `NOTIFY-TGNUT-INV-2` †, `NOTIFY-TGNUT-INV-3`, `NOTIFY-TGNUT-INV-4`
- [send-official-telegram-action](send-official-telegram-action.md): `NOTIFY-TG-INV-1` †, `NOTIFY-TG-INV-2` †, `NOTIFY-TG-INV-3` †, `NOTIFY-TG-INV-4` †, `NOTIFY-TG-INV-5`, `NOTIFY-TG-INV-6` †
- [send-plivo-sms-action](send-plivo-sms-action.md): `NOTIFY-PLIVO-INV-1` †, `NOTIFY-PLIVO-INV-2` †, `NOTIFY-PLIVO-INV-3` †, `NOTIFY-PLIVO-INV-4`
- [send-push-to-all-users-action](send-push-to-all-users-action.md): `NOTIFY-PUSHALL-INV-2`, `NOTIFY-PUSHALL-INV-3`
- [send-push-to-device-action](send-push-to-device-action.md): `NOTIFY-PUSHDEV-INV-2` †
- [send-push-to-devices-action](send-push-to-devices-action.md): `NOTIFY-PUSHBATCH-INV-1` †, `NOTIFY-PUSHBATCH-INV-2` †, `NOTIFY-PUSHBATCH-INV-3`, `NOTIFY-PUSHBATCH-INV-4`
- [send-push-to-platform-action](send-push-to-platform-action.md): `NOTIFY-PUSHPLAT-INV-1` †, `NOTIFY-PUSHPLAT-INV-2` †, `NOTIFY-PUSHPLAT-INV-4`
- [send-push-to-topic-action](send-push-to-topic-action.md): `NOTIFY-PUSHTOPIC-INV-1` †, `NOTIFY-PUSHTOPIC-INV-2` †, `NOTIFY-PUSHTOPIC-INV-4`
- [send-push-with-targeting-action](send-push-with-targeting-action.md): `NOTIFY-PUSHTGT-INV-3`
- [send-push-with-template-action](send-push-with-template-action.md): `NOTIFY-PUSHTPL-INV-2` †, `NOTIFY-PUSHTPL-INV-3`, `NOTIFY-PUSHTPL-INV-4`
- [send-record-notification-action](send-record-notification-action.md): `NOTIFY-RECORD-INV-2`, `NOTIFY-RECORD-INV-4`
- [send-records-notification-action](send-records-notification-action.md): `NOTIFY-BULK-INV-5`
- [send-scheduled-push-notification-action](send-scheduled-push-notification-action.md): `NOTIFY-SCHEDSEND-INV-1` †, `NOTIFY-SCHEDSEND-INV-2` †, `NOTIFY-SCHEDSEND-INV-3` †, `NOTIFY-SCHEDSEND-INV-4`, `NOTIFY-SCHEDSEND-INV-5`
- [send-sms-action](send-sms-action.md): `NOTIFY-SMSDISP-INV-2` †, `NOTIFY-SMSDISP-INV-3` †, `NOTIFY-SMSDISP-INV-4`
- [send-sms-factor-sms-action](send-sms-factor-sms-action.md): `NOTIFY-SMSFACTOR-INV-1` †, `NOTIFY-SMSFACTOR-INV-2` †, `NOTIFY-SMSFACTOR-INV-3` †, `NOTIFY-SMSFACTOR-INV-4`
- [send-twilio-sms-action](send-twilio-sms-action.md): `NOTIFY-TWILIO-INV-1` †, `NOTIFY-TWILIO-INV-2` †, `NOTIFY-TWILIO-INV-3` †, `NOTIFY-TWILIO-INV-4`
- [send-twilio-whatsapp-action](send-twilio-whatsapp-action.md): `NOTIFY-WATW-INV-1` †, `NOTIFY-WATW-INV-2` †, `NOTIFY-WATW-INV-3` †, `NOTIFY-WATW-INV-4`
- [send-vonage-whatsapp-action](send-vonage-whatsapp-action.md): `NOTIFY-WAVON-INV-1` †, `NOTIFY-WAVON-INV-2` †, `NOTIFY-WAVON-INV-3` †, `NOTIFY-WAVON-INV-4`
- [sms-normalize-phone-number-action](sms-normalize-phone-number-action.md): `NOTIFY-SMSNORM-INV-3` †, `NOTIFY-SMSNORM-INV-5`
- [smtp-mail-send-action](smtp-mail-send-action.md): `NOTIFY-SMTP-INV-1`, `NOTIFY-SMTP-INV-2`
- [try-duocircle-mail-action](try-duocircle-mail-action.md): `NOTIFY-TRYDUOCIRCLE-INV-1`, `NOTIFY-TRYDUOCIRCLE-INV-2`, `NOTIFY-TRYDUOCIRCLE-INV-3`, `NOTIFY-TRYDUOCIRCLE-INV-4`
- [try-mail-action](try-mail-action.md): `NOTIFY-TRYMAIL-INV-1`, `NOTIFY-TRYMAIL-INV-2`, `NOTIFY-TRYMAIL-INV-3`

## Indice e template

- [INDEX.md](INDEX.md) — tabella operativa operazione, contratto, classe, invarianti; copertura e backlog.
- [index.md](index.md) — inventario machine-readable dei file di contratto.
- [Template di contratto](_template.md) — scheletro con le sei sezioni e la tabella degli invarianti, da copiare per una nuova Action.

## Harness minimo: ownership, evidenza e recupero (2026-11-27)

I contratti di **module_notify_fila5** restano accanto alle Action, interfacce o superfici di questo package; root e Xot definiscono lo standard, non copiano le promesse. Un contratto comportamentale esplicita **Input, Output, Invarianti, Effetti collaterali, Errori, Non fa**; ogni ID di invariante punta a un group Pest effettivo oppure segnala `non dimostrata`. Se esiste la classe, il docblock deve rimandare al file con `@contract` e `@see`; per temi senza classi PHP non inventare Action/contratti.

- [Standard Xot](https://github.com/laraxot/module_xot_fila5/blob/dev/docs/contracts/contract-authoring-standard.md) · [ownership root](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/adr/0001-harness-minimo-e-ownership.md) · [runbook ECC/Second Brain](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/harness/README.md).
- **BMAD**: prima di cambiare una promessa, fissa nella story owner scope, esclusioni, evidenza e approvazioni richieste.
- **ECC**: i marker di merge rendono invalido l'indice; citare una suite non significa averla eseguita. Distingui `pass`, `fail`, `non eseguito` e registra il debito in [rollout #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).

## Documenti del package da riconciliare nell'indice

I seguenti file **esistono nel repository su `dev`** e non erano tutti collegati nel ramo d'indice più recente. Sono preservati come puntatori documentali; il loro stato di approvazione, la copertura e l'eventuale sostituzione con ADR numerati devono essere verificati nell'owner. Nessuna prova di esecuzione è implicita.

- [HandleMailjetEventsAction](./handle-mailjet-events-action.md)
