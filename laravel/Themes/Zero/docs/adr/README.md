---
title: "ADR del tema Zero"
type: index
tags: [adr, decisioni, zero]
created: 2026-11-19
updated: 2026-11-24
---

# ADR del tema Zero

Zero e' il "vestito" pubblico: le sue decisioni dicono cosa resta **fuori** dal tema (classi PHP, modelli, logica) e come
il tema ospita comunque i widget dei moduli, come il login. Le decisioni di business restano negli ADR dei moduli.

**Quando leggerli:** prima di aggiungere una classe PHP al tema, una query in una Blade, o un form che esiste gia' come
widget di un modulo. Formato: [regola del canon](../../../../Modules/Xot/docs/rules/action-behavioral-contract.md).

## Decisioni

- [Nessuna classe PHP nel tema](theme-as-dress-no-php.md) — `app/` vuota; dati e interazioni arrivano da widget, Action e Cms dei moduli.
- [Auth con widget del modulo User](auth-pages-render-module-widgets-with-panel-css.md) — `LoginWidget` dentro il layout del tema, con il CSS compilato del pannello Filament.
