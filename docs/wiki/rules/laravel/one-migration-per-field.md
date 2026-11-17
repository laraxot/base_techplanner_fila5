# 🗄️ One Migration Per Model Philosophy

**Status**: ✅ MANDATORY  
**Version**: 1.0  
**Last Updated**: 2026-03-26  
**Enforcement**: STRICT

---

## 🎯 Core Philosophy

> **1 Migration = 1 Campo (NON 1 Migration = 1 Modello)**

Ogni campo aggiuntivo deve avere la **propria migration indipendente**.

---

## ✅ DO - Migration Indipendenti

### ✅ CORRETTO: Una migration per campo

```php
// 2026_03_26_000001_add_value_column_to_ratings_table.php
return new class extends XotBaseMigration {
    public function up(): void
    {
        $this->tableUpdate(
            function (Blueprint $table): void {
                if (! $this->hasColumn('value')) {
                    $table->decimal('value', 10, 2)->nullable()->after('txt');
                }
            }
        );
    }

    public function down(): void
    {
        $this->tableDropColumn('value');
    }
};

// 2026_03_26_000002_add_probability_column_to_ratings_table.php
return new class extends XotBaseMigration {
    public function up(): void
    {
        $this->tableUpdate(
            function (Blueprint $table): void {
                if (! $this->hasColumn('probability')) {
                    $table->double('probability')->nullable()->after('value');
                }
            }
        );
    }

    public function down(): void
    {
        $this->tableDropColumn('probability');
    }
};
```

---

## ❌ DON'T - Migration Multiple

```php
// ❌ SBAGLIATO: Una migration per tutti i campi
return new class extends XotBaseMigration {
    public function up(): void
    {
        $this->tableUpdate(
            function (Blueprint $table): void {
                if (! $this->hasColumn('value')) {
                    $table->decimal('value', 10, 2)->nullable();
                }
                if (! $this->hasColumn('probability')) {
                    $table->double('probability')->nullable();
                }
                if (! $this->hasColumn('meta')) {
                    $table->json('meta')->nullable();
                }
            }
        );
    }

    public function down(): void
    {
        // ❌ SBAGLIATO: Rimuove tutti i campi insieme
        $this->tableDropColumn(['value', 'probability', 'meta']);
    }
};
```

---

## 📋 Perché 1 Migration = 1 Campo

### 1. **Rollback Granulare**

```bash
# ✅ Puoi fare rollback di un singolo campo
php artisan migrate:rollback --step=1

# ❌ Con migration multipla, perdi tutti i campi
```

### 2. **Versioning Chiaro**

```
2026_03_26_000001_add_value_column_to_ratings_table.php
2026_03_26_000002_add_probability_column_to_ratings_table.php
2026_03_26_000003_add_meta_column_to_ratings_table.php
```

Ogni campo ha:
- ✅ Timestamp proprio
- ✅ Nome descrittivo
- ✅ Storia Git chiara

### 3. **DRY + KISS**

- **DRY**: Ogni migration fa UNA cosa sola
- **KISS**: Semplice da capire, semplice da revertare

### 4. **Git History**

```bash
# ✅ Chiaro quale commit ha aggiunto quale campo
git log --oneline -- laravel/Modules/Rating/database/migrations/
abc123 Add value column to ratings
def456 Add probability column to ratings
ghi789 Add meta column to ratings
```

---

## 🏗️ Migration Structure

### Template Standard

```php
<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Add {column_name} column to {table_name} table.
 *
 * Descrizione dello scopo del campo.
 *
 * PHILOSOPHY: 1 migration per 1 campo
 * - Rollback granulare
 * - Versioning chiaro
 * - DRY + KISS
 */
return new class extends XotBaseMigration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $this->tableUpdate(
            function (Blueprint $table): void {
                if (! $this->hasColumn('{column_name}')) {
                    $table->{type}('{column_name}', {length})->{nullable}()->after('{previous_column}');
                }
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $this->tableDropColumn('{column_name}');
    }
};
```

---

## 📊 Comparison Table

| Aspect | 1 Migration = 1 Campo | 1 Migration = 1 Modello |
|--------|----------------------|-------------------------|
| **Rollback** | ✅ Granulare | ❌ Tutti i campi insieme |
| **Git History** | ✅ Chiaro | ❌ Confuso |
| **Versioning** | ✅ Timestamp per campo | ❌ Timestamp unico |
| **DRY** | ✅ Una responsabilità | ❌ Multiple responsabilità |
| **KISS** | ✅ Semplice | ❌ Complesso |
| **Testing** | ✅ Isolato | ❌ Accoppiato |
| **Maintenance** | ✅ Facile | ❌ Difficile |

---

## 🔧 Esempi Pratici

### Example 1: Aggiungere 3 Campi

**Scenario**: Aggiungere `value`, `probability`, `meta` a `ratings`

**✅ CORRETTO**:

```bash
# Crea 3 migration separate
php artisan make:migration add_value_column_to_ratings_table
php artisan make:migration add_probability_column_to_ratings_table
php artisan make:migration add_meta_column_to_ratings_table
```

**Migration 1**:
```php
// 2026_03_26_000001_add_value_column_to_ratings_table.php
$table->decimal('value', 10, 2)->nullable()->after('txt');
```

**Migration 2**:
```php
// 2026_03_26_000002_add_probability_column_to_ratings_table.php
$table->double('probability')->nullable()->after('value');
```

**Migration 3**:
```php
// 2026_03_26_000003_add_meta_column_to_ratings_table.php
$table->json('meta')->nullable()->after('probability');
```

---

### Example 2: Rimuovere un Campo

**Scenario**: Rimuovere solo `probability`

**✅ CORRETTO**:

```bash
# Crea migration specifica
php artisan make:migration remove_probability_column_from_ratings_table
```

```php
// 2026_03_27_000001_remove_probability_column_from_ratings_table.php
public function up(): void
{
    $this->tableDropColumn('probability');
}

public function down(): void
{
    $this->tableUpdate(
        function (Blueprint $table): void {
            $table->double('probability')->nullable();
        }
    );
}
```

---

## 🚨 Violations & Fixes

### Violation 1: Migration Multipla

```php
// ❌ VIOLATION
public function up(): void
{
    $this->tableUpdate(
        function (Blueprint $table): void {
            $table->string('color')->nullable();
            $table->string('icon')->nullable();
            $table->text('description')->nullable();
        }
    );
}
```

**Fix**:
```php
// ✅ FIX: 3 migration separate
// 1. add_color_column
$table->string('color')->nullable();

// 2. add_icon_column
$table->string('icon')->nullable();

// 3. add_description_column
$table->text('description')->nullable();
```

---

## ✅ Enforcement Checklist

- [ ] **Una migration per campo**: Ogni campo ha la sua migration
- [ ] **Nome descrittivo**: `add_{column}_column_to_{table}_table`
- [ ] **Check esistenza**: `if (! $this->hasColumn('column'))`
- [ ] **Down reversibile**: `down()` ripristina lo stato precedente
- [ ] **After clause**: Specifica dopo quale campo inserire
- [ ] **Commento filosofia**: Documenta "1 migration = 1 campo"

---

## 📚 Related Documents

- [Migration Complete Rules](../laravel/migration-complete-rules.md)
- [Migration Safety](../laravel/migration-safety.md)
- [DRY Actions Rules](../laravel/DRY-actions-rules.md)

---

**Maintained By**: AI Agents Team  
**Last Review**: 2026-03-26  
**Next Review**: 2026-04-26  
**Enforcement**: MANDATORY
