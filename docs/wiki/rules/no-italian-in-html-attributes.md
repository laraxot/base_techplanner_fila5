---
title: "No Italian in HTML Attributes"
type: rule
confidence: high
created: 2026-05-29
updated: 2026-05-29
tags: [critical, i18n, html, attributes, data-attributes]
related:
  - no-italian-folder-names-in-code.md
  - i18n-code-naming-philosophy.md
---

# REGOLA CRITICA: No Italiano in Attributi HTML

## 🚨 ZERO TOLERANCE

**Gli attributi HTML (inclusi `data-*`) devono essere sempre in inglese, mai in italiano.**

### Il Crimine

```blade
<!-- ❌ CRIMINE ARCHITETTURALE -->
<main data-page="segnalazioni-elenco">  <!-- Italiano! -->
```

**Problemi:**
1. `data-page="segnalazioni-elenco"` è in italiano
2. Se cambi lingua, l'attributo è sbagliato
3. Selettori CSS/JS rotti in altre lingue
4. Inconsistenza con il resto del codebase (inglese)

## La Regola

| Attributo | ❌ Sbagliato | ✅ Corretto |
|-----------|-------------|-------------|
| `data-page` | `segnalazioni-elenco` | `ticket-list` |
| `data-type` | `pratica` | `practice` |
| `id` | `segnalazione-form` | `ticket-form` |
| `class` | `segnalazione-card` | `ticket-card` |
| `name` | `segnalazione_type` | `ticket_type` |

## Pattern Corretto

### ❌ Sbagliato

```blade
<main data-page="segnalazioni-elenco" id="elenco-segnalazioni">
    <div class="card segnalazione-card" data-type="pratica">
        <h2 name="titolo_segnalazione">...</h2>
    </div>
</main>
```

### ✅ Corretto

```blade
<main data-page="ticket-list" id="ticket-list">
    <div class="card ticket-card" data-type="practice">
        <h2 name="ticket_title">...</h2>
    </div>
</main>
```

### ✅ Con Traduzione UI

```blade
<main data-page="ticket-list">  <!-- Attributo: inglese -->
    <h1>{{ __('fixcity::ticket.heading.title') }}</h1>  <!-- UI: tradotto -->
</main>
```

## Perché Questa Regola

### 1. Language-Agnostic Code

Gli attributi HTML sono parte del codice, non della UI. Devono funzionare in ogni lingua.

### 2. Selettori Consistenti

```javascript
// JavaScript funziona sempre
document.querySelector('[data-page="ticket-list"]');  // ✅
document.querySelector('[data-page="segnalazioni-elenco"]');  // ❌ Solo IT
```

```css
/* CSS funziona sempre */
[data-page="ticket-list"] { ... }  /* ✅ */
[data-page="segnalazioni-elenco"] { ... }  /* ❌ Solo IT */
```

### 3. DRY Principle

```blade
<!-- ❌ Duplicazione: nome italiano nel codice -->
data-page="segnalazioni-elenco"
<!-- traduzione già esiste in: -->
__('fixcity::ticket.heading.title')  

<!-- ✅ No duplicazione: nome inglese -->
data-page="ticket-list"
```

## Checklist Pre-Creazione

Prima di scrivere attributi HTML:

- [ ] `data-*` attributi in inglese?
- [ ] `id` in inglese?
- [ ] `class` in inglese (eccetto utility classes)?
- [ ] `name` in inglese?
- [ ] NO traduzioni italiane in attributi?

## Verifica

### Script di Controllo

```bash
# Cerca attributi data-* italiani
grep -rE 'data-[a-z]+="(segnalazi|pratic|serviz|impostazion|notific|messagg)' \
    laravel/Themes/Sixteen/resources/views --include="*.blade.php"

# Deve restituire nulla
```

### Esempio Correzione

**File:** `laravel/Themes/Sixteen/resources/views/pages/index.blade.php`

**Prima (❌):**
```blade
<main data-page="segnalazioni-elenco">
```

**Dopo (✅):**
```blade
<main data-page="ticket-list">
```

## Collegamenti

- Naming Rule: [no-italian-folder-names-in-code](./no-italian-folder-names-in-code.md)
- Philosophy: [i18n-code-naming-philosophy](../concepts/i18n-code-naming-philosophy.md)

---

**Data:** 2026-05-29  
**Severità:** CRITICA 🔴  
**Correzione:** `index.blade.php` - `data-page="ticket-list"`
