# Pre-Edit Docs-First (CRITICAL — workflow obbligatorio)

## Regola

**La prima azione prima di modificare qualsiasi file e' studiare, aggiornare e migliorare le cartelle `docs/`.**

NON si tocca codice finche' le docs non sono studiate e aggiornate.

## Ordine obbligatorio

1. Studia le docs del modulo/tema impattato (`00-index.md`, `rules-index.md`)
2. Aggiorna e migliora le docs rilevanti:
   - `laravel/Modules/{Nome}/docs/` (modulo impattato)
   - `laravel/Themes/{Nome}/docs/` (tema impattato)
   - `docs/rules/`, `docs/memory/`, `docs/skills/` (globale)
3. Valuta se creare GitHub issue e/o GitHub discussion:
   - Issue: bug confermato, task tecnico, regression
   - Discussion: decisione architetturale, proposta feature, analisi
4. Solo dopo: leggi il file e modifica il codice

## Violazioni comuni

- Leggere il file e modificarlo direttamente senza passare per i docs
- Saltare l'aggiornamento docs "perche' e' una modifica piccola"
- Non valutare GitHub issue/discussion dopo docs update

## Riferimenti

- Skill: `docs/skills/pre-edit-docs-first-skill.md`
- Memory: `docs/memory/pre-edit-docs-first-memory.md`
- Memory personale Claude: sezione "0. PRIMA DI MODIFICARE QUALSIASI FILE" in MEMORY.md
