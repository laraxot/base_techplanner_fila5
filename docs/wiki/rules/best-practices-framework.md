# Best Practices & Knowledge Management Framework

## REGOLA PERMANENTE: Ogni modulo deve documentare best practices, bad practices e false friends

### Vincoli assoluti

```
OBBLIGATORIO: BEST_PRACTICES.md in ogni modulo/docs/
OBBLIGATORIO: BAD_PRACTICES.md in ogni modulo/docs/
OBBLIGATORIO: FALSE_FRIENDS.md in ogni modulo/docs/
OBBLIGATORIO: Architettura reference con link verificati
```

### Struttura Best Practices

#### 1. Pattern Corretti (Best Practices)

**Laravel Models**
- ✅ Estendere sempre `BaseModel` invece di `Model`
- ✅ Usare `casts()` method invece di proprietà `$casts`
- ✅ Verificare magic properties con `isset()` o `array_key_exists()`
- ✅ Non usare `property_exists()` su modelli Eloquent

**Filament Forms**
- ✅ Usare `getFormSchema()` per definire campi
- ✅ Traduzioni via `lang/` - niente testi hardcodati
- ✅ Separare logica (Widget) da presentazione (Template)
- ✅ Validazione tramite Filament validators

**Database Migrations**
- ✅ Una sola `create_table` per modello
- ✅ Usare `tableUpdate()` per modifiche schema
- ✅ Pattern XotBaseMigration con `hasColumn()`
- ✅ Contratti ID+UUID per ogni tabella

**API Development**
- ✅ Usare Eloquent API Resources
- ✅ Versionare gli endpoint
- ✅ Named routes per generazione URL
- ✅ Test feature con `Livewire::test()`

#### 2. Pattern Errati (Bad Practices)

**🚨 DA EVITARE**

```php
// ❌ Modello esteso direttamente
class Tenant extends Model { } // SBAGLIATO!

// ❌ Property $casts
protected $casts = [    // SBAGLIATO!
    'email_verified_at' => 'datetime'
];

// ❌ Traduzioni hardcodate
TextInput::make('name')->label('Full Name'); // SBAGLIATO!

// ❌ create_table duplicati
2024_01_01_000001_create_roles_table.php // DUPLICATO!
2024_02_01_000002_create_roles_table.php // SBAGLIATO!
```

#### 3. Falsi Amici (False Friends)

**⚠️ CONCETTI CHE SEMBRANO UGUALI MA SONO DIVERSI**

| Falso Amico | Perché è fuorviante | Soluzione Corretta |
|-------------|---------------------|---------------------|
| `property_exists()` su Eloquent | Controlla solo proprietà dichiarate, non magic attributes | Usare `isset($model->property)` |
| `dehydrated(false)` | Esclude tutto il field dal form state | Usare `dehydrateStateUsing()` |
| `$casts` come proprietà | Non supporta merge con parent | Usare metodo `casts()` |
| `CoordinatePicker` vs `LatitudeLongitudeInput` | Gestione state completamente diversa | Estendere `XotBaseField` per lat/lng diretti |
| `lang/lang/` | Duplica la radice locale | Usare solo `lang/{locale}/` |

#### 4. Architecture Reference

**Verified Links & Documentation**

- [Laravel 12.x Documentation](https://laravel.com/docs/12.x)
- [Filament 5.x Documentation](https://filamentphp.com/docs/5.x)
- [Livewire 4.x Documentation](https://livewire.laravel.com/docs)
- [Laravel Boost Guidelines](#laravel-boost-guidelines)

**Package Versions**
```
- PHP: 8.3
- Laravel: 12.31.1
- Filament: 4.0.20 (v5 API)
- Livewire: 3.6.4
```

#### 5. Naming Conventions

**Files e Directory**
- ✅ `kebab-case.md` - Corretto
- ❌ `snake_case.md` - Sbagliato
- ❌ `PascalCase.md` - Sbagliato
- ❌ `with-date-2025.md` - Sbagliato (niente date)

**Eccezioni**
- ✅ `README.md` - Maiuscolo consentito
- ✅ `INDEX.md` - Maiuscolo consentito

#### 6. Knowledge Management (Second Brain)

**Principi PKM per il Progetto**

1. **Atomicità**: Ogni documento una singola fonte di verità
2. **Collegamenti**: Cross-reference tra moduli e regole
3. **Verifica**: Link esterni testati e aggiornati
4. **Ricercabilità**: Struttura standardizzata con `docs/INDEX.md`

**Struttura Second Brain**
```
.memory/
├── MEMORY.md                    # Index generale
├── project_overview.md          # Architettura
├── feedback_*/                  # Apprendimenti
└── rules_*/                     # Regole specifiche

.claude/rules/
├── *-rule.md                    # Regole architetturali
└── docs-index-file.md          # Standard documentazione

modules/*/docs/
├── INDEX.md                     # Indice locale
├── BEST_PRACTICES.md           # Pattern corretti
├── BAD_PRACTICES.md            # Pattern errati
└── FALSE_FRIENDS.md            # Falsi amici
```

## Applicazione Pratica

### Checklist Aggiornamento Documentazione

- [ ] Verifica kebab-case in tutti i file `.md`
- [ ] Crea `BEST_PRACTICES.md` per moduli principali
- [ ] Crea `BAD_PRACTICES.md` con esempi concreti
- [ ] Crea `FALSE_FRIENDS.md` per concetti ambigui
- [ ] Aggiorna `docs/INDEX.md` con tutti i file
- [ ] Verifica link esterni funzionanti
- [ ] Cross-referenzia regole correlate

### Script di Verifica

```bash
# Controlla file non kebab-case
find laravel/Modules -name "*.md" | grep -v README.md | grep -E "[_A-Z]"

# Verifica presenza INDEX.md
find laravel/Modules -type d -name "docs" | xargs -I{} test -f {}/INDEX.md || echo "Manca INDEX.md"

# Cerca best practices
find laravel/Modules -name "BEST_PRACTICES.md"
```

## Version History

- **v1.0** (2026-04-28): Framework iniziale best practices
- **v1.1**: Aggiunto pattern Second Brain e PKM

---