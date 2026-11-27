---
title: "Contratti — Comment"
type: index
tags: [contracts, actions, comment]
created: 2026-11-18
updated: 2026-11-24
---

# Contratti del modulo Comment

Cosa promettono le Action del modulo che scrivono o cancellano commenti, mandano notifiche o frenano gli invii. Le altre
Action del modulo (`Resolve*`, `Check*`, `Build*Url*`) leggono configurazione o calcolano valori e non hanno contratto.

Leggili prima di chiamare, modificare o imitare la moderazione (approva/rifiuta), le notifiche o il rate limit; la sezione
«Non fa» dice dove sta il comportamento che non trovi qui.

Formato (6 sezioni, invarianti con ID e group Pest): [regola canonica](../../../Xot/docs/rules/action-behavioral-contract.md).
Lanciare le invarianti coperte: `vendor/bin/pest Modules/Comment/tests --group=<ID>`.

## Contratti

- [ApproveCommentAction](approve-comment-action.md) — approva un commento in attesa, evento e notifiche in coda agli iscritti.
- [RejectCommentAction](reject-comment-action.md) — rifiutare significa cancellare la riga, poi evento.
- [EnsureCommentRateLimitAction](ensure-comment-rate-limit-action.md) — 5 invii al minuto per utente o IP, errore di campo oltre il limite.
- [SendNotificationsForPendingCommentAction](send-notifications-for-pending-comment-action.md) — notifica i moderatori di un commento in attesa.
