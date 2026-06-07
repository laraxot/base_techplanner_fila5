---
title: Playwright MCP — Screenshot & Visual Testing
description: Come usare il Playwright MCP server per screenshot e verifica visuale UI nell'ambiente Claude Code
tags: [playwright, mcp, screenshot, visual-testing, ui]
---

# Playwright MCP — Screenshot & Visual Testing

## Cos'è

[`@playwright/mcp`](https://github.com/microsoft/playwright-mcp) è un MCP server che espone strumenti di browser automation (navigazione, screenshot, interazione DOM) direttamente a Claude Code.

**Installato in:** `laravel/.mcp.json` come server `playwright` (headless).

## Configurazione

```json
// laravel/.mcp.json
{
  "mcpServers": {
    "playwright": {
      "command": "npx",
      "args": ["-y", "@playwright/mcp@latest", "--headless"]
    }
  }
}
```

## Tool disponibili

Una volta avviato il server, Claude Code ha accesso a:

| Tool | Descrizione |
|------|-------------|
| `browser_navigate` | Naviga verso un URL |
| `browser_screenshot` | Cattura uno screenshot della pagina corrente |
| `browser_click` | Click su un elemento |
| `browser_fill` | Compila un campo input |
| `browser_select_option` | Seleziona un'opzione in un select |
| `browser_wait_for` | Attende una condizione |
| `browser_evaluate` | Esegue JavaScript nella pagina |
| `browser_close` | Chiude il browser |

## Uso tipico per verifica UI

```
1. Avviare il server locale: php artisan serve
2. Chiedere a Claude: "naviga su http://127.0.0.1:8000/it/segnalazione/crea e fai uno screenshot"
3. Claude userà browser_navigate + browser_screenshot
4. L'immagine viene mostrata inline nella conversazione
```

## Caso d'uso: documentazione visuale moduli/temi

Dopo aver implementato una feature, generare screenshot di riferimento:

```
- http://127.0.0.1:8000/it/segnalazione/crea  → wizard segnalazione
- http://127.0.0.1:8000/admin/segnalazioni     → Resource Filament
- componenti map-picker, leaflet, ecc.
```

Gli screenshot possono essere salvati in `docs/screenshots/` per documentazione visuale permanente.

## Limiti noti

- Headless: non è possibile vedere il browser mentre naviga
- La sessione browser è effimera: ogni conversazione inizia da zero
- Non supporta autenticazione cookie persistente tra sessioni
- Per pagine protette da login, serve una sequenza di fill+click per autenticarsi prima di navigare alla pagina target

## Dipendenze

- Node.js e npx devono essere disponibili nel PATH
- Il pacchetto viene scaricato on-demand via `npx -y`
- Prima esecuzione più lenta (~30s per download Chromium)
