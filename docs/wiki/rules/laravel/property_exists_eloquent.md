# DIVIETO ASSOLUTO: MAI USARE property_exists() CON MODELLI ELOQUENT

## Problema Critico
L'uso di `property_exists()` con modelli Laravel Eloquent è un errore critico che compromette la correttezza del codice.

## Spiegazione Tecnica
I modelli Eloquent utilizzano il pattern Active Record con metodi magici `__get()` e `__set()` per gestire l'accesso agli attributi. Gli attributi del database non sono proprietà PHP reali dell'oggetto, quindi:

- `property_exists($model, 'attributo')` restituisce **SEMPRE `false`** per attributi del database
- Questo causa logica applicativa errata e comportamenti imprevedibili
- Viola il principio di funzionamento di Laravel/Eloquent

## Pattern Corretti

### ✅ Per verificare se un attributo è impostato
```php
// Corretto
if (isset($model->attributo)) { ... }
```

### ✅ Per verificare se una colonna esiste nel database
```php
// Corretto
if (array_key_exists('colonna', $model->getAttributes())) { ... }
```

### ✅ Per verificare se esiste un accessor
```php
// Corretto
if ($model->hasGetMutator('nome_completo')) { ... }
```

### ✅ Per verificare se esiste l'ID o chiave primaria
```php
// Corretto
if ($model instanceof Model && $model->getKey() !== null) { ... }
```

### ✅ Per confrontare istanze di modelli
```php
// Corretto
if ($model instanceof Model && $otherModel instanceof Model && $model->is($otherModel)) { ... }
```

## Anti-pattern da Evitare Assolutamente

```php
// ❌ MAI FARE QUESTO
if (property_exists($model, 'attribute')) { ... }

// ❌ MAI FARE QUESTO
if (property_exists($record, 'id') && $record->id === $userId) { ... }
```

## Metodi Utili di Laravel
- `$model->getAttribute('attributo')` - Ottiene un attributo (null se non esiste)
- `$model->hasAttribute('attributo')` - Verifica se un attributo esiste
- `$model->getAttributes()` - Ottiene tutti gli attributi come array
- `$model->getKey()` - Ottiene il valore della chiave primaria
- `$model->is($otherModel)` - Confronta due istanze di modello
- `$model->exists` - Verifica se il modello esiste nel database

## Casi Particolari
- Relazioni: usa `$model->relationLoaded('relation')` o `$model->getRelation('relation')`
- Verifica tipo: usa `$model instanceof ModelClass`
- Enum e tipi speciali: verifica con `$model->getAttribute('type') instanceof \BackedEnum`

## Conseguenze del Mancato Rispetto
- Bug difficili da debuggare
- Comportamento imprevedibile e inconsistente
- Violazione delle best practice Laravel
- Errori in produzione

## Riferimenti
- [Laravel Documentation - Eloquent: Getting Started](https://laravel.com/docs/10.x/eloquent)
- [Laravel Eloquent Model API](https://laravel.com/api/10.x/Illuminate/Database/Eloquent/Model.html)
- [Laravel Documentation - Eloquent: Mutators & Casting](https://laravel.com/docs/10.x/eloquent-mutators)
- [Linee guida interne](/var/www/html/ptvx/laravel/.ai/guidelines/model/eloquent_property_exists.md)
