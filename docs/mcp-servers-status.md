<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
# Status Server MCP - base_techplanner_fila5

**Ultimo aggiornamento**: 2026-02-06  
**Configurazione**: `.windsurf/mcp.json`
<<<<<<< HEAD
=======
# Status Server MCP - base_techplanner_fila4_mono

**Ultimo aggiornamento**: 2025-01-27  
**Configurazione**: `.windsurf/mcp.json` e `.cursor/mcp.json`
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev

---

## ✅ Server MCP Attivi

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
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
<<<<<<< HEAD
=======
### Configurati e Funzionanti

1. **laravel-boost** ⭐
   - Documentazione nativa Laravel/Filament/Livewire
   - Comandi Artisan, query database, Tinker
   - **Alternative a mcp-package-docs deprecato**

2. **filesystem**
   - Accesso completo ai file del progetto
   - Path: laravel, docs, public_html, bashscripts

3. **memory**
   - Knowledge graph persistente
   - Memoria tra sessioni

4. **sequential-thinking**
   - Analisi problemi complessi
   - Reasoning avanzato

5. **fetch**
   - HTTP requests
   - Download risorse web

6. **git**
   - Operazioni git native
   - Repository management

7. **playwright**
   - Browser automation
   - Testing E2E

8. **puppeteer**
   - Browser automation alternativo
   - Screenshot, PDF

9. **mysql**
   - Query database MySQL
   - Script custom: `bashscripts/mcp/mysql-db-connector.js`
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev

---

## ❌ Server Rimossi

### mcp-package-docs (Deprecato)
- **Rimosso**: 2025-01-27
- **Motivo**: Package deprecato, errori `ERR_MODULE_NOT_FOUND`
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev

---

## 🔍 MCP Valutati ma Non Attivati

| MCP Server | Motivo |
|---|---|
| FlyonUI MCP | Richiede licenza PRO |
| UI/UX MCP Server (willem4130) | Richiede Storybook + setup complesso |
| Figma MCP (Cursor Talk) | Richiede plugin Figma + Cursor specifico |
| Magic UI MCP | Docs insufficienti |
| tailwindcss-mcp-server | Ridondante con flowbite che include già contesto Tailwind |
<<<<<<< HEAD
=======
- **Alternativa**: Laravel Boost fornisce documentazione nativa
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev

---

## 📋 Verifica Configurazione

```bash
# Verifica server configurati
cat .windsurf/mcp.json | jq -r '.mcpServers | keys[]' | sort

<<<<<<< HEAD
<<<<<<< HEAD
# Output atteso (2026-02-06):
# asana, daisyui, deepwiki, fetch, filesystem, flowbite, git,
# memory, mui-mcp, puppeteer, sequential-thinking, shadcn, time
=======
# Verifica assenza mcp-package-docs
grep -c "mcp-package-docs" .windsurf/mcp.json .cursor/mcp.json
# Output atteso: 0
>>>>>>> 4b6b99016 (first commit)
=======
# Output atteso (2026-02-06):
# asana, daisyui, deepwiki, fetch, filesystem, flowbite, git,
# memory, mui-mcp, puppeteer, sequential-thinking, shadcn, time
>>>>>>> dev
```

---

## 🔗 Collegamenti

<<<<<<< HEAD
<<<<<<< HEAD
- [MCP UI/UX Tema Two](../laravel/Themes/Two/docs/mcp-ui-ux.md)
- [Configurazione Windsurf](../.windsurf/mcp.json)
- [Prompt MCP](../bashscripts/tools/prompts/mcp.txt)
=======
- [MCP Configuration](../laravel/Modules/Xot/docs/mcp-configuration-optimized.md)
- [Memoria Rimozione](../.cursor/memories/mcp-package-docs-removed.md)
>>>>>>> 4b6b99016 (first commit)
=======
- [MCP UI/UX Tema Two](../laravel/Themes/Two/docs/mcp-ui-ux.md)
- [Configurazione Windsurf](../.windsurf/mcp.json)
- [Prompt MCP](../bashscripts/tools/prompts/mcp.txt)
>>>>>>> dev
