---
title: "Theme is Presentation Only"
type: rule
confidence: high
created: 2026-05-29
updated: 2026-05-29
tags: [critical, theme, presentation, separation-of-concerns, dry]
related:
  - no-italian-in-html-attributes.md
  - no-italian-folder-names-in-code.md
  - ../../laravel/Themes/Sixteen/docs/wiki/rules/no-italian-component-names.md
---

# REGOLA CRITICA: Il Tema è un Vestito (Presentation Only)

## 🚨 ZERO TOLERANCE

**Il tema NON deve conoscere i dettagli del dominio. È solo presentation (vestito).**

### Il Crimine

```blade
<!-- ❌ CRIMINE ARCHITETTURALE - Tema conosce dominio Fixcity -->
<main data-page="ticket-list">  <!-- "ticket" è dominio Fixcity! -->
```

**Problemi:**
1. Tema conosce che c'è un concetto "ticket"
2. Se domani cambiamo dominio (es. "pratiche"), il tema deve cambiare
3. Tema NON riutilizzabile per altri moduli
4. Violazione Separation of Concerns

## La Regola: Il Tema è un Vestito

```
┌─────────────────────────────────────────────────────────┐
│  TEMA (Presentation Layer - Vestito)                    │
│  ┌─────────────────────────────────────────────────────┐│
│  │  Identificativi GENERICI del tema:                    ││
│  │  - data-page="home-content"                         ││
│  │  - data-page="main-layout"                          ││
│  │  - class="content-wrapper"                          ││
│  │  - id="primary-nav"                                  ││
│  │                                                     ││
│  │  NON sa:                                            ││
│  │  - che esistono "ticket"                            ││
│  │  - che esistono "pratiche"                          ││
│  │  - logica di business                               ││
│  └─────────────────────────────────────────────────────┘│
└─────────────────────────────────────────────────────────┘
                            ↑
                Boundary: Theme/Module
                            ↓
┌─────────────────────────────────────────────────────────┐
│  MODULO (Domain Layer - Logica)                       │
│  ┌─────────────────────────────────────────────────────┐│
│  │  Concetti SPECIFICI del dominio:                    ││
│  │  - Ticket, Practice, Service                        ││
│  │  - Controllers, Actions, Models                     ││
│  │  - Route: /tickets, /practices                      ││
│  │                                                     ││
│  │  Decide COSA mostrare                               ││
│  └─────────────────────────────────────────────────────┘│
└─────────────────────────────────────────────────────────┘
```

## Pattern Corretto

### ❌ Sbagliato (Tema conosce dominio)

```blade
<!-- Themes/Sixteen/resources/views/pages/index.blade.php -->
<main data-page="ticket-list">     <!-- ❌ Tema sa di ticket -->
<main data-page="practice-form">   <!-- ❌ Tema sa di pratiche -->
<main data-page="service-detail">  <!-- ❌ Tema sa di servizi -->
```

### ✅ Corretto (Tema generico)

```blade
<!-- Themes/Sixteen/resources/views/pages/index.blade.php -->
<main data-page="home-content">    <!-- ✅ Generico tema -->
<main data-page="form-layout">     <!-- ✅ Generico tema -->
<main data-page="detail-view">     <!-- ✅ Generico tema -->
```

## Principio: Separation of Concerns

| Layer | Responsabilità | Conosce |
|-------|---------------|---------|
| **Tema** | Presentation, Layout, Styling | HTML, CSS, classi generiche |
| **Modulo** | Domain, Business Logic | Entità, Actions, Query |

### Esempio Pratico

**❌ Sbagliato:**
```blade
<!-- Tema conosce dominio -->
<main data-page="ticket-list">
    @foreach($tickets as $ticket)  <!-- Tema sa di tickets -->
        <x-ticket-card :ticket="$ticket" />  <!-- Componente specifico -->
    @endforeach
</main>
```

**✅ Corretto:**
```blade
<!-- Tema generico, modulo decide contenuto -->
<main data-page="home-content">
    <x-page side="content" slug="home" />  <!-- CMS decide cosa mostrare -->
</main>
```

## Identificativi Consentiti nel Tema

### ✅ Generici (Presentation)

```blade
data-page="home"
data-page="home-content"
data-page="main-layout"
data-page="content-list"
data-page="detail-view"
data-page="form-layout"
class="content-wrapper"
class="page-container"
id="primary-nav"
id="main-content"
```

### ❌ Specifici Dominio (VIETATI)

```blade
data-page="ticket-list"      ❌
data-page="segnalazioni"      ❌
data-page="practice-form"    ❌
data-page="service-detail"   ❌
class="ticket-card"          ❌
id="pratica-form"            ❌
```

## Perché Questa Regola

### 1. DRY - Theme Reusable

```
✅ Tema generico:
Tema Sixteen → può vestire Fixcity (ticket)
            → può vestire Cms (pages)
            → può vestire Blog (posts)
            → può vestire qualsiasi modulo

❌ Tema specifico:
Tema Sixteen → solo Fixcity
            → se cambi modulo, cambia tema
```

### 2. Separation of Concerns

```
Tema: "Come si presenta" (HTML/CSS)
Modulo: "Cosa presentare" (Data/Logic)
```

### 3. Maintenance

```
Se cambi da "ticket" a "pratica":
✅ Tema generico: nessuna modifica
❌ Tema specifico: cambiare ogni file
```

## Correzione Esempio

**File:** `laravel/Themes/Sixteen/resources/views/pages/index.blade.php`

**Prima (❌):**
```blade
<main data-page="ticket-list">  <!-- Tema sa di ticket -->
```

**Dopo (✅):**
```blade
<main data-page="home-content">  <!-- Tema generico -->
```

## Checklist Pre-Creazione

Prima di scrivere nel tema:

- [ ] L'identificativo è generico (presentation)?
- [ ] NON contiene nomi di entità (ticket, practice, service)?
- [ ] Può essere riutilizzato per altri moduli?
- [ ] Solo il modulo conosce il dominio?

## Verifica

### Script di Controllo

```bash
# Cerca attributi dominio-specifici nel tema
grep -rE 'data-page="(ticket|segnalazi|pratic|serviz)' \
    laravel/Themes/Sixteen/resources/views \
    --include="*.blade.php"

# Deve restituire nulla
```

## Collegamenti

- i18n Rule: [no-italian-in-html-attributes](./no-italian-in-html-attributes.md)
- Naming Rule: [no-italian-folder-names-in-code](./no-italian-folder-names-in-code.md)
- Theme Rule: [no-italian-component-names](../../laravel/Themes/Sixteen/docs/wiki/rules/no-italian-component-names.md)

---

**Metafora:**
> Il tema è come un vestito. Puoi vestire un dottore, un avvocato, o un operaio con lo stesso vestito. Il vestito non sa che lavoro fai - è solo presentation.

**Data:** 2026-05-29  
**Severità:** CRITICA 🔴  
**Correzione:** `index.blade.php` - `data-page="home-content"`
