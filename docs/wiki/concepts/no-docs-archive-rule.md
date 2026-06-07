---
title: "No docs archive rule"
type: concept
confidence: high
created: 2026-05-01
updated: 2026-05-15
tags: [docs, wiki, archive, llm-wiki]
related:
  - ./llm-wiki-operational-discipline.md
  - ./wiki-sacred-structure-rule.md
---

# No docs archive rule

## Regola

Non si creano **nuovi** contenuti attivi sotto alberi paralleli **`docs/archive/`** (root, moduli, temi). La storia resta in Git; il materiale compilato vive in **`docs/wiki/`** e le sorgenti curate in **`docs/raw/`**.

## Percorsi vietati per nuovo lavoro

- `docs/archive/`
- `laravel/Modules/*/docs/archive/`
- `laravel/Themes/*/docs/archive/`

## Percorsi ammessi

- `docs/wiki/` e `*/docs/wiki/` — conoscenza operativa.
- `docs/raw/` — corpus grezzo immutabile (ingest).
- **`docs/wiki/_archive/`** e **`laravel/Modules/<Name>/docs/wiki/_archive/`** e **`laravel/Themes/<Name>/docs/wiki/_archive/`** — sezione **canonica** della LLM Wiki per materiale wiki legacy o non più indice primario (non sostituisce Git, non bypassa la wiki attiva).
- **`docs/wiki/_templates/`** — scaffold documenti (ove presente).

## Rationale

`docs/archive/` crea una tassonomia parallela alla LLM Wiki, rende ambigua la fonte di verità e spinge a copiare testo fuori da QMD/wiki. Se un contenuto serve ancora, va sintetizzato nella wiki; se è sorgente grezza, va in `docs/raw/`; se è wiki storica, nella **`_archive` interna alla wiki**, non in `docs/archive/`.

## Controllo

```bash
find . -type d \( -path './docs/archive' -o -path './laravel/Modules/*/docs/archive' -o -path './laravel/Themes/*/docs/archive' \) ! -path './.git/*' 2>/dev/null
```

## Vedi anche

- [llm-wiki-operational-discipline](./llm-wiki-operational-discipline.md)
- [wiki-sacred-structure-rule](./wiki-sacred-structure-rule.md)
