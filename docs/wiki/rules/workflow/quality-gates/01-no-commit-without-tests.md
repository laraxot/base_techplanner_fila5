# 🛑 CRITICAL: No Commit Without Full Testing

**Priorità**: 🔴 **CRITICAL - NON VIOLARE MAI**  
**Data**: 2026-03-26  
**Version**: 1.0  
**Status**: ✅ Active

---

## ⚠️ Regola Fondamentale

> **MAI fare `git commit` o `git push` senza aver testato TUTTO**
>
> Il commit è l'ULTIMO passo, non il primo.
> Testare SEMPRE prima di commitare.

---

## ❌ Errore Commesso (MAI RIPETERE)

```
❌ SBAGLIATO:
1. Modifico codice
2. git add .
3. git commit -m "fix: ..."
4. git push
5. ⚠️ ERRORI SCOPERTI DOPO
```

**Problema**: Commitato senza test → pushato codice potenzialmente rotto.

---

## ✅ Workflow Corretto (SEGUIRE SEMPRE)

```
✅ CORRETTO:
1. Modifico codice
2. Test locali (sintassi, logica)
3. PHPStan → NO errors
4. PHPMD (.phar) → NO warnings
5. PHPInsights → Quality > 90%
6. Pest tests → Passing
7. Verifica runtime (curl, browser)
8. SOLO ORA: git add .
9. git commit -m "..."
10. git push
```

---

## 📋 Quality Gate Checklist

### PRIMA di `git add`

```bash
# 1. PHPStan Level 10
./vendor/bin/phpstan analyse --level=max

# 2. PHPMD
bash laravel/tools/phpmd.sh Modules/Predict text phpmd.xml --exclude vendor,node_modules,bootstrap,caches

# 3. PHPInsights
./vendor/bin/phpinsights analyze

# 4. Pest Tests
php artisan test

# 5. Laravel Pint (format)
./vendor/bin/pint
```

### Checklist Completa

- [ ] **PHPStan**: NO errors (Level 10)
- [ ] **PHPMD**: NO warnings
- [ ] **PHPInsights**: Quality > 90%, Complexity < 20
- [ ] **Pest Tests**: 100% passing
- [ ] **Runtime**: Pagina carica senza errori 500
- [ ] **Blade**: NO syntax errors
- [ ] **Traduzioni**: Chiavi esistenti
- [ ] **Database**: Query funzionano
- [ ] **Documentation**: Aggiornata
- [ ] **Git**: Solo file necessari staged

---

## 🚫 Cosa NON Fare

### 1. Commit "Per Prova"

```bash
# ❌ MAI FARE
git commit -m "test commit"
git reset --soft HEAD~1
```

### 2. Push e Poi Test

```bash
# ❌ MAI FARE
git push
# ...ops, c'è un errore...
git revert HEAD
```

### 3. Commit Parziale Senza Test

```bash
# ❌ MAI FARE
git add blade_file.php
git commit -m "fix blade"
# ...dimenticato di testare...
```

---

## ✅ Cosa Fare Sempre

### 1. Test Prima di Tutto

```bash
# Crea script di test
./bashscripts/test/quality-gates.sh

# Esegui prima di OGNI commit
./bashscripts/test/pre-commit-check.sh
```

### 2. Verifica Runtime

```bash
# Testa pagina
curl http://predict.local/it/predicts/f1-champion-2026

# Controlla logs
tail -f storage/logs/laravel.log

# Verifica NO errori 500
```

### 3. Quality Gates Automatiche

```bash
# Husky-style pre-commit hook
#!/bin/bash
./vendor/bin/phpstan analyse --level=max || exit 1
bash laravel/tools/phpmd.sh Modules/Predict text phpmd.xml --exclude vendor,node_modules,bootstrap,caches || exit 1
php artisan test || exit 1
```

---

## 📁 File da Creare

### Pre-Commit Check Script

```bash
#!/bin/bash
# bashscripts/test/pre-commit-check.sh

echo "🔍 Running pre-commit checks..."

# PHPStan
echo "📊 PHPStan..."
./vendor/bin/phpstan analyse --level=max
if [ $? -ne 0 ]; then
    echo "❌ PHPStan failed"
    exit 1
fi

# PHPMD
echo "🔍 PHPMD..."
bash laravel/tools/phpmd.sh Modules/Predict text phpmd.xml --exclude vendor,node_modules,bootstrap,caches
if [ $? -ne 0 ]; then
    echo "❌ PHPMD failed"
    exit 1
fi

# PHPInsights
echo "📈 PHPInsights..."
./vendor/bin/phpinsights analyze --min-quality=90
if [ $? -ne 0 ]; then
    echo "❌ PHPInsights failed"
    exit 1
fi

# Tests
echo "🧪 Tests..."
php artisan test
if [ $? -ne 0 ]; then
    echo "❌ Tests failed"
    exit 1
fi

echo "✅ All checks passed!"
exit 0
```

### Git Hook (Pre-Commit)

```bash
#!/bin/bash
# .git/hooks/pre-commit

# Run quality gates
./bashscripts/test/pre-commit-check.sh
exit $?
```

---

## 🎯 Lezione Appresa

### Errore Commesso

```
Commit: 1b77fbba0
File: Themes/TwentyOne/resources/views/pages/[container0]/[slug0]/index.blade.php

Problema: Commitato SENZA:
- ❌ Testare PHPStan
- ❌ Testare runtime
- ❌ Verificare ResolvePageAction esista
- ❌ Verificare CMS blocks esistano
```

### Conseguenze

- Blade modificata → potentially broken
- ResolvePageAction potrebbe non esistere
- CMS blocks potrebbero non esistere
- Pushato codice non testato → **PRODUZIONE A RISCHIO**

---

## 📋 Nuove Regole

### 1. Quality Gate Obbligatoria

```
PRIMA DI OGNI COMMIT:
1. PHPStan Level 10 → NO errors
2. PHPMD (.phar) → NO warnings
3. PHPInsights → Quality > 90%
4. Pest Tests → 100% passing
5. Runtime check → NO errori 500
```

### 2. Documentation Update

```
DOPO OGNI MODIFICA:
1. Aggiornare docs in Modules/*/docs/
2. Aggiornare docs in Themes/*/docs/
3. Aggiornare rules in bashscripts/ai/.agents/rules/
4. Creare/aggiornare indici 00-INDEX.md
```

### 3. Git Workflow

```
1. Modifica codice
2. Test locali
3. Quality gates (PHPStan, PHPMD, PHPInsights, Pest)
4. Verifica runtime
5. Documentation update
6. SOLO ORA: git add
7. git commit
8. git push
```

---

## 🔗 Riferimenti

- [PHPStan](https://phpstan.org/)
- [PHPMD](https://phpmd.org/)
- [PHPInsights](https://www.phpinsights.com/)
- [Pest](https://pestphp.com/)
- [BMAD Method](https://docs.bmad-method.org/)
- [GSD Workflow](../../../bashscripts/ai/.agents/rules/bmad-gsd/00-INDEX.md)

---

## ✅ Checklist Finale (PRIMA DI COMMIT)

```
[ ] PHPStan: NO errors
[ ] PHPMD: NO warnings
[ ] PHPInsights: Quality > 90%
[ ] Pest Tests: 100% passing
[ ] Runtime: NO errori 500
[ ] Blade: NO syntax errors
[ ] Traduzioni: Chiavi esistenti
[ ] Database: Query funzionano
[ ] Documentation: Aggiornata
[ ] Indici: Aggiornati
[ ] Rules: Aggiornate
[ ] Git: Solo file necessari staged
```

**Se ANCHE UNA sola casella è ❌ → NON COMMITARE**

---

**Ultimo aggiornamento**: 2026-03-26  
**Review**: ✅ After critical error  
**Status**: ✅ Active - **NON VIOLARE MAI**
