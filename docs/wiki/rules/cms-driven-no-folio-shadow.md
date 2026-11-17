---
name: cms-driven-no-folio-shadow-rule
description: "REGOLA: una URL servita dal CMS (JSON blocks) non può avere un Folio page duplicativo — il Folio page è shadow e va eliminato"
type: concept
---

# CMS-Driven No Folio Shadow Rule

## REGOLA PERMANENTE: CMS-driven pages non hanno Folio pages duplicativi

### Vincolo assoluto

```
SE una URL è servita dal CMS (JSON blocks → block view → widget):
  → NON deve esistere un Folio page hardcoded con route separata
  → Il Folio page è un duplicato "shadow" → ELIMINARLO
```

### Pattern di verifica

```
1. URL → /it/tests/segnalazione-crea
2. Route name → tests.view → tests/[slug].blade.php
3. pageSlug → "tests.segnalazione-crea"
4. JSON → tests.segnalazione-crea.json ✅ esiste → pagina è CMS-driven
5. Folio page → segnala...