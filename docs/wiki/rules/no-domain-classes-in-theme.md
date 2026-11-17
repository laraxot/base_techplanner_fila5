---
title: "No Domain Classes in Theme"
type: rule
confidence: high
created: 2026-05-29
updated: 2026-05-29
tags: [critical, theme, css, classes, domain, presentation]
related:
  - theme-is-presentation-only.md
  - no-italian-in-html-attributes.md
  - ../../laravel/Themes/Sixteen/docs/wiki/rules/no-italian-component-names.md
---

# REGOLA CRITICA: No Classi Dominio-specifiche nel Tema

## 🚨 ZERO TOLERANCE

**Le classi CSS nel tema devono essere generiche (presentation), mai dominio-specifiche.**

### Il Crimine

```blade
<!-- ❌ CRIMINE ARCHITETTURALE - Tema conosce dominio -->
<div class="ticket-elenco">           <!-- Sa di "ticket" -->
<div class="segnalazione-card">     <!-- Sa di "segnalazione" -->
<div class="pratica-detail">        <!-- Sa di "pratica" -->
```

**Problemi:**
1. Tema conosce entità specifiche (ticket, segnalazione, pratica)
2. Non riutilizzabile per altri moduli
3. Se cambia dominio, il tema si rompe
4. Violazione "Theme is Presentation Only"

## La Regola: Classi Generiche

### ❌ Sbagliato (Dominio-specifico)

```blade
<!-- Tema conosce il dominio -->
<div class="ticket-elenco">
    <div class="ticket-card">
        <h3 class="ticket-title">...</h3>
        <p class="ticket-description">...</p>
    </div>
</div>

<div class="segnalazione-form">
    <input class="segnalazione-title">
    <textarea class="segnalazione-content">
</div>

<div class="pratica-detail">
    <div class="pratica-header">
        <span class="pratica-status">
    </div>
</div>
```

### ✅ Corretto (Generico)

```blade
<!-- Tema è presentation-only -->
<div class="content-list">
    <div class="item-card">
        <h3 class="item-title">...</h3>
        <p class="item-description">...</p>
    </div>
</div>

<div class="form-layout">
    <input class="form-title-input">
    <textarea class="form-content-input">
</div>

<div class="detail-view">
    <div class="detail-header">
        <span class="status-badge">
    </div>
</div>
```

## Mappa di Conversione

| ❌ Dominio-Specifico | ✅ Generico (Tema) |
|---------------------|-------------------|
| `ticket-*` | `item-*`, `content-*` |
| `segnalazione-*` | `entry-*`, `record-*` |
| `pratica-*` | `form-*`, `process-*` |
| `servizio-*` | `service-*` (se generico) |
| `disservizio-*` | `issue-*`, `report-*` |
| `elenco-*` | `list-*`, `grid-*` |
| `dettaglio-*` | `detail-*`, `view-*` |
| `riepilogo-*` | `summary-*`, `overview-*` |

## Pattern Consentiti nel Tema

### ✅ Presentation Classes

```blade
<!-- Layout -->
class="page-wrapper"
class="content-area"
class="main-container"
class="sidebar"

<!-- Componenti UI generici -->
class="card"
class="card-header"
class="card-body"
class="card-footer"

<!-- Liste -->
class="list-container"
class="list-item"
class="grid-layout"

<!-- Form -->
class="form-wrapper"
class="form-group"
class="form-input"
class="form-label"

<!-- Dettagli -->
class="detail-view"
class="detail-header"
class="detail-content"
class="detail-sidebar"

<!-- Stati -->
class="status-badge"
class="status-active"
class="status-pending"
```

### ❌ Vietati nel Tema

```blade
class="ticket-*"          ❌
class="segnalazione-*"    ❌
class="pratica-*"         ❌
class="servizio-*"        ❌
class="disservizio-*"     ❌
class="cittadino-*"       ❌
class="utente-*"          ❌ (se specifico modulo User)
class="appuntamento-*"    ❌
class="pagamento-*"       ❌
```

## Perché Questa Regola

### 1. Theme is Presentation Only

```
Tema = Vestito (non sa chi lo indossa)
Modulo = Persona (dottore, avvocato, operaio)

Il vestito ha tasche generiche, non "tasca per stetoscopio"
```

### 2. DRY - Reusability

```blade
<!-- ✅ Riutilizzabile -->
<div class="item-card">
    {{ $item->title }}  <!-- Funziona per ticket, practice, service -->
</div>

<!-- ❌ Non riutilizzabile -->
<div class="ticket-card">
    {{ $ticket->title }}  <!-- Solo per ticket -->
</div>
```

### 3. Separation of Concerns

| Layer | CSS Classes | Knows |
|-------|-------------|-------|
| **Tema** | `item-card`, `content-list` | Presentation |
| **Modulo** | `ticket` (in PHP), `practice` (in PHP) | Domain |

## Esempi di Correzione

### Esempio 1: Card

**❌ Prima:**
```blade
<div class="ticket-card">
    <h3 class="ticket-title">{{ $ticket->title }}</h3>
    <p class="ticket-description">{{ $ticket->content }}</p>
</div>
```

**✅ Dopo:**
```blade
<div class="item-card">
    <h3 class="item-title">{{ $item->title }}</h3>
    <p class="item-description">{{ $item->content }}</p>
</div>
```

### Esempio 2: Lista

**❌ Prima:**
```blade
<div class="ticket-elenco">
    @foreach($tickets as $ticket)
        <div class="ticket-item">...</div>
    @endforeach
</div>
```

**✅ Dopo:**
```blade
<div class="content-list">
    @foreach($items as $item)
        <div class="list-item">...</div>
    @endforeach
</div>
```

### Esempio 3: Form

**❌ Prima:**
```blade
<form class="segnalazione-form">
    <input class="segnalazione-title">
    <textarea class="segnalazione-content">
</form>
```

**✅ Dopo:**
```blade
<form class="form-layout">
    <input class="form-title-input">
    <textarea class="form-content-input">
</form>
```

## Script di Verifica

```bash
# Cerca classi dominio-specifiche nel tema
bash bashscripts/ai/check-domain-classes-in-theme.sh
```

## Checklist Pre-Creazione

Prima di scrivere classi CSS nel tema:

- [ ] La classe è generica (presentation)?
- [ ] NON contiene nomi di entità (ticket, practice, service)?
- [ ] Può essere riutilizzata per altri moduli?
- [ ] Segue la convenzione BEM generica?

## Collegamenti

- Theme Rule: [theme-is-presentation-only](./theme-is-presentation-only.md)
- Attributes Rule: [no-italian-in-html-attributes](./no-italian-in-html-attributes.md)
- Theme Wiki: [no-italian-component-names](../../laravel/Themes/Sixteen/docs/wiki/rules/no-italian-component-names.md)

---

**Metafora:**
> Un vestito ha tasche. Non ha "tasca per stetoscopio da dottore" o "tasca per martello da operaio". Ha solo "tasche".

**Data:** 2026-05-29  
**Severità:** CRITICA 🔴  
**Status:** 185 occorrenze trovate, da correggere progressivamente
