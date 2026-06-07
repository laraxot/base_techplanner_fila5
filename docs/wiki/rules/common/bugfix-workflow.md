# Bugfix Workflow

## Ordine obbligatorio quando si corregge un errore

### 1. Studio (prima di toccare codice)

- Leggi e aggiorna i `docs/` del modulo/tema coinvolto
- Studia la git history: `git log --oneline -- <file>`, `git show <commit>:<file>`
- Capisci lo scopo del componente: a cosa serve? Quali classi parent usa?
- Ispeziona l'intero percorso di esecuzione, non solo il primo frame

### 2. Ragionamento

- Individua la causa radice, non il sintomo
- Definisci il fix minimo che risolve senza regressioni
- Verifica se esiste un pattern gia' nel codebase da riusare

### 3. Fix

- Implementa il fix minimo e focalizzato
- Fix bloccanti ovvi (errore fatale che blocca il task): fixali senza chiedere conferma
- git solo in avanti: mai `git checkout HEAD -- file`, mai `git reset`

### 4. Verifica post-modifica (OBBLIGATORIA per ogni file modificato)

```bash
# 1. PHPStan Level 10
cd laravel && ./vendor/bin/phpstan analyse

# 2. PHPMD
cd laravel && bash tools/phpmd.sh <path/file.php> text phpmd.xml --exclude vendor,node_modules,bootstrap,caches

# 3. PHP Insights
cd laravel && ./vendor/bin/phpinsights

# 4. Pest - crea/aggiorna test per il codice modificato
cd laravel && ./vendor/bin/pest --filter=<NomeTest>
```

**Regole test**:
- MAI `migrate:fresh` nei test
- MAI `RefreshDatabase` nei test
- Usare `.env.testing` con DB dedicato
- Tutti i test in Pest (mai PHPUnit diretto)

**Solo quando TUTTO passa**: `git commit` + `git push`

### 5. Aggiornamento knowledge base (OBBLIGATORIO)

Dopo ogni fix aggiornare TUTTO:

1. **Docs del modulo** — pattern/anti-pattern appresi, `docs/` del modulo
2. **Rules** — `bashscripts/ai/.claude/rules/common/` se il pattern e' generale
3. **Memories** — `~/.claude/projects/.../memory/MEMORY.md` e file topic
4. **Skills** — `.claude/skills/` se emerge un pattern riutilizzabile
5. **GitHub issues** — creare/aggiornare issue per tracciare bug e soluzione
6. **GitHub Actions** — aggiornare/creare automazioni per prevenire regressioni

### 6. Commit

Formato: `fix(Modulo): breve descrizione causa+soluzione`

## Regola assoluta

**Git va SOLO in avanti.** No checkout, no reset. Re-scrivi i file forward con Write tool.
