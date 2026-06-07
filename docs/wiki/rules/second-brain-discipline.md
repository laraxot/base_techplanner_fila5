# Second Brain — Operational Discipline

REGOLA: consultare il second brain PRIMA di rispondere su architettura o modificare codice. Aggiornarlo DOPO aver appreso qualcosa.

## Stack (4 layer)

| Layer | Strumento | Uso |
|-------|-----------|-----|
| 1 LLM Wiki | `docs/wiki/`, `Modules/*/docs/wiki/`, `Themes/*/docs/wiki/` | SSoT regole e pattern |
| 2 QMD | `mcp__plugin_qmd_qmd__search` o `qmd search/vsearch/query` | Ricerca BM25/vector/hybrid (14k+ doc) |
| 3 context-mode | `ctx_batch_execute` / `ctx_search` | Multi-step research, 98% riduzione context |
| 4 Claude memory | `~/.claude/projects/.../memory/` | Feedback, reference, state cross-sessione |

## Vincoli

- OBBLIGATORIO cercare nel second brain PRIMA di rispondere, modificare, creare componenti, rispondere su quale file gestisce una URL
- OBBLIGATORIO aggiornare DOPO l'apprendimento: scrivi `wiki/concepts/<topic>.md`, aggiorna `wiki/index.md`, appendi `wiki/log.md`, salva in `memory/` se utile tra sessioni
- VIETATO rispondere senza cercare su temi tecnici noti
- VIETATO duplicare regole (una regola = una fonte canonica)
- VIETATO documenti scollegati dall'indice

## Pattern Karpathy

```
docs/          = raw immutable
docs/wiki/     = LLM-owned (concepts, entities, summaries, comparisons, overviews)
  index.md     = obbligatorio
  log.md       = obbligatorio
```

Owner: root `docs/`, ogni `laravel/Modules/<X>/docs/`, ogni `laravel/Themes/<X>/docs/`, `bashscripts/docs/`.

## Comandi

```bash
qmd search "topic" -c <collection>       # BM25 30ms
qmd vsearch "domanda" -c <collection>    # vector 2s
qmd query "..."                          # hybrid+rerank
```

Ref: `docs/wiki/concepts/second-brain-canonical-operating-model.md` · `second-brain-llm-wiki-pattern.md`
