---
title: "Theme Zero — focus operativo"
module: "Zero"
type: concept
created: "2026-04-29T00:00:00Z"
updated: "2026-10-20"
related:
  - ../../bmad/scopo.md
  - ../../README.md
  - ../../concepts/xotbase-never-extend-filament.md
id: zero-docs-wiki-concepts-theme-zero-operating-focus
slug: theme-zero-operating-focus
description: "Perche Zero e' il tema baseline FO: confini verso Cms/Xot, doc come handoff, niente logica di dominio."
document_type: concept
category: documentation
status: active
tags: [zero, scopo, confini, agent-handoff]
qmd: "theme zero operating focus scopo confini cms xot presentazione"
issues: []
discussions: []
---

# Theme Zero — focus operativo

> Perche toccare Zero: tenere un frontoffice minimo, vero rispetto al codice, e leave domain ai moduli.

## Posizionamento

In `base_quaeris_fila5` Zero e' l'unico tema. Vale come guscio pubblico (`pub`), non come pannello gestionale. Dettaglio e misure: [scopo](../../bmad/scopo.md).

## Guardrail (KISS)

- Solo presentazione: Blade, CSS/JS, mail-layouts, `lang/*/navigation|ui`.
- `app/` resta vuoto: niente Actions/Services nel tema.
- Domanda "chi decide la pagina?" → [Cms scopo](../../bmad/scopo.md).
- Domanda "quale classe Filament estendo?" → [Xot](../../../../Modules/Xot/docs/00-index.md) + [mai Filament*](../../concepts/xotbase-never-extend-filament.md).
- Docs = handoff per agenti: aggiornare `scopo` / README quando cambia il perche', non solo il come.

## Heuristica di lettura

1. [../../README.md](../../README.md) — mappa docs
2. [../../bmad/scopo.md](../../bmad/scopo.md) — perche' e confini
3. Layout/componenti/chart solo se il task e' UI
4. wiki `raw/` sola lettura; nuove regole condivise → wiki di progetto, non duplicare qui

## Non e' focus di Zero

- Metriche Pulse / survey / RBAC di dominio (moduli)
- Inventare temi gemelli "One/Three" in docs: in questo repo non esistono
- Citare Tailwind v4 / Flux come stack del tema (reale: TW 3.4, Alpine, Flowbite)
