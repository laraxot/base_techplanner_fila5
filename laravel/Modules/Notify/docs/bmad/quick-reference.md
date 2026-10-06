<<<<<<< .merge_file_OXwiRu
<<<<<<< .merge_file_dO12SL
---
title: "Notify — quick reference"
type: note
tags: [notify, quick-reference, notifications, channels, actions, enums]
created: 2026-09-28
updated: 2026-09-28
qmd: "Notify quick reference canali azioni enum notifiche SMS push telegram"
related:
  - ./README.md
  - ./setup-guide.md
  - ./architecture/module-boundary.md
---

# Notify — quick reference

> **SUMMARY**: riferimento rapido per lo sviluppo su `Modules\Notify`:
> modelli principali, canali notifica, action orchestrative, enum, comandi
> console e provider. Tutto derivato da file reali del modulo.

## Namespace e providers

- Namespace: `Modules\Notify`
- Provider principale: `Modules\Notify\Providers\NotifyServiceProvider`
  (`app/Providers/NotifyServiceProvider.php:15`, estende `XotBaseServiceProvider`)
- Admin panel: `Modules\Notify\Providers\Filament\AdminPanelProvider`

## Modelli principali

| Modello | File | Estende / Implementa | Tabella |
|---|---|---|---|
| `Notification` | `app/Models/Notification.php` | `BaseModel` | `notifications` |
| `NotificationTemplate` | `app/Models/NotificationTemplate.php` | `BaseModel`, `HasMedia` | `notification_templates` |
| `NotificationLog` | `app/Models/NotificationLog.php` | `BaseModel` | `notification_logs` |
| `MailTemplate` | `app/Models/MailTemplate.php` | `SpatieMailTemplate` | `mail_templates` |
| `Contact` | `app/Models/Contact.php` | `BaseModel` | `notify_contacts` |
| `NotifyTheme` | `app/Models/NotifyTheme.php` | `BaseModel` | `notify_themes` |
| `NotificationType` | `app/Models/NotificationType.php` | `Model` | `notification_types` |
| `BaseModel` | `app/Models/BaseModel.php` | `XotBaseModel` | — |

## Canali ( Channels )

| Canale | File |
|---|---|
| `NetfunChannel` | `app/Channels/NetfunChannel.php` |
| `SmsChannel` | `app/Channels/SmsChannel.php` |
| `TelegramChannel` | `app/Channels/TelegramChannel.php` |
| `WhatsAppChannel` | `app/Channels/WhatsAppChannel.php` |

## Enum

| Enum | File |
|---|---|
| `ChannelEnum` | `app/Enums/ChannelEnum.php` |
| `ContactTypeEnum` | `app/Enums/ContactTypeEnum.php` |
| `NotificationTypeEnum` | `app/Enums/NotificationTypeEnum.php` |
| `NotificationLogStatusEnum` | `app/Enums/NotificationLogStatusEnum.php` |
| `SmsDriverEnum` | `app/Enums/SmsDriverEnum.php` |
| `TelegramDriverEnum` | `app/Enums/TelegramDriverEnum.php` |
| `WhatsAppDriverEnum` | `app/Enums/WhatsAppDriverEnum.php` |
| `MediaTypeEnum` | `app/Enums/MediaTypeEnum.php` |

## Action orchestrative

| Action | File | Scopo |
=======
=======
>>>>>>> .merge_file_dG5whE
# bmad method: quick reference (fixcity)
# bmad method: quick reference (laraxot)

## comandi rapidi

### help

```
skill: "bmad-help"
```

### parlare con agenti (ruoli)

| Agente | Skill | Scopo |
>>>>>>> .merge_file_V3Foz7
|---|---|---|
| `SendNotificationAction` | `app/Actions/SendNotificationAction.php` | invio notifica principale |
| `SendRecordNotificationAction` | `app/Actions/SendRecordNotificationAction.php` | notifica singolo record |
| `SendRecordsNotificationAction` | `app/Actions/SendRecordsNotificationAction.php` | notifica multi-record |
| `NotificationManager` | `app/Actions/NotificationManager.php` | gestione notifiche |
| `BuildMailMessageAction` | `app/Actions/BuildMailMessageAction.php` | costruzione messaggio email |
| `SendAppointmentNotificationAction` | `app/Actions/SendAppointmentNotificationAction.php` | notifica appuntamento |

## Driver SMS (Actions)

| Driver | Action |
|---|---|
| Twilio | `app/Actions/SMS/SendTwilioSMSAction.php` |
| Plivo | `app/Actions/SMS/SendPlivoSMSAction.php` |
| Nexmo | `app/Actions/SMS/SendNexmoSMSAction.php` |
| Agiletelecom | `app/Actions/SMS/SendAgiletelecomSMSAction.php` |
| Gammu | `app/Actions/SMS/SendGammuSMSAction.php` |
| Netfun | `app/Actions/SMS/SendNetfunSMSAction.php` |
| SmsFactor | `app/Actions/SMS/SendSmsFactorSMSAction.php` |

## Push notification (Actions)

| Action | File |
|---|---|
| `SendPushNotificationAction` | `app/Actions/SendPushNotificationAction.php` |
| `SendPushToPlatformAction` | `app/Actions/Push/SendPushToPlatformAction.php` |
| `SendPushToTopicAction` | `app/Actions/Push/SendPushToTopicAction.php` |
| `SchedulePushNotificationAction` | `app/Actions/Push/SchedulePushNotificationAction.php` |

## Resource Filament

| Resource | Directory |
|---|---|
| `ContactResource` | `app/Filament/Resources/ContactResource/` |
| `MailTemplateResource` | `app/Filament/Resources/MailTemplateResource/` |
| `NotificationResource` | `app/Filament/Resources/NotificationResource/` |
| `NotificationLogResource` | `app/Filament/Resources/NotificationLogResource/` |
| `NotificationTemplateResource` | `app/Filament/Resources/NotificationTemplateResource/` |
| `NotifyThemeResource` | `app/Filament/Resources/NotifyThemeResource/` |

## Console commands

| Comando | File |
|---|---|
| SendMail | `app/Console/Commands/SendMailCommand.php` |
| TelegramWebhook | `app/Console/Commands/TelegramWebhook.php` |
| CleanupNotificationLogs | `app/Console/Commands/CleanupNotificationLogsCommand.php` |
| AnalyzeTranslationFiles | `app/Console/Commands/AnalyzeTranslationFiles.php` |
| MigrateNotifyThemes | `app/Console/Commands/MigrateNotifyThemesToMailTemplateCommand.php` |

## Comandi rapidi (da laravel/)

```bash
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Notify
./vendor/bin/pint Modules/Notify
./vendor/bin/pest Modules/Notify
```

## Vedi anche

- [README](./README.md)
- [Setup guide](./setup-guide.md)
- [Architettura — module boundary](./architecture/module-boundary.md)
- [Epic channels](./epics/notification-channels.epic.md)
