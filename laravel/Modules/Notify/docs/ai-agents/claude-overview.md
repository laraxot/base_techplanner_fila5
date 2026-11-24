---
title: "claude overview"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-11-23
qmd: "claude overview"
issues: []
discussions: []
---

# CLAUDE Overview

Panoramica del progetto LaravelPizza/Base Predict Fila5.
Panoramica del progetto LaravelPizza/Base Forecast Fila5.

## Progetto

**LaravelPizza** è una conversione e miglioramento di https://laravelpizza.com/ - rendendolo **PIÙ COOL, PIÙ CLICKBAIT, PIÙ ENGAGING**.

### Mission

> Prendere laravelpizza.com e renderlo **straordinario** - cooler design, più engaging UX, clickbait-worthy content.

**NON** è un progetto e-commerce pizza - è una piattaforma per Laravel developer meetups e tech communities.

<<<<<<< .merge_file_deDX1Q
=======
---
<<<<<<< .merge_file_NKDSOK
=======

title: "claude overview"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "claude overview"
issues: []
discussions: []
## Stack Tecnologico
>>>>>>> .merge_file_AXKIgn

title: "claude overview"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "claude overview"
issues: []
discussions: []
>>>>>>> .merge_file_me1JdK
## Stack Tecnologico

## Architettura

```
laravel/
├── Modules/               # Business logic
│   ├── Activity/
│   ├── Cms/
│   ├── Geo/
│   ├── Lang/
│   ├── Meetup/
│   ├── Tenant/
│   ├── User/
│   └── Xot/
├── Themes/                # Frontend
│   └── Meetup/
└── composer.json
```

Ogni modulo:
```
Modules/{ModuleName}/
├── app/
│   ├── Actions/
│   ├── Datas/
│   ├── Filament/
│   └── Models/
├── docs/
├── database/migrations/
└── composer.json
```

---

## Principi Core

- **Folio + Volt** per tutte le pagine front-office (NO controller/routes tradizionali)
- **CMS-driven content** con JSON e block components
- **Filament** solo per admin/backend
- **Modular architecture** via nwidart/laravel-modules
- **PHPStan level 10** strict type safety
- **XotBase pattern** per tutte le estensioni Filament

---

## 🔗 Link

- [Indice CLAUDE](./claude-split-index.md)
- [CLAUDE.md originale](../../CLAUDE.md)
- [Index principale](./index.md)
