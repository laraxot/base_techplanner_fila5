# Regola Critica: Gestione Proprietà Modelli Eloquent

## ⚠️ DIVIETO ASSOLUTO: property_exists() con Modelli Eloquent

**MAI utilizzare `property_exists()` con modelli Eloquent o oggetti che implementano `__get()`/`__set()`.**

### ❌ ERRORE GRAVE IDENTIFICATO
**Utilizzare `property_exists()` con modelli Eloquent è un errore GRAVE che può causare:**
- Bug difficili da debuggare in produzione
- Comportamenti imprevedibili e inconsistenti
- Violazione dei principi fondamentali di Laravel
- Problemi di analisi statica con PHPStan
- Errori che si manifestano solo in determinate condizioni

### Motivazione
- **Proprietà dinamiche**: I modelli Eloquent creano proprietà dinamicamente quando si accede alle colonne del database
- **Lazy loading**: Le relazioni e alcune proprietà non esistono finché non vengono accesse
- **Accessors/Mutators**: Le proprietà calcolate possono non essere rilevate correttamente
- **Proprietà magiche**: Laravel usa `__get()` e `__set()` per gestire l'accesso alle proprietà
- **Comportamento imprevedibile**: Può causare bug difficili da debuggare e comportamenti inaspettati

### ❌ ANTI-PATTERN (DA EVITARE ASSOLUTAMENTE)

```php
// ❌ GRAVEMENTE ERRATO - MAI FARE QUESTO
if (property_exists($user, 'full_name') && $user->full_name) {
    return $user->full_name;
}

if (property_exists($model, 'email') && $model->email) {
    return $model->email;
}

if (property_exists($notifiable, 'first_name') && $notifiable->first_name) {
    return $notifiable->first_name;
}
```

## ✅ PATTERN CORRETTO - Operatore Null Coalescing

**Utilizzare SEMPRE l'operatore null coalescing `??` per le proprietà magiche dei modelli Eloquent:**

```php
// ✅ CORRETTO - ?? gestisce correttamente i null
$value = $model->field ?? 'default';

// ✅ CORRETTO - Controllo robusto per proprietà esistente
if (($model->field ?? null) !== null) {
    // La proprietà esiste e non è null
}

// ✅ CORRETTO - Controllo per proprietà inesistente
if (($model->field ?? null) === null) {
    // La proprietà non esiste o è null
}

// ✅ CORRETTO - Accesso sicuro con default
$recordId = $record->id ?? 'N/A';
```

## ❌ ANTI-PATTERN - isset() con Proprietà Magiche

**MAI utilizzare `isset()` per le proprietà magiche dei modelli Eloquent:**

```php
// ❌ ERRATO - isset() può nascondere valori null
if (isset($model->field)) {
    // Questo non viene eseguito se field = null
}

// ❌ ERRATO - Comportamento imprevedibile
$value = isset($model->field) ? $model->field : 'default';
```

## Casi d'Uso Specifici

### 1. Verifica Proprietà Database
```php
// ✅ CORRETTO
if (isset($model->column_name) && $model->column_name) {
    // logica
}

// ❌ ERRATO
if (property_exists($model, 'column_name') && $model->column_name) {
    // logica
}
```

### 2. Verifica Relazioni
```php
// ✅ CORRETTO
if (isset($user->profile) && $user->profile) {
    return $user->profile->bio;
}

// ❌ ERRATO
if (property_exists($user, 'profile') && $user->profile) {
    return $user->profile->bio;
}
```

### 3. Verifica Accessors
```php
// ✅ CORRETTO
if ($user->hasGetMutator('full_name') && $user->full_name) {
    return $user->full_name;
}

// ❌ ERRATO
if (property_exists($user, 'full_name') && $user->full_name) {
    return $user->full_name;
}
```

### 4. Verifica Metodi
```php
// ✅ CORRETTO
if (method_exists($user, 'getFullName')) {
    return $user->getFullName();
}

// ❌ ERRATO
if (property_exists($user, 'getFullName')) {
    return $user->getFullName();
}
```

## Quando Usare property_exists

`property_exists()` può essere usato SOLO con:

1. **Classi standard PHP** (non modelli Eloquent)
2. **Oggetti senza metodi magici**
3. **Proprietà dichiarate esplicitamente**

```php
// ✅ CORRETTO - Classe standard PHP
class StandardClass {
    public $property;
}

$obj = new StandardClass();
if (property_exists($obj, 'property')) {
    // OK
}

// ❌ ERRATO - Modello Eloquent
$user = User::find(1);
if (property_exists($user, 'email')) {
    // MAI FARE QUESTO
}
```

## Esempi di Correzione

### File Corretto: GenericNotification.php (Modulo Notify)

**Prima (ERRATO):**
```php
if (is_object($notifiable) && property_exists($notifiable, 'full_name') && $notifiable->full_name) {
    return (string) ($notifiable->full_name ?? '');
}
```

**Dopo (CORRETTO con isset):**
```php
if (is_object($notifiable) && isset($notifiable->full_name) && $notifiable->full_name) {
    return (string) $notifiable->full_name;
}
```

**Dopo (MIGLIORATO con principi KISS e DRY):**
```php
// Early return per caso non-oggetto
if (!is_object($notifiable)) {
    return 'Utente';
}

// Null coalescing chain per proprietà - SOLUZIONE PIÙ ROBUSTA
return $notifiable->full_name ?? $notifiable->first_name ?? $notifiable->name ?? 'Utente';
```

## 🎯 PRINCIPI KISS E DRY - Miglioramento Post-Correzione

**DOPO aver corretto `property_exists()` con `isset()`, SEMPRE valutare se è possibile applicare i principi KISS e DRY per rendere il codice più robusto e manutenibile.**

### Principi da Applicare

#### 1. **KISS (Keep It Simple, Stupid)**
- **Ridurre controlli multipli**: Invece di 3-4 controlli `isset()`, usare null coalescing
- **Early return**: Gestire casi limite all'inizio della funzione
- **Eliminare variabili temporanee**: Calcolare direttamente il risultato

#### 2. **DRY (Don't Repeat Yourself)**
- **Null coalescing chain**: `$a ?? $b ?? $c ?? 'default'` invece di controlli ripetuti
- **Operatore null safe**: `$object?->property?->method()` invece di controlli multipli
- **Pattern unificato**: Stesso approccio per tutte le proprietà simili

#### 3. **Robustezza**
- **Null coalescing (`??`)**: Gestisce correttamente i null senza nasconderli
- **Operatore null safe (`?.`)**: Previene errori su oggetti null
- **Valori di default**: Sempre fornire fallback appropriati

### Pattern da Applicare SEMPRE

#### ✅ PATTERN CORRETTO - Null Coalescing Chain
```php
// ✅ CORRETTO - Gestione robusta di proprietà multiple
$value = $model->primary_property ?? $model->secondary_property ?? $model->fallback_property ?? 'default';
```

#### ✅ PATTERN CORRETTO - Null Safe Operator
```php
// ✅ CORRETTO - Accesso sicuro a proprietà annidate
$value = $model?->relation?->property ?? 'default';
```

#### ✅ PATTERN CORRETTO - Early Return
```php
// ✅ CORRETTO - Gestione casi limite all'inizio
if (!is_object($model)) {
    return 'default';
}
// Logica principale semplificata
```

### Anti-Pattern da Evitare

#### ❌ MAI USARE - Controlli Ripetitivi
```php
// ❌ ERRATO - Ripetizione di pattern
if (isset($model->prop1) && $model->prop1) {
    return $model->prop1;
}
if (isset($model->prop2) && $model->prop2) {
    return $model->prop2;
}
if (isset($model->prop3) && $model->prop3) {
    return $model->prop3;
}
```

#### ❌ MAI USARE - Variabili Temporanee Inutili
```php
// ❌ ERRATO - Variabili temporanee non necessarie
$temp = $model->relation;
if ($temp) {
    $result = $temp->property;
    return $result;
}
```

### Checklist di Miglioramento

Dopo aver corretto `property_exists()` con `isset()`, SEMPRE verificare:

1. **Possiamo usare null coalescing (`??`)?**
2. **Possiamo usare l'operatore null safe (`?.`)?**
3. **Possiamo eliminare controlli ripetitivi?**
4. **Possiamo usare early return?**
5. **Possiamo eliminare variabili temporanee?**
6. **Il codice è più leggibile e manutenibile?**

## Checklist di Verifica

Prima di ogni commit, verificare:

- [ ] Nessun uso di `property_exists()` con modelli Eloquent
- [ ] Nessun uso di `property_exists()` con oggetti che implementano `__get()`/`__set()`
- [ ] Uso di `isset()` per verificare proprietà magiche
- [ ] Uso di `method_exists()` per verificare metodi
- [ ] Uso di `hasAttribute()` per proprietà database
- [ ] Uso di `hasGetMutator()` per accessors
- [ ] PHPStan livello 9+ passa senza errori

## Riferimenti

- [Best Practices Modulo Xot](../../laravel/Modules/Xot/docs/eloquent-properties-best-practices.md)
- [Best Practices Modulo Notify](../../laravel/Modules/Notify/docs/eloquent-properties-best-practices.md)
- [Regole Windsurf](../../.windsurf/rules/model_property_rules.md)
- [Linee Guida AI](../../laravel/.ai/guidelines/CORE.md)

