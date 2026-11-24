---
title: "Contratti del modulo Media"
type: index
module: Media
status: active
created: 2026-11-18
updated: 2026-11-24
qmd: "media contracts readme azioni invarianti pest group upload percorsi"
---

# Contratti del modulo Media

Un contract descrive il comportamento promesso da una Action che gestisce upload, percorsi di storage o dati personali nei file (es. GPS nelle immagini).
Standard: `Modules/Xot/docs/contracts/contract-authoring-standard.md`; governance: `Modules/Xot/docs/adr/0012-behavioral-contract-governance.md`.

## Formato

- Frontmatter con `type: contract` e `action: "Modules\\Media\\Actions\\..."`.
- Sezioni nell'ordine: `## Input`, `## Output`, `## Invarianti`, `## Effetti collaterali`, `## Errori`, `## Non fa`.
- Invarianti con ID `MEDIA-<AREA>-INV-<N>`, ciascuno con test Pest `->group('<ID>')`.

## File presenti

- [generate-temporary-upload-path-action.md](generate-temporary-upload-path-action.md) (`MEDIA-PATH-INV-1..4`)
- [strip-image-metadata-action.md](strip-image-metadata-action.md) (`MEDIA-STRIP-INV-1..3`)
- [path-generator.md](path-generator.md): documento legacy (`type: concept`, 2026-07-14) sull'interfaccia `PathGenerator`; non segue il formato a sei sezioni e non ha invarianti con ID. Non riscritto.
- `_template.md`: modello per i nuovi contract.

Copertura e backlog: [INDEX.md](INDEX.md).
