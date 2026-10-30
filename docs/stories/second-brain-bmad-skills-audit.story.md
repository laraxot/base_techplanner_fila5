---
title: "Second Brain, BMAD e coordinamento persistente"
type: story
status: in_progress
scope: root
created: 2026-10-30
updated: 2026-10-30
qmd: "second brain bmad story handoff multi-agent coordination docs chat"
tags: [bmad, second-brain, coordination, handoff]
issues: []
discussions: []
---

# Story: Second Brain, BMAD e coordinamento persistente

## User story

Come agente che lavora in swarm, voglio usare una BMAD story come registro
persistente del task, così scope, decisioni, blocker, handoff ed evidenze restano
vicini al codice e non dipendono da una bacheca volatile.

## Decisione

La story BMAD canonica dell'owner sostituisce `docs/chat/` per il coordinamento
attivo. `docs/chat/` resta consultabile per la storia del progetto, ma non è più
la fonte di verità per claim, handoff o stato corrente.

## Perché

- la story segue l'owner git del codice e può essere riusata insieme al modulo o tema;
- acceptance criteria e Definition of Done rendono il lavoro verificabile;
- gli agenti paralleli aggiornano un artefatto unico, riducendo collisioni e duplicati;
- QMD/second brain indicizza una decisione strutturata invece di messaggi sparsi;
- lock, test e output dei quality gate diventano evidenze riproducibili.

## Acceptance criteria

- [x] AGENTS.md indica la story BMAD come artefatto canonico multi-agente.
- [x] Il bootstrap indirizza la story owner invece di `docs/chat`.
- [x] Il template BMAD descrive handoff, blocker ed evidenze nella story.
- [x] La convenzione degli scope documenta il nuovo flusso.
- [ ] Gli indici e le regole operative residue vengono migrati senza riscrivere lo storico.

## Definition of Done

PHPStan/Pest restano verdi per il codice toccato; la story contiene stato finale,
file coinvolti, decisioni e comandi di verifica. Nessun commit automatico.
