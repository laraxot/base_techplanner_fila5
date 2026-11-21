---
qmd: "adr gravatar interruttore avatar iniziali privacy"
title: "ADR — Gravatar si accende e si spegne da configurazione"
type: decision
module: Comment
tags: [adr, comment, gravatar, avatar, privacy, gdpr]
created: 2026-11-17
updated: 2026-11-18
status: accepted
issues:
  - "https://github.com/laraxot/theme_sixteen_fila5/issues/106"
related:
  - ../../app/Models/Concerns/InteractsWithComments.php
  - ../../app/Datas/CommentConfigData.php
---

# ADR: Gravatar si accende e si spegne da configurazione

## Contesto

- Senza foto del profilo, testata e commenti mostravano un avatar da `gravatar.com`: nell'HTML c'era l'hash md5 dell'email e
  il browser di chi legge mandava ad Automattic il proprio IP (CMT-022 aveva introdotto Gravatar su richiesta esplicita).
- Per un portale della PA quella richiesta parte prima di ogni consenso e non serve al servizio (le iniziali bastano).
- Il modulo Comment e' condiviso da piu' progetti: alcuni possono volere Gravatar.

## Decisione

- Interruttore `comments.gravatar.enabled` (`CommentConfigData::gravatarEnabled()`), acceso di default.
- Spento per Fixcity in `config/local/fixcity/comments.php`: avatar del profilo se caricato, altrimenti le iniziali (tutte le
  viste avevano gia' il ripiego).

## Alternative scartate

- Togliere Gravatar dal modulo: avrebbe cambiato il comportamento degli altri progetti, contro la scelta di CMT-022.
- Proxy dell'avatar sul nostro server: l'IP non arriverebbe ad Automattic, ma l'hash dell'email si', ed e' un dato
  riconducibile alla persona.

## Conseguenze

- Pro: nessun dato a Gravatar in Fixcity; gli altri progetti non cambiano.
- Contro: in Fixcity chi non carica una foto ha le iniziali, non l'immagine che usa altrove.
- Verifica: `Modules/Comment/tests/Feature/FrontOfficeCommentThreadTest.php`,
  `Themes/Sixteen/tests/Feature/NoThirdPartyBeforeConsentTest.php`.
