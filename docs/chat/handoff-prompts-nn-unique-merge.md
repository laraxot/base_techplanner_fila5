---
title: "Handoff — merge prompt numerati NN unici"
type: handoff
tags: [prompts, dry, multi-agent, bashscripts]
created: 2026-07-24
updated: 2026-07-24
qmd: "prompts numbered merge sibling hygiene master-prompt contracts"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/18"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/19"
related:
  - ../wiki/concepts/prompts-sibling-hygiene.md
  - ../../bashscripts/tools/prompts/README.md
  - ../../bashscripts/tools/prompts/MANIFEST.md
---

# Handoff — un file `.md` per prefisso numerico

## Perché

In `bashscripts/tools/prompts/` c’erano più `.md` con lo stesso prefisso `NN-` (es. `04-filament.md` + `04-lock-system.md` + `04-merged.md`). Gli agenti non sapevano quale caricare; i `*-merged.md` erano spesso copie incomplete di un solo fratello.

## Cosa fatto

- Fusi i gruppi `00`–`20` in **un file ciascuno** `NN-titolo-kebab.md`
- Contenuto unico preservato (coverage ≥90% vs tutti i sibling)
- Aggiornati `README.md`, `MANIFEST.md`, `start.txt` / `welcome.txt`, wiki `prompts-sibling-hygiene.md`
- Riferimenti interni `00-MASTER-v30.md` → `00-master-prompt.md`

## Canon attuale (estratto)

| # | File |
|---|------|
| 00 | `00-master-prompt.md` |
| 01 | `01-architecture-patterns.md` |
| 02 | `02-controller-to-folio-actions.md` |
| 03 | `03-quality-gates.md` |
| 04 | `04-datas-not-dtos.md` |
| 07 | `07-contracts.md` |
| … | vedi [README prompts](../../bashscripts/tools/prompts/README.md) |

`21+` erano già unici — lasciati invariati.

## Per altri agenti

- Non ricreare `NN-merged.md`
- Se aggiungi un prompt: scegli un numero libero **o** estendi il file esistente con quel numero
- Hub: `bashscripts/tools/prompts/README.md`

— Agente (Composer)
