---
name: verifica-risposta-per-prima
description: "REGOLA: prima di rispondere su una URL, verificare la route name e confrontare con l'URL — se usa CMS JSON, il Folio page hardcoded è shadow"
type: concept
---

# Verifica Risposta Per Prima

## REGOLA PERMANENTE: Prima di rispondere su una URL — verificare la source of truth

### Vincolo assoluto

```
PRIMA di affermare quale file gestisce una URL:
  1. Verificare la route name del Folio page (name('...'))
  2. Confrontare con il prefisso dell'URL
  3. Se /it/tests/* → cercare JSON in config/local/fixcity/database/content/pages/tests.{slug}.json
  4. Se esiste JSON → pagina è CMS-driven, NON Folio hardcoded
```

### Perché

L'AI tende a trovare il primo file con nome simile e assumerlo come source of truth.
Questo è SBAGLIATO quando la pagina è CMS-driven.

### Esempio errore

URL: `/it/tests/segnalazione-crea`
- ❌ SBAGLIATO: "gestita da `pages/segnalazione-crea.blade.php`" (route: `segnalazione.crea`)
- ✅ CORRETTO: "gestita da `tests/[slug].blade.php` → `tests.segnalazione-crea.json` → block view"

### Checklist

```
□ Route name del Folio page corrisponde al prefisso URL?
□ Esiste JSON CMS per questa pagina?
□ Il JSON definisce content_blocks con view?
```
