# Browser Automation CLI Solution

> Soluzione alternativa per screenshot e testing senza TypeScript errors

---

## Il Problema

Il dev-browser skill ha problemi con:
- Top-level await in TypeScript (CJS format)
- Errori di trasformazione esbuild
- Difficoltà di configurazione

---

## La Soluzione: puppeteer-cli

**Repository**: https://github.com/JarvusInnovations/puppeteer-cli

**Vantaggi**:
- ✅ No codice TypeScript/JavaScript necessario
- ✅ CLI semplice e diretto
- ✅ Screenshot, PDF, e HTML snapshot
- ✅ Supporto per viewport custom
- ✅ Cookie e autenticazione

---

## Installazione

```bash
npm install -g puppeteer-cli
```

---

## Comandi

### Screenshot

```bash
# Screenshot singolo
puppeteer screenshot <url> [output.png]

# Esempi
puppeteer screenshot https://example.com screenshot.png
puppeteer screenshot https://example.com screenshot.png --viewport 1920x1080
puppeteer screenshot https://example.com screenshot.png --full-page
puppeteer screenshot https://example.com screenshot.png --timeout 60000
```

### PDF

```bash
puppeteer print <url> [output.pdf]

# Esempi
puppeteer print https://example.com page.pdf
puppeteer print https://example.com page.pdf --format A4 --landscape
```

### HTML Snapshot

```bash
puppeteer snapshot <url> [output.html]
```

---

## Opzioni Comuni

| Opzione | Descrizione | Default |
|---------|-------------|---------|
| `--viewport` | Dimensioni viewport (es. 1920x1080) | 800x600 |
| `--full-page` | Screenshot full page | true |
| `--timeout` | Timeout in ms | 30000 |
| `--wait-until` | Attendi evento (load/networkidle) | load |
| `--cookie` | Cookie in formato key:value | - |
| `--sandbox` | Abilita sandbox | true |

---

## Use Case: Fixcity Map Verification

```bash
# Screenshot della pagina wizard
puppeteer screenshot \
  "http://127.0.0.1:8000/fixcity/admin/tickets/create?step=form.data%3A%3Adata%3A%3Awizard-step" \
  /var/www/_bases/base_fixcity_fila5/tmp/map_verification.png \
  --viewport 1920x1080 \
  --full-page \
  --timeout 60000
```

**Nota**: Per pagine con autenticazione, usare `--cookie` o fare login prima.

---

## Alternative

### 1. Playwright CLI (se installato)

```bash
npx playwright screenshot \
  --viewport-size=1920,1080 \
  --full-page \
  "http://127.0.0.1:8000/fixcity/admin/tickets/create" \
  screenshot.png
```

### 2. wkhtmltoimage (legacy)

```bash
wkhtmltoimage --width 1920 --height 1080 \
  http://127.0.0.1:8000/fixcity/admin/tickets/create \
  screenshot.png
```

### 3. Python + Playwright

```python
from playwright.sync_api import sync_playwright

with sync_playwright() as p:
    browser = p.chromium.launch()
    page = browser.new_page(viewport={'width': 1920, 'height': 1080})
    page.goto('http://127.0.0.1:8000/fixcity/admin/tickets/create')
    page.screenshot(path='screenshot.png', full_page=True)
    browser.close()
```

---

## Confronto Soluzioni

| Tool | Setup | Facilità | Controllo | Autenticazione |
|------|-------|----------|-----------|----------------|
| `puppeteer-cli` | npm install -g | ⭐⭐⭐⭐⭐ | Medio | Cookie |
| `dev-browser skill` | complesso | ⭐⭐⭐ | Alto | Sessione |
| `playwright CLI` | npm install | ⭐⭐⭐⭐ | Medio | Cookie |
| `Python+Playwright` | pip install | ⭐⭐⭐ | Alto | Full API |

---

## Raccomandazione

Per **screenshot rapidi e verifiche visive**:
```bash
puppeteer-cli
```

Per **testing completo e sessioni**:
```bash
Python + Playwright
```

---

## Troubleshooting

### Chrome non trovato

```bash
# Installa Chrome/Chromium
sudo apt-get install chromium-browser

# O usa PUPPETEER_EXECUTABLE_PATH
export PUPPETEER_EXECUTABLE_PATH=/usr/bin/chromium-browser
```

### Sandbox errors

```bash
# Disabilita sandbox (solo sviluppo locale!)
puppeteer screenshot url.png --sandbox=false
```

### Timeout

```bash
# Aumenta timeout per pagine lente
puppeteer screenshot url.png --timeout 120000
```

---

## Riferimenti

- **puppeteer-cli**: https://github.com/JarvusInnovations/puppeteer-cli
- **Puppeteer Docs**: https://pptr.dev/
- **Playwright CLI**: https://playwright.dev/docs/screenshots

---

**Data**: 2026-04-27  
**Autore**: AI Assistant  
**Tags**: browser-automation, screenshot, testing, puppeteer, cli
