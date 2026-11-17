---
title: "Second Brain Usage Gaps and Improvements"
type: concept
sources: ["session-audit-2026-05-20"]
confidence: high
created: 2026-05-20
updated: 2026-05-20
tags: [second-brain, qmd, workflow, improvement, audit]
related:
  - concepts/second-brain-canonical-operating-model.md
  - concepts/second-brain-always-on-rule.md
  - concepts/llm-wiki-operational-discipline.md
  - rules/00-TRIGGER_MAP.md
---

# Second Brain Usage Gaps and Improvements

Audit eseguito il 2026-05-20 per identificare le discrepanze tra il modello operativo canonico del second brain e il comportamento effettivo dell'agente.

## Gap Critici (Correzione Immediata)

### 1. QMD-First Discipline

**Gap**: L'agente usa `Read`/`Grep` diretto per cercare nel wiki invece di usare QMD come primo strumento di ricerca.

**Perché è un problema**:
- QMD ha indicizzato 14,349 file — Read/Grep non scala su questo corpus
- QMD fornisce contesto semantico, non solo match testuali
- Il trigger map punta esplicitamente a `qmd search` come canonical search tool

**Fix**: Prima di ogni risposta architetturale o decisione tecnica:
```bash
qmd search "<topic>" --limit 5
# Leggi i risultati → rispondi con citazioni esplicite delle pagine wiki
```

### 2. Dual Writing Pattern

**Gap**: Le regole stabili vengono scritte solo in `memory/` oppure solo in chat, non in entrambi i layer canonici.

**Perché è un problema**:
- `memory/` = feedback immediato per l'agente corrente
- `docs/wiki/concepts/` = conoscenza persistente cross-sessione e cross-agente
- Senza dual writing, la conoscenza non compila nel wiki versionato

**Fix**: Ogni regola stabile → DUE scritture:
1. `memory/feedback_<topic>.md` (agente locale)
2. `docs/wiki/concepts/<topic>.md` (wiki persistente)
3. Cross-link bidirezionale tra i due file

### 3. Log Discipline

**Gap**: `docs/wiki/log.md` non viene aggiornato sistematicamente dopo le decisioni.

**Perché è un problema**:
- log.md è l'append-only record dell'evoluzione operativa
- Senza log, non c'è tracciabilità delle decisioni nel tempo
- `qmd update` si basa su log.md per capire cosa è cambiato

**Fix**: Dopo ogni decisione stabile:
```markdown
## [2026-05-20] decision | <titolo decisione>
- Decisione: <descrizione>
- File modificati: <lista>
- Commit: <hash se applicabile>
```

### 4. Chat Board Discipline

**Gap**: `docs/chat/INDEX.md` non viene letto prima di lavoro non banale.

**Perché è un problema**:
- docs/chat/ è la bacheca di coordinamento multi-agente
- Senza leggerlo, si rischia di duplicare lavoro o ignorare blocker
- Le regole di condotta agenti lo richiedono esplicitamente

**Fix**: Prima di task non banali:
1. Leggi `docs/chat/INDEX.md`
2. Aggiungi nota di inizio lavoro se prendi in carico qualcosa
3. Aggiorna blocker/progressi durante il lavoro
4. Lascia riepilogo finale al completamento

### 5. Index Freshness

**Gap**: QMD index ha 9 giorni di ritardo — `qmd update` non eseguito dopo cambiamenti wiki.

**Perché è un problema**:
- 11,159 documenti pending embedding
- QMD search restituisce risultati stale
- La conoscenza nuova non è ricercabile semanticamente

**Fix**: Dopo ogni sessione di wiki writing:
```bash
bashscripts/docs/llm-wiki-qmd.sh update
```

### 6. Context Mode Usage

**Gap**: Uso di `Bash`/`Grep` invece di `ctx_batch_execute` per ricerche multi-step.

**Perché è un problema**:
- Bash/Grep è proibito per output >20 linee (vedi feedback_context_compression.md)
- ctx_batch_execute è ottimizzato per ricerche parallele nel corpus
- Bash bypassa il context management intelligente

**Fix**: Per ricerche multi-step:
```
ctx_batch_execute([
  {"tool": "qmd", "query": "topic A"},
  {"tool": "qmd", "query": "topic B"},
])
```

## Gap Strutturali (Miglioramento Progressivo)

### 7. Memory → Wiki Cross-Link

I file in `memory/` (es. `feedback_gsd_reminder.md`, `feedback_widget_pattern.md`) non contengono link alle pagine wiki canoniche corrispondenti. Ogni file memory dovrebbe avere:
```markdown
## Canonical Reference
- Wiki: [docs/wiki/concepts/<topic>.md](../docs/wiki/concepts/<topic>.md)
- Trigger: [rules/00-TRIGGER_MAP.md](../docs/wiki/rules/00-TRIGGER_MAP.md#<section>)
```

### 8. Module Wiki Sync

I wiki dei moduli (`laravel/Modules/*/docs/wiki/`) non sono sempre allineati con il root wiki. Le regole trasversali dovrebbero:
- Vivere nel root wiki
- Essere linkate dai module wiki (non duplicate)
- Essere referenziate nel trigger map con scope modulo

### 9. Trigger Map Completeness

Nuove regole non vengono sempre aggiunte al trigger map. Ogni nuova regola dovrebbe:
1. Essere aggiunta a `docs/wiki/rules/00-TRIGGER_MAP.md` nella sezione corretta
2. Avere un trigger chiaro e ricercabile
3. Essere testata con `qmd search "<trigger>"` per verificare la discoverability

### 10. Embedding Pending

11,159 documenti hanno embedding pending. Questo limita la ricerca semantica a solo keyword search (BM25).

**Fix**:
```bash
qmd embed  # Richiede GPU o tempo significativo su CPU
# Oppure: bashscripts/docs/llm-wiki-qmd.sh embed (se configurato)
```

## Checklist Operativa Post-Sessione

Ogni sessione di lavoro dovrebbe terminare con:

- [ ] Decisioni stabili scritte in `memory/` E `docs/wiki/concepts/`
- [ ] Cross-link bidirezionale tra memory e wiki
- [ ] `docs/wiki/log.md` aggiornato
- [ ] `docs/chat/INDEX.md` aggiornato con riepilogo
- [ ] `qmd update` eseguito se >10 pagine wiki modificate
- [ ] Trigger map aggiornato se nuove regole aggiunte

## Metriche di Successo

| Metrica | Attuale | Target |
|---------|---------|--------|
| QMD search usato prima di rispondere | ~20% | 100% |
| Dual writing (memory + wiki) | ~30% | 100% |
| Log.md aggiornato per sessione | ~40% | 100% |
| Chat board letto prima di lavoro | ~50% | 100% |
| QMD index freshness | 9 giorni | <1 giorno |
| Embedding completati | 0 / 14,349 | 100% |

---

*Audit eseguito: 2026-05-20 16:43 GMT+2*
*Prossimo audit: dopo 5 sessioni di lavoro o 2026-05-27*
