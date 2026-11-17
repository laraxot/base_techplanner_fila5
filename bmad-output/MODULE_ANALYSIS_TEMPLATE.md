# Module Analysis Template

Questa è la struttura per l'analisi approfondita di ogni modulo Laravel.

## 1. Headline: Filosofia & Religione

**Qual è lo scopo canonico di questo modulo?**
- Una riga che risponde: che problema risolve, per chi, why now.

**Religione (filosofi sottostanti)**
- Principi non-negoziabili
- Pattern preferiti (Actions, Traits, Models)
- Filosofia data/state
- Approccio al testing

**Zen (essenza)**
- Il minimo che serve sapere per usarlo
- Una frase che cattura lo spirito

---

## 2. Architettura: Cosa Contiene

### Entità Core (Models)

Per ogni model principale:
```
Model:: [NomeModel]
  - Attributi chiave
  - Relazioni (belongsTo, hasMany, etc)
  - Trait applicati (HasXotTable, HasTeams, etc)
  - Stato (Enum, casting, business logic)
  - Valore canonico (toString, natural key)
```

### Pattern Architetturale

- **Data Layer**: Models, Casts, Traits, Relationships, Scopes
- **Business Logic**: Actions, Policies, Rules, Services (if any)
- **Filament**: Forms/Components, Tables/Columns, Resources, Pages
- **Routes**: API? Web? Folio pages?
- **Events**: Domain events, listeners, queue jobs
- **Config**: Modulo-specific settings

### Dipendenze Esterne (composer.json)

```
Libreria :: versione :: perchè
  - Use case specifico
  - Alternativa scartata
```

### Integrazione: Chi Chiama Chi

```
└─ Modulo A (owner)
   ├─ Modulo B (dependency)
   ├─ Modulo C (peer)
   └─ Modulo X (reverse dependency)
```

---

## 3. Policy & Politica Interna

### Naming Conventions

- Come si chiamano i file?
- Caso studio (es.: UserFormResource vs CreateUserPage)
- Eccezioni e perché

### Testing Philosophy

- Unit vs Feature split
- Dataset patterns
- Mock strategy (external deps yes, internal models no)
- Coverage target

### Code Style

- PHPStan level (probabile 10, verify)
- Pint rules (already auto)
- Comments: doc-only (no "//comment" inline)

---

## 4. Best Practices & False Friends

### Best Practices (da rubare)

Elenca 3-5 pattern usati bene qui:
- Pattern name
- Codice snippet (1-3 linee)
- Perché funziona
- Dove usarla in altri moduli

### Bad Practices (da evitare)

- Cosa NON fare
- Perché è male
- Cosa fare invece

### False Friends (trappole comuni)

- Cosa sembra ovvio ma non è
- Dove la gente sbaglia
- Cosa succederebbe

---

## 5. Competitors & Ispirazioni

### Cosa fa questo modulo

| Aspetto | Tool/Lib | Link | Note |
|---------|----------|------|------|
| Auth | Laravel Sanctum | docs | vs Passport usato qui |
| Roles | Spatie Roles | docs | vs Policy native qui |
| Teams | Spark Teams | docs | vs custom HasTeams here |

### Dove prendere ispirazioni

- GitHub: riferimenti repo simili (e perché non usiamo quello)
- Package: librerie complementari da considerare
- Best practices: articoli, video, principi generali

---

## 6. Roadmap & Future

### Implementazioni Future

- Cosa fare prossimo?
- Perché non è stato fatto yet (blocchi, priorità)
- Design sketch (2-3 linee di logica)

### Librerie da Valutare

```
Candidato :: version :: motivo investigation :: pro/contro
```

### Refactoring Debt

- Cosa puzza
- Perché non lo abbiamo fatto
- Piano se feasible

### Scale Concerns

- Cosa succede a 10k users? 100k?
- Query optimization needed? Caching? Queue jobs?
- Database indexing?

---

## 7. Come Usarlo

### Installation

```bash
# Modulo è parte della monorepo, già installato
# Composer dependencies:
composer update

# Database:
php artisan migrate --path="Modules/ModuleName/database/migrations"

# Seeds (if applicable):
php artisan db:seed ModuleNameSeeder
```

### Quick Start

Caso d'uso principale: 1-3 step, 10 righe codice max.

### Integration Points

```php
// Example: come invocare questo modulo
use Modules\ModuleName\Actions\SomethingAction;

$result = SomethingAction::dispatch($data);
```

### Configuration

File `.env` needed? Publishable config? Explain.

---

## 8. Perplessità & Dubbi

### Questions Aperte

- È davvero testato bene? Coverage? Blind spots?
- Scaling: database query count under load?
- OAuth flow: è vulnerabile a X? (check OWASP)
- Deprecation risk: librerie esterne out of date?

### Contradictions

- Cosa nel codice non combacia con la documentazione?
- Comportamento vs Intento: match?

---

## 9. Summary Card

```
┌─────────────────────────────────────────┐
│ MODULE: [Name]                          │
├─────────────────────────────────────────┤
│ Purpose: [1 line]                       │
│ Owner: [file path root]                 │
│ Status: [alpha|beta|stable|deprecated]  │
│ PHPStan: [level 10?]                    │
│ Test Coverage: [%]                      │
│ Dependencies: [Xot, Tenant, ...]        │
│ Reverse Deps: [modules that use this]   │
│ Lines of Code: [estimate]               │
│ Complexity: [low|med|high|critical]     │
└─────────────────────────────────────────┘
```

---

## Meta

- **Generated**: [date]
- **Verified Against**: [branch/commit]
- **Last Review**: [date]
- **Author**: Claude (eccentrico mode, vision-first)

