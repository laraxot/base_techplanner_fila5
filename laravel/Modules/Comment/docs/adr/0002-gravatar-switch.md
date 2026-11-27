---
qmd: "adr gravatar interruttore avatar iniziali privacy"
title: "ADR — Gravatar si accende e si spegne da configurazione"
type: decision
module: Comment
tags: [adr, comment, gravatar, avatar, privacy, gdpr]
created: 2026-11-17
updated: 2026-11-26
status: accepted
decision-makers: [team Laraxot]
issues:
  - "https://github.com/laraxot/theme_sixteen_fila5/issues/106"
related:
  - ../../app/Models/Concerns/InteractsWithComments.php
  - ../../app/Datas/CommentConfigData.php
  - ../../config/comments.php
---

# ADR: Gravatar si accende e si spegne da configurazione

## Contesto

- Senza foto del profilo, testata e commenti mostravano un avatar da `gravatar.com`: nell'HTML c'era l'hash md5 dell'email e
  il browser di chi legge mandava ad Automattic il proprio IP (CMT-022 aveva introdotto Gravatar su richiesta esplicita).
- Per un portale della PA quella richiesta parte prima di ogni consenso e non serve al servizio (le iniziali bastano).
- Il modulo Comment e' condiviso da piu' progetti: alcuni possono volere Gravatar.

Domanda: come togliere la richiesta a un terzo dove non serve, senza cambiare il comportamento degli altri progetti?

## Driver della decisione

- Nessuna richiesta a domini terzi prima del consenso, e nessun dato riconducibile alla persona (IP, hash md5 dell'email)
  verso Automattic dove il servizio non lo richiede.
- Il modulo e' condiviso: il comportamento degli altri progetti non deve cambiare per una scelta di questo tenant.
- Le viste avevano gia' il ripiego sulle iniziali: spegnere Gravatar non deve rompere nessun layout.
- Un unico punto di decisione (configurazione), non un controllo per vista.

## Decisione

- Interruttore `comments.gravatar.enabled` (`config/comments.php`, letto da `CommentConfigData::gravatarEnabled()`), acceso di default.
- Il progetto ospite che non vuole terzi lo spegne nella propria config del tenant: avatar del profilo se caricato, altrimenti
  le iniziali (tutte le viste avevano gia' il ripiego).

## Alternative scartate

- Togliere Gravatar dal modulo: avrebbe cambiato il comportamento degli altri progetti, contro la scelta di CMT-022.
- Proxy dell'avatar sul nostro server: l'IP non arriverebbe ad Automattic, ma l'hash dell'email si', ed e' un dato
  riconducibile alla persona.

## Conseguenze

- Pro: nessun dato a Gravatar dove l'interruttore e' spento; gli altri progetti non cambiano.
- Contro: con l'interruttore spento chi non carica una foto ha le iniziali, non l'immagine che usa altrove.
- Chi aggiunge una vista con avatar deve passare da `commentatorProperties()->avatar`, mai costruire l'URL Gravatar a mano.

## Conferma

- `Modules/Comment/tests/Feature/FrontOfficeCommentThreadTest.php`: «builds a Gravatar URL for a commentator without avatar
  only while comments.gravatar.enabled is on» e il render del thread senza `gravatar.com`.
- `Themes/Sixteen/tests/Feature/NoThirdPartyBeforeConsentTest.php`: nessuna richiesta a domini terzi prima del consenso.
