---
title: "INDEX — Notify"
type: index
status: active
module: Notify
created: 2026-11-26
updated: 2026-11-26
qmd: "notify index contracts"
---

<!-- File: docs/contracts/INDEX.md · inventario dei contratti comportamentali di Notify. -->

# Indice dei contratti — Notify

Elenco operativo delle operazioni coperte da un contratto in `docs/contracts/`. Formato e
regole: [README.md](README.md); template: [_template.md](_template.md). Le invarianti hanno
ID `NOTIFY-<AREA>-INV-N`; i gruppi Pest esistono per 45 invarianti su 215
(vedi «Stato di copertura» e «Backlog test» in [README](README.md)); il resto e' debito dichiarato.

## Orchestrazione e template

| Operazione | Contratto | Classe | Invarianti |
|---|---|---|---|
| Invio da template multi-canale | [send-notification-action](send-notification-action.md) | `Actions\SendNotificationAction` | NOTIFY-SEND-INV-1..5 |
| Invio a email arbitraria | [send-notification-to-recipient-action](send-notification-to-recipient-action.md) | `Actions\SendNotificationToRecipientAction` | NOTIFY-RECIPIENT-INV-1..4 |
| Facade orchestrazione | [notification-manager](notification-manager.md) | `Actions\NotificationManager` | NOTIFY-MANAGER-INV-1..4 |
| Notifica a un record | [send-record-notification-action](send-record-notification-action.md) | `Actions\SendRecordNotificationAction` | NOTIFY-RECORD-INV-1..4 |
| Notifica bulk a record | [send-records-notification-action](send-records-notification-action.md) | `Actions\SendRecordsNotificationAction` | NOTIFY-BULK-INV-1..5 |
| Notifica appuntamento (stub) | [send-appointment-notification-action](send-appointment-notification-action.md) | `Actions\SendAppointmentNotificationAction` | NOTIFY-APPT-INV-1..3 |
| Substitution placeholder | [render-notification-template-string-action](render-notification-template-string-action.md) | `Actions\RenderNotificationTemplateStringAction` | NOTIFY-TPL-INV-1..6 |

## Mail

| Operazione | Contratto | Classe | Invarianti |
|---|---|---|---|
| Webhook esiti Mailjet | [handle-mailjet-events-action](handle-mailjet-events-action.md) | `Actions\Mail\Mailjet\HandleMailjetEventsAction` | NOTIFY-MAILJET-INV-1..4 |
| Webhook posta in arrivo | [process-inbound-mail-action](process-inbound-mail-action.md) | `Actions\Mail\ProcessInboundMailAction` | NOTIFY-INBOUND-INV-1..4 |
| Invio via engine | [send-mail-action](send-mail-action.md) | `Actions\Mail\SendMailAction` | NOTIFY-MAIL-INV-1..3 |
| Lettura via engine | [try-mail-action](try-mail-action.md) | `Actions\Mail\TryMailAction` | NOTIFY-TRYMAIL-INV-1..3 |
| Invio raw (test) | [send-mailtrap-mail-action](send-mailtrap-mail-action.md) | `Actions\Mail\SendMailtrapMailAction` | NOTIFY-MAILTRAP-INV-1..3 |
| Layout stagionale tema | [get-mail-layout-action](get-mail-layout-action.md) | `Actions\Mail\GetMailLayoutAction` | NOTIFY-LAYOUT-INV-1..3 |
| Verifica DNS provider | [check-mail-dns-action](check-mail-dns-action.md) | `Actions\Mail\CheckMailDnsAction` | NOTIFY-DNS-INV-1..4 |
| Transport Mailjet | [create-mailjet-transport-action](create-mailjet-transport-action.md) | `Actions\Mail\Mailjet\CreateMailjetTransportAction` | NOTIFY-MAILJET-TR-INV-1..4 |
| Engine Duocircle send (WIP) | [send-duocircle-mail-action](send-duocircle-mail-action.md) | `Actions\Mail\Engines\Duocircle\SendDuocircleMailAction` | NOTIFY-DUOCIRCLE-INV-1..2 |
| Engine Duocircle try (IMAP) | [try-duocircle-mail-action](try-duocircle-mail-action.md) | `Actions\Mail\Engines\Duocircle\TryDuocircleMailAction` | NOTIFY-TRYDUOCIRCLE-INV-1..4 |
| SMTP tombstone | [smtp-mail-send-action](smtp-mail-send-action.md) | `Actions\SmtpMailSendAction` | NOTIFY-SMTP-INV-1..2 |
| Build MailMessage da tema | [build-mail-message-action](build-mail-message-action.md) | `Actions\BuildMailMessageAction` | NOTIFY-MAILMSG-INV-1..5 |
| View stagionale | [determine-seasonal-content-view-path-action](determine-seasonal-content-view-path-action.md) | `Actions\DetermineSeasonalContentViewPathAction` | NOTIFY-SEASON-INV-1..5 |
| Risoluzione tema | [notify-theme-get](notify-theme-get.md) | `Actions\NotifyTheme\Get` | NOTIFY-THEME-INV-1..5 |
| Allegato PDF tema | [notify-theme-attachment-pdf](notify-theme-attachment-pdf.md) | `Actions\NotifyTheme\Attachment\Pdf` | NOTIFY-THEME-PDF-INV-1..4 |

## SMS

| Operazione | Contratto | Classe | Invarianti |
|---|---|---|---|
| Dispatcher legacy engine | [send-sms-action](send-sms-action.md) | `Actions\SMS\SendSmsAction` | NOTIFY-SMSDISP-INV-1..4 |
| Formattazione/conteggio | [format-sms-message-action](format-sms-message-action.md) | `Actions\SMS\FormatSmsMessageAction` | NOTIFY-FORMAT-INV-1..4 |
| Normalizzazione (SMS) | [sms-normalize-phone-number-action](sms-normalize-phone-number-action.md) | `Actions\SMS\NormalizePhoneNumberAction` | NOTIFY-SMSNORM-INV-1..5 |
| Normalizzazione (generale) | [normalize-phone-number-action](normalize-phone-number-action.md) | `Actions\NormalizePhoneNumberAction` | NOTIFY-NORMPHONE-INV-1..4 |
| Agile Telecom (alias) | [send-agiletelecom-sms-action](send-agiletelecom-sms-action.md) | `Actions\SMS\SendAgiletelecomSMSAction` | NOTIFY-AGILE-INV-1..3 |
| Agile Telecom v1 | [send-agiletelecom-sms-v1-action](send-agiletelecom-sms-v1-action.md) | `Actions\SMS\SendAgiletelecomSMSv1Action` | NOTIFY-AGILEV1-INV-1..4 |
| Agile Telecom v2 | [send-agiletelecom-sms-v2-action](send-agiletelecom-sms-v2-action.md) | `Actions\SMS\SendAgiletelecomSMSv2Action` | NOTIFY-AGILEV2-INV-1..4 |
| Gammu (SIM locale) | [send-gammu-sms-action](send-gammu-sms-action.md) | `Actions\SMS\SendGammuSMSAction` | NOTIFY-GAMMU-INV-1..5 |
| Netfun (SMS) | [send-netfun-sms-action](send-netfun-sms-action.md) | `Actions\SMS\SendNetfunSMSAction` | NOTIFY-NETFUNSMS-INV-1..5 |
| Netfun (Actions/) | [netfun-send-action](netfun-send-action.md) | `Actions\NetfunSendAction` | NOTIFY-NETFUN-INV-1..4 |
| Esendex | [esendex-send-action](esendex-send-action.md) | `Actions\EsendexSendAction` | NOTIFY-ESENDEX-INV-1..4 |
| Nexmo | [send-nexmo-sms-action](send-nexmo-sms-action.md) | `Actions\SMS\SendNexmoSMSAction` | NOTIFY-NEXMO-INV-1..4 |
| Plivo | [send-plivo-sms-action](send-plivo-sms-action.md) | `Actions\SMS\SendPlivoSMSAction` | NOTIFY-PLIVO-INV-1..4 |
| SMSFactor | [send-sms-factor-sms-action](send-sms-factor-sms-action.md) | `Actions\SMS\SendSmsFactorSMSAction` | NOTIFY-SMSFACTOR-INV-1..4 |
| Twilio SMS | [send-twilio-sms-action](send-twilio-sms-action.md) | `Actions\SMS\SendTwilioSMSAction` | NOTIFY-TWILIO-INV-1..4 |

## Push

| Operazione | Contratto | Classe | Invarianti |
|---|---|---|---|
| Tutti i token (stub) | [send-push-to-all-users-action](send-push-to-all-users-action.md) | `Actions\Push\SendPushToAllUsersAction` | NOTIFY-PUSHALL-INV-1..3 |
| Singolo token | [send-push-to-device-action](send-push-to-device-action.md) | `Actions\Push\SendPushToDeviceAction` | NOTIFY-PUSHDEV-INV-1..3 |
| Batch token | [send-push-to-devices-action](send-push-to-devices-action.md) | `Actions\Push\SendPushToDevicesAction` | NOTIFY-PUSHBATCH-INV-1..4 |
| Piattaforma | [send-push-to-platform-action](send-push-to-platform-action.md) | `Actions\Push\SendPushToPlatformAction` | NOTIFY-PUSHPLAT-INV-1..5 |
| Topic | [send-push-to-topic-action](send-push-to-topic-action.md) | `Actions\Push\SendPushToTopicAction` | NOTIFY-PUSHTOPIC-INV-1..4 |
| Targeting (stub) | [send-push-with-targeting-action](send-push-with-targeting-action.md) | `Actions\Push\SendPushWithTargetingAction` | NOTIFY-PUSHTGT-INV-1..3 |
| Template | [send-push-with-template-action](send-push-with-template-action.md) | `Actions\Push\SendPushWithTemplateAction` | NOTIFY-PUSHTPL-INV-1..4 |
| Scheduling | [schedule-push-notification-action](schedule-push-notification-action.md) | `Actions\Push\SchedulePushNotificationAction` | NOTIFY-PUSHSCHED-INV-1..3 |
| Esecuzione schedulata | [send-scheduled-push-notification-action](send-scheduled-push-notification-action.md) | `Actions\Push\SendScheduledPushNotificationAction` | NOTIFY-SCHEDSEND-INV-1..5 |
| Consegna simulata | [log-simulated-push-delivery-action](log-simulated-push-delivery-action.md) | `Actions\Push\LogSimulatedPushDeliveryAction` | NOTIFY-SIMPUSH-INV-1..3 |

## Telegram

| Operazione | Contratto | Classe | Invarianti |
|---|---|---|---|
| Bot API ufficiale | [send-official-telegram-action](send-official-telegram-action.md) | `Actions\Telegram\SendOfficialTelegramAction` | NOTIFY-TG-INV-1..6 |
| Botman (REST) | [send-botman-telegram-action](send-botman-telegram-action.md) | `Actions\Telegram\SendBotmanTelegramAction` | NOTIFY-TGBOT-INV-1..4 |
| Nutgram (REST) | [send-nutgram-telegram-action](send-nutgram-telegram-action.md) | `Actions\Telegram\SendNutgramTelegramAction` | NOTIFY-TGNUT-INV-1..4 |

## WhatsApp

| Operazione | Contratto | Classe | Invarianti |
|---|---|---|---|
| 360dialog | [send-360dialog-whatsapp-action](send-360dialog-whatsapp-action.md) | `Actions\WhatsApp\Send360dialogWhatsAppAction` | NOTIFY-WA360-INV-1..4 |
| Facebook/Meta | [send-facebook-whatsapp-action](send-facebook-whatsapp-action.md) | `Actions\WhatsApp\SendFacebookWhatsAppAction` | NOTIFY-WAFB-INV-1..4 |
| Twilio | [send-twilio-whatsapp-action](send-twilio-whatsapp-action.md) | `Actions\WhatsApp\SendTwilioWhatsAppAction` | NOTIFY-WATW-INV-1..4 |
| Vonage | [send-vonage-whatsapp-action](send-vonage-whatsapp-action.md) | `Actions\WhatsApp\SendVonageWhatsAppAction` | NOTIFY-WAVON-INV-1..4 |

## Note

- [ModelWithStatusContract](modelwithstatuscontract.md) — rinvio all'interfaccia Xot
  (`type: note`, non un contratto di comportamento).
