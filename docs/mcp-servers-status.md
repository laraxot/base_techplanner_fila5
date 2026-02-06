# Status Server MCP - base_techplanner_fila5

**Ultimo aggiornamento**: 2026-02-06  
**Configurazione**: `.windsurf/mcp.json`

---

## ✅ Server MCP Attivi

### Infrastruttura

1. **filesystem** — Accesso file progetto
2. **memory** — Knowledge graph persistente tra sessioni
3. **sequential-thinking** — Reasoning avanzato per problemi complessi
4. **fetch** — HTTP requests, download risorse web
5. **git** — Operazioni git native
6. **puppeteer** — Browser automation, screenshot, PDF
7. **time** — Timestamp e timezone
8. **asana** — Project management (SSE: `https://mcp.asana.com/sse`)
9. **deepwiki** — Documentazione tecnica (SSE: `https://mcp.deepwiki.com/mcp`)

### UI/UX (aggiunti 2026-02-06)

10. **flowbite** — Componenti Tailwind CSS, Figma-to-code, generazione temi
    - `npx -y flowbite-mcp`
    - Docs: https://flowbite.com/docs/getting-started/mcp/

11. **shadcn** — Registry componenti, installazione via linguaggio naturale
    - `npx shadcn@latest mcp`
    - Docs: https://ui.shadcn.com/docs/mcp

12. **daisyui** — Blueprint MCP, generazione UI con qualità 10x
    - `npx -y daisyui@latest mcp`
    - Docs: https://daisyui.com/blueprint/

13. **mui-mcp** — Documentazione Material UI accurata, zero hallucination
    - `npx -y @mui/mcp@latest`
    - Docs: https://mui.com/material-ui/getting-started/mcp/

---

## ❌ Server Rimossi

### mcp-package-docs (Deprecato)
- **Rimosso**: 2025-01-27
- **Motivo**: Package deprecato, errori `ERR_MODULE_NOT_FOUND`

---

## 🔍 MCP Valutati ma Non Attivati

| MCP Server | Motivo |
|---|---|
| FlyonUI MCP | Richiede licenza PRO |
| UI/UX MCP Server (willem4130) | Richiede Storybook + setup complesso |
| Figma MCP (Cursor Talk) | Richiede plugin Figma + Cursor specifico |
| Magic UI MCP | Docs insufficienti |
| tailwindcss-mcp-server | Ridondante con flowbite che include già contesto Tailwind |

---

## 📋 Verifica Configurazione

```bash
# Verifica server configurati
cat .windsurf/mcp.json | jq -r '.mcpServers | keys[]' | sort

# Output atteso (2026-02-06):
# asana, daisyui, deepwiki, fetch, filesystem, flowbite, git,
# memory, mui-mcp, puppeteer, sequential-thinking, shadcn, time
```

---

## 🔗 Collegamenti

- [MCP UI/UX Tema Two](../laravel/Themes/Two/docs/mcp-ui-ux.md)
- [Configurazione Windsurf](../.windsurf/mcp.json)
- [Prompt MCP](../bashscripts/tools/prompts/mcp.txt)
