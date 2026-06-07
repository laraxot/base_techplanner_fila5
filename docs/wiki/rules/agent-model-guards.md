---
title: "agent-model-guards — limiti contesto e reasoning Cursor"
type: rule
confidence: high
created: 2026-05-13
updated: 2026-05-21
tags: [agents, tokens, reasoning, cursor, output-limit, context]
related:
  - ../concepts/context-overflow-prevention.md
  - ../concepts/context-memory-compaction-rule.md
  - agent-conduct-rules.md
---

# Agent model guards

Regole corte per evitare **overflow di contesto** e l’errore Cursor tipo: *«The model hit its output limit while reasoning and produced no actionable output…»*.

## Cosa significa (cause)

Il modello ha speso quasi tutto il **budget token di output** (o round trip) nella fase interna **reasoning / extended thinking**, quindi nella risposta visibile arriva **poco o nulla** di utilizzabile. Non è un bug del progetto Laravel: è **configurazione modello + dimensione prompt** in Cursor.

## Fix lato Cursor (priorità)

1. **Spegni il reasoning quando non serve**
   - `Ctrl+,` / `Cmd+,` → cerca nei settings **Thinking**, **Reasoning**, **extended thinking** (le etichette cambiano tra versioni).
   - Scelta modello: preferire varianti **senza** reasoning per compiti lunghi tipo agent o refactor massiccio.

2. **Aumenta il limite output** (se l’IDE lo espone per quel modello)
   - Preferenze modello/agent legate alla sessione → alza **max output** / **thinking budget** dove presente.

3. **Nuova chat + briefing minimo**
   - Apri nuova conversazione con ≤10 righe di obiettivo, meno `@` enormi (vedi [`.cursor/rules/cursor-context-discipline.mdc`](../../../.cursor/rules/cursor-context-discipline.mdc)).

4. **`settings.json` (opzionale, versione‑dipendente)**
   - Command Palette → “Open User Settings (JSON)” e cercare chiavi con `thinking`; **non assumere** una chiave fissa tra versioni Cursor.

## Fix lato agente / repo (disciplina)

- Esegui `bashscripts/ai/guard_overflow.sh <file>` prima di inoltrare file utente molto grandi.
- Usa QMD/on-demand (`qmd --limit N`); mai caricare intere wiki in un singolo messaggio.
- In caso di compaction/overflow vendor: fermarsi, checkpoint in [`docs/chat/INDEX.md`](../../chat/INDEX.md), poi riprendere con contesto ridotto.

Riferimenti tecnici: `bashscripts/ai/guard_overflow.sh`, [`agent-conduct-rules.md`](agent-conduct-rules.md).
