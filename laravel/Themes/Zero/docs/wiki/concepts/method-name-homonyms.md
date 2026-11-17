---
title: "censimento omonimi metodi — tema Zero"
type: analysis
module: Zero
updated: 2026-06-15
related:
  - ../../../docs/wiki/method-name-homonym-census.md
  - ../../../../docs/wiki/method-name-homonym-census.md
  - ../../../docs/wiki/method-name-homonym-census.md
  - ../../../../docs/wiki/method-name-homonym-census.md
  - ../../../Modules/Xot/docs/wiki/concepts/code-redundancy-philosophy.md
  - ./code-redundancy-theme.md
id: zero-docs-wiki-concepts-method-name-homonyms
slug: method-name-homonyms
description: "Il tema Zero è strato presentazione (Blade, CSS, view Filament). Le classi PHP nel tema sono poche e non ripetono metodi con lo stesso nome su classi diverse."
document_type: analysis
category: documentation
status: active
tags: []
created: "2026-09-24"
qmd: "censimento omonimi metodi - tema zero"
issues: []
discussions: []
---

> Nota di verifica 2026-10-20 (docs-temi): questa pagina cita il modulo `Sigma`, che non esiste in `laravel/Modules` di questo repository (controllato con `ls`). Il contenuto viene da un altro progetto della famiglia Laraxot e non e' stato riscritto: leggilo come pattern di riferimento, non come descrizione di codice presente. I link verso quei moduli non risolvono.

# Censimento omonimi metodi — Theme Zero

## Esito scan PHP

| Metrica | Valore |
|---------|--------|
| Omonimi cross-class nel tema | **0** |
| Data scan | 2026-06-15 |

## Riflessioni

Il tema **Zero** è strato **presentazione** (Blade, CSS, view Filament). Le classi PHP nel tema sono poche e non ripetono metodi con lo stesso nome su classi diverse.

La ridondanza di business logic da monitorare sta nei **moduli** Laravel (`Sigma`, `Ptv`, `User`, …), non qui.

### Politica

| OK nel tema | Da evitare |
|-------------|------------|
| Layout, partial Blade, asset | Model, relazioni Eloquent, calcolo `gg`/`giorni` |
| `@livewire` verso widget modulo | Copia metodi dominio da moduli |

### Collegamenti

- [Indice censimento progetto](../../../docs/wiki/method-name-homonym-census.md)
- [Ridondanza tema](./code-redundancy-theme.md)
- [Sigma — omonimi relazioni](../../../../../Modules/Sigma/docs/wiki/concepts/method-name-homonyms.md)
- [Indice censimento progetto](../../../../../../docs/wiki/method-name-homonym-census.md)
- [Ridondanza tema](./code-redundancy-theme.md)
- [Sigma — omonimi relazioni](../../../../../Modules/Sigma/docs/wiki/concepts/method-name-homonyms.md)
- [Indice censimento progetto](../../../../../../docs/wiki/method-name-homonym-census.md)
- [Ridondanza tema](./code-redundancy-theme.md)
- [Sigma — omonimi relazioni](../../../../../Modules/Sigma/docs/wiki/concepts/method-name-homonyms.md)
- [Indice censimento progetto](../../../../../../docs/wiki/method-name-homonym-census.md)
- [Ridondanza tema](./code-redundancy-theme.md)
- [Sigma — omonimi relazioni](../../../../../Modules/Sigma/docs/wiki/concepts/method-name-homonyms.md)
- [Indice censimento progetto](../../../../../../docs/wiki/method-name-homonym-census.md)
- [Ridondanza tema](./code-redundancy-theme.md)
- [Sigma — omonimi relazioni](./method-name-homonyms.md)
- [Indice censimento progetto](../../../../docs/wiki/method-name-homonym-census.md)
- [Ridondanza tema](./code-redundancy-theme.md)
- [Sigma — omonimi relazioni](../../../../../Modules/Sigma/docs/wiki/concepts/method-name-homonyms.md)

## Rigenerazione

```bash
python3 bashscripts/tools/census-method-homonyms.py
```
