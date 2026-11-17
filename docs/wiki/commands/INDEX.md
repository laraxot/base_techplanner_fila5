---
title: "Commands Index"
type: index
created: 2026-05-11
updated: 2026-05-27
tags: [commands, index, on-demand]
related:
  - rules/00-TRIGGER_MAP.md
  - rules/on-demand-pattern.md
---

# Commands Index

I comandi progettuali vivono qui, nel wiki, e vengono caricati **on-demand**.
Non embeddare comandi nei prompt di avvio.

> Vedi anche → [`rules/00-TRIGGER_MAP.md`](../rules/00-TRIGGER_MAP.md)

## Regola

1. individua il trigger del task
2. consulta `../rules/00-TRIGGER_MAP.md`
3. usa `qmd search "<command>"` se il trigger non basta
4. leggi solo il comando pertinente

## Trigger map locale

| Trigger / Contesto | Command File |
|---|---|
| BMAD v6 slash command on-demand | `.claude/commands/bmad/*.md` + `../skills/bmad-on-demand-routing.md` |
| Creazione story BMAD legacy | `bmad-create-story.md` |
| Aggiornamento traduzioni | `update-translations.md` |
| Tooling Ollama locale | `ollama.md` |

## Note

- il file canonico dei trigger resta `../rules/00-TRIGGER_MAP.md`
- questa cartella documenta i comandi piu' ricorrenti
- eventuali implementazioni runtime possono vivere fuori dal wiki, ma la spiegazione deve stare qui

## Formato Comando

Ogni comando deve:
1. Risiedere in `docs/wiki/commands/<nome-comando>.md` oppure `.opencode/commands/`
2. Avere frontmatter con `title`, `type: command`, `tags`
3. Essere referenziato in `rules/00-TRIGGER_MAP.md`
4. Documentare trigger, parametri expected e output

## Aggiungere un Nuovo Comando

1. Crea `docs/wiki/commands/<nome>.md`
2. Aggiungi la voce in `commands/INDEX.md` (questo file)
3. Aggiungi la voce in `rules/00-TRIGGER_MAP.md` → sezione COMMANDS
4. Committa: `docs: add command <nome>`