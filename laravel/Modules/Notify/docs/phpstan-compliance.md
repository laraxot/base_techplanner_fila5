---
title: "PHPStan compliance — Notify"
type: note
tags: [phpstan, notify, compliance]
created: 2025-09-22
updated: 2026-11-17
related:
  - ./stories/notify-phpstan-zero-errors.story.md
  - ./stories/phpstan-cleanup-notify.story.md
---

# PHPStan compliance — Notify

## Status

**0 errori** su `Modules/Notify` (PHPStan level max / Larastan), verificato 2026-11-17:

```bash
cd laravel && ./vendor/bin/phpstan analyse Modules/Notify Modules/TechPlanner --memory-limit=-1 --error-format=raw
```

Baseline inventory wave (`/tmp/phpstan-wave/Notify.tsv`): **106 → 0**.

## Cause radice (wave 2026-11-17)

1. **Push payload senza value-type** — `PushNotificationService` espone array di piattaforma/notifica/token senza `list<>` / `array<string, mixed>`; gli stub APNs/Web Push calcolavano payload e parametri e non li usavano.
2. **Factory tipizzate** — `MailTemplateLog` / `MailTemplateVersion` senza `@method static …Factory factory()`: `factory()->create()` restava `mixed` nei test di business logic.
3. **SoftDeletes assente** — `MailTemplateVersion` importava SoftDeletes ma non lo usava: `trashed()` / `restore()` non esistevano per PHPStan.
4. **Config modulo + `env()`** — Larastan non tratta `Modules/*/config` come config dir; `Env::get()` mantiene lo scopo (token inbound / DNS domain) senza false positive.
5. **Test e job** — cast `config()` mixed, assert su return type sbagliati di `NotificationManager`, job scheduled push con array non filtrati a `list<string>`.

## Vincoli rispettati

- Nessun `*.neon` / baseline / `@phpstan-ignore`
- `mixed` solo dove il payload è davvero aperto (FCM data)
- Solo modulo Notify (+ docs)

## Scopo del modulo

Canali di notifica (mail, SMS, push, template, inbound webhook, log di consegna) con Actions/QueueableAction e factory tipizzate coerenti con `HasXotFactory`.
