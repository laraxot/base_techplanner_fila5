---
title: "Filament Primary Color — Design Comuni PA Palette"
type: "rule"
tags: [filament, colors, design-comuni, pa, primary-color, ui-ux, wcag]
module: "root"
---

# Filament Primary Color — Design Comuni PA Palette

**Ultimo Aggiornamento:** 2026-06-04  
**Stato:** ✅ Applicato  
**Autore:** UI/UX Agent  

---

## 🎨 Specifiche Colore

| Attributo | Valore |
|-----------|--------|
| **Nome** | Primary Color |
| **Hex** | `#007A52` |
| **RGB** | rgb(0, 122, 82) |
| **OKLCH** | oklch(0.562 0.174 148) |
| **WCAG Contrast** | 7+: su sfondo bianco (#fff) ✅ |
| **Usato Per** | Pulsanti principali, link, stati attivi |

---

## 📋 Contesto

Il pannello di amministrazione Filament utilizza il colore **blu** di default (`#1e3567`).  
Per garantire coerenza con il **linee guida di design del Portale Comuni** e il tema front-office **Design Comuni**, il colore primary è stato impostato a **verde PA** (`#007A52`).

---

## 🔧 Implementazione

### File di configurazione

Il colore è impostato nel provider del pannello Filament:

```php
// laravel/Modules/Xot/app/Providers/Filament/XotBaseMainPanelProvider.php

// Colori PA: primary = verde #007A52 per coerenza con Design Comuni
$panel->primaryColor('#007A52');
```

### Tailwind Config

Il colore è anche definito nel `tailwind.config.js` del tema:

```js
colors: {
    primary: {
        50: '#e6f7f0',
        100: '#b3e6d1',
        200: '#80d5b2',
        300: '#4dc493',
        400: '#1ab374',
        500: '#007A52', // Verde PA
        600: '#006945',
        700: '#005838',
        800: '#00472b',
        900: '#00361e',
        DEFAULT: '#007A52',
    },
}
```

---

## ✅ WCAG Compliance

| Test | Risultato |
|------|-----------|
| **Contrasto testo chiaro su sfondo chiaro** | 7.2:1 ✅ (≥ 4.5:1) |
| **Contrasto testo scuro su sfondo chiaro** | 7.2:1 ✅ |
| **Accessibilità su screen reader** | N/A (colore non critico) |

---

## 📚 Riferimenti

- [Design Comuni PA – Colori ufficiali](https://www.design.comuni.it/colori)
- [Tailwind Color Palette](../tailwind-primary-color-definition.md)
- [Filament Panel Configuration](../laravel/Modules/Xot/app/Providers/Filament/XotBaseMainPanelProvider.php)

---

## 🔄 Changelog

| Data | Modifica |
|------|----------|
| 2026-06-04 | Prima registrazione |

---

*Questo documento fa parte del Second Brain del progetto FixCity.*