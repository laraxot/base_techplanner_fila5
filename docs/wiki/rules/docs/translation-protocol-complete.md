# 🌐 Translation Protocol - COMPLETE GUIDE

**Status**: ✅ MANDATORY  
**Version**: 3.0 (Final)  
**Last Updated**: 2026-03-26  
**Enforcement**: STRICT

---

## 🎯 GOLDEN RULE

> **MAI USARE `$tx()` - SEMPRE USARE `__()` CON IL PROTOCOLLO CORRETTO**

**Protocollo**:
```
__('<namespace>::<context>.<collection>.<key>.<type>')
```

---

## ❌ NEVER DO THIS

```blade
{{-- ❌ SBAGLIATO: Funzione $tx() inesistente --}}
{{ $tx('predict::status.active', 'Active') }}
{{ $tx('predict::labels.volume_24h', 'Volume 24h') }}
{{ $tx('predict::labels.ends_in', 'Ends in') }}

{{-- ❌ SBAGLIATO: Chiave piatta senza contesto --}}
{{ __('predict::labels.outcomes') }}
{{ __('predict::status.active') }}
{{ __('predict::volume_24h') }}
```

---

## ✅ ALWAYS DO THIS

```blade
{{-- ✅ CORRETTO: Protocollo completo --}}
{{ __('predict::status.market.active') ?: 'Active' }}
{{ __('predict::market.stats.volume_24h.label') ?: 'Volume 24h' }}
{{ __('predict::market.dates.ends_in') ?: 'Ends in' }}
{{ __('predict::list.outcomes.heading') ?: 'Choose your winner' }}
```

---

## 📋 PROTOCOL STRUCTURE

### Componenti del Protocollo

```
<namespace>::<context>.<collection>.<key>.<type>
     │        │         │         │       │
     │        │         │         │       └─> type: label, title, hint, tooltip, error
     │        │         │         └─────────> key: nome specifico
     │        │         └───────────────────> collection: outcomes, markets, users
     │        └─────────────────────────────> context: list, form, detail, widget, status, market
     └──────────────────────────────────────> namespace: predict, blog, user
```

### Contesti Standard

| Context | Usage | Example |
|---------|-------|---------|
| `list` | Liste, collezioni, tabelle | `list.outcomes.heading` |
| `form` | Form, input, campi | `form.bet.quantity.label` |
| `detail` | Pagine dettaglio | `detail.predict.title` |
| `widget` | Widget, componenti | `widget.outcomes_grid.title` |
| `status` | Stati, badge | `status.market.active` |
| `market` | Dati mercato | `market.stats.volume_24h.label` |
| `action` | Azioni, bottoni | `action.bet.label` |
| `message` | Messaggi, notifiche | `message.success` |

---

## 📝 TRANSLATION FILE STRUCTURE

### Italian (it/predict.php)

```php
return [
    'list' => [
        'outcomes' => [
            'heading' => 'Scegli il tuo vincitore',
            'empty' => 'Nessun outcome disponibile',
        ],
    ],
    'market' => [
        'stats' => [
            'volume_24h' => [
                'label' => 'Volume 24h',
            ],
        ],
        'dates' => [
            'ends_in' => 'Termina tra',
            'closed_at' => 'Chiuso il',
        ],
    ],
    'status' => [
        'market' => [
            'active' => 'Attivo',
            'open' => 'Aperto',
            'closed' => 'Chiuso',
            'published' => 'Pubblicato',
        ],
    ],
    'form' => [
        'bet' => [
            'quantity' => [
                'label' => 'Quantità',
                'placeholder' => 'Inserisci quantità',
                'hint' => 'Inserisci un valore tra 1 e 1000',
                'error' => 'Errore: :error',
            ],
        ],
    ],
];
```

### English (en/predict.php)

```php
return [
    'list' => [
        'outcomes' => [
            'heading' => 'Choose your winner',
            'empty' => 'No outcomes available',
        ],
    ],
    'market' => [
        'stats' => [
            'volume_24h' => [
                'label' => 'Volume 24h',
            ],
        ],
        'dates' => [
            'ends_in' => 'Ends in',
            'closed_at' => 'Closed at',
        ],
    ],
    'status' => [
        'market' => [
            'active' => 'Active',
            'open' => 'Open',
            'closed' => 'Closed',
            'published' => 'Published',
        ],
    ],
];
```

---

## 🔧 BLADE EXAMPLES

### Example 1: Status Badge

```blade
{{-- ❌ WRONG --}}
<span>{{ $tx('predict::status.active', 'Active') }}</span>

{{-- ✅ CORRECT --}}
<span>{{ __('predict::status.market.active') ?: 'Active' }}</span>
```

### Example 2: Market Stats

```blade
{{-- ❌ WRONG --}}
<span>{{ $tx('predict::labels.volume_24h', 'Volume 24h') }}</span>

{{-- ✅ CORRECT --}}
<span>{{ __('predict::market.stats.volume_24h.label') ?: 'Volume 24h' }}</span>
```

### Example 3: Dates

```blade
{{-- ❌ WRONG --}}
<span>{{ $tx('predict::labels.ends_in', 'Ends in') }}</span>

{{-- ✅ CORRECT --}}
<span>{{ __('predict::market.dates.ends_in') ?: 'Ends in' }}: {{ $date->diffForHumans() }}</span>
```

### Example 4: List Heading

```blade
{{-- ❌ WRONG --}}
<h3>{{ __('predict::labels.outcomes') }}</h3>

{{-- ✅ CORRECT --}}
<h3>{{ __('predict::list.outcomes.heading') ?: 'Choose your winner' }}</h3>
```

---

## 🚨 MIGRATION GUIDE

### Step 1: Find All Violations

```bash
# Find $tx() usage
grep -r "\$tx(" laravel/Themes laravel/Modules --include="*.blade.php"

# Find flat keys
grep -r "__('predict::labels\." laravel/Themes laravel/Modules --include="*.blade.php"
```

### Step 2: Replace with Correct Protocol

| Old (Wrong) | New (Correct) |
|-------------|---------------|
| `$tx('predict::status.active')` | `__('predict::status.market.active')` |
| `$tx('predict::labels.volume_24h')` | `__('predict::market.stats.volume_24h.label')` |
| `$tx('predict::labels.ends_in')` | `__('predict::market.dates.ends_in')` |
| `__('predict::labels.outcomes')` | `__('predict::list.outcomes.heading')` |

### Step 3: Add Missing Translations

Add to `lang/it/predict.php` and `lang/en/predict.php`:

```php
'market' => [
    'stats' => [...],
    'dates' => [...],
],
'status' => [
    'market' => [...],
],
```

---

## ✅ ENFORCEMENT CHECKLIST

### Code Review

- [ ] **NO `$tx()` calls**: Replace with `__()`
- [ ] **Protocol followed**: `namespace::context.collection.key.type`
- [ ] **Fallback present**: `?: 'Fallback text'`
- [ ] **Translations exist**: Added to both `it/` and `en/`

### File Structure

- [ ] **Hierarchical**: Nested arrays, not flat
- [ ] **Context present**: `list.`, `form.`, `market.`, `status.`
- [ ] **Type specified**: `.label`, `.title`, `.hint`, `.error`

---

## 📚 RELATED DOCUMENTS

- [Translation Keys Protocol](./translation-keys-protocol.md)
- [Translation Files Rules](./translation-files-rules.md)
- [Blade Minimal Logic](../../../Modules/Predict/docs/BLADE_MINIMAL_LOGIC_BEST_PRACTICES.md)

---

## 🎯 EXAMPLES BY CONTEXT

### List Context

```blade
<h2>{{ __('predict::list.outcomes.heading') }}</h2>
@empty($outcomes)
    <p>{{ __('predict::list.outcomes.empty') }}</p>
@endempty
```

### Form Context

```blade
<label>{{ __('predict::form.bet.quantity.label') }}</label>
<input placeholder="{{ __('predict::form.bet.quantity.placeholder') }}">
<small>{{ __('predict::form.bet.quantity.hint') }}</small>
```

### Market Context

```blade
<span>{{ __('predict::market.stats.volume_24h.label') }}</span>
<span>{{ __('predict::market.dates.ends_in') }}: {{ $endsAt->diffForHumans() }}</span>
```

### Status Context

```blade
<span class="badge-{{ $status }}">
    {{ __('predict::status.market.' . $status) }}
</span>
```

---

**Maintained By**: AI Agents Team  
**Last Review**: 2026-03-26  
**Next Review**: 2026-04-26  
**Enforcement**: MANDATORY
