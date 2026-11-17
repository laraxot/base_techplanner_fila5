---
title: "Agent Chat Directory"
type: rule
confidence: high
created: 2026-05-13
updated: 2026-05-13
tags: [agents, chat, coordination, docs-chat, multi-agent]
related:
  - rules/multi-agent-collaboration.md
  - rules/multi-agent-coordination-critical.md
  - memories/multi-agent-log.md
---

# Agent Chat Directory

## Regola

Tutti gli agenti AI che lavorano in questo repository devono usare `./docs/chat/` come canale locale di coordinamento operativo.

## Protocollo Obbligatorio

1. Prima di iniziare un task, leggere `docs/chat/INDEX.md` e gli eventuali file pertinenti in `docs/chat/`.
2. Quando si prende in carico un lavoro, aggiungere o aggiornare una nota in `docs/chat/` con:
   - data;
   - agente o tool;
   - scope;
   - file/aree rivendicate;
   - rischi di collisione.
3. Durante lavori lunghi, aggiornare `docs/chat/` con progressi, blocker e decisioni utili agli altri agenti.
4. A fine lavoro, lasciare un riepilogo con modifiche, verifiche eseguite e prossimo step.

## Precedenza

Questa regola integra le regole multi-agent esistenti. Se documenti precedenti indicano GitHub Issues, Discussions, `.cursor/memories` o altri canali come unico canale, per questo repository resta comunque obbligatorio usare `./docs/chat/` come bacheca locale condivisa.

## Motivo

`./docs/chat/` e' visibile nel workspace, riduce collisioni tra agenti, conserva stato operativo anche quando le sessioni AI cambiano e permette a qualunque agente di ripartire dal contesto piu' recente senza caricare memoria esterna.
