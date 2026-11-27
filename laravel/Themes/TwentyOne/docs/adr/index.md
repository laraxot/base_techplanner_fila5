---
title: "Indice degli ADR — TwentyOne"
type: index
theme: TwentyOne
status: active
updated: 2026-11-27
---

# Indice degli ADR — TwentyOne

| ADR | Stato | Perché | Conferma |
|---|---|---|---|
| [0001-twentyone-uses-agnostic-pages](0001-twentyone-uses-agnostic-pages.md) | accepted | Le pagine di TwentyOne sono agnostiche: il tema non conosce i modelli concreti, la risoluzione sta nel CMS. | `tests/Unit/FolioPageMountContractTest.php` e test source-level di header/blocchi |
| [0002-agnostic-container0-pages](0002-agnostic-container0-pages.md) | accepted | Dettaglio della decisione 0001: solo due pagine Folio generiche (`container0.index`, `container0.view`) con payload neutro `item`/`record`. | Sì: `tests/Unit/FolioPageMountContractTest.php` |
| [0003-header-blocks-grouped-by-position](0003-header-blocks-grouped-by-position.md) | accepted | L'header non ha markup proprio: raggruppa i blocchi del JSON per `data.position` e li rende. | Solo revisione (nessun test automatico) |

Nota: 0001 e 0002 trattano lo stesso confine «pagine agnostiche» a due livelli di dettaglio; la fusione è una decisione editoriale da fare con l'owner del tema.

Formato e regole: [README](README.md).
