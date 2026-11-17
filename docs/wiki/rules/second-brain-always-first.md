# Second Brain — Always First Rule

## REGOLA PERMANENTE: Il second brain va consultato PRIMA di qualsiasi azione

### Stack del second brain

Il "second brain" di questo progetto è composto da 4 layer integrati:

| Layer | Strumento | Quando usarlo |
|-------|-----------|---------------|
| **1. LLM Wiki** | `docs/wiki/` + wiki moduli/temi | SSoT per regole e pattern; aggiornare index/log |
| **2. QMD** | `mcp__plugin_qmd_qmd__search` | Prima ricerca — BM25 30ms, vector 2s, hybrid 10s |
| **3. context-mode** | `ctx_batch_execute` / `ctx_search` | Multi-step research; riduzione context 98% |
| **4. claude memory** | `~/.claude/projects/.../memory/` | Feedback, reference, project state tra sessioni |

### Vincolo assoluto

```
OBBLIGATORIO: consultare second brain PRIMA di:
  - rispondere a domande architetturali
  - modificare codice
  - creare nuovi file o componenti
  - rispondere su quale file gestisce una URL

OBBLIGATORIO: aggiornare second brain DOPO aver appreso qualcosa di nuovo:
  - scrivere in wiki/concepts/<topic>.md
  - aggiornare wiki/index.md
  - appendere wiki/log.md
  - salvare in memory/ se utile tra sessioni

VIETATO:
  - rispondere senza cercare nel second brain su temi tecnici noti
  - lasciare conoscenza solo in chat
  - creare documenti scollegati dall'indice
  - duplicare regole (una regola = una fonte canonica)
```

### Come cercare

```bash
# QMD — ricerca veloce (preferita)
qmd search "wizard filament" -c mod-fixcity
qmd vsearch "come funziona il picker coordinate"
qmd query "architettura moduli"    # hybrid+reranking, qualità massima

# context-mode — quando serve analisi multi-step
ctx_batch_execute([{label, command}], queries=[...])
ctx_search(queries=["q1","q2"])

# MCP QMD plugin
mcp__plugin_qmd_qmd__search(query="...", collection="mod-geo")
```

### Dove scrivere

```
Regola trasversale (cross-modulo):
  → docs/wiki/concepts/<topic>.md + aggiorna docs/wiki/index.md + docs/wiki/log.md

Regola modulo-specifica:
  → laravel/Modules/<Name>/docs/wiki/concepts/<topic>.md + aggiorna quel index.md

Feedback permanente AI (tra sessioni):
  → memory/feedback_<topic>.md + riga in memory/MEMORY.md
```

### Documentazione

- Modello canonico: `docs/wiki/concepts/second-brain-canonical-operating-model.md`
- Pattern Karpathy: `docs/wiki/concepts/second-brain-llm-wiki-pattern.md`
- Disciplina operativa: `bashscripts/ai/.claude/rules/llm-wiki-operational-discipline.md`
- Memory unificata: `~/.claude/projects/.../memory/second_brain_complete_stack.md`
