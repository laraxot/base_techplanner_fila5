# 🔴 CRITICAL RULE: One Migration Per Model

**Priority**: **CRITICAL**  
**Category**: Database Architecture  
**Enforced**: **ALWAYS**  
**Status**: **MANDATORY**

---

## Rule Statement

> **1 MODELLO = 1 MIGRAZIONE**
> 
> **MAI creare migrazioni separate per aggiungere campi a un modello esistente.**

---

## Filosofia

### Perché 1 Migrazione per 1 Modello?

**✅ VANTAGGI**:
- ✅ **Chiarezza**: La struttura del modello è in UN solo file
- ✅ **Manutenibilità**: Non devi cercare 10 migrazioni per capire i campi
- ✅ **Versioning**: La migrazione è la "fonte della verità"
- ✅ **Onboarding**: I nuovi developer capiscono subito la struttura
- ✅ **DRY**: Non duplicare la definizione del modello in più file
- ✅ **KISS**: Una migrazione = una responsabilità

**❌ SVANTAGGI (se violi la regola)**:
- ❌ **Confusione**: Devi aprire 5+ file per capire i campi
- ❌ **Duplicazione**: La stessa tabella definita in più posti
- ❌ **Errori**: Dimentichi di eseguire migrazioni intermedie
- ❌ **Debito tecnico**: Accumuli migrazioni "temporanee" che diventano permanenti

---

## Cosa Fare

### ✅ CORRETTO: Tutti i campi in 1 migrazione

```php
// ✅ CORRETTO: 1 migrazione per ratings table
// File: 2026_03_12_180000_create_ratings_table.php

Schema::create('ratings', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('description')->nullable();
    $table->string('color')->default('gray');
    $table->integer('value')->default(0); // ← Aggiungi QUI, non in migrazione separata!
    $table->timestamps();
});
```

### ❌ SBAGLIATO: Migrazioni separate per aggiungere campi

```php
// ❌ SBAGLIATO: Migrazione 1
Schema::create('ratings', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->timestamps();
});

// ❌ SBAGLIATO: Migrazione 2 (VIOLAZIONE!)
Schema::table('ratings', function (Blueprint $table) {
    $table->text('description')->nullable();
});

// ❌ SBAGLIATO: Migrazione 3 (VIOLAZIONE!)
Schema::table('ratings', function (Blueprint $table) {
    $table->string('color')->default('gray');
});

// ❌ SBAGLIATO: Migrazione 4 (VIOLAZIONE GRAVE!)
Schema::table('ratings', function (Blueprint $table) {
    $table->integer('value')->default(0);
});
```

---

## Cosa Fare Se Devi Aggiungere Campi

### Scenario: Hai già creato la migrazione

**Opzione 1: Modifica la migrazione (se non è stata eseguita)**

```bash
# 1. Rollback (se già eseguita)
php artisan migrate:rollback

# 2. Modifica la migrazione originale
vim database/migrations/2026_03_12_180000_create_ratings_table.php

# 3. Aggiungi i campi
Schema::create('ratings', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('description')->nullable(); // ← Aggiunto
    $table->integer('value')->default(0);    // ← Aggiunto
    $table->timestamps();
});

# 4. Esegui di nuovo
php artisan migrate
```

**Opzione 2: Crea nuova migrazione SOLO se il modello è in produzione**

```bash
# SOLO SE la tabella è già in produzione
php artisan make:migration add_description_to_ratings_table

# Questa migrazione è OK perché:
# 1. Il modello è già in produzione
# 2. Non puoi modificare migrazioni già eseguite
# 3. È un cambiamento incrementale necessario
```

---

## Eccezioni (UNICI casi in cui è OK)

### Eccezione 1: Produzione già esistente

```php
// ✅ OK: Tabella già in produzione
Schema::table('ratings', function (Blueprint $table) {
    $table->text('description')->nullable();
});
```

**Perché è OK**: Non puoi modificare migrazioni già eseguite in produzione.

---

### Eccezione 2: Pivot tables

```php
// ✅ OK: Pivot table ha migrazione separata
Schema::create('rating_morph', function (Blueprint $table) {
    $table->foreignId('rating_id');
    $table->morphs('model');
    $table->integer('percentage');
});
```

**Perché è OK**: Le pivot table sono entità separate.

---

### Eccezione 3: Indici e performance

```php
// ✅ OK: Indici per performance
Schema::table('ratings', function (Blueprint $table) {
    $table->index('title');
    $table->index('created_at');
});
```

**Perché è OK**: Gli indici sono ottimizzazioni, non campi.

---

## Checklist Pre-Commit

Prima di commitare una migrazione:

- [ ] ✅ 1 modello = 1 migrazione
- [ ] ✅ Tutti i campi sono nella migrazione originale
- [ ] ✅ NON ci sono migrazioni "add_X_to_Y_table"
- [ ] ✅ Se la tabella esiste già, ho una buona ragione
- [ ] ✅ Ho documentato perché ho creato una migrazione separata

---

## Esempi Reali

### Example 1: Ratings Model

```php
// ✅ CORRETTO: 1 migrazione
// 2026_03_12_180000_create_ratings_table.php

Schema::create('ratings', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('description')->nullable();
    $table->string('color')->default('gray');
    $table->integer('value')->default(0);
    $table->integer('sum_credit')->default(0);
    $table->integer('count_credit')->default(0);
    $table->decimal('percentage', 5, 2)->default(0);
    $table->timestamps();
});

// ❌ SBAGLIATO: 5 migrazioni separate
// 2026_03_12_180000_create_ratings_table.php
// 2026_03_26_000000_add_description_to_ratings_table.php  ← VIOLAZIONE!
// 2026_03_26_000000_add_color_to_ratings_table.php       ← VIOLAZIONE!
// 2026_03_26_000000_add_value_to_ratings_table.php       ← VIOLAZIONE!
// 2026_03_26_000000_add_sum_credit_to_ratings_table.php  ← VIOLAZIONE!
```

---

### Example 2: Predict Model

```php
// ✅ CORRETTO: 1 migrazione
// 2026_03_12_180000_create_predicts_table.php

Schema::create('predicts', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('description')->nullable();
    $table->string('slug')->unique();
    $table->string('status')->default('draft');
    $table->timestamp('ends_at')->nullable();
    $table->timestamps();
});
```

---

## Violazioni

### Violazione Grave

```bash
# ❌ VIOLAZIONE GRAVE
Created: 2026_03_26_000000_add_value_to_ratings_table.php

# Perché è grave:
# 1. Ratings table è stata creata il 2026_03_12
# 2. Hai aggiunto 'value' 14 giorni dopo
# 3. Avresti dovuto modificare la migrazione originale
# 4. Hai creato confusione e debito tecnico
```

**Cosa Fare**:
1. Elimina la migrazione che viola
2. Modifica la migrazione originale
3. Rollback e re-migrate (se non sei in produzione)

---

## Tools

### Check Violations

```bash
# Trova migrazioni "add_X_to_Y_table"
find database/migrations -name "*add_*_to_*_table.php"

# Trova migrazioni per lo stesso modello
ls -la database/migrations/*_create_ratings_table.php
ls -la database/migrations/*add_*_to_ratings_table.php
```

---

## References

- [Laravel Migrations Documentation](https://laravel.com/docs/migrations)
- [Database Best Practices](../../../laravel/Modules/Xot/docs/DATABASE_BEST_PRACTICES.md)
- [Rule 009: One Migration Per Model](009-one-migration-per-model.md)

---

## Changelog

- **2026-03-26**: Created rule - CRITICAL
- **2026-03-26**: Added philosophy section
- **2026-03-26**: Added examples (correct vs wrong)
- **2026-03-26**: Added checklist pre-commit

---

**Enforced By**: AI Agents, Code Review  
**Violations**: 0 (must remain 0)  
**Last Review**: 2026-03-26  
**Next Review**: 2026-04-01
