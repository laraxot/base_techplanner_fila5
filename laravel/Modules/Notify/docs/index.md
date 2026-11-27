---
title: "Notify Module Documentation"
type: index
tags: [notify, docs]
module: Notify
created: 2026-07-20
updated: 2026-11-19
qmd: "notify documentazione index notify module documentation index readme frontmatter qmd search"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/64"
  - "https://github.com/laraxot/module_notify_fila5/issues/56"
discussions:
  - "https://github.com/laraxot/module_notify_fila5/discussions/57"
related:
  - readme.md
  - wiki/index.md
  - notifications/readme.md
  - integrations/readme.md
  - templates/readme.md
---
# Modulo Notify — indice della documentazione

Punto di ingresso unico. Qui ci sono solo le aree principali; ogni cartella ha (dove esiste) il proprio indice.
Panoramica discorsiva: [readme.md](./readme.md). Audit corrente: [stories/audit-qualita.story.md](./stories/audit-qualita.story.md).

## Cosa fa il modulo

Invio notifiche multi-canale (email, SMS, WhatsApp, Telegram, push) tramite **Actions**
(`spatie/laravel-queueable-action`) in `app/Actions/` — `SendNotificationAction`, `NotificationManager`,
`Mail/`, `SMS/`, `WhatsApp/`, `Telegram/`, `Push/` — template email/notifica versionati
(`MailTemplate`, `NotificationTemplate`, `NotifyTheme`) e pannello Filament per gestirli.
Le vecchie classi `Services/NotificationManager`, `Services/SmsService` e `Services/MailEngines/MailtrapEngine`
sono state rimosse (sostituite dalle Actions); resta solo `Services/PushNotificationService` (legacy, vedi story).

## Per iniziare

- [Getting started](./GETTING-STARTED.md) · [Quick start](./quick-start.md)
- [Architettura](./architecture.md) · [Struttura](./structure.md) · [Modelli](./models.md)
- [Queueable Actions](./queueable-action.md) · [Configurazione](./configurations-usage-principles.md)
- [Convenzioni di naming](./naming-conventions.md) · [Traduzioni](./translations.md)
- [Testing](./testing.md) · [Troubleshooting](./troubleshooting.md)

## Aree

| Area | Indice |
|------|--------|
| Template email | [email-templates.md](./email-templates.md), [mail-templates/index.md](./mail-templates/index.md), [templates/README.md](./templates/README.md) |
| Notifiche e canali | [notifications/README.md](./notifications/README.md), [sms-implementation.md](./sms-implementation.md), [integrations/README.md](./integrations/README.md), [_integration/](./_integration/) |
| Invio email | [email-sending/](./email-sending/), [email/](./email/), [spatie-email/index.md](./spatie-email/index.md) |
| Filament | [filament-resources.md](./filament-resources.md) |
| Architettura | [architecture/README.md](./architecture/README.md) |
| Design Comuni (template PA) | [design-comuni/index.md](./design-comuni/index.md), [theme/](./theme/) |
| PDF | [html2pdf/index.md](./html2pdf/index.md) |
| BMAD (story, epic, roadmap) | [bmad/README.md](./bmad/README.md), [stories/](./stories/), [epics/](./epics/), [roadmap/README.md](./roadmap/README.md) |
| Wiki / second brain | [wiki/index.md](./wiki/index.md), [llm-wiki/index.md](./llm-wiki/index.md) |
| Agenti AI e prompt | [ai-agents/00-index.md](./ai-agents/00-index.md), [superpowers/README.md](./superpowers/README.md), [prompts/](./prompts/) |
| Fix, bug, refactoring | [fixes/](./fixes/), [bugs/](./bugs/), [refactoring/](./refactoring/), [errori/](./errori/) |
| GitHub | [github/README.md](./github/README.md) |
| Report di progetto (storici) | [project_docs/README.md](./project_docs/README.md), [project/README.md](./project/README.md) |
| Archivio (non canonico) | [archive/index.md](./archive/index.md), [raw/README.md](./raw/README.md), [root-md-files/](./root-md-files/) |

## Moduli collegati

- [Xot](../../Xot/docs/README.md) — classi base XotBase
- [Lang](../../Lang/docs/README.md) — traduzioni
- [UI](../../UI/docs/README.md) — componenti

## Regole dei nomi

Niente date nei nomi di file o cartelle (la data va in `created:` nel frontmatter); kebab-case minuscolo.
La versione precedente di questo indice puntava a ~50 file inesistenti (`ARCHITECTURE.md`, `EMAIL_TEMPLATES.md`, …):
è stata sostituita da questa mappa il 2026-11-19.
