---
title: "Handoff: attributi data e parità Design Comuni"
type: handoff
status: superseded
created: 2026-10-29
updated: 2026-10-29
tags: [design-comuni, html-parity, mobile, data-attributes, sixteen, two]
qmd: "Design Comuni HTML parity generic data-mobile-nav Theme Two Sixteen"
issues: []
discussions: []
---

# Attributi `data-*` e parità Design Comuni

> **Archivio legacy.** Dal 2026-09-09 `docs/chat/` non si scrive piu' (vedi `AGENTS.md`). Decisione, causa, verifica e decisioni aperte stanno nella story [data-attribute-parity](../../laravel/Themes/Sixteen/docs/stories/data-attribute-parity.story.md), che contiene tutto questo testo e di piu'. Questo file resta per la cronologia e non si aggiorna.

## Decisione

Il tema Sixteen deve conservare il markup canonico Design Comuni: `data-bs-toggle="navbarcollapsible"`,
`data-bs-target`, `id="nav4"`, `navbar-collapsable`, `overlay` e `close-menu`.
Gli attributi HTML prefissati con il nome del tema sono vietati perché riducono la parità strutturale.

Il tema Two è il proprietario della navigazione mobile custom del tenant e usa hook generici `data-mobile-nav-*`.
Gli stessi hook generici sono ammessi solo come adapter per renderer Sixteen legacy non canonici; non vanno aggiunti a
`Themes/Sixteen/resources/views/components/sections/header/v1.blade.php` quando esiste già l'attributo `data-bs-*` ufficiale.

## Stato verificato

- Le viste Sixteen sorgenti non usano più hook mobile prefissati con il tema.
- Il contratto Pest del tema verifica la presenza del markup `data-bs-*` e l'assenza di hook prefissati nel renderer canonico.
- La verifica browser e PHPStan restano verdi dopo la normalizzazione.
- `resources/js/app.js` è stato allineato anche nel marker interno a `data-alpine-components`; resta soltanto un lock
  preesistente datato 2026-10-15, da rimuovere dal proprietario senza rubarlo.

## Riferimenti

- [Design Comuni static pages](https://italia.github.io/design-comuni-pagine-statiche/)
- [Design Comuni repository](https://github.com/italia/design-comuni-pagine-statiche)
- `laravel/Themes/Sixteen/docs/wiki/concepts/mobile-navigation-contract.md`
- `laravel/Themes/Two/docs/wiki/concepts/mobile-navigation-contract.md`
