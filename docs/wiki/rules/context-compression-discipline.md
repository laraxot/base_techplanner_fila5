# Context Compression Discipline

## REGOLA PERMANENTE: Gestione context window — context-mode MCP

### Vincoli assoluti

```
VIETATO: usare Bash per comandi con output > 20 righe (usa ctx_batch_execute)
VIETATO: usare WebFetch (usa ctx_fetch_and_index)
VIETATO: usare Read per analisi (usa ctx_execute_file) — Read è solo per file che devi poi Edit
VIETATO: scrivere file con ctx_execute o ctx_execute_file (usa sempre Write/Edit nativi)
OBBLIGATORIO: ctx_batch_execute come PRIMO strumento per ricerche multi-step
OBBLIGATORIO: ctx_search per follow-up su dati già indicizzati
```

### Gerarchia strumenti

```
1. GATHER  → ctx_batch_execute(commands, queries)   ← ricerche multi-step, una sola call
2. SEARCH  → ctx_search(queries: [...])              ← follow-up su FTS5 indicizzato
3. PROCESS → ctx_execute(language, code)             ← analisi, log, calcoli
4. FILES   → Write / Edit nativi                     ← SEMPRE per creare/modificare file
```

### context-mode MCP

- SQLite FTS5 + BM25 ranking, subprocess sandbox isolato
- 98% riduzione context (315KB → 5.4KB tipico)
- 10 language runtimes: Python, JS, Bash, PHP, Go, Rust, SQL, Ruby, R, Julia
- Knowledge base persiste tra sessioni (anche dopo /clear o /compact)
- Verifica 2026-04-22: plugin `context-mode@context-mode` v1.0.89 enabled e MCP diretto `npx -y context-mode` connesso.

### Comandi operativi

| Comando utente | Azione |
|---------------|--------|
| `ctx stats` | Mostra saving % e token count |
| `ctx doctor` | Diagnostica setup |
| `ctx purge` | Reset knowledge base (irreversibile, chiedere conferma) |
| `ctx upgrade` | Aggiorna context-mode |

### Automatic Context Compaction (Anthropic SDK)

- Claude Code supporta compaction automatica quando il context si avvicina al limite
- Dopo compaction: knowledge base context-mode viene preservata
- Informare l'utente: "context-mode knowledge base preserved. Use `ctx purge` if you want to start fresh."

### BMAD Method

```
OBBLIGATORIO: verificare se uno skill BMAD esiste prima di fare manualmente un task BMAD
OBBLIGATORIO: usare npx bmad-method@latest install per installare/aggiornare
```

### Errore BMAD 131072 tokens

Se `/bmad-create-story` fallisce per context length:
- NON rilanciare lo stesso prompt massivo.
- Usare QMD/context-mode per recuperare solo documenti pertinenti.
- Scrivere sintesi in LLM Wiki.
- Rilanciare con link wiki + snippet minimi.

### Documentazione

- `docs/wiki/concepts/context-compression-discipline.md` — wiki entry
- Story: `8-40`
