---
title: "Notify Module Documentation"
type: index
tags: [notify, docs]
module: Notify
created: 2026-07-20
updated: 2026-11-27
qmd: "notify documentazione index module documentation notifiche canali contratti ADR"
issues:
  - "https://github.com/laraxot/module_notify_fila5/issues/56"
  - "https://github.com/laraxot/module_notify_fila5/issues/81"
discussions:
  - "https://github.com/laraxot/module_notify_fila5/discussions/57"
related:
  - ../README.md
  - notifications/README.md
  - contracts/index.md
  - contracts/INDEX.md
  - adr/index.md
---

# Notify Module Documentation

Indice canonico della documentazione del modulo Notify: notifiche multi-canale
(email, SMS, WhatsApp, Telegram e push), template, provider e contratti delle
Action.

## Scopo e principi

- **Modularità:** il modulo resta riusabile tra progetti e tenant.
- **Estensibilità:** nuovi provider entrano tramite le astrazioni esistenti,
  senza duplicare la logica dei canali.
- **Affidabilità:** error handling, logging e queueing sono parte del contratto
  di consegna.

## Architettura e configurazione

- [Scopo](./scopo.md)
- [Architettura](./architecture.md)
- [Struttura del progetto](./project-structure.md)
- [Sistema mail su database](./database-mail-system.md)
- [Provider di notifica](./notification-providers-guide.md)
- [Layout mail](./mail-layouts-guide.md)
- [Migrazione dei template mail](./mail-template-migration-guide.md)
- [Design moderno delle email](./modern-email-design-patterns.md)
- [Configurazione SMS](./sms_config_structure.md)
- [Traduzioni Notify](./notify-translation-guide.md)

## Canali

- [Panoramica notifiche](./notifications/README.md)
- [Notifiche multi-canale](./notifications/multi_channel_notifications.md)
- [Implementazione SMS](./notifications/sms_implementation_details.md)
- [Guida Telegram](./notifications/telegram_notifications_guide.md)

## Contratti, decisioni e lavoro corrente

- [Contratti delle Action](./contracts/index.md)
- [Indice dei contratti](./contracts/INDEX.md)
- [Decisioni architetturali](./adr/index.md)
- [Story BMAD](./bmad/stories/)
- [Funzionalità mancanti](./missing-features.md)
- [Roadmap dei miglioramenti](./roadmap-miglioramenti.md)
- [Changelog](./CHANGELOG.md)

## Regola di manutenzione

Questo file è un indice, non un archivio di sessioni. Le decisioni durature
vanno in ADR o nella wiki del modulo; gli esiti di lavoro vanno nelle story
BMAD. La documentazione storica resta in `archive/docs-legacy/` quando esiste,
senza duplicare il contenuto nell'indice corrente.
