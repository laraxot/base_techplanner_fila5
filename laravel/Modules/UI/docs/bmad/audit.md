---
title: "Audit BMAD — UI"
type: audit
status: review
updated: 2026-11-16
module: UI
qmd: "audit BMAD UI source-first qualità"
---

# Audit BMAD — UI

SSoT dettagliata: [audits/ui-audit.md](./audits/ui-audit.md)

## Sintesi (2026-11-16)

| Metrica | Valore |
|---|---:|
| PHP `app/` | 133 |
| Test | 87 |
| Resources | 0 |
| Actions | 6 |
| Services | 5 |
| Policy `return true` | 2 |
| Marker | 0 |

## Lo scopo in una frase **UI e' il vocabolario visivo condiviso: fa si' che la stessa cosa abbia lo stesso aspetto e lo stesso comportamento in tutti i moduli, senza che nessuno debba

## Gate

- PHPStan modulo / `Modules`: 0 errori (verifica 2026-11-16).
- Pest: da eseguire in ambiente testing non produttivo.
- Security/runtime: story figlie su finding P0/P1 dell'audit dettagliato.
