---
title: "Blade component extraction governance"
type: concept
confidence: high
updated: 2026-04-21
tags: [blade, components, partials, dry, kiss, six]
sources:
  - ../../_bmad-output/implementation-artifacts/8-37-blade-reusable-components-extraction-and-header-partials-governance.md
  - ../../laravel/Themes/Sixteen/resources/views/components/sections/header/v1.blade.php
  - ../../../AGENTS.md
---

# Blade component extraction governance

## Regola generale

Quando una Blade contiene blocchi ripetibili o autonomi, prima bisogna capire la responsabilita del blocco:

- se e' riusabile tra pagine/section, estrarlo come componente riusabile del tema;
- se e' locale a una section, estrarlo come partial locale della section;
- se e' semplice e usato una sola volta, lasciarlo inline.

La DRY non deve creare cerimonia. KISS prima di astrazioni premature.

Questa regola vale per **tutte le Blade**, non solo per `header/v1.blade.php`: ogni story BMAD che tocca viste Blade deve cercare duplicazioni, pattern autonomi e owner reali prima di prescrivere o implementare refactor.

## Metodo obbligatorio

1. Leggere la Blade owner e le Blade correlate prima di decidere il path.
2. Capire runtime, dati disponibili, traduzioni e ownership.
3. Scegliere il livello minimo utile:
   - componente condiviso se serve davvero piu pagine/section;
   - `partials/` locale se il blocco appartiene a un owner;
   - inline se l'estrazione aggiunge solo rumore.
4. Aggiornare wiki, docs locali del tema/modulo e indici quando la regola diventa riusabile.

## Regola per le section

Per blocchi legati a una section specifica:

```text
resources/views/components/sections/{section}/partials/
```

La Blade della section resta l'owner e l'orchestratore.

## Regola header Sixteen

Se il blocco e' legato a:

```text
laravel/Themes/Sixteen/resources/views/components/sections/header/v1.blade.php
```

allora il partial locale deve stare in:

```text
laravel/Themes/Sixteen/resources/views/components/sections/header/partials/
```

`v1.blade.php` resta l'orchestratore e la source of truth della section `header`; i partial sono pezzi interni, non nuovi owner.

## Anti-pattern

- creare componenti globali per blocchi locali;
- lasciare partial specifici nella root della section;
- usare l'estrazione per spostare la source of truth;
- duplicare lo stesso blocco in piu Blade invece di estrarlo.
