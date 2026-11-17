# 🚨 MIGRAZIONE CRITICA: $casts → casts() Method

## 📋 **SITUAZIONE CRITICA**

**Data Rilevamento**: 01 Agosto 2025
**Gravità**: 🔴 **CRITICA - AZIONE IMMEDIATA RICHIESTA**
**Impatto**: **20+ modelli** con proprietà `$casts` deprecata
**Rischio**: **Rottura completa** con Laravel 12+

## ⚠️ **PERCHÉ È COSÌ GRAVE**

### 1. **Laravel 11+ Deprecation**
```php
// ❌ DEPRECATO E PERICOLOSO (Laravel 11+)
protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
];

// ✅ METODO CORRETTO (Laravel 11+)
protected function casts(): array
{
    return [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
```

### 2. **Problemi PHPStan Livello 9+**
- **Warning continui** su proprietà deprecata
- **Fallimento build** automatiche
- **Incompatibilità** con analisi statica avanzata
- **Blocco CI/CD** pipeline

### 3. **Perdita Funzionalità Avanzate**
```php
// ❌ IMPOSSIBILE con $casts property
protected $casts = [
    'options' => AsEnumCollection::class.':'.UserOption::class, // Sintassi obsoleta
];

// ✅ POSSIBILE SOLO con casts() method
protected function casts(): array
{
    return [
        'options' => AsEnumCollection::of(UserOption::class), // Metodi statici avanzati
        'settings' => AsCollection::using(SettingsCollection::class),
        'metadata' => AsEncryptedCollection::using(MetadataCollection::class),
    ];
}
```

### 4. **Incompatibilità Futura**
- **Laravel 12**: Rimozione completa di `$casts`
- **PHPStan 2.0**: Errori fatali su proprietà deprecate
- **Filament 4.0**: Richiederà metodo `casts()`

## 📊 **AUDIT COMPLETO - MODELLI AFFETTI**

### **MODULI CRITICI (Core System)**
```bash
# Xot Module (CRITICO)
/Modules/Xot/app/Models/InformationSchemaTable.php:148

# Geo Module (CRITICO - BaseModel)
/Modules/Geo/app/Models/BaseModel.php:45          # ⚠️ IMPATTA TUTTI I MODELLI
/Modules/Geo/app/Models/BaseMorphPivot.php:53     # ⚠️ IMPATTA TUTTI I PIVOT
/Modules/Geo/app/Models/BasePivot.php:41          # ⚠️ IMPATTA TUTTI I PIVOT
/Modules/Geo/app/Models/Address.php:119
/Modules/Geo/app/Models/Location.php:81
/Modules/Geo/app/Models/Place.php:89
```

### **MODULI APPLICATIVI**
```bash
# FormBuilder Module
/Modules/FormBuilder/app/Models/FormSubmission.php:32
/Modules/FormBuilder/app/Models/FormField.php:34
/Modules/FormBuilder/app/Models/FormTemplate.php:33

# Notify Module
/Modules/Notify/app/Models/NotificationTemplate.php:87
/Modules/Notify/app/Models/MailTemplateVersion.php:74
/Modules/Notify/app/Models/MailTemplateLog.php:40

# Lang Module
/Modules/Lang/app/Models/TranslationFile.php:56

# Chart Module
/Modules/Chart/app/Models/Chart.php:99
```

### **TEMI (Meno Critici)**
```bash
# Theme Two
/Themes/Two/Main_files/filament-peek-demo/app/Models/Menu.php:14
/Themes/Two/Main_files/filament-peek-demo/app/Models/User.php:44
/Themes/Two/Main_files/filament-peek-demo/app/Models/Post.php:26
```

## 🎯 **PIANO DI MIGRAZIONE PRIORITARIO**

### **FASE 1: MODELLI BASE (PRIORITÀ MASSIMA)**
```bash
1. /Modules/Geo/app/Models/BaseModel.php          # IMPATTA TUTTO
2. /Modules/Geo/app/Models/BaseMorphPivot.php     # IMPATTA PIVOT
3. /Modules/Geo/app/Models/BasePivot.php          # IMPATTA PIVOT
4. /Modules/Xot/app/Models/InformationSchemaTable.php
```

### **FASE 2: MODELLI CORE (PRIORITÀ ALTA)**
```bash
5. /Modules/Notify/app/Models/NotificationTemplate.php
6. /Modules/FormBuilder/app/Models/FormSubmission.php
7. /Modules/FormBuilder/app/Models/FormField.php
8. /Modules/FormBuilder/app/Models/FormTemplate.php
```

### **FASE 3: MODELLI APPLICATIVI (PRIORITÀ MEDIA)**
```bash
9. /Modules/Geo/app/Models/Address.php
10. /Modules/Geo/app/Models/Location.php
11. /Modules/Geo/app/Models/Place.php
12. /Modules/Lang/app/Models/TranslationFile.php
13. /Modules/Chart/app/Models/Chart.php
```

### **FASE 4: TEMI (PRIORITÀ BASSA)**
```bash
14. /Themes/Two/Main_files/filament-peek-demo/app/Models/User.php
15. /Themes/Two/Main_files/filament-peek-demo/app/Models/Menu.php
16. /Themes/Two/Main_files/filament-peek-demo/app/Models/Post.php
```

## 🔧 **TEMPLATE DI MIGRAZIONE**

### **Pattern Standard**
```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Models;

class ModelName extends BaseModel
{
    // ❌ RIMUOVERE COMPLETAMENTE
    // protected $casts = [
    //     'created_at' => 'datetime',
    //     'updated_at' => 'datetime',
    //     'is_active' => 'boolean',
    // ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'is_active' => 'boolean',
        ];
    }
}
```

### **Pattern Avanzato con Enum e Collection**
```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Models;

use Illuminate\Database\Eloquent\Casts\AsEnumCollection;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use App\Enums\StatusEnum;
use App\Collections\MetadataCollection;

class AdvancedModel extends BaseModel
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            // Cast standard
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'is_active' => 'boolean',
            'price' => 'decimal:2',

            // Cast avanzati (SOLO con metodo casts())
            'status' => StatusEnum::class,
            'options' => AsEnumCollection::of(OptionEnum::class),
            'metadata' => AsCollection::using(MetadataCollection::class),
            'settings' => 'encrypted:array',
        ];
    }
}
```

### **Pattern BaseModel (Critico)**
```php
<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Modules\Xot\Models\XotBaseModel;

abstract class BaseModel extends XotBaseModel
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return array_merge(parent::casts(), [
            'published_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ]);
    }
}
```

## 🧪 **SCRIPT DI VALIDAZIONE**

### **Controllo Pre-Migrazione**
```bash
#!/bin/bash
# check_casts_deprecation.sh

echo "🔍 Cercando proprietà \$casts deprecate..."
grep -r "protected \$casts" /var/www/html/_bases/base_techplanner_fila5/laravel/Modules/ --include="*.php"

echo "🔍 Cercando metodi casts() esistenti..."
grep -r "protected function casts()" /var/www/html/_bases/base_techplanner_fila5/laravel/Modules/ --include="*.php"

echo "✅ Controllo completato"
```

### **Controllo Post-Migrazione**
```bash
#!/bin/bash
# validate_casts_migration.sh

DEPRECATED_COUNT=$(grep -r "protected \$casts" /var/www/html/_bases/base_techplanner_fila5/laravel/Modules/ --include="*.php" | wc -l)
METHOD_COUNT=$(grep -r "protected function casts()" /var/www/html/_bases/base_techplanner_fila5/laravel/Modules/ --include="*.php" | wc -l)

echo "📊 Risultati migrazione:"
echo "❌ Proprietà \$casts rimaste: $DEPRECATED_COUNT"
echo "✅ Metodi casts() implementati: $METHOD_COUNT"

if [ $DEPRECATED_COUNT -eq 0 ]; then
    echo "🎉 MIGRAZIONE COMPLETATA CON SUCCESSO!"
else
    echo "⚠️ MIGRAZIONE INCOMPLETA - Azione richiesta"
fi
```

## 📋 **CHECKLIST MIGRAZIONE**

### **Per Ogni Modello**
- [ ] Identificare la proprietà `$casts` esistente
- [ ] Creare il metodo `protected function casts(): array`
- [ ] Spostare tutti i cast nel metodo
- [ ] Aggiungere PHPDoc corretto `@return array<string, string>`
- [ ] Rimuovere completamente la proprietà `$casts`
- [ ] Testare il modello con PHPStan livello 9
- [ ] Verificare funzionalità cast in runtime

### **Per BaseModel**
- [ ] Implementare `array_merge(parent::casts(), [...])`
- [ ] Verificare che tutti i modelli figli funzionino
- [ ] Testare ereditarietà cast
- [ ] Validare con PHPStan

### **Validazione Finale**
- [ ] Eseguire script di controllo
- [ ] PHPStan livello 9 su tutti i moduli
- [ ] Test funzionali su cast critici
- [ ] Verifica performance casting
- [ ] Aggiornamento documentazione

## 🚨 **RISCHI E MITIGAZIONI**

### **Rischi Identificati**
1. **Rottura temporanea** durante migrazione
2. **Conflitti** tra `$casts` e `casts()` se coesistono
3. **Perdita dati** se cast non corretti
4. **Performance degradation** temporanea

### **Mitigazioni**
1. **Migrazione graduale** per modulo
2. **Testing estensivo** prima del deploy
3. **Backup database** prima della migrazione
4. **Rollback plan** documentato

## 🔗 **DOCUMENTAZIONE CORRELATA**

- [Laravel 11 Casting Documentation](https://laravel.com/docs/11.x/eloquent-mutators)
- [Laravel News: Model Casts Migration](https://laravel-news.com/model-casts)
- [PHPStan Laravel Rules](https://github.com/larastan/larastan)
- [Laraxot Model Rules](./laraxot_model_rules.md)

## 📝 **CONCLUSIONI**

Questa migrazione è **CRITICA** e **NON PROCRASTINABILE**:

1. **Impatto immediato**: PHPStan warnings e build failures
2. **Impatto futuro**: Incompatibilità totale con Laravel 12+
3. **Benefici**: Casting avanzato, performance migliori, tipizzazione forte
4. **Urgenza**: Iniziare IMMEDIATAMENTE con i BaseModel

**AZIONE RICHIESTA**: Iniziare la migrazione entro 24 ore, partendo dai modelli base per massimizzare l'impatto.

---

*Documento creato il 01 Agosto 2025 - Priorità CRITICA*
*Autore: Sistema Audit Laraxot*
*Versione: 1.0 - EMERGENZA*
