---
title: Visual Testing Tools Overview - Playwright & Puppeteer
type: concept
sources:
  - https://playwright.dev/docs/test-snapshots
  - https://playwright-php.dev/
  - https://pptr.dev/
  - https://www.browserstack.com/guide/playwright-vs-puppeteer
  - https://tillythecoder.com/articles/whats-new-in-pest-v4-for-laravel-12
confidence: high
created: 2026-05-04
updated: 2026-05-04
tags: [visual-testing, playwright, puppeteer, pest-v4, e2e, laravel, livewire, filament]
related:
  - visual-parity-verification-rule
  - playwright-test-location-policy
  - second-brain-theme-boundary
---

# Visual Testing Tools Overview - Playwright & Puppeteer

## Perché i Controlli Visivi

I controlli visuali (visual regression testing) rilevano cambiamenti UI non intenzionali confrontando screenshot di riferimento con screenshot attuali. Essenziale per:
- Verificare che modifiche PHP/Blade/CSS/JS non rompano l'UI
- Validare componenti complessi come MapPicker/GeoMapLit
- Garantire parity visiva tra admin/frontoffice (Design Comuni)

## Playwright (Raccomandato per Progetti Nuovi)

### Vantaggi
- **Cross-browser**: Chromium, Firefox, WebKit (Safari incluso)
- **Auto-wait integrato**: riduce test flaky, attende elementi actionable
- **Pest v4 nativo**: `pest-plugin-browser` per Laravel
- **Multi-linguaggio**: JS/TS, Python, Java, .NET, PHP (playwright-php)
- **Debugging**: Trace Viewer, Inspector, Codegen

### Installazione Laravel
```bash
# PHP package
composer require --dev playwright-php/playwright

# Node dependencies
npm install playwright@latest
npx playwright install

# Pest v4 browser testing
composer require --dev pestphp/pest-plugin-browser
```

### Esempio Pest v4
```php
it('map picker renders correctly', function () {
    visit('/it/tests/segnalazione-crea')
        ->assertScreenshotsMatches();
});

it('header shows correct colors', function () {
    visit('/')
        ->assertScreenshotsMatches();
});
```

## Puppeteer (Chrome-Centric, Performance)

### Vantaggi
- **Prestazioni**: 15-20% più veloce di Playwright su Chromium
- **Ecosistema maturo**: 87K GitHub stars, molti esempi
- **Chrome DevTools**: controllo granulare via CDP

### Installazione
```bash
npm install puppeteer

# Oppure Laravel MCP server
npm install @truefrontier/puppeteer-laravel-mcp-server
```

### Esempio Node.js
```javascript
const puppeteer = require('puppeteer');

(async () => {
    const browser = await puppeteer.launch();
    const page = await browser.newPage();
    await page.goto('https://example.com');
    await page.screenshot({ path: 'screenshot.png' });
    await browser.close();
})();
```

## Confronto Rapido

| Criterio | Playwright | Puppeteer |
|----------|-----------|-----------|
| **Browser** | Chromium/Firefox/WebKit | Chrome/Chromium |
| **Linguaggi** | JS/TS/Python/Java/.NET/PHP | JavaScript/TypeScript |
| **Auto-wait** | Integrato | Manuale (waitFor) |
| **Velocità** | Buona | 15-20% più veloce |
| **Laravel Integration** | Pest v4, playwright-php | puppeteer-laravel-mcp |
| **Community** | 64K stars (crescente) | 87K stars (matura) |

## Quando Usare Cosa

### Scegli Playwright se:
- Serve supporto cross-browser (Firefox, Safari)
- Usi già Pest v4 per Laravel
- Preferisci auto-wait automatico
- Serve supporto multi-linguaggio

### Scegli Puppeteer se:
- Progetto Chrome/Chromium-centric
- Serve prestazioni massime su Chromium
- Ecosistema maturo e molti esempi
- Team esperto in Chrome DevTools

## Visual Regression Testing

### Playwright (JavaScript/TypeScript)
```javascript
import { test, expect } from '@playwright/test';

test('map picker renders correctly', async ({ page }) => {
    await page.goto('/it/tests/segnalazione-crea');
    await expect(page).toHaveScreenshot('map-picker.png', {
        maxDiffPixels: 100
    });
});
```

### Puppeteer con jest-image-snapshot
```javascript
const { toMatchImageSnapshot } = require('jest-image-snapshot');

it('visual regression test', async () => {
    const image = await page.screenshot();
    expect(image).toMatchImageSnapshot({
        failureThreshold: 0.01,
        failureThresholdType: 'percent'
    });
});
```

## Strumenti Specifici Laravel

### Laravel Headless Browser Tester (Sixteen Theme)
```bash
# Screenshot base
php artisan browser:test /it --screenshot-path=/tmp/home.png

# Screenshot mobile
php artisan browser:test /it --screenshot-width=mobile

# Con utente autenticato
php artisan browser:test /it/dashboard --user=1 --screenshot-path=/tmp/dashboard.png

# Eval JavaScript (click, wait, poi screenshot)
php artisan browser:test /it/tests/segnalazione-crea \
    --eval="$('.open-modal').click(); await new Promise(r => setTimeout(r, 1000));" \
    --screenshot-path=/tmp/modal.png
```

### playwright-php (PHP nativo)
```php
<?php
use Playwright\Playwright;

$browser = Playwright::chromium();
$page = $browser->newPage();

$page->goto('https://example.com');
$page->screenshot(__DIR__ . '/screenshot.png');

$browser->close();
```

## Best Practices per FixCity

1. **Atomici**: Fai screenshot di singoli componenti (header, map picker, wizard step), non pagine intere
2. **Stabile**: Usa `maxDiffPixels` o `failureThreshold` per tolleranza
3. **CI/CD**: Esegui test visuali in ambiente consistente
4. **Baseline**: Commit screenshot di riferimento in git
5. **Update**: Usa `--update-snapshots` quando UI cambia intenzionalmente
6. **Verifica post-modifica**: Mai dichiarare fix "completato" senza verifica browser (vedi `visual-parity-verification-rule`)

## Collegamenti Moduli/Temi

- **Geo Module**: `concepts/visual-testing-playwright-puppeteer.md`
- **Sixteen Theme**: `concepts/visual-testing-frontend.md`
- **Root Rule**: `concepts/visual-parity-verification-rule.md`
- **Pest v4**: https://tillythecoder.com/articles/whats-new-in-pest-v4-for-laravel-12

## Risorse Esterne

- [Playwright Docs](https://playwright.dev/)
- [Playwright PHP](https://playwright-php.dev/)
- [Puppeteer Docs](https://pptr.dev/)
- [Pest v4 Browser Testing](https://tillythecoder.com/articles/whats-new-in-pest-v4-for-laravel-12)
- [BrowserStack Comparison](https://www.browserstack.com/guide/playwright-vs-puppeteer)
- [Playwright PHP GitHub](https://github.com/playwright-php/playwright)
