---
title: "Filament Blueprint — Theme Zero"
type: filament-blueprint
status: active
theme: Zero
created: 2026-10-21
updated: 2026-10-21
tags: [bmad, filament, blueprint, theme, zero, xotbase, tenant, policy]
qmd: "filament blueprint theme zero xotbase resource widget frontoffice tenant policy phpstan gate"
related:
  - ./architecture.md
  - ./phpstan.md
  - ./php-quality-gates-rule.md
  - ../../../../Modules/Xot/docs/bmad/filament-blueprint.md
---

# Scopo

Contratto Filament del tema **Zero**, unico tema frontend attivo (`pub` in
`theme.json`). Zero possiede viste, asset e traduzioni; **non** possiede PHP di
dominio (`app/` vuota). Il blueprint vale per ogni override o widget che verra'
aggiunto e impedisce di spostare logica dai moduli al tema.

## Regole non negoziabili

1. Estendere solo `XotBaseResource`, `XotBaseWidget`, `XotBasePage` o le altre basi
   Xot; mai le classi Filament dirette.
2. Nessuna label hardcoded: niente `->label('...')`; le stringhe stanno nei file
   `lang/<locale>/` del tema o del modulo owner.
3. Logica di business nelle Queueable Action del modulo owner; il tema compone
   solo la vista.
4. Nessun modello, migration, policy o query di dominio nel tema.

## Resource e widget

- Resource PHP: nessuna in Zero; le Resource vivono nei moduli.
- Override login Filament: solo viste in `resources/views/filament/`, senza
  duplicare la logica di autenticazione del modulo User.
- Widget frontoffice: montaggio **esplicito** nella pagina o nel pannello; non
  usare `discoverWidgets` per il chrome del tema.
- Le pagine Folio usano `resources/views/pages/`; i blocchi CMS restano risolti
  dal modulo Cms.

## Form, table e infolist

Preferire la triad `*Form`, `*Table`, `*Infolist` quando un componente cresce.
Campi readonly e valori calcolati seguono
[readonly-field-styling.md](./readonly-field-styling.md). Nessuna `->label()`
inline.

## Tenant e policy

Ogni query passa dal modulo owner e rispetta tenant e policy del modello. Zero non
crea elenchi cross-tenant ne' scorciatoie per comodita' admin. Survey,
autorizzazione e dati Pulse sono del modulo Quaeris: contratto in
[Quaeris docs](../../../../Modules/Quaeris/docs/bmad/README.md).

## Gate PHPStan

Il gate e' `cd laravel && php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules`
con il solo `laravel/phpstan.neon`. Non esiste un gate PHPStan del solo tema:
`app/` e' vuota e l'analisi theme-only e' vietata. Dettaglio:
[phpstan.md](./phpstan.md) e [php-quality-gates-rule.md](./php-quality-gates-rule.md).

## Riferimenti

- Architettura del tema: [architecture.md](./architecture.md)
- Contratto Xot: [filament-blueprint.md](../../../../Modules/Xot/docs/bmad/filament-blueprint.md)
- Organizzazione docs: [../../../../Modules/Xot/docs/conventions/docs-organization.md](../../../../Modules/Xot/docs/conventions/docs-organization.md)
