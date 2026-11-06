---
id: zero-docs-archive-readme
slug: readme
title: "Indice dell'archivio della docs del tema Zero"
description: "Elenco delle copie storiche in _archive con il documento vivo (canonical) di ciascuna: serve a non scambiare una copia archiviata per la fonte."
document_type: index
type: index
category: documentation
status: active
module: Zero
tags: [zero, docs, archivio, indice]
created: "2026-10-20"
updated: "2026-10-20"
qmd: "archivio docs tema zero copie storiche canonical non canoniche indice _archive conflict-resolution-summary metodi-duplicati"
issues: []
discussions: []
related:
  - ../README.md
  - ./index.md
---

# Indice dell'archivio della docs del tema Zero

`_archive/` contiene copie storiche e non canoniche: nessuna e' la fonte, ognuna ha `canonical:` verso il documento vivo. Non si cancellano (sono cronologia) e non si modificano nel contenuto. Prima di usare un file di questa cartella, apri il canonico.

Il file [index.md](./index.md) di questa cartella e' una copia archiviata dell'indice generale vecchio, non l'indice dell'archivio: l'indice dell'archivio e' questa pagina. I link relativi dentro le copie archiviate possono non risolvere (percorsi della vecchia struttura): in caso di dubbio vale il canonico.

## Copie nella radice di `_archive/`

| Copia archiviata | Canonico vivo | Nota |
|---|---|---|
| [00-index.md](./00-index.md) | [../bmad/00-index.md](../bmad/00-index.md) | indice storico di `bmad/` |
| [architecture.md](./architecture.md) | [../bmad/architecture.md](../bmad/architecture.md) | copia breve (19 righe) |
| [changelog.md](./changelog.md) | [../changelog.md](../changelog.md) | cronologia |
| [conflict-resolution-summary.md](./conflict-resolution-summary.md) | [../bmad/conflict-resolution-summary.md](../bmad/conflict-resolution-summary.md) | copia con trattino |
| [conflict_resolution_summary.md](./conflict_resolution_summary.md) | [../bmad/conflict-resolution-summary.md](../bmad/conflict-resolution-summary.md) | stesso argomento, nome con underscore |
| [duplicate-methods-report.md](./duplicate-methods-report.md) | [../bmad/duplicate-methods-report.md](../bmad/duplicate-methods-report.md) | copia breve (19 righe) |
| [frameworks.md](./frameworks.md) | [../bmad/frameworks.md](../bmad/frameworks.md) | stesso corpo del canonico |
| [index.md](./index.md) | [../README.md](../README.md) | indice generale vecchio |
| [metodi-duplicati-analisi.md](./metodi-duplicati-analisi.md) | [../bmad/metodi-duplicati-analisi.md](../bmad/metodi-duplicati-analisi.md) | analisi omonimi |
| [metodi-duplicati-analisi-name-legacy.md](./metodi-duplicati-analisi-name-legacy.md) | [../bmad/metodi-duplicati-analisi.md](../bmad/metodi-duplicati-analisi.md) | ex `METODI_DUPLICATI_ANALISI.md` (uppercase rimosso 2026-10-20) |
| [prd.md](./prd.md) | [../bmad/prd.md](../bmad/prd.md) | requisiti di prodotto |
| [readme-en.md](./readme-en.md) | [../bmad/readme-en.md](../bmad/readme-en.md) | versione inglese |

## Sottocartelle

| Percorso | Canonico vivo |
|---|---|
| [root-md-files/conflict-resolution-summary.md](./root-md-files/conflict-resolution-summary.md) | [../bmad/conflict-resolution-summary.md](../bmad/conflict-resolution-summary.md) |
| [wiki/schema.md](./wiki/schema.md) | [../wiki/schema.md](../wiki/schema.md) |
| [wiki/commands/index.md](./wiki/commands/index.md) | [../wiki/commands/index.md](../wiki/commands/index.md) |
| [wiki/concepts/index.md](./wiki/concepts/index.md) | [../wiki/concepts/index.md](../wiki/concepts/index.md) |
| [wiki/memories/index.md](./wiki/memories/index.md) | [../wiki/memories/index.md](../wiki/memories/index.md) |
| [wiki/rules/index.md](./wiki/rules/index.md) | [../wiki/rules/index.md](../wiki/rules/index.md) |
| [wiki/skills/index.md](./wiki/skills/index.md) | [../wiki/skills/index.md](../wiki/skills/index.md) |

## Regole

1. Un documento nuovo non nasce qui: si aggiorna il canonico.
2. Per archiviare una copia: `status: archived`, `canonical:` verso il vivo, riga in questa tabella.
3. Le ricerche di regole o procedure escludono `_archive/`.
