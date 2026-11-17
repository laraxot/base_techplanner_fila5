# Merge Conflict Marker Resolution Rule

## REGOLA PERMANENTE: Risoluzione distribuita dei marker di conflitto di merge

### Vincoli assoluti

Quando esistono file con marker di merge (`<<<<<<<`, `=======`, `>>>>>>>`, `.merge_file`):

- **OBBLIGATORIO**: generare una lista checklist in file `.md` dentro docs di moduli e temi;
- **OBBLIGATORIO**: assegnare un file per agente;
- **OBBLIGATORIO**: risolvere manualmente almeno un file per ciclo;
- **OBBLIGATORIO**: spuntare il file risolto nella checklist.

### Criterio qualità

- merge semantico, non meccanico;
- preservare business logic e ownership dei componenti;
- rimuovere hardcode/duplicazioni se in conflitto con regole DRY + KISS.

### Artefatti (checklist distribuita)

- **Master**: `docs/merge-conflict-task-list.md`
- Copia moduli: `laravel/Modules/docs/merge-conflict-task-list.md`
- Copia temi: `laravel/Themes/docs/merge-conflict-task-list.md`

### Perché

La risoluzione distribuita dei conflitti di merge previene colli di bottiglia in scenari multi-agente e garantisce che ogni agente contribuisca attivamente alla manutenzione della codebase.

### Come applicare

1. Cercare marker di conflitto (escludendo vendor/node_modules/docs/public):
   ```bash
   grep -rl "<<<<<<<" laravel/ --include="*.php" --include="*.blade.php" --include="*.js" --include="*.ts" --include="*.json" --include="*.yaml" 2>/dev/null | grep -v vendor | grep -v node_modules
   ```
2. Aggiornare la checklist master `docs/merge-conflict-task-list.md`
3. Creare elenco prioritario per gravità (PHP critico prima, blade/JS dopo)
4. Ogni agente sceglie un file non assegnato, risolve semanticamente, spunta la checklist
5. Risoluzione semantica: preservare business logic, applicare DRY+KISS, non merge meccanico

### Documentazione

- Regola derivata da feedback operativo multi-agente 2026-04-21
- Allineata con principi di ownership collegante e responsabilità condivisa
- Wiki: [`docs/wiki/concepts/merge-conflict-distributed-resolution.md`](../concepts/merge-conflict-distributed-resolution.md)

### Post-rebase — risoluzione bulk (2026-05-20)

Dopo un rebase completato con marker ancora commessi:

1. **Verificare rebase**: `git rebase --continue` → se «No rebase in progress», il rebase è già chiuso; restano marker nel working tree o nei commit.
2. **Inventario reale** (solo marker a inizio riga, esclude menzioni in backtick nei `.md`):
   ```bash
   git grep -l '^<<<<<<<' 
   ```
3. **Script canonico** (preferisce lato HEAD/primo blocco, **non** sostituisce file con stub):
   ```bash
   python3 bashscripts/tools/git/resolve-conflict-markers.py
   ```
4. **PHP legacy**: `fix_merge_conflicts.py` resta valido solo per `<<<<<<< HEAD` esplicito su `.php`.
5. **Quality gate**: `cd laravel && ./vendor/bin/phpstan analyse Modules`

#### Anti-pattern — vietato

- **NON** usare script che «strip» i marker e, se il file risulta corto, lo sostituiscono con stub wiki markdown (incidente 2026-05-20: corruzione `Category.php`, `fix_merge_conflicts.py`, decine di `.md`).
- **NON** committare con marker reali (`^<<<<<<<` a inizio riga) — il rebase «completato» con marker in HEAD è debito tecnico immediato.
- Per codice (`.php`, `.js`, `.blade.php`): merge semantico o `git show <commit>:path` — mai stub automatici.