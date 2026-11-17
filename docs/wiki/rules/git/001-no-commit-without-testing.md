# Rule 001: No Commit Without Full Verification

**Priority**: CRITICAL  
**Category**: Quality Gate  
**Enforced**: ALWAYS  
**Status**: MANDATORY

## Rule Statement

> MAI fare `git commit` o `git push` senza verifica completa e tracciabile del perimetro toccato.

"Verifica completa" non significa impressione soggettiva che sembri funzionare.
Significa evidence-based verification sui moduli, temi, pagine e flussi toccati.

## Mandatory Gate

Prima di commit o push devono essere coperti tutti i punti pertinenti:

1. `phpstan` sui moduli o temi toccati
2. `phpmd` sullo stesso perimetro
3. `phpinsights` sullo stesso perimetro o sul progetto se la configurazione lo richiede
4. `pest` o test pertinenti al comportamento modificato
5. verifica runtime reale: HTTP 200, UI renderizzata, niente eccezioni
6. documentazione e indici aggiornati

## Blocking Conditions

Se uno dei punti sotto e vero, commit e push sono proibiti:
- errori PHPStan presenti
- warning/finding PHPMD non risolti
- PHPInsights con problemi non triagiati
- test non eseguiti o rossi
- regressioni runtime o pagina non caricata
- docs non allineati

## Minimum Command Examples

```bash
cd laravel
vendor/bin/phpstan analyse Modules/Predict Themes/TwentyOne
php phpmd.phar Modules/Predict text phpmd.xml
vendor/bin/phpinsights analyze Modules/Predict
php artisan test Modules/Predict/tests/
curl -sSI http://predict.local/it/predicts/f1-world-champion-2026
```

## Commit Is Allowed Only After

- working tree reviewed
- evidence collected
- docs updated
- state stable enough to be shared with altri agenti e CI

## Explicit Anti-Pattern

```bash
# VIETATO
# "Ho quasi finito, intanto committiamo"
git add -A
git commit -m "fix: wip"
git push
```

## Correct Pattern

```bash
# 1. Fix
# 2. Run quality gates
# 3. Verify runtime
# 4. Update docs and indices
# 5. Only now commit and push
```
