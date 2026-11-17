---
title: "Docs Goal Append-Only Rule"
type: rule
sources: ["user-directive-2026-05-20"]
confidence: high
created: 2026-05-20
updated: 2026-05-20
tags: [docs, goal, append-only, write-protection, directory-rules]
related:
  - rules/file-lock-workflow.md
  - rules/agent-conduct-rules.md
---

# Docs Goal Append-Only Rule

**REGOLA PERMANENTE (conferma utente 2026-05-20):** `docs/goal/` è una cartella **particolare** — si possono **solo aggiungere** documenti nuovi. Mai edit, delete o rename su file già presenti.

## Cosa Fare

- ✅ **CREARE** nuovi file `.md` in `docs/goal/`
- ✅ **AGGIUNGERE** contenuto a file nuovi che hai creato tu nella stessa sessione
- ✅ **LEGGERE** file esistenti per contesto

## Cosa NON Fare

- ❌ **MODIFICARE** file `.md` esistenti in `docs/goal/`
- ❌ **SOVRASCRIVERE** file esistenti con `write`
- ❌ **ELIMINARE** file da `docs/goal/`
- ❌ **RINOMINARE** file in `docs/goal/`

## Pattern Corretto

Se hai informazioni da aggiungere al goal del progetto:

1. Leggi i file esistenti in `docs/goal/` per contesto
2. Crea un **NUOVO** file con nome descrittivo:
   - `docs/goal/<argomento-specifico>.md`
   - Esempio: `docs/goal/architecture-laraxot.md`
   - Esempio: `docs/goal/module-mapping.md`
3. Il nuovo file può referenziare file esistenti con link relativi

## Perché

La cartella `docs/goal/` contiene documenti canonici che rappresentano la visione e gli obiettivi del progetto. Modificarli potrebbe:
- Perdere contesto storico
- Sovrascrivere decisioni prese
- Creare confusione tra versioni

L'approccio append-only preserva l'integrità storica e permette di costruire conoscenza incrementale.

## Anti-Pattern

- ❌ `write` su `docs/goal/PROJECT_GOAL.md` esistente
- ❌ `edit` su qualsiasi file in `docs/goal/`
- ❌ `rm` di file in `docs/goal/`

## Esempio Corretto

```bash
# ✅ CORRETTO - Crea nuovo file
touch docs/goal/performance-targets-2026.md
# Scrivi contenuto nel nuovo file

# ❌ SBAGLIATO - Modifica file esistente
edit docs/goal/PROJECT_GOAL.md
```

---

*Creato: 2026-05-20 — Direttiva utente*
