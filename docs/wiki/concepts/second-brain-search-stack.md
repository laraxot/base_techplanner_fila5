---
title: "Second brain — stack di ricerca (QMD vs Redis vs Elasticsearch)"
type: concept
tags: [second-brain, qmd, redis, elasticsearch, search, llm-wiki]
created: 2026-06-05
updated: 2026-06-05
qmd: "second brain search stack qmd redis elasticsearch bm25 embed cache hybrid when to add"
related:
  - second-brain-llm-wiki-pattern.md
  - llm-wiki-qmd-project-system.md
  - qmd-cache-outside-project.md
  - ../skills/cursor-second-brain-max-workflow.md
---

# Second brain — stack di ricerca

## Stato attuale (Fixcity)

| Componente | Ruolo |
|------------|-------|
| File `docs/wiki/` | SSoT leggibile (git, Obsidian, agenti) |
| QMD + BM25 | Ricerca lessicale su ~14k+ `.md` |
| Embed opzionale | Similarità semantica in `${HOME}/.cache/qmd-cache/` |
| Trigger map | Caricamento on-demand, no dump contesto |
| `llm-wiki-qmd.sh update` | Re-index dopo sweep docs |

Il second brain **non** è un database applicativo: è wiki versionata + indice locale QMD.

## Redis — quando ha senso

**Non sostituisce QMD.** Utile come **layer operativo** se già in stack Laravel (`predis/predis` presente):

| Use case | Beneficio |
|----------|-----------|
| Cache risultati `qmd search` (TTL breve) | Meno I/O su re-index frequenti |
| Lock distribuiti agenti (`file.ext.lock` → Redis) | Multi-sessione / CI parallela |
| Stato sessione agente (ultimi path wiki letti) | Resume chat senza rileggere file |
| Rate limit MCP / API esterne | Protezione quota |

**Quando saltare:** singolo dev, cache file QMD già veloce, nessun cluster Redis gestito.

**KISS:** introdurre Redis solo se misuri latenza ripetuta su stesse query QMD o conflitti lock multi-agente.

## Elasticsearch — quando ha senso

**Overlap alto con QMD.** Elasticsearch eccelle su:

- Full-text su volumi molto grandi (50k+ doc, multi-repo aggregati)
- Fuzzy, facet, highlight, ranking custom, pipeline ingest centralizzata
- Search prodotto per utenti umani (portale docs, non solo agenti)

**Costi:**

- Cluster da operare (mapping, sync, monitoring)
- Pipeline sync wiki → ES a ogni commit docs
- Duplicazione indice rispetto a QMD senza guadagno finché BM25+embed bastano

**KISS:** **no Elasticsearch ora** per Fixcity. Valutare solo se:

1. QMD non scala (query >2s, corpus >50k file, team distribuito)
2. Serve UI search pubblica con facet/filtri
3. Budget ops dedicato (non «side project»)

## Raccomandazione (2026-06-05)

```
Priorità 1: QMD forte (update dopo sweep, embed batch, trigger map, dedup wiki)
Priorità 2: Redis opzionale — solo cache query + lock, se già in infra
Priorità 3: Elasticsearch — rimandare fino a pain misurato
```

## Matrice decisionale

| Domanda | QMD | Redis | Elasticsearch |
|---------|-----|-------|-----------------|
| Agenti trovano regole wiki? | ✅ primario | cache | overkill |
| Memoria versionata in git? | ✅ (file) | no | no |
| Sub-second su 14k md? | ✅ | — | ✅ ma costoso |
| Multi-agent lock/cache? | file lock | ✅ | no |
| Search portale utenti? | debole | no | ✅ |

## Azioni concrete (senza nuova infra)

1. `bash bashscripts/docs/llm-wiki-qmd.sh update` dopo ogni sweep docs
2. `qmd embed` periodico se si usano query semantiche
3. Frontmatter `qmd:` su ogni pagina wiki nuova
4. `00-TRIGGER_MAP.md` aggiornato per routing agenti

## Collegamenti

- [llm-wiki-qmd-project-system.md](./llm-wiki-qmd-project-system.md)
- [qmd-cache-outside-project.md](./qmd-cache-outside-project.md)
- [second-brain-llm-wiki-pattern.md](./second-brain-llm-wiki-pattern.md)
- Moduli/temi: `second-brain-local-discipline.md` in ciascun owner
