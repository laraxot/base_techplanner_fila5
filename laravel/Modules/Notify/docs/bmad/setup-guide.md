<<<<<<< .merge_file_1s49aj
<<<<<<< .merge_file_AowJp7
---
title: "Notify — setup guide"
type: note
tags: [notify, setup, environment, sms, telegram, whatsapp, email, fcm]
created: 2026-09-28
updated: 2026-09-28
qmd: "Notify setup ambiente email SMS Telegram WhatsApp Firebase"
related:
  - ./README.md
  - ./quick-reference.md
  - ./architecture/module-boundary.md
  - ../composer.json
  - ../config/config.php
  - ../module.json
---

# Notify — setup guide
=======
=======
>>>>>>> .merge_file_BwfTcl
# bmad method: setup e configurazione (fixcity)
>>>>>>> .merge_file_M8fYQ9

> **SUMMARY**: guida per configurare l'ambiente di sviluppo del modulo
> `Modules\Notify`. Copre provider, config, canali (SMS/Telegram/WhatsApp/Email/FCM),
> migrazioni e verifica. Derivato da `module.json`, `composer.json`,
> `config/config.php`, `config/notify.php`, `config/sms.php` e `app/Channels/`.

## Prerequisiti

| Requisito | Note |
|---|---|
| PHP | ^8.3 |
| Laravel | 13 |
| Filament | 5 |

## Installazione dipendenze

Da `laravel/`:

```bash
composer install
```

## Provider

Registrati in `module.json`:

- `Modules\Notify\Providers\NotifyServiceProvider` (`module.json` providers array)
- `Modules\Notify\Providers\Filament\AdminPanelProvider` (`composer.json` extra.laravel.providers)

Estende `Modules\Xot\Providers\XotBaseServiceProvider`
(`app/Providers/NotifyServiceProvider.php:15`).

### Provider con merge config

- `app/Providers/Concerns/MergesNotifyConfigFromEnv.php`
  — merge configurazione da env.

## Configurazione

### File config

| File | Scopo |
|---|---|
| `config/config.php` | nome, icona (`heroicon-o-bell`), navigazione (`sort: 70`) |
| `config/notify.php` | configurazione notifica base |
| `config/sms.php` | driver SMS (Twilio, Plivo, Nexmo, etc.) |
| `config/telegram.php` | driver Telegram |
| `config/whatsapp.php` | driver WhatsApp |
| `config/beautymail.php` | template email |

### Variabili ambientali

Impostare in `.env` per ogni canale:

- `NOTIFY_SMS_DRIVER` → `config/sms.php`
- `NOTIFY_TELEGRAM_BOT_TOKEN` → `config/telegram.php`
- `NOTIFY_WHATSAPP_DRIVER` → `config/whatsapp.php`

## Canali

| Canale | File | Config |
|---|---|---|
| SMS | `app/Channels/SmsChannel.php` | `config/sms.php` |
| Telegram | `app/Channels/TelegramChannel.php` | `config/telegram.php` |
| WhatsApp | `app/Channels/WhatsAppChannel.php` | `config/whatsapp.php` |
| Netfun SMS | `app/Channels/NetfunChannel.php` | `config/sms.php` (driver netfun) |

## Migrazioni

Da `laravel/` (forward-only, mai `migrate:fresh`):

```bash
php artisan module:migrate Notify
```

Principali tabelle (da `database/migrations/`):

| File migration | Tabella |
|---|---|
| `2018_10_10_000000_create_mail_templates_table.php` | `mail_templates` |
| `2022_10_12_133532_create_notifications_table.php` | `notifications` |
| `2022_10_12_133535_create_notify_contacts_table.php` | `notify_contacts` |
| `2020_01_01_000007_create_notify_themes_table.php` | `notify_themes` |
| `2024_04_20_000001_create_mail_template_versions_table.php` | `mail_template_versions` |
| `2025_03_31_000001_create_notification_logs_table.php` | `notification_logs` |
| `2026_03_03_000000_create_notification_templates_table.php` | `notification_templates` |
| `2026_03_03_000001_create_notification_types_table.php` | `notification_types` |

Migrazioni obsolete in `database/migrations/_archive_redundant/` e
`database/migrations/_bak/` — **non** applicare.

## Verifica ambiente

```bash
# PHPStan su questo modulo solo
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Notify
# Pest
./vendor/bin/pest Modules/Notify
```

## Lingue

Il modulo supporta 13 lingue in `lang/`: `de`, `en`, `es`, `fr`, `hi`, `it`,
`pl`, `pt`, `ru`, `zh`, e sottodirectory `corrected/`.

## Vedi anche

- [README](./README.md)
- [Quick reference](./quick-reference.md)
- [Architettura — module boundary](./architecture/module-boundary.md)
- [Epics](./epics/module-roadmap.md)
