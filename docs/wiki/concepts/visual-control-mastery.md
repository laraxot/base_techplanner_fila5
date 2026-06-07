---
title: Visual Control Mastery — Playwright & Puppeteer
description: Guida definitiva ai controlli visuali, regressione e automazione browser nel 2026
tags: [playwright, puppeteer, visual-testing, regression, best-practices]
---

# Visual Control Mastery

Questa guida definisce lo standard del progetto per i **controlli visuali** e la **visual regression testing**.

## 1. Tool Selection (2026)

| Tool | Utilizzo Primario | Perché |
| :--- | :--- | :--- |
| **Playwright** | **Standard Progetto** | Cross-browser nativo, `toHaveScreenshot()` integrato, auto-waiting eccellente. |
| **Puppeteer** | Automazione ad alte prestazioni | Utile per scraping massivo o task Chrome-only dove la velocità è critica. |
| **BackstopJS** | Visual Regression Standalone | Ottimo per test rapidi senza scrivere molto codice di test. |

## 2. Golden Rules per Test Stabili

### A. Ambiente Deterministico (Docker)
Il rendering dei font e l'anti-aliasing variano tra OS.
- **Regola**: Eseguire SEMPRE i test visuali nel container Docker ufficiale Playwright.
- **Baseline**: Le immagini di riferimento (snapshots) devono essere generate nello stesso ambiente della CI.

### B. Gestione Contenuti Dinamici
I test falliscono se un timestamp o un nome utente cambiano.
- **Playwright (Masking)**:
  ```javascript
  await expect(page).toHaveScreenshot({ 
    mask: [page.locator('.timestamp'), page.locator('.user-name')] 
  });
  ```
- **CSS Iniezione**: Nascondere elementi volatili prima dello screenshot.
  ```javascript
  await page.addStyleTag({ content: '.dynamic-element { visibility: hidden !important; }' });
  ```

### C. Disabilitare Animazioni
Le transizioni CSS causano screenshot inconsistenti.
- **Configurazione**: Usare `animations: 'disabled'` in Playwright o forzare `* { transition: none !important; animation: none !important; }`.

### D. Thresholds Intelligenti
Non cercare la perfezione al 100% dei pixel (sub-pixel rendering).
- **Consiglio**: Usare `maxDiffPixelRatio: 0.02` (2%) per tollerare piccole variazioni non percepibili.

## 3. Implementazione nei Moduli

I test visuali devono essere collocati con il codice:
- `laravel/Modules/<Module>/tests/Playwright/`
- `laravel/Themes/<Theme>/tests/Playwright/`

### Esempio: Test Visuale GeoMapLit
```javascript
test('mappa renderizzata correttamente', async ({ page }) => {
  await page.goto('/it/segnalazione/crea');
  const map = page.locator('geo-map-lit');
  await expect(map).toBeVisible();
  // Aspetta che i tiles Leaflet siano caricati
  await page.waitForLoadState('networkidle');
  await expect(map).toHaveScreenshot('geo-map-initial.png', {
    mask: [page.locator('.leaflet-control-attribution')]
  });
});
```

## 4. Visual Parity Verification
Per garantire che l'implementazione sia fedele al design (es. Design Comuni):
1. Catturare screenshot del prototipo/Figma (se disponibile via URL).
2. Catturare screenshot del local environment.
3. Usare tool di diff (o il comando `compare` di ImageMagick) per validare la parità.

---
*Vedi anche:*
- [Playwright Testing Policy](../../../../docs/wiki/concepts/playwright-testing-policy.md)
- [Visual Parity Report (Fixcity)](../../Fixcity/docs/wiki/concepts/visual-parity-report.md)
