---
title: Playwright MCP — Browser Automation & Screenshots
type: concept
updated: 2026-06-03
status: active
---

# Playwright MCP — Browser Automation & Screenshots

## Cos'è

[Playwright MCP](https://github.com/microsoft/playwright-mcp) è il server MCP ufficiale Microsoft che espone browser automation (Chromium headless) a Claude Code tramite il Model Context Protocol.

Permette a Claude di:
- Navigare URL locali o remoti
- Fare screenshot di pagine renderizzate
- Interagire con elementi (click, type, select)
- Leggere l'accessibility tree della pagina
- Eseguire JavaScript nel browser

## Installazione nel progetto

Pacchetto ufficiale: `@playwright/mcp@latest` (verificato **v0.0.75**, giugno 2026).

**Prerequisiti** ([getting started](https://playwright.dev/docs/getting-started-mcp)):

- Node.js 18+ (ambiente: v20.18.2)
- Client MCP: Cursor, Claude Code, VS Code, ecc.

**Browser obbligatorio** (v0.0.75 usa `chrome-for-testing`, non basta `npx playwright install chromium`):

```bash
npx @playwright/mcp install-browser chrome-for-testing
```

Configurazione stdio in `.mcp.json` (root) e `laravel/.mcp.json`:

```json
{
  "mcpServers": {
    "playwright": {
      "command": "npx",
      "args": [
        "-y",
        "@playwright/mcp@latest",
        "--headless",
        "--browser",
        "chromium",
        "--output-dir",
        "/tmp/playwright-mcp",
        "--timeout-navigation",
        "90000",
        "--timeout-action",
        "90000"
      ]
    }
  }
}
```

Per pagine Laravel pesanti (`/it/` ~11–40 s) alzare `--timeout-navigation` rispetto al default (~5 s).

**Nota Cursor:** i tool MCP compaiono solo se il server è **Connected** in Cursor Settings → MCP. In questa sessione `user-playwright-mcp` risultava *Not connected*; la verifica è stata fatta via HTTP standalone (sotto). Il file globale `~/.cursor/mcp.json` punta ancora a un altro progetto (`base_ptvx_fila4_mono`) e a `@executeautomation/playwright-mcp-server` (terze parti): per Fixcity usare la config di progetto sopra o aggiungere manualmente `@playwright/mcp@latest` nel profilo Cursor del workspace.

## Configurazione canonica Fixcity

La documentazione ufficiale Playwright MCP indica il server `npx @playwright/mcp@latest` e l'opzione `--headless` per ambienti senza display. In questa macchina il browser `chrome` di sistema non e' installato e `npx playwright install chrome` richiede `sudo`; quindi la configurazione funzionante e verificata usa il Chromium gestito da Playwright:

```json
{
  "mcpServers": {
    "playwright": {
      "command": "npx",
      "args": ["-y", "@playwright/mcp@latest", "--headless", "--browser", "chromium", "--output-dir", "/tmp/playwright-mcp"]
    }
  }
}
```

Non usare `--executable-path` verso `/home/zorin/.cache/ms-playwright/chromium-<version>/...`: il numero build cambia con Playwright e rende la configurazione fragile.

## Configurazione locale repository (runtime corrente)

Nel repository corrente il server MCP Playwright e' configurato anche in:

- `laravel/.mcp.json`

con server:

```json
"playwright": {
  "command": "npx",
  "args": ["-y", "@playwright/mcp@latest", "--headless", "--browser", "chromium", "--output-dir", "/tmp/playwright-mcp"]
}
```

## Verifica installazione

```bash
npx @playwright/mcp@latest --help
npx @playwright/mcp@latest --version
npx @playwright/mcp install-browser chrome-for-testing
```

### Verifica runtime (2026-06-03)

Server HTTP standalone ([doc ufficiale](https://playwright.dev/docs/getting-started-mcp#standalone-server)):

```bash
npx -y @playwright/mcp@latest --headless --browser chromium \
  --output-dir /tmp/playwright-mcp --port 8950 \
  --allowed-hosts "*" --timeout-navigation 90000 --timeout-action 90000
```

Poi client MCP su `http://localhost:8950/mcp`.

| Test | Esito |
|------|--------|
| `initialize` + `tools/list` | OK — 23 tool (`browser_navigate`, `browser_snapshot`, …) |
| `browser_navigate` → [TodoMVC demo](https://demo.playwright.dev/todomvc) | OK — snapshot YAML in `/tmp/playwright-mcp/` |
| `browser_navigate` → `http://127.0.0.1:8000/robots.txt` | OK — localhost raggiungibile |
| `browser_navigate` → `http://127.0.0.1:8000/it/` | **Parziale** — risposta SSE vuota ~11 s (pagina pesante Livewire+map); Playwright diretto (`page.goto`) OK in ~38 s con titolo «Elenco segnalazioni» |
| Prima install browser senza `chrome-for-testing` | Errore: `Browser "chrome-for-testing" is not installed` |

Per regression visive mappa usare i test `@playwright/test` del modulo Geo (`laravel/Modules/Geo/tests/Playwright/`), non solo MCP snapshot su `/it/`.

Verifica precedente (2026-06-02) su porta 8934 con stesso protocollo JSON-RPC: inizializzazione e navigate su `data:` OK.

## Tool disponibili (principali)

| Tool | Descrizione |
|------|-------------|
| `browser_navigate` | Naviga a un URL |
| `browser_screenshot` | Screenshot della pagina corrente |
| `browser_click` | Click su elemento (selector CSS o coordinate) |
| `browser_type` | Inserisce testo in un campo |
| `browser_snapshot` | Accessibility tree strutturato (alternativa a screenshot) |
| `browser_wait_for` | Attende elemento o condizione |

## Uso tipico — verifica UI

```
# Claude Code nella sessione:
1. browser_navigate → http://127.0.0.1:8000/it/tests/segnalazione-crea
2. browser_screenshot → verifica rendering mappa, form, layout
3. browser_click → interagisce con elementi
4. browser_screenshot → verifica risultato interazione
```

## Headless vs headed

- `--headless` (Fixcity/WSL2): nessuna finestra, adatto a server senza display
- Senza `--headless`: headed di default ([doc ufficiale](https://playwright.dev/docs/getting-started-mcp#headed-mode)); utile con display per debug

## Modalità standalone (WSL / worker IDE)

Se stdio in Cursor non si connette, avviare il server separatamente:

```bash
npx -y @playwright/mcp@latest --headless --browser chromium \
  --output-dir /tmp/playwright-mcp --port 8931 \
  --allowed-hosts "*" --timeout-navigation 90000
```

Config client:

```json
{ "mcpServers": { "playwright": { "url": "http://localhost:8931/mcp" } } }
```

**Attenzione flag:** `--allowed-hosts` controlla chi può chiamare il server MCP; `--allowed-origins` controlla dove il browser può navigare. Se si restringe `--allowed-origins` solo a localhost, siti esterni (es. TodoMVC) ricevono `net::ERR_BLOCKED_BY_CLIENT`.

## Limiti

- Richiede `npx` e accesso a npm (scarica Playwright Chromium al primo avvio)
- Non autentica sessioni Livewire automaticamente — eventuali form protetti da CSRF funzionano normalmente ma login manuale potrebbe servire
- Accessibility tree può essere più utile di screenshot per individuare errori strutturali

## Riferimenti

- [microsoft/playwright-mcp](https://github.com/microsoft/playwright-mcp)
- [Playwright docs](https://playwright.dev/docs/getting-started-mcp)
- [Simon Willison — Using Playwright MCP with Claude Code](https://til.simonwillison.net/claude-code/playwright-mcp-claude-code)
