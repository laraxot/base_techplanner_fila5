---
title: "Design Comuni header style layer rule"
type: concept
confidence: high
updated: 2026-04-21
tags: [design-comuni, header, bootstrap-italia, css, blade, parity]
sources:
  - ../../laravel/Themes/Sixteen/docs/wiki/concepts/header-style-layer-rule.md
  - https://github.com/italia/design-comuni-pagine-statiche
  - https://italia.github.io/bootstrap-italia/docs/menu-di-navigazione/header/
---

# Design Comuni header style layer rule

## Regola permanente

Per l'header Design Comuni nel tema Sixteen:

- niente `<style>` inline condizionali in `v1.blade.php`;
- markup e composizione restano nel Blade owner;
- colori e background si correggono nel CSS/token layer;
- ogni fix di parity va confrontato con `italia/design-comuni-pagine-statiche` e con la copia locale reference, quando presente.

## Collegamenti

- [Sixteen header style layer rule](../../../laravel/Themes/Sixteen/docs/wiki/concepts/header-style-layer-rule.md)
- [Header section owner rule](./header-section-owner-rule.md)
- [Sixteen header composition rule](./sixteen-header-composition-rule.md)

