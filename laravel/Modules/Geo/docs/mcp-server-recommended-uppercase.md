<<<<<<< HEAD
---
title: "mcp server recommended uppercase"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "mcp server recommended uppercase"
issues: []
discussions: []
module: theme
topic: mcp-server-recommended-uppercase
canonical: ../../../Themes/docs/shared-components/MCP_SERVER_RECOMMENDED-Modules.md
status: superseded
superseded_by: mcp-server-recommended.md
---

See canonical documentation: ../../../Themes/docs/shared-components/MCP_SERVER_RECOMMENDED-Modules.md
<<<<<<< .merge_file_2MaOgT
=======
=======
# MCP Server Consigliati per il Modulo Geo

## Scopo del Modulo
Gestione dati geografici, mappe e geolocalizzazione.

## Server MCP Consigliati
- `fetch`: Per recupero dati geografici da API esterne.
- `memory`: Per caching temporaneo di dati geospaziali.
- `filesystem`: Per gestione file geojson, shapefile, ecc.

## Configurazione Minima Esempio
```json
{
  "mcpServers": {
    "fetch": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-fetch"] },
    "memory": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-memory"] },
    "filesystem": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-filesystem"] }
  }
}
```

## Note
- Estendi la configurazione se il modulo gestisce analisi geospaziali avanzate.
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_3B9mDI
