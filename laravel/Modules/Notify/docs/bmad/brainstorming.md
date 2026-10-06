<<<<<<< .merge_file_SfgyaG
---
title: "Notify — brainstorming"
type: brainstorming
tags: [notify, brainstorming, risks, open-questions, decisions, channels]
created: 2026-09-28
updated: 2026-09-28
qmd: "Notify brainstorming decisioni aperte scartate rischi canali notifica"
related:
  - ./README.md
  - ./architecture.md
  - ./brainstorming/module-opportunities.md
  - ./epics/module-roadmap.md
  - ./epics/notification-channels.epic.md
---

# Notify — brainstorming

> **SUMMARY**: indice dei contenuti di brainstorming per `Modules\Notify`.
> Le domande ad alto valore, ipotesi, rischi e output attesi sono nei **shard**
> sottostanti (non sovrascritti). Questo file root funge da indice con
> decisioni e rischi verificati nel codice.

## Shard brainstorming

| Shard | Descrizione |
|---|---|
| [brainstorming/module-opportunities.md](./brainstorming/module-opportunities.md) | domande ad alto valore, ipotesi da validare, rischi |

## Decisioni prese

| Decisione | Stato | Riferimento |
|---|---|---|
| `NotifyServiceProvider` estende `XotBaseServiceProvider` | approvata | `app/Providers/NotifyServiceProvider.php:15` |
| `MailTemplate` estende `SpatieMailTemplate` | approvata | `app/Models/MailTemplate.php:74` |
| `MailTemplate` implementa `MailTemplateInterface` | approvata | `app/Models/MailTemplate.php:74` |
| `Contact` usa trait `HasContact` | approvata | `app/Models/Traits/HasContact.php` |
| `NotifyTheme` usa `linkable()` MorphTo | approvata | `app/Models/NotifyTheme.php:121` |
| Canali esterni in `app/Channels/` (SMS, Telegram, WhatsApp, Netfun) | approvati | `app/Channels/` |
| Merge config da env in `MergesNotifyConfigFromEnv` | approvato | `app/Providers/Concerns/MergesNotifyConfigFromEnv.php` |
| Notifiche in coda tramite `SendNotificationJob` | approvato | `app/Jobs/SendNotificationJob.php` |
| Push programmato in `SendScheduledPushNotification` | approvato | `app/Jobs/SendScheduledPushNotification.php` |
| Migrazioni obsolete in `_archive_redundant/` non applicate | approvato | `database/migrations/_archive_redundant/` |

## Domande aperte

| Domanda | Fonte | Priorità |
|---|---|---|
| API pubblica e invarianti del modulo | `architecture/module-boundary.md` sezione "Decisioni da confermare" | alta |
| Flussi con transazioni, autorizzazione e audit | `architecture/module-boundary.md` sezione "Decisioni da confermare" | alta |
| Parità Form/Table tra resource Filament | `app/Filament/Resources/*/Schemas/` vs `*/Tables/` | media |
| Copertura Pest rappresentativa (158 test) | `tests/` | media |

## Rischi

| Rischio | Evidenza |
|---|---|
| Duplicazione tra moduli | `app/Models/` contiene `Theme.php` e `NotifyTheme.php` |
| Contratti impliciti Eloquent | `app/Models/NotificationLog.php` rel. `notifiable()`/`template()` |
| Drift docs / codice / stories | `docs/bmad/stories/` multipli |
| WIP concorrente e marker merge | `stories/git-status-fleet-merge-markers-notify.story.md` |
| Migrazioni obsolete duplicate | `database/migrations/` + `_archive_redundant/` + `_bak/` |
| Config generico vs canale-specifico | `config/notify.php`, `config/sms.php`, `config/telegram.php`, `config/whatsapp.php` |
| Notifiche duplicate con User/Tenant | canali usano `Modules\User\Models\User` |

## Elementi non approvati (scartati o fuori scope)

| Elemento | Motivo |
|---|---|
| Refactor proposto in architettura | da marcare esplicitamente come proposta non applicata |

## Vedi anche

- [README](./README.md)
- [Architecture](./architecture.md)
- [Epic roadmap](./epics/module-roadmap.md)
- [Epic channels](./epics/notification-channels.epic.md)
- [Module opportunities (shard)](./brainstorming/module-opportunities.md)
=======
# Brainstorming - Modulo Notify

## Idee iniziali

- [IDEA 1] Un canale unico di notifica che colleghi record Eloquent → destinatario → template, usando `ChannelEnum` per risolvere l'indirizzo di consegna
- [IDEA 2] Factory-driven driver selection: `SmsActionFactory`, `WhatsAppActionFactory`, `TelegramActionFactory` mappano config→classe senza `match()` in codice
- [IDEA 3] Template engine a strati: `MailTemplate` (Spatie DB), `NotificationTemplate` (Blade inline), `NotifyTheme` (Mustache ##var##)
- [IDEA 4] Notifica push multi-piattaforma (FCM, APNs, WebPush) con rilevamento automatico della piattaforma dal formato del token
- [IDEA 5] Logging di consegna centralizzato: `NotificationLog` con stati PENDING → SENT → DELIVERED → OPENED → CLICKED

## Problemi da risolvere

- [PROBLEMA 1] `SendSmsAction` risolve `SmsEngines\{Driver}Engine` namespace inesistente — genera sempre `RuntimeException`
- [PROBLEMA 2] `SendDuocircleMailAction` lancia `RuntimeException('WIP')` — engine Duocircle non implementato
- [PROBLEMA 3] `SendAppointmentNotificationAction` è uno stub — i modelli `Patient`/`Appointment` non esistono nel progetto
- [PROBLEMA 4] `SmtpMailSendAction` lancia `RuntimeException('Removed debug dddx')` — log
- [PROBLEMA 5] `WhatsAppNotification::via()` restituisce hardcoded `['whatsapp']` invece della classe `WhatsAppChannel::class`
- [PROBLEMA 6] `NotificationManager::getTemplateStats()` e `getRecipientStats()` sono commentati — restituiscono sempre 0
- [PROBLEMA 7] `SendPushNotificationAction` e `SendPushToPlatformAction` sono duplicati — entrambi gestiscono FCM/APNs/WebPush con logica sovrapposta

## Soluzioni proposte

- [SOLUZIONE 1] Sostituire `SendSmsAction` con `SmsActionFactory` + driver actions implementanti `SmsActionContract`
- [SOLUZIONE 2] Rimuovere `SendDuocircleMailAction` o implementarlo; il pattern `Engines/{Driver}/Send{Driver}MailAction` è corretto ma Duocircle è WIP
- [SOLUZIONE 3] Rimuovere `SendAppointmentNotificationAction` o iniettare i modelli dipendenti come contract
- [SOLUZIONE 4] Implementare `SmtpMailSendAction` con `Symfony\Component\Mailer\Transport::fromDsn()`
- [SOLUZIONE 5] Correggere `WhatsAppNotification::via()` per restituire `[WhatsAppChannel::class]`
- [SOLUZIONE 6] Unificare le notifiche push: scegliere `SendPushNotificationAction` (con `PushNotificationPlatformDelivery`) come action primaria, deprecare le `SendPushTo*Action` duplicate
- [SOLUZIONE 7] Implementare `NotificationManager::getTemplateStats()` usando `NotificationLog` query reali

## Domande aperte

- [DOMANDA 1] Qual è la strategia per la coerenza del canale `mail`? `NotificationResource` usa `mail` via `GenericNotification`, mentre `RecordNotification` usa `SpatieEmail` (TemplateMailable) — i due percorsi sono paralleli o uno debolezza da unificare?
- [DOMANDA 2] `NotificationTemplate` (Blade compile) e `MailTemplate` (Spatie DB) coesistono — vero doppio motore di template o uno è legacy?
- [DOMANDA 3] APNS e WebPush sono "simulated" (ritornano sempre `success: true` senza chiamata API) — questo è voluto per MVP o è un gap da riempire?
- [DOMANDA 4] `NotifyTheme::Get` usa `##var##` Mustache, `NotificationTemplate::compile` usa `Blade::render` — si unifica su un motore?
- [DOMANDA 5] Il `MergesNotifyConfigFromEnv` trait e `ResolveTenantConfigValueAction` suggeriscono multi-tenant — il fallback `Mail::alwaysTo()` configurato in `NotifyServiceProvider::boot()` applica a tutti i tenant?
>>>>>>> .merge_file_bJd1u0
