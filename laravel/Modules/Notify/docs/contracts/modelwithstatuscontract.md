---
title: "Nota — ModelWithStatusContract (Xot)"
type: note
status: draft
module: Notify
created: 2026-11-26
updated: 2026-11-26
---

# ModelWithStatusContract — rinvio a Xot

Nota legacy (`type: note`, non un contratto di comportamento di Notify: non segue il
formato a sei sezioni).

L'interfaccia `Modules\Xot\Contracts\ModelWithStatusContract` (gestione degli stati dei
modelli via Spatie Model Status) vive nel modulo Xot, non in Notify:

- Sorgente: `Modules/Xot/app/Contracts/ModelWithStatusContract.php`

Notify non la implementa ne' la usa direttamente: i modelli che la implementano
(notifiche, ticket, ...) la ereditano dal modulo di dominio. Se serve un contratto di
comportamento per la gestione degli stati, va scritto in Xot o nel modulo owner.
