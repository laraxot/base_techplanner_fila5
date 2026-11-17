---
title: "Audit BMAD — Job"
type: audit
status: review
updated: 2026-11-16
module: Job
qmd: "audit BMAD Job source-first qualità"
---

# Audit BMAD — Job

SSoT dettagliata: [audits/job-audit.md](./audits/job-audit.md)

## Sintesi (2026-11-16)

| Metrica | Valore |
|---|---:|
| PHP `app/` | 176 |
| Test | 84 |
| Resources | 9 |
| Actions | 16 |
| Services | 1 |
| Policy `return true` | 5 |
| Marker | 0 |

## Lo scopo in una frase **Job rende visibile e governabile tutto cio' che accade fuori dalla richiesta HTTP: code, importazioni, esportazioni, lavori pianificati — e soprattutto i loro

## Gate

- PHPStan modulo / `Modules`: 0 errori (verifica 2026-11-16).
- Pest: da eseguire in ambiente testing non produttivo.
- Security/runtime: story figlie su finding P0/P1 dell'audit dettagliato.
