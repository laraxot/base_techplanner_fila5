---
title: "mcp server recommended"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "mcp server recommended"
issues: []
discussions: []
status: draft
---

# MCP Server Consigliati per il Modulo Gdpr

## Scopo del Modulo
Gestione privacy, consensi e compliance GDPR.

## Server MCP Consigliati
- `filesystem`: Per archiviazione consensi e log privacy.
- `memory`: Per gestione temporanea delle sessioni di consenso.

## Configurazione Minima Esempio
```json
{
  "mcpServers": {
    "filesystem": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-filesystem"] },
    "memory": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-memory"] }
  }
}
```

## Note
<<<<<<< .merge_file_NCnnl9
- Adatta la configurazione a seconda dei requisiti di compliance e audit.
=======
<<<<<<< HEAD
- Adatta la configurazione a seconda dei requisiti di compliance e audit.
=======
- Adatta la configurazione a seconda dei requisiti di compliance e audit.
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_NQapIS
