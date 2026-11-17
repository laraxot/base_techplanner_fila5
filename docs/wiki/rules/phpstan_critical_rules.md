# PHPStan Critical Rules - Super Mucca Edition

## 🚨 REGOLE ASSOLUTE (MAI VIOLARE)

### 1. PHPStan Level 10 Requirement
- **ZERO errori PHPStan** - Nessuna eccezione
- **Type hints rigorosi** su tutti i metodi
- **Nessun mixed type non gestito**
- **Assert per validazioni critiche**

### 2. NO property_exists() su Eloquent Models
```php
// ❌ MAI
if (property_exists($model, 'attribute')) { }

// ✅ SEMPRE
if ($model->hasAttribute('attribute')) { }
// oppure
$value = $model->attribute ?? null;
```

### 3. Solo Classi XotBase per Filament
```php
// ❌ MAI
use Filament\Resources\Resource;

// ✅ SEMPRE
use Modules\Xot\Filament\Resources\XotBaseResource;
```

### 4. Cast Espliciti quando PHPStan non inferisce
```php
// ✅ Pattern
return view((string) $view);
$html = $out->render();
Assert::string($html);
return new HtmlString($html);
```

### 5. Niente PHPDoc tag ridondanti
```php
// ❌ SBAGLIATO
/** @var view-string $view */
return view($view);

// ✅ CORRETTO
return view((string) $view);
```

### 6. SafeStringCastAction per valori mixed
```php
// ✅ Pattern
$title = SafeStringCastAction::cast($attachment->title);
```

## 🔍 Pattern da Applicare

### Type Narrowing
```php
$id = $this->user->getAttribute('id');
$causerId = is_int($id) || is_string($id) ? $id : null;
```

### Import Verification
Verificare sempre che le classi importate esistano.

### Return Types
Usare sempre return types espliciti con validazione.

## ✅ Checklist Pre-Commit

- [ ] 0 errori PHPStan
- [ ] Nessun property_exists() su modelli
- [ ] Solo XotBase per Filament
- [ ] Cast espliciti dove necessario
- [ ] Niente PHPDoc ridondanti
- [ ] Type safety su tutti i ritorni

## 🎯 Obiettivo

Type safety al 100% con PHPStan Level 10 ZERO errori.