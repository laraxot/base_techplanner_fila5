---
title: "Zero — scopo, confini e perche'"
type: concept
theme: Zero
status: active
created: 2026-09-02
updated: 2026-10-20
tags: [scopo, confini, tema, pub, blade, vite, tailwind, dry, kiss]
qmd: "scopo tema zero pub_theme frontoffice blade vite tailwind flowbite confini cms xot lang"
id: zero-docs-bmad-scopo
slug: scopo
description: "Perche esiste il tema Zero in base_quaeris_fila5: guscio pubblico, confini verso Cms/Xot/Lang, stack reale."
document_type: concept
category: product-planning
issues: []
discussions: []
related:
  - ./purpose.md
  - ../README.md
  - ../concepts/xotbase-never-extend-filament.md
  - ../wiki/concepts/theme-zero-operating-focus.md
  - ../../../Modules/Cms/docs/scopo.md
  - ../../../Modules/Lang/docs/scopo.md
  - ../../../Modules/Xot/docs/00-index.md
---

# Zero — scopo, confini e perche'

Ingresso docs: [../README.md](../README.md). Alias EN: [purpose.md](./purpose.md).

## Perche esiste

> **Zero e' il vestito pubblico del monorepo Quaeris: markup Blade, token di stile e pipeline Vite. Non decide cosa e' una pagina ne' quale dato mostrare.**

In questo checkout (`base_quaeris_fila5`) e' l'unico tema **attivo** sotto `laravel/Themes/`; One e Three sono skeleton. `theme.json` lo dichiara `type: pub`, `active: true`. Gli host Quaeris impostano `pub_theme => Zero` (es. `config/local/quaeris/xra.php`, `config/localhost/xra.php`); l'admin resta su temi/pannelli di altri stack (`adm_theme` tipicamente `AdminLTE`).

## Evidenza dal codice (2026-10-20)

| Fatto | Misura |
|---|---|
| Nessuna logica PHP di dominio | `app/` contiene solo `.gitkeep` |
| Superficie presentazionale | 23 `.blade.php` (layout, pagine, blocchi, override login Filament) |
| Asset sorgente | 4 file in `resources/css` + `resources/js` |
| Stack reale | Tailwind **3.4**, Alpine **3**, Flowbite **4**, Vite **6** (non Tailwind v4 / Flux) |
| Lingue del tema | `lang/{it,en,de}/{navigation,ui}.php` |
| Build consapevole dei moduli | `tailwind.config.js` scansiona `Modules/**/Filament` e `Modules/**/resources/views` |

## Confini (DRY: chi fa cosa)

| Responsabilita' | Dove vive | Non fare nel tema |
|---|---|---|
| Risolvere pagina e blocchi JSON | [Cms — scopo](./scopo.md) | Inventare Page/Block service o tabelle inventate |
| Autolabel, locale, chiavi i18n strutturali | [Lang — scopo](./scopo.md) | Hardcodare label di dominio nelle view |
| Classi base Filament / foundation | [Xot — indice](../../../Modules/Xot/docs/00-index.md), [mai estendere Filament*](../concepts/xotbase-never-extend-filament.md) | `extends Filament\...` diretto |
| Survey, auth di dominio, metriche Pulse | Modulo Quaeris (e altri moduli) | Copiare decisioni di dominio nelle Blade |

Filosofia in una riga: **tema = vestito; moduli = corpo; Xot = ossatura**.

## Come servirlo meglio (KISS)

1. Toccare solo presentazione: layout, componenti, CSS/JS, mail-layouts, traduzioni `navigation`/`ui`.
2. Se serve comportamento Filament nuovo, prima il mirror `XotBase*` in Xot, poi l'override di view qui.
3. Non aggiungere PHP in `Themes/Zero/app/`: Actions/Services stanno nei moduli.
4. Allineare le guide BMAD allo stack reale (TW 3.4 / Alpine / Flowbite) quando si editano; non inventare Flux/TW4 "per modernita'".
5. Docs: ingresso [../README.md](../README.md); indice BMAD [00-index.md](./00-index.md) (minuscolo — niente `00-INDEX.md` gemello).

## Collegamenti

- [theme-zero-operating-focus](../wiki/concepts/theme-zero-operating-focus.md) — focus operativo per agenti
- [architecture.md](./architecture.md) — pattern vestito
- [layouts.md](./layouts.md) / [components.md](./components.md) — superficie UI
- [gestionale-panels-vs-themes.md](./gestionale-panels-vs-themes.md) — pannelli admin vs tema pub
---

*Verificato sul codice di questo repo il 2026-10-20. Testi precedenti che citavano One/Three/Meetup/restaurant.local appartenevano ad altri checkout Laraxot e non descrivono `base_quaeris_fila5`.*
