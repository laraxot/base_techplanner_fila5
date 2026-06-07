---
title: "UI/AI tooling on demand"
type: concept
updated: 2026-06-03
status: active
---

# UI/AI Tooling On Demand

## Principio

Skill, MCP e cataloghi di componenti aiutano gli agenti, ma non cambiano automaticamente lo stack del prodotto. Installare o configurare solo ciò che può essere verificato e usare i servizi remoti solo quando il task li richiede.

## Matrice Canonica

| Strumento | Categoria | Installazione/configurazione | Verifica | Regola d'uso |
|---|---|---|---|---|
| Impeccable | skill + CLI | `.agents/skills/impeccable`, `PRODUCT.md`, `DESIGN.md` | `npx impeccable skills check`, `npx impeccable detect` | audit, critique, polish |
| Playwright MCP | MCP locale | `@playwright/mcp@latest`, Chromium headless | initialize JSON-RPC reale | verifica browser e snapshot |
| UI UX Pro Max | skill | `.agents/skills/ui-ux-pro-max` | script `search.py --design-system` | brainstorming, non sostituisce i token esistenti |
| Flowbite MCP | MCP locale | `npx -y flowbite-mcp` | help CLI e server HTTP | contesto componenti; Flowbite non diventa dipendenza runtime |
| daisyUI Blueprint | MCP remoto/licenza | non attivato | non verificabile senza licenza | attivare solo con licenza |
| Windframe MCP | MCP remoto/OAuth | `https://mcp.windframe.dev/mcp` | non verificabile senza login | tre call gratuite dopo OAuth, poi piano account |
| Tailkit MCP | MCP remoto/OAuth/licenza | endpoint fornito al licenziatario | non verificabile senza licenza | componenti solo come riferimento adattato |
| Tailkits article | fonte comparativa | nessuna installazione | pagina informativa | non è un MCP |
| Tailwind MCP | prodotto Pinterest | non installato | fonte studiata | non confondere con Tailwind CSS |
| Laravel Boost | pacchetto + MCP Laravel | `laravel/boost`, `boost:mcp` | comando presente; tool call può andare in timeout | contesto Laravel, non design visuale |

## Configurazione Locale Verificata

La configurazione condivisa usa:

```json
{
  "playwright": {
    "command": "npx",
    "args": ["-y", "@playwright/mcp@latest", "--headless", "--browser", "chromium", "--output-dir", "/tmp/playwright-mcp"]
  },
  "flowbite": {
    "command": "npx",
    "args": ["-y", "flowbite-mcp"]
  }
}
```

Non aggiungere Windframe, Tailkit o Blueprint alla configurazione condivisa prima di avere credenziali e una decisione esplicita sul loro uso.

## Risultati Di Verifica 2026-06-03

- Playwright MCP ha risposto a `initialize` con protocollo `2025-03-26`.
- Flowbite MCP ha completato una inizializzazione JSON-RPC; la CLI 1.1.5 ignora il custom port e ascolta sulla porta 3000.
- Impeccable ha letto `PRODUCT.md` e `DESIGN.md`; l'audit dell'HTML `/it` ha rilevato un heading level saltato.
- UI UX Pro Max ha generato un design system, ma la proposta non rispetta automaticamente l'identità Design Comuni: resta uno strumento consultivo.
- Laravel Boost v2.4.8 è installato e `boost:mcp` esiste; la tool call MCP `application_info` ha superato il timeout di 120 secondi e richiede diagnosi separata.

## Tracking

- Issue mono: [#166](https://github.com/provtv/base_ptv_fila5_mono/issues/166)
- BMAD story: [story-166-second-brain-ui-mcp.md](../../../docs/chat/story-166-second-brain-ui-mcp.md)
- Prompt compatto: [llm-wiki.txt](../../../bashscripts/tools/prompts/llm-wiki.txt)

## Fonti

- https://impeccable.style/docs/
- https://playwright.dev/docs/getting-started-mcp
- https://github.com/nextlevelbuilder/ui-ux-pro-max-skill
- https://flowbite.com/docs/getting-started/mcp/
- https://daisyui.com/blueprint/
- https://windframe.dev/mcp
- https://tailkit.com/docs/mcp-server/introduction
- https://tailkits.com/blog/tailwind-component-libraries-mcp-integration/
- https://www.tailwindapp.com/blog/introducing-tailwinds-mcp-server
- https://laravel.com/ai/boost
