# Second Brain LLM Wiki Pattern

## Verified sources

- Karpathy Wiki guide: `https://karpathy-wiki.lol/en`
- LLM Wiki directory overview: `https://aillm.wiki/`
- Reference implementation example: `https://github.com/Pratiyush/llm-wiki`
- Background article on the pattern: `https://wegetit.dev/library/second-brain-llm-knowledge-base-pattern`

## Definition

Nel contesto di questo progetto, "second brain" non significa una raccolta informale di note.
Significa una **knowledge base persistente, compilata e cross-referenziata** che cresce ad ogni ricerca, fix, audit o decisione architetturale.

Il pattern corretto e' quello `LLM Wiki`:

- `raw/` conserva le fonti
- `wiki/` conserva la conoscenza sintetizzata e manutenuta
- `index.md` rende navigabile il corpus
- `log.md` registra l'evoluzione operativa

## Why this project already fits the pattern

`base_fixcity_fila5` adotta gia' il pattern nei suoi layer:

- root: `docs/`
- moduli: `laravel/Modules/*/docs/`
- temi: `laravel/Themes/*/docs/`
- automazione e agenti: `bashscripts/docs/` e `.agents/docs/`

Quindi il lavoro corretto non e' "creare un secondo sistema", ma **rafforzare quello esistente come second brain operativo**.

## Core shift

Il punto chiave del second brain LLM-style e':

- RAG classico: recupera frammenti raw a ogni domanda
- second brain wiki: accumula risposte gia' sintetizzate in artefatti persistenti

Questo riduce:

- ripetizione di analisi
- drift tra fix fatti e fix ricordati
- perdita di decisioni tecniche nel tempo

## Best practices

- trattare `docs/wiki/` come artifact operativo, non come appendice opzionale
- aggiornare sempre `index.md` e `log.md` quando nasce una regola riusabile
- separare fonti raw da sintesi compilate
- usare pagine piccole e altamente linkate
- scrivere decisioni in ottica DRY/KISS/Clean Code, non solo in ottica “cronaca”
- collegare root -> modulo -> tema per evitare conoscenza isolata

## Bad practices

- lasciare la conoscenza solo in chat o nella memoria del singolo agente
- creare documenti grandi non indicizzati e senza backlink
- duplicare la stessa regola in piu' posti con formulazioni divergenti
- usare il wiki come dump di output grezzo
- confondere documentazione utente, reference raw e decisioni operative

## False friends

- "second brain = vault di note": falso, qui e' una knowledge base compilata
- "basta il search": falso, la ricerca senza sintesi non accumula conoscenza
- "basta la memory dell'agente": falso, la memory aiuta ma non sostituisce il corpus versionato
- "wiki = documentazione finale": falso, e' anche strumento operativo per lavoro futuro

## Project rule

Quando emerge conoscenza riusabile:

1. fonte o evidenza in raw / codice / runtime
2. sintesi in `wiki/concepts|entities|...`
3. aggiornamento `index.md`
4. append in `log.md`
5. ingest nel motore locale (`qmd update`, e se serve `qmd embed`)

## Where to go deeper

- Karpathy Wiki: `https://karpathy-wiki.lol/en`
- LLM Wiki directory: `https://aillm.wiki/`
- Example implementation: `https://github.com/Pratiyush/llm-wiki`
