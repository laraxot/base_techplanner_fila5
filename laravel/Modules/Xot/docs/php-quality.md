# PHPStan Code Quality Guide - Laraxot

**Ultimo aggiornamento**: [DATE]
**Principi**: DRY + KISS + SOLID + Robust
**Stack**: Laravel 12 + Filament 4 + PHP 8.3 + Laraxot
**Obiettivo**: 0 errori PHPStan Level 10 + Complexity < 10 + Quality > 80%

---

## 📑 Indice

1. [Regole Assolute](#-regole-assolute)
2. [Quick Reference - Comandi](#-quick-reference---comandi-essenziali)
3. [Workflow Operativo](#-workflow-operativo)
4. [Regole Architetturali](#-regole-architetturali)
5. [Patterns di Correzione](#-patterns-di-correzione)
6. [Complexity Reduction](#-complexity-reduction-patterns)
7. [Widget Best Practices](#-widget-best-practices)
8. [Code Quality Tools](#-code-quality-tools)
9. [Commenti e TODO](#-commenti-e-todo)
10. [Filament Class Extensions](#-filament-class-extension-rules)
11. [Anti-Pattern da Evitare](#-anti-pattern-da-evitare)
12. [Checklist e Mantra](#-checklist-e-mantra-finale)

---

## 🚨 Regole Assolute

### Mai Modificare Configurazione
- **NON modificare MAI** `laravel/phpstan.neon`
- **NON creare baseline** - tutti gli errori vanno corretti
- **NON ignorare errori** - approccio "fix, don't ignore"
- **NON usare** `@phpstan-ignore` (eccezione: solo per bug noti di PHPStan con issue aperta)

### Filosofia Fondamentale
- **Docs come Bibbia**: Studia `Modules/{Modulo}/docs/` prima di ogni correzione
- **Link sempre relativi**: Mai path assoluti nei file .md
- **Naming files**: Minuscolo, no date, solo README.md può essere maiuscolo
- **Property exists**: NON funziona con magic attributes Eloquent - usa `isset()`
- **Complexity target**: Ogni metodo < 10 cyclomatic complexity
- **Function length**: Ogni metodo < 20 righe (target), max 50 righe

---

## 📋 Quick Reference - Comandi Essenziali

```bash
# Analisi PHPStan completa
cd laravel
./vendor/bin/phpstan analyse Modules --memory-limit=-1

# Analisi singolo modulo
./vendor/bin/phpstan analyse Modules/{ModuleName} --memory-limit=-1

# Analisi file specifico
./vendor/bin/phpstan analyse Modules/{Module}/app/path/to/File.php --level=10 --error-format=table

# Verifica autoload
composer dump-autoload && php artisan config:clear && php artisan cache:clear

# Code Quality Tools
./vendor/bin/pint --dirty                    # Format changed files
php phpmd.phar path/to/file text cleancode,codesize,design,naming
./vendor/bin/phpinsights analyse Modules/{Module} --format=table

# Complexity Analysis
php phpmd.phar Modules/{Module} text codesize --reportfile /tmp/complexity.txt
```

---

## 🎯 Workflow Operativo

### Fase 1: Preparazione
1. **Aumenta confidenza**: Studia architettura e business logic
2. **Studia docs**: Leggi `Modules/{Modulo}/docs/` e `Themes/{Tema}/docs/`
3. **Aggiorna docs**: Mantieni documentazione sempre aggiornata

### Fase 2: Analisi
```bash
cd laravel
./vendor/bin/phpstan analyse Modules --memory-limit=-1 > /tmp/phpstan-report.txt
./vendor/bin/phpinsights analyse Modules/{Module} > /tmp/insights-report.txt
```

### Fase 3: Correzione Sistematica
1. **Scegli modulo**: Inizia da moduli con meno errori (quick wins)
2. **Categorizza errori**: Raggruppa per tipo (argument.type, return.type, ecc.)
3. **Correggi batch**: Pattern simili insieme
4. **Verifica incrementale**: Riesegui PHPStan dopo ogni batch
5. **Aggiorna docs**: Documenta modifiche e pattern applicati
6. **Quality check**: Verifica complexity e PHP Insights

### Fase 4: Verifica Finale
```bash
./vendor/bin/phpstan analyse Modules --memory-limit=-1
./vendor/bin/pint --dirty
./vendor/bin/phpinsights analyse Modules/{Module}
composer dump-autoload
php artisan config:clear
php artisan cache:clear
```

---

## 🏗️ Regole Architetturali

### Struttura Modulare
- Ogni modulo è **completamente indipendente**
- Namespace: `Modules\{ModuleName}\` (MAI con prefisso "app")
- Autoload indipendente per ogni modulo
- Ogni modulo ha proprio `composer.json`

### Estensione Classi Filament
**MAI estendere classi Filament direttamente** - sempre XotBase:
- `Filament\Resources\Resource` → `Modules\Xot\Filament\Resources\XotBaseResource`
- `Filament\Resources\Pages\CreateRecord` → `Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord`
- `Filament\Resources\Pages\EditRecord` → `Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord`
- `Filament\Resources\Pages\ListRecords` → `Modules\Xot\Filament\Resources\Pages\XotBaseListRecords`
- `Filament\Widgets\Widget` → `Modules\Xot\Filament\Widgets\XotBaseWidget`
- `Filament\Widgets\TableWidget` → `Modules\Xot\Filament\Widgets\XotBaseTableWidget`
- `Filament\Widgets\ChartWidget` → `Modules\Xot\Filament\Widgets\XotBaseChartWidget`
- `Filament\Widgets\StatsOverviewWidget` → `Modules\Xot\Filament\Widgets\XotBaseStatsOverviewWidget`
- `Illuminate\Support\ServiceProvider` → `Modules\Xot\Providers\XotBaseServiceProvider`

### Metodi Resource Filament
- Chi estende `XotBaseResource` **NON deve avere** `getTableColumns()`
- `getTableActions()` e `getTableBulkActions()` devono restituire `array<string, mixed>`
- Se solo azioni standard → **rimuovile completamente**
- Se azioni personalizzate → includi `...parent::getTableActions()`

### Metodi Page Filament
Chi estende `XotBasePage` **NON deve avere**:
- `protected static ?string $navigationIcon`
- `protected static ?string $title`
- `protected static ?string $navigationLabel`

### Gestione Traduzioni
- **NON usare MAI**: `->label()`, `->placeholder()`, `->tooltip()`
- Tutte le etichette tramite file di traduzione nei moduli
- Usa `LangServiceProvider` per gestione automatica
- Struttura chiavi: `modulo::risorsa.fields.campo.label`

### Type Safety
- **Type hints rigorosi** per tutti i parametri e return types
- Gestisci **nullable values** (`?string`, `?int`)
- Evita `mixed` types salvo necessità documentate
- Array con **strutture definite** (`array<string, mixed>`)
- Usa `declare(strict_types=1);` in tutti i file PHP
- Usa **Webmozart Assert** per validazioni robuste
- Usa **TheCodingMachine Safe** per funzioni PHP sicure

---

## 🔧 Patterns di Correzione

### 1. Carbon createFromFormat (Carbon|null vs Carbon|false)
```php
// ✅ CORRETTO - L'estensione Carbon restituisce Carbon|null
$targetMonth = Carbon::createFromFormat('Y-m', $month);
if ($targetMonth === null) {
    $targetMonth = now()->startOfMonth();
} else {
    $targetMonth = $targetMonth->startOfMonth();
}
```

### 2. Type Narrowing con Assert
```php
use Webmozart\Assert\Assert;

// ✅ CORRETTO
if (is_array($data)) {
    Assert::isArray($data);
    $value = $data['key'] ?? null;
}
```

### 3. Cast Actions Centralizzate
```php
use Modules\Xot\Actions\Cast\SafeArrayCastAction;
use Modules\Xot\Actions\Cast\SafeStringCastAction;

// ✅ CORRETTO
$data = SafeArrayCastAction::cast($input);
$title = SafeStringCastAction::cast($mod->title);
```

### 4. Array Associativi Filament
```php
// ❌ ERRORE - array<int, Action>
public function getTableActions(): array
{
    return [EditAction::make(), DeleteAction::make()];
}

// ✅ CORRETTO - array<string, mixed>
public function getTableActions(): array
{
    return [
        'edit' => EditAction::make(),
        'delete' => DeleteAction::make(),
    ];
}
```

### 5. Property Access su Mixed (Eloquent)
```php
// ❌ ERRORE - property_exists() NON funziona con magic attributes
if (property_exists($model, 'attribute')) {
    $value = $model->attribute;
}

// ✅ CORRETTO - usa isset() per magic attributes
if (isset($model->attribute)) {
    $value = $model->attribute;
}

// ✅ ANCHE CORRETTO - validazione multipla
if (is_object($model) && isset($model->attribute)) {
    $value = $model->attribute;
}
```

### 6. Casts Completi per Properties
```php
// ✅ CORRETTO - Tutte le properties usate DEVONO essere nei casts()
protected function casts(): array
{
    return [
        'auto_cleanup_num' => 'integer',
        'auto_cleanup_type' => 'string',
        'notification_email_address' => 'string',
    ];
}
```

### 7. HasXotFactory NON è Generico
```php
// ❌ ERRORE - HasXotFactory NON accetta generics
/** @use HasXotFactory<TFactory> */
use HasXotFactory;

// ✅ CORRETTO - Rimuovi generics
use HasXotFactory;
```

### 8. Notification via() Return Type
```php
// ❌ ERRORE - list<string>
public function via($notifiable): array
{
    return ['mail', 'nexmo'];
}

// ✅ CORRETTO - array<string, mixed>
/**
 * @return array<string, mixed>
 */
public function via($notifiable): array
{
    return [
        'mail' => 'mail',
        'nexmo' => 'nexmo',
    ];
}
```

### 9. Relazioni Eloquent con Generics
```php
// ✅ CORRETTO - Generics solo in PHPDoc
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @return HasMany<Post>
 */
public function posts(): HasMany
{
    return $this->hasMany(Post::class);
}
```

### 10. Factory Typing
```php
// ✅ CORRETTO
/**
 * @var \Illuminate\Database\Eloquent\Factories\Factory<Model> $factory
 */
$factory = Model::factory();
Assert::object($factory);
Assert::methodExists($factory, 'create');
$result = $factory->create($data);
```

### 11. Builder Type Hints con PHPDoc
```php
// ✅ CORRETTO - Type hint per query builder
/**
 * @param  \Illuminate\Database\Eloquent\Builder<\Modules\Limesurvey\Models\SurveyResponse>  $query
 */
private function applyFilters(\Illuminate\Database\Eloquent\Builder $query): void
{
    $query->where('status', 'active');
}

// ✅ ANCHE CORRETTO - PHPDoc per variabile
/** @var \Illuminate\Database\Eloquent\Builder<\Modules\User\Models\User> $query */
$query = User::query()->where('active', true);
```

---

## 🎯 Complexity Reduction Patterns

### Extract Method Pattern

**Problema**: Funzione troppo lunga (> 20 righe) o complessa (cyclomatic complexity > 10)

**Soluzione**: Estrarre logica in metodi privati focalizzati

#### Esempio Reale: QuestionChartStatsOverviewWidget

```php
// ❌ PRIMA - 104 righe, complexity 15
protected function getStats(): array
{
    if ($this->record === null) {
        return [
---
module: theme
topic: php-quality
canonical: ../../../Themes/docs/shared-components/php-quality-guide.md
---

See canonical documentation: ../../../Themes/docs/shared-components/php-quality-guide.md
