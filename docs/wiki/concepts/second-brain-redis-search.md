---
title: "Second Brain Search with Redis Search (RediSearch)"
type: concept
tags: [second-brain, redis-search, caching, ingestion, filo-front]
created: 2026-06-06
updated: 2026-06-06
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/295"
discussions: []
related:
  - second-brain-search-stack.md
  - ../../bashscripts/tools/scripts/ingest-to-redis-search.sh
---

# Redis Search Integration for Second Brain

## Architecture

```
docs/wiki/  ← QMD (SSoT) ← Redis Search (CACHE + FAST SEARCH)
               ↑              ↑
               │              └─ Ingest Script
               └─ qmd search "query" — canonical retrieval
```

## Flow

```bash
# 1. Ingest QMD docs into Redis
./bashscripts/tools/scripts/ingest-to-redis-search.sh

# 2. Search
redis-cli FT.SEARCH idx.docs "@body:$1" LIMIT 0 10
```

## Index Schema

```redis
FT.CREATE idx.docs
PREFIX 1 docs:
SCHEMA
  title TEXT WEIGHT 5.0 SORTABLE
  body TEXT WEIGHT 2.0
  tags TAG SEPARATOR ,
  type TAG
  path TEXT SORTABLE
```

## Implementation

### 1. Script di ingestione (ingest-to-redis-search.sh)
```bash
#!/usr/bin/env bash
# Find all .md under docs/wiki/
# Extract YAML frontmatter fields (title, tags, type)
# Push to Redis Hash + index
```

### 2. Cache Strategy
- TTL: 24h per Hash, 7d per indice
- Lock file `.lock` per evitare ingestioni concorrenti

### 3. TTL Reasoning
| Layer | TTL | Rationale |
|-------|-----|-----------|
| Redis key | 24h | Docs cambino, ma non ogni minuto |
| Redis index | 7d | Costruzione dell'indice is expensive |

## Commands

```bash
# Test Redis connection
redis-cli PING

# Flush index (dev only)
redis-cli FLUSHDB

# View schema
redis-cli FT.INFO idx.docs
```

## Future Elasticsearch

Elasticsearch on hold:
- Corpus attuale: <20k doc
- Facceting non richiesto
- QMD + Redis sufficienti per 6 mesi

Quando superiamo 50k doc o richiediamo analytics → aggiungere ES.

---

*Redis Search layer — Redis is cache, QMD is SSoT*