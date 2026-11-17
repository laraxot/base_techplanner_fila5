---
title: "Second brain — valutazione Redis ed Elasticsearch"
type: concept
tags: [second-brain, qmd, redis, elasticsearch, search, llm-wiki, architecture]
created: 2026-06-05
updated: 2026-06-05
qmd: "second brain redis elasticsearch qmd search stack evaluation llm wiki retrieval"
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/281"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/273"
related:
  - ../memories/llm-wiki-second-brain.md
  - ../../project/qmd-local-docs-search.md
  - ../concepts/agent-bootstrap-compact.md
---

# Second brain — valutazione Redis ed Elasticsearch

## Stato attuale (FixCity)

| Layer | Tool | Ruolo |
|-------|------|-------|
| Memoria compilata | `docs/wiki/` | Decisioni, religioni, link (Zettelkasten) |
| Retrieval | **QMD** (SQLite FTS5 + embedding locali) | «In quale file c'è X?» |
| Cache indice | `~/.cache/qmd-cache/` | Indice locale, fuori repo |
| Agent context | `ctx_*` / context-mode | Sessione, non persistente |

QMD copre già BM25 + vettoriale + rerank locale — vedi [qmd-local-docs-search.md](../../project/qmd-local-docs-search.md).

## Redis — quando ha senso

**Sì (layer cache/queue), no (sostituto del second brain).**

| Uso Redis | Beneficio | Priorità FixCity |
|-----------|-----------|------------------|
| Cache risultati `qmd search` ripetuti | Meno latenza ingest/search in CI multi-agent | Media |
| Pub/sub invalidazione indice dopo `llm-wiki-qmd.sh update` | Agenti paralleli vedono indice fresco | Bassa (pochi agenti locali) |
| Session store Laravel | Runtime app, non wiki | Già opzionale infra |
| Rate limit / dedup query agente | Anti-spam tool MCP | Bassa |

**Non usare Redis come** store primario delle note wiki: perde atomicità git, diff, Obsidian, frontmatter GitHub.

## Elasticsearch — quando ha senso

**Sì solo a scala corpora >> corpus FixCity attuale.**

| Criterio | QMD (oggi) | Elasticsearch |
|----------|------------|---------------|
| Corpus | ~Migliaia file `.md` repo | >100k doc / multi-repo federato |
| Ops | Zero daemon, SQLite file | Cluster, mapping, reindex |
| Privacy | 100% locale | Richiede hardening se cloud |
| Semantic | Embedding locali GGUF | ES dense_vector + modello |
| «Cosa abbiamo deciso?» | Wiki + link | Ancora serve wiki compilato |

Elasticsearch **non sostituisce** `docs/wiki/`: risolve retrieval grezzo su log/PR/issue enormi, non la sintesi atomica con backlink.

## Raccomandazione architetturale (KISS)

```
1. Wiki git (SSoT)     → decisioni, ADR, memorie
2. QMD update          → retrieval file-level
3. (Opz.) Redis cache  → solo se latenza search diventa bottleneck misurato
4. Elasticsearch       → rimandare finché QMD + ingest non saturano
```

### Se si aggiunge Redis (fase 2)

- Chiave: `qmd:search:{hash(query)}:{collection}` TTL 300s
- Invalidazione: `DEL qmd:search:*` dopo `bashscripts/docs/llm-wiki-qmd.sh update`
- Non indicizzare markdown in Redis — solo risultati query

### Se si aggiunge Elasticsearch (fase 3+)

- Indicizzare: `docs/wiki/`, `Modules/*/docs/wiki/`, `Themes/*/docs/wiki/` (campi: title, qmd, tags, body)
- Mantenere QMD per dev locale; ES per dashboard team / search cross-subtree
- Pipeline: git commit → webhook → ingest ES (non sostituire `llm-wiki-qmd.sh` in dev)

## Verdetto

| Tecnologia | Per second brain FixCity oggi |
|------------|-------------------------------|
| **QMD** | ✅ SSoT retrieval — potenziare ingest e frontmatter `qmd` |
| **Redis** | ⚠️ Opzionale — cache query, non memoria |
| **Elasticsearch** | ❌ Prematuro — costo ops > beneficio finché corpus resta repo-scoped |

Priorità immediate: `llm-wiki-qmd.sh update` dopo ogni batch docs, frontmatter completo, `verify-llm-wiki.sh`.

## Backlink

- [llm-wiki-second-brain.md](../memories/llm-wiki-second-brain.md)
- [agent-bootstrap-compact.md](./agent-bootstrap-compact.md)
- [qmd-local-docs-search.md](../../project/qmd-local-docs-search.md)
