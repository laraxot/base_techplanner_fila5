---
title: "Audit qualita' — docs condivise dei temi (Themes/docs)"
type: story
theme: all
status: in-progress
created: 2026-11-19
updated: 2026-11-19
issue: https://github.com/laraxot/base_techplanner_fila5/issues/64
tags: [bmad, audit, docs, qualita]
---

# Audit qualita' — docs condivise dei temi (Themes/docs)

**Fase BMAD**: Dev + QA. **Issue**: [#64](https://github.com/laraxot/base_techplanner_fila5/issues/64).
Audit parallelo dei temi (nomi `.md` senza date, indice unico della docs, file morti, PHPStan, test).

## Risultati

- `README.md`: la tabella dei temi diceva che Sixteen era il tema attivo; ora riporta Two (sottana.com) e tutti i temi, e
  descrive gli asset come symlink `public_html/themes/<Tema>` → `Themes/<Tema>/public` (niente copia).
- `shared-components/` (circa 1900 file, in gran parte docs di moduli copiate qui): 17 file datati e 50 nomi rovinati da una vecchia
  rimozione delle date (`*-.md`, `--*.md`). Risultato: 53 rinominati (data in `created:` quando c'era), 17 rimossi perche' uguali
  o superati da un file gia' presente; quando due varianti avevano contenuto diverso il nome indica il modulo (es.
  `phpstan-fixes-tenant.md`, `phpstan-fixes-user.md`, `roadmap-cms.md`, `dry-kiss-analysis-job.md`). Link aggiornati.

## Aperto

- `shared-components/` non descrive i temi: va svuotata spostando i contenuti nei moduli di competenza (lavoro dei rispettivi agenti).
