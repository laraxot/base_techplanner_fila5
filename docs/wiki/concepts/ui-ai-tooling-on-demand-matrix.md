---
title: Matrice tooling UI/AI on demand
type: concept
updated: 2026-06-03
status: active
related:
  - ../../stories/STORY-126-ui-ai-tooling-on-demand-second-brain.md
  - impeccable-frontend-design-on-demand.md
  - playwright-mcp-browser-automation.md
  - laravel-boost-mcp-setup-and-verification.md
---

# Matrice tooling UI/AI on demand

Hub unico per gli strumenti citati in `bashscripts/tools/prompts/llm-wiki.txt` (righe 998–1010). Gli MCP/skill **non** diventano dipendenze runtime del frontend Fixcity.

## Matrice verificata (2026-06-03)

| # | Strumento | Tipo | Install/config | Verifica reale | Stato |
|---|-----------|------|----------------|----------------|-------|
| 1 | [Impeccable](https://impeccable.style/docs/) | Skill + CLI | `.cursor/skills/impeccable/` | `npx impeccable detect` su CSS Sixteen OK | **Verificato** |
| 2 | [Playwright MCP](https://playwright.dev/docs/getting-started-mcp) | MCP stdio | `.mcp.json`, v0.0.75 | TodoMVC + localhost leggero OK | **Verificato** |
| 3 | [UI UX Pro Max](https://github.com/nextlevelbuilder/ui-ux-pro-max-skill) | Skill | `uipro` 2.2.3 | `search.py --design-system` OK | **Verificato** |
| 4 | [Flowbite MCP](https://flowbite.com/docs/getting-started/mcp/) | MCP npx | `npx flowbite-mcp` | `--help` OK | **Disponibile** |
| 5 | [daisyUI Blueprint](https://daisyui.com/blueprint/) | MCP licenza | LICENSE + EMAIL | CLI: license validation failed | **Non attivato** |
| 6 | [Windframe MCP](https://windframe.dev/mcp) | MCP HTTP OAuth | mcp.windframe.dev | HTTP 401 senza OAuth | **Non attivato** |
| 7 | [Tailkit](https://tailkit.com/) | MCP licenza | account | Nessuna licenza | **Non attivato** |
| 8 | [Tailkits overview](https://tailkits.com/blog/tailwind-component-libraries-mcp-integration/) | Articolo | — | Fonte comparativa | **Documentato** |
| 9 | [Tailwind MCP Pinterest](https://www.tailwindapp.com/blog/introducing-tailwinds-mcp-server) | MCP prodotto | — | Non è Tailwind CSS | **Escluso** |
| 10 | [Laravel Boost](https://laravel.com/ai/boost) | MCP PHP | `php artisan boost:mcp` | `--help` OK, stdio MCP | **Presente** |

## Documentazione per contesto

| Ambito | Percorso |
|--------|----------|
| Modulo Geo | `laravel/Modules/Geo/docs/wiki/concepts/ui-ai-tooling-on-demand.md` |
| Tema Sixteen | `laravel/Themes/Sixteen/docs/wiki/concepts/ui-ai-tooling-on-demand.md` |
| Story | [STORY-126](../../stories/STORY-126-ui-ai-tooling-on-demand-second-brain.md) |

## Regole Fixcity

1. Filament-first e Design Comuni restano la religione.
2. Playwright test Geo = fonte primaria per map-lit.
3. Nessuna dichiarazione «funziona» senza comando reale.
4. OAuth/licenza: documentato, non attivato in config condivisa.
