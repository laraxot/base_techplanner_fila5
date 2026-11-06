---
title: "Risoluzione collisioni skill Pi"
type: handoff
status: verified
created: 2026-10-28
updated: 2026-10-28
tags: [pi, skills, bmad, ecc, ponytail, maintenance]
qmd: "Pi skill collisioni BMAD ECC Ponytail frontmatter discovery"
issues: []
discussions: []
---

# Risoluzione collisioni skill Pi

## Scopo

`.pi` è un symlink verso `bashscripts/ai/.agents`. Il loader Pi indicizzava più
copie della stessa skill con lo stesso nome: una copia canonica al primo livello
e copie annidate provenienti da bundle BMAD/marketing o alias legacy. Il risultato
era un warning di collisione e, in alcuni casi, skill ignorate o frontmatter non
valido.

## Decisione

- La skill al primo livello di `.pi/skills/<name>/SKILL.md` è la copia canonica.
- Le copie annidate duplicate sono state spostate in `.pi/skill-resources/`, fuori
  dal percorso di discovery, mantenendole disponibili come materiale di riferimento.
- Gli alias `content-strategy.md` e `taste-skill/` sono fuori discovery.
- Le directory skill con spazi/maiuscole sono state normalizzate in kebab-case.
- I frontmatter duplicati o incompleti sono stati consolidati con un solo `name`
  e una sola `description` valida.

## ECC

ECC ufficiale `affaan-m/ECC` è già installato nel lifecycle nativo Codex alla
versione `2.2.3`; la cache è stata verificata con il checker ufficiale. La memoria
canonica del progetto resta QMD/wiki: ECC fornisce workflow e strumenti, non crea
un secondo archivio decisionale.

## Verifica

- Frontmatter YAML delle skill Pi: 0 errori.
- Nomi skill duplicati nel percorso discovery: 0.
- Marker Git reali nel repository: 0.
- Nessun commit, reset, checkout o stash eseguito.

Le eventuali collisioni tra una skill di progetto e un plugin globale esterno sono
gestite dalla precedenza project-local del loader; rimuovere plugin globali avrebbe
alterato altri progetti e non è necessario per questo repository.
