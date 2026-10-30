---
title: "BMAD stories come fonte operativa"
type: story
status: in-progress
priority: high
tags: [bmad, stories, second-brain, swarm, coordination, governance]
qmd: "BMAD stories source of truth handoff coordination docs chat legacy archive"
related:
  - ../../bashscripts/ai/wiki/concepts/second-brain-operational-contract.md
  - ../../bashscripts/ai/wiki/concepts/architectural-invariants.md
  - ../../bashscripts/ai/wiki/concepts/agent-bootstrap-compact.md
---

# BMAD stories come fonte operativa

## Scopo

Come agente o maintainer, voglio che ogni task materiale, handoff, claim e risultato
viva nella BMAD story del relativo owner, così il lavoro è versionato, verificabile,
assegnabile e riprendibile senza ricostruire lo stato da una conversazione.

## Perché

`docs/chat/` era utile come diario append-only e bacheca veloce, ma separava contesto,
criteri di accettazione, ownership e verifica. La story BMAD unisce questi elementi:
descrive lo scopo, delimita i file, espone i criteri misurabili, registra il lavoro
degli agenti e chiude con prove reali. Questo riduce duplicati, collisioni e falsi
handoff; Second Brain indicizza la story invece di creare una seconda fonte.

## Regola operativa

- Story cross-project: `docs/stories/`.
- Story di modulo: `laravel/Modules/<Nome>/docs/bmad/stories/` oppure la cartella
  `docs/stories/` già adottata dal modulo.
- Story di tema: `laravel/Themes/<Nome>/docs/stories/`.
- Story di tooling trasversale: `bashscripts/docs/bmad/stories/`.
- `docs/chat/` resta read-only per la storia pregressa; non si creano nuovi handoff,
  claim o coordinamenti lì.

## Acceptance criteria

- [x] Bootstrap, Trigger Map e contratto Second Brain indicano la story come fonte
      operativa.
- [x] AGENTS.md vieta nuovi handoff operativi in `docs/chat/`.
- [ ] Le skill e gli script che scrivono nuovi handoff vengono aggiornati per creare
      o aggiornare la story owner.
- [ ] I riferimenti storici a `docs/chat/` sono marcati come legacy senza riscrivere
      la cronologia.
- [ ] La story contiene file scope, owner, criteri verificabili, comandi e risultato.

## Protocollo di esecuzione

1. Cercare una story esistente prima di crearne una nuova.
2. Dichiarare owner e file scope; usare lock per lane disgiunte.
3. Aggiornare Tasks, Dev Agent Record, File List e Change Log nella story.
4. Eseguire i gate proporzionati e riportare exit code e risultati.
5. Scrivere nel Second Brain solo conoscenza durevole; la story resta il registro
   operativo della modifica.

## Stato

La migrazione delle regole principali è iniziata. Restano da allineare gli script e
i documenti storici che propongono ancora `docs/chat/` per nuovi handoff.
