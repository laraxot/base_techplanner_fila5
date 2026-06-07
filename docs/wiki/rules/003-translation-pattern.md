# Translation Pattern Rule

**Status**: 🔴 CRITICAL  
**Created**: 2026-03-26  
**Priority**: MANDATORY  
**Enforcement**: ZERO TOLERANCE

---

## 🚨 The Rule

> **MAI usare `{{ $tx(...) }}` o `{{ __('...') ?: 'fallback' }}`. SEMPRE usare `__('key', ['default' => 'fallback'])`.**

---

## ❌ WRONG Patterns

### Pattern 1: `$tx()` helper
```blade
{{-- ❌ SBAGLIATO --}}
{{ $tx('predict::labels.outcomes.title', 'Outcomes') }}
```

### Pattern 2: `__()` con fallback ternario
```blade
{{-- ❌ SBAGLIATO --}}
{{ __('predict::labels.outcomes.title') ?: 'Outcomes' }}
```

### Pattern 3: Fallback inline senza default
```blade
{{-- ❌ SBAGLIATO --}}
{{ __('predict::labels.outcomes.title') ?? 'Outcomes' }}
```

---

## ✅ CORRECT Pattern

### Pattern Canonico: `__('key', ['default' => 'fallback'])`

```blade
{{-- ✅ CORRETTO --}}
{{ __('predict::common.labels.outcomes.label', ['default' => 'Scegli l\'esito']) }}
```

---

## 📋 Translation Key Prototype

**Formato**: `<namespace>::<contesto>.<collezione>.<chiave>.<tipo>`

### Esempi:

| Tipo | Chiave | Esempio |
|------|--------|---------|
| **Label** | `common.labels.{nome}.label` | `predict::common.labels.outcomes.label` |
| **Description** | `common.descriptions.{nome}.label` | `predict::common.descriptions.outcomes.label` |
| **Title** | `pages.{pagina}.title` | `predict::pages.detail.title` |
| **Message** | `messages.{azione}` | `predict::messages.order_success` |
| **Validation** | `validation.{campo}` | `predict::validation.shares_range` |
| **Placeholder** | `forms.{form}.{campo}.placeholder` | `predict::forms.bet.amount.placeholder` |

---

## 🎯 Perché Questo Pattern

### 1. **`$tx()` NON esiste in Laravel**
- È un helper custom che crea dipendenze nascoste
- Non è testabile facilmente
- Crea confusione nel team

### 2. **`__()` con `['default' => '...']` è lo standard Laravel**
- ✅ Supportato nativamente da Laravel 12
- ✅ Testabile con `assertTranslated()`
- ✅ Chiaro e leggibile
- ✅ Mantiene il fallback in un posto solo

### 3. **Il prototipo `namespace::contesto.collezione.chiave.tipo`**
- ✅ **DRY**: Struttura coerente in tutto il progetto
- ✅ **KISS**: Facile da capire e ricordare
- ✅ **Scalabile**: Nuove traduzioni seguono lo stesso pattern
- ✅ **Ricerca**: `grep` trova facilmente tutte le traduzioni

---

## 🛠️ Fix Protocol

Se trovi `{{ $tx(...) }}` o `{{ __('...') ?: 'fallback' }}`:

### Step 1: Sostituire con `__('key', ['default' => 'fallback'])`

```blade
{{-- PRIMA --}}
{{ $tx('predict::labels.outcomes.title', 'Outcomes') }}

{{-- DOPO --}}
{{ __('predict::common.labels.outcomes.title', ['default' => 'Outcomes']) }}
```

### Step 2: Aggiornare il file di traduzione

Aggiungi la chiave nel file di traduzione:

**File**: `Modules/Predict/lang/it/common.php`
```php
return [
    'labels' => [
        'outcomes' => [
            'label' => 'Scegli l\'esito',
        ],
    ],
];
```

### Step 3: Testare

```bash
# Verifica che le traduzioni funzionano
php artisan lang:verify predict

# Controlla che non ci siano chiavi mancanti
php artisan debugbar:clear
```

---

## 📚 Translation File Structure

### Modulo Predict

```
Modules/Predict/
└── lang/
    ├── it/
    │   ├── common.php          # Label, descriptions, placeholders
    │   ├── messages.php        # Messaggi utente
    │   ├── validation.php      # Messaggi di validazione
    │   └── pages/
    │       ├── detail.php      # Traduzioni pagina dettaglio
    │       └── index.php       # Traduzioni pagina lista
    └── en/
        ├── common.php
        ├── messages.php
        ├── validation.php
        └── pages/
            ├── detail.php
            └── index.php
```

### Esempio `common.php`

```php
<?php

return [
    'labels' => [
        'outcomes' => [
            'label' => 'Scegli l\'esito',
            'count' => 'Esiti',
        ],
        'probability' => [
            'label' => 'Probabilità',
        ],
        'related_markets' => [
            'label' => 'Mercati Correlati',
        ],
    ],
    'descriptions' => [
        'outcomes' => [
            'label' => 'Gli esiti sono una superficie list-like: search, filtri e ordinamento stanno nel widget Filament riusabile.',
        ],
    ],
    'placeholders' => [
        'bet' => [
            'amount' => 'Importo',
            'shares' => 'Numero azioni',
        ],
    ],
];
```

---

## 🔧 Automation Script

```bash
#!/bin/bash
# bashscripts/check-translations.sh

echo "🔍 Checking for wrong translation patterns..."

# Check for $tx() usage
TX_COUNT=$(grep -r "{{ \$tx(" Modules/*/resources/views/ 2>/dev/null | wc -l)
if [ "$TX_COUNT" -gt 0 ]; then
    echo "❌ Found $TX_COUNT instances of \$tx() - FIX REQUIRED"
    grep -r "{{ \$tx(" Modules/*/resources/views/ 2>/dev/null
    exit 1
fi

# Check for __() with ?: fallback
TERNARY_COUNT=$(grep -r "{{ __('.*') ?:" Modules/*/resources/views/ 2>/dev/null | wc -l)
if [ "$TERNARY_COUNT" -gt 0 ]; then
    echo "❌ Found $TERNARY_COUNT instances of __() with ?: - FIX REQUIRED"
    grep -r "{{ __('.*') ?:" Modules/*/resources/views/ 2>/dev/null
    exit 1
fi

echo "✅ Translation patterns OK!"
```

---

## ✅ Checklist Pre-Commit

Prima di commitare file Blade:

- [ ] ✅ Nessun `{{ $tx(...) }}`
- [ ] ✅ Nessun `{{ __('...') ?: 'fallback' }}`
- [ ] ✅ Usato `__('key', ['default' => 'fallback'])`
- [ ] ✅ Chiavi traduzione seguono prototipo `namespace::contesto.collezione.chiave.tipo`
- [ ] ✅ File di traduzione aggiornati in `lang/it/` e `lang/en/`

---

## 📖 References

- [Laravel Localization](https://laravel.com/docs/localization)
- [Translation String Location](https://laravel.com/docs/localization#using-translation-strings-as-keys)
- [Translation Placeholders](https://laravel.com/docs/localization#replacing-parameters-in-translation-strings)

---

**Last Review**: 2026-03-26  
**Next Review**: 2026-04-02  
**Violations Fixed**: ViewPredictWidget blade  
**Violations Remaining**: 0
