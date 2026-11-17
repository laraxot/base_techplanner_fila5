---
trigger: always_on
description: Regola operativa per bugfix ed errori nel progetto Base Predict.
globs:
---
# Error Fix Governance

## Sequenza obbligatoria

1. Studiare le cartelle `docs/` dei moduli e dei temi toccati.
2. Migliorare la documentazione pertinente prima della patch.
3. Leggere la Git history per capire scopo e intenzione della feature.
4. Correggere solo in modalita' forward-only.
5. Aggiornare regole, memories e skills locali.
6. Valutare GitHub Issue, Discussion e GitHub Actions.
7. Implementare e verificare il fix.

## Regole

- Vietato ripristinare versioni vecchie come strategia normale di correzione.
- Ogni errore va ricondotto al suo scopo di dominio, non solo al suo stack trace.
- Il fix deve lasciare tracce utili nel sistema documentale del progetto.
- Per PHPStan il gate corrente e' sempre livello MAX.
- Per gli errori Vite dei temi bisogna verificare la pipeline completa `npm install`, `npm run build`, `npm run copy` e il path runtime pubblico reale.
