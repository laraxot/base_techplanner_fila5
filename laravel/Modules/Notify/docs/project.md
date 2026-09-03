---
title: "Notify Module Project"
type: concept
tags: [notify, project]
module: Notify
created: 2026-07-14
updated: 2026-07-14
qmd: "notify module project Laravel Filament notifications"
related:
  - "./00-index.md"
  - "./PROJECT_OVERVIEW.md"
  - "./PROJECT_ROADMAP.md"
---

# Notify Module Project

## Context

Notify è il modulo del monolite Laravel + Filament v5 responsabile della composizione e della consegna delle notifiche.

## Ambito

- canali email, SMS, WhatsApp, Telegram e push;
- template e contenuti localizzati;
- configurazione dei provider;
- invio asincrono con Queueable Actions;
- retry, logging e osservabilità;
- integrazione amministrativa con Filament.

## Regole

- Mantenere i provider separati dal dominio di notifica.
- Usare Actions per le operazioni riutilizzabili e accodabili.
- Conservare le stringhe utente nei file di traduzione del modulo.
- Verificare configurazione, template e gestione degli errori per ogni canale.
- Documentare i cambiamenti nell'indice e nella roadmap del modulo.
