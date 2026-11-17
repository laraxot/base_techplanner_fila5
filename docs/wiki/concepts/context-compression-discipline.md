---
title: Context Compression Discipline
type: concept
tags: [context, mcp, context-mode, bmad, tool-hierarchy]
---

# Context Compression Discipline

## Problema: Context Rot

Il context window è una risorsa finita. Senza disciplina ogni sessione accumula:
- Raw tool output ripetuto
- Ragionamenti esplorativi abbandonati
- Log di bash grezzi

Questo degrada la qualità delle risposte ("context rot") e aumenta il costo per token.

## Soluzione: context-mode MCP

Il progetto usa **context-mode** by mksglu (plugin Claude Code + MCP `npx -y context-mode`, configurato anche in `laravel/.mcp.json`):

- SQLite FTS5 con BM25 ranking
- Subprocess sandbox isolato
- 98% riduzione tipica (315KB → 5.4KB)
- 10 language runtimes

## Gerarchia strumenti (obbligatoria)

```
1. ctx_batch_execute   ← ricerca/esplorazione multi-step
2. ctx_search          ← follow-up su dati indicizzati
3. ctx_execute_file    ← analisi file senza caricarli in context
4. Write / Edit        ← SEMPRE per file (mai ctx_execute per scrivere)
```

## Regole operative

| Cosa | Strumento corretto |
|------|--------------------|
| Bash output > 20 righe | `ctx_batch_execute` |
| Fetch URL esterna | `ctx_fetch_and_index` (non WebFetch) |
| Analizzare file grande | `ctx_execute_file` |
| Modificare file | `Edit` o `Write` nativi |
| Follow-up su ricerca precedente | `ctx_search` |

## BMAD Method

- Install/update: `npx bmad-method@latest install`
- 12+ agent specializzati (Analyst, Architect, Developer, SM, PO, …)
- Skills V6: invocabili da Claude Code
- `bmad-help` skill per assistenza

## Errore 131k token in bmad-create-story

Se una story BMAD fallisce con `maximum context length is 131072 tokens`, la correzione non e' aumentare l'output richiesto. Bisogna ridurre input e tool output:

1. usare QMD/context-mode per recuperare solo i documenti rilevanti;
2. evitare `rg`/tool output massivi non filtrati;
3. comprimere in una sintesi wiki riusabile;
4. rilanciare la story con link agli indici e snippet essenziali.

## Riferimenti

- Rule: `bashscripts/ai/.claude/rules/context-compression-discipline.md`
- Story: `8-40`
- context-mode plugin/repo: github.com/mksglu/claude-context-mode
- Context Mode article: https://mksg.lu/blog/context-mode
- Claude Code MCP docs: https://code.claude.com/docs/en/mcp
