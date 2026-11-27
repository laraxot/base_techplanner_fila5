---
title: "Notifiche Notify"
type: index
tags: [notify, notifications]
module: Notify
created: 2026-07-20
updated: 2026-11-27
qmd: "notify notifiche canali email SMS Telegram WhatsApp push multi-channel"
related:
  - ../index.md
  - ../contracts/index.md
---

# Notifiche Notify

Questa directory documenta il comportamento dei canali di consegna del modulo
Notify. La logica applicativa vive nelle Queueable Action e nei canali PHP; qui
si descrivono flussi, configurazione e vincoli osservabili.

## Canali

- [Notifiche multi-canale](./multi_channel_notifications.md)
- [Implementazione SMS](./sms_implementation_details.md)
- [Configurazione provider SMS](./sms_provider_configuration.md)
- [Guida Telegram](./telegram_notifications_guide.md)
- [Implementazione Netfun](./archive/netfun-sms-implementation.md)

## Regole

1. Ogni provider deve avere una Action owner e una configurazione verificabile.
2. I canali non duplicano la logica del provider: delegano alle Action e ai
   Data object già presenti nel modulo.
3. Le consegne lente devono usare il queueing previsto dal modulo.
4. Errori, fallback e dati sensibili devono seguire i contratti in
   `docs/contracts/`.

## Manutenzione

Aggiornare questa pagina solo per cambiare l'indice o le regole condivise. Le
decisioni architetturali vanno in `docs/adr/`; una modifica di un canale va
documentata vicino alla sua Action e verificata con il test del modulo.
