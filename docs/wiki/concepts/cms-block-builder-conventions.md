---
title: "CMS Block Builder Conventions"
type: concept
tags: [cms, blocks, conventions, naming, filament]
confidence: high
created: 2026-06-01
updated: 2026-06-01
related:
  - ./no-http-controllers.md
  - ../guidelines/routing-architecture.md
  - ../../laravel/Modules/Fixcity/docs/MODULE-BOUNDARY-PHILOSOPHY.md
---

# CMS Block Builder Conventions

## Panorama

Le convenzioni qui descritte sono fondamentali per il **backoffice Filament Builder** che gestisce i blocchi CMS. Garantiscono coerenza tra il tipo di blocco (`type`) e la view Blade associata (`view`).

---

## Convenzione `type` → `view`

### Regola principale

> Il campo `type` nel JSON del blocco deve **corrispondere** al nome della cartella della view, **non** al nome del file `.blade.php`.

### Mappatura corretta

| `type` nel JSON | View corretta | Note |
|-----------------|---------------|------|
| `"ticket-layout"` | `pub_theme::components.blocks.ticket-layout.layout` | **Corretto** |
| `"ticket"` | `pub_theme::components.blocks.ticket.layout` | **Corretto** (mantiene view esistente) |
| `"hero"` | `pub_theme::components.blocks.hero.layout` | Nuovi blocchi |
| `"governance"` | `pub_theme::components.blocks.governance.layout` | Nuovi blocchi |
| `"services"` | `pub_theme::components.blocks.services.layout` | Nuovi blocchi |
| `"news"` | `pub_theme::components.blocks.news.layout` | Nuovi blocchi |
| `"events"` | `pub_theme::components.blocks.events.layout` | Nuovi blocchi |
| `"useful-links"` | `pub_theme::components.blocks.useful-links.layout` | Nuovi blocchi |

### Errori comuni

```json
// ❌ SBAGLIATO: type e view non allineati
{
  "type": "ticket-layout",
  "data": {
    "view": "pub_theme::components.blocks.ticket.layout"
  }
}

// ✅ CORRETTO: type = nome cartella
{
  "type": "ticket-layout",
  "data": {
    "view": "pub_theme::components.blocks.ticket-layout.layout"
  }
}

// ✅ CORRETTO: type = "ticket" mantiene la view esistente
{
  "type": "ticket",
  "data": {
    "view": "pub_theme::components.blocks.ticket.layout"
  }
}
```

---

## Struttura directory delle view

```
laravel/Themes/Sixteen/resources/views/components/blocks/
├── ticket-layout/           ← creata per il blocco "ticket-layout"
│   └── layout.blade.php     ← vista principale
├── ticket/                  ← esistente, per backward compatibility
│   └── layout.blade.php
├── hero/
│   └── layout.blade.php
├── governance/
│   └── layout.blade.php
├── services/
│   └── layout.blade.php
├── news/
│   └── layout.blade.php
├── events/
│   └── layout.blade.php
└── useful-links/
    └── layout.blade.php
```

---

## Esempio completo blocco

### Blocco "ticket-layout" (civic ticket list)

```json
{
  "type": "ticket-layout",
  "id": "ticket-layout-home",
  "weight": 0,
  "active": true,
  "data": {
    "view": "pub_theme::components.blocks.ticket-layout.layout",
    "id": "head-section-segnalazioni",
    "breadcrumb": [...],
    "title": "fixcity::ticket.heading.title.label",
    "subtitle": "fixcity::ticket.heading.subtitle.text",
    "results_count": 73,
    "tabs": {...},
    "main_content": {...},
    "contacts": {...}
  }
}
```

### Blocco "hero" (civic hero section)

```json
{
  "type": "hero",
  "id": "hero-home",
  "weight": 0,
  "active": true,
  "data": {
    "view": "pub_theme::components.blocks.hero.layout",
    "image": "...",
    "title": "Titolo principale",
    "description": "Descrizione breve",
    "cta": {
      "label": "Scopri di più",
      "url": "/it/servizi"
    }
  }
}
```

---

## Regole per il backoffice Filament

1. **Quando si crea un nuovo blocco**:
   - Creare la cartella `components/blocks/{type}/`
   - Creare `layout.blade.php` dentro
   - Il `type` nel JSON deve corrispondere al nome della cartella

2. **Quando si modifica un blocco esistente**:
   - Verificare che `type` e cartella view siano allineati
   - Se necessario, rinominare la cartella o aggiustare il `type`

3. **Per backward compatibility**:
   - Il tipo `"ticket"` può mantenere la view esistente `components.blocks.ticket.layout`
   - Nuovi blocchi devono seguire la convenzione `type = nome-cartella`

---

## Verifica automatica

Da terminale, per verificare la coerenza:

```bash
# Trova discrepanze tra type e view
grep -r '"type":' laravel/config/local/fixcity/database/content/pages/*.json | \
  grep -v '"view":.*components.blocks.\1'
```

---

## Perché questa convenzione?

- **Filament Builder**: usa `type` per elencare i blocchi disponibili
- **CMS**: la view viene caricata dinamicamente in base a `data.view`
- **Manutenibilità**: nomi coerenti rendono più semplice trovare e modificare i file
- **Scalabilità**: aggiungere nuovi blocchi è predicibile

---

## Riferimenti

- [No HTTP Controllers](./no-http-controllers.md)
- [Routing Architecture](../guidelines/routing-architecture.md)
- [MODULE BOUNDARY PHILOSOPHY](../../laravel/Modules/Fixcity/docs/MODULE-BOUNDARY-PHILOSOPHY.md)