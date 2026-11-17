---
title: "Validazione del deployment di Theme Two"
type: how-to
theme: Two
tags: [deployment, validation, production, techplanner]
created: 2026-11-01
updated: 2026-11-01
qmd: "theme two techplanner deployment validation production sottana net frontend contacts map"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/9"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/10"
---

# Validazione del deployment di Theme Two

Questa procedura è specifica del sito TechPlanner che usa Theme Two. Le procedure
riutilizzabili devono restare in `bashscripts`; domini, pagine e controlli propri
del progetto appartengono invece alla documentazione del tema owner.

## Controlli dopo il deployment

- Verificare la home pubblica: <https://sottana.net/it>
- Verificare contatti, mappa e dati aziendali: <https://sottana.net/it/contatti>
- Ripetere il controllo sulle pagine coinvolte dalla release.
- Dopo modifiche frontend, verificare asset CSS/JS, immagini, responsive layout e console browser.
- Dopo modifiche a contatti o mappa, verificare anche link esterni, form, traduzioni e stato HTTP.

## Regola di ownership

Il dominio e i percorsi sopra indicati sono dati di deployment del progetto
TechPlanner/Theme Two: non devono essere copiati in `bashscripts`, che è condiviso
da più progetti.
