---
title: "Regola: NO CSS `!important` override - Usare classi Design Comuni"
type: "rule"
tags: [css, architecture, dry, kiss, ui-ux, wcag, design-comuni]
module: "root"
---

# Regola: NO CSS `!important` override - Usare classi Design Comuni

**Ultimo Aggiornamento:** 2026-06-04  
**Stato:** ✅ Applicata  
**Autore:** Architecture Agent

---

## 🎯 Problema

Il file `agid-override.css` conteneva override con `!important` per bottoni, input, alert, ecc:

```css
.btn-primary {
    background-color: var(--italia-blue-500) !important;
    border-color: var(--italia-blue-500) !important;
}
```

Questo approccio è:
- ❌ **Non DRY** - Forza stili già definiti nel design system
- ❌ **Non KISS** - Complica il CSS con eccezioni
- ❌ **Non WCAG** - Rischia di rompere contrasto e accessibilità
- ❌ **Non maintainabile** - Ogni aggiornamento richiede modifica manuale

## ✅ Soluzione

Utilizzare SOLO le classi ufficiali del design system:

| Scopo | Classe Design Comuni | Tailwind | Filament |
|-------|---------------------|----------|----------|
| Bottone primario | `.btn-primary` | `bg-primary-500 text-white` | `<x-filament::button color="primary">` |
| Input focus | `.form-control:focus` | `focus:ring-primary-500 focus:border-primary-500` | Auto gestito da Filament |
| Alert successo | `.alert-success` | `bg-success-50 border-success-200` | `Notification::make()->success()` |

## 📋 Regola

**MAI** aggiungere `!important` per forzare colore, bordi, stili.

**SEMPRE** utilizzare:
1. Classi Bootstrap Italia / Design Comuni
2. Classi Tailwind definite in `tailwind.config.js`
3. Componenti Filament con `color="primary"`

## 🔧 Esempio Applicazione

Prima (sbagliato):
```css
/* agid-override.css */
.fi-btn-primary {
    background-color: #007a52 !important;
    border-color: #007a52 !important;
    color: #ffffff !important;
}
```

Dopo (corretto):
```blade
{{-- blade --}}
<x-filament::button color="primary" type="submit">
    Registrati
</x-filament::button>
```

Il colore **verde PA** `#007A52` è già configurato come primary in:
- `tailwind.config.js` → `colors.primary`
- `XotBaseMainPanelProvider.php` → `$panel->primaryColor('#007A52')`

## 📚 Riferimenti

- [Design Comuni Statiche](https://github.com/italia/design-comuni-pagine-statiche)
- [Tailwind Config - Primary Colors](../tailwind-primary-color-definition.md)
- [Filament Panel Provider](../laravel/Modules/Xot/app/Providers/Filament/XotBaseMainPanelProvider.php)

---

*Questa regola fa parte del Second Brain del progetto FixCity.*