# 📐 Translation Keys Protocol

**Status**: ✅ MANDATORY  
**Version**: 2.0  
**Last Updated**: 2026-03-26  
**Enforcement**: STRICT

---

## 🎯 Core Rule

> **Tutte le traduzioni DEVONO seguire il protocollo: `__('<namespace>::<context>.<collection>.<key>.<type>')`**

**Protocollo Completo**:
```
<namespace>::<context>.<collection>.<key>.<type>
```

### Componenti

| Componente | Descrizione | Esempio |
|------------|-------------|---------|
| **namespace** | Nome del modulo | `predict`, `blog`, `user` |
| **context** | Contesto d'uso | `list`, `form`, `detail`, `widget` |
| **collection** | Collezione di elementi | `outcomes`, `articles`, `users` |
| **key** | Chiave specifica | `heading`, `label`, `placeholder` |
| **type** | Tipo di traduzione | `heading`, `label`, `tooltip`, `hint` |

---

## ✅ DO - Traduzioni Corrette

### Struttura File

```php
// Modules/Predict/resources/lang/it/predict.php
return [
    'list' => [
        'outcomes' => [
            'heading' => 'Scegli il tuo vincitore',
            'empty' => 'Nessun outcome disponibile',
            'subtitle' => 'Seleziona un outcome per scommettere',
        ],
    ],
    'form' => [
        'bet' => [
            'quantity' => [
                'label' => 'Quantità',
                'placeholder' => 'Inserisci quantità',
                'hint' => 'Inserisci un valore tra 1 e 1000',
                'tooltip' => 'La quantità di crediti da scommettere',
            ],
        ],
    ],
    'detail' => [
        'predict' => [
            'title' => 'Dettagli Predict',
            'description' => 'Informazioni sul predict',
        ],
    ],
    'widget' => [
        'outcomes_grid' => [
            'title' => 'Griglia Outcomes',
        ],
    ],
];
```

### Utilizzo nei Blade

```blade
{{-- ✅ CORRETTO: Protocollo completo --}}
<h3>{{ __('predict::list.outcomes.heading') }}</h3>
<p>{{ __('predict::list.outcomes.empty') }}</p>

<label>{{ __('predict::form.bet.quantity.label') }}</label>
<input placeholder="{{ __('predict::form.bet.quantity.placeholder') }}">
<small>{{ __('predict::form.bet.quantity.hint') }}</small>

{{-- ✅ CORRETTO: Con fallback --}}
<h3>{{ __('predict::list.outcomes.heading') ?: 'Default heading' }}</h3>
```

---

## ❌ DON'T - Errori da Evitare

### Errore 1: Contesto Mancante

```blade
{{-- ❌ SBAGLIATO: Manca il context --}}
{{ __('predict::outcomes.heading') }}

{{-- ✅ CORRETTO --}}
{{ __('predict::list.outcomes.heading') }}
```

### Errore 2: Struttura Piatte

```php
// ❌ SBAGLIATO: Struttura piatta senza contesto
return [
    'outcomes_heading' => 'Scegli il tuo vincitore',
    'outcomes_empty' => 'Nessun outcome',
    'quantity_label' => 'Quantità',
];

// ✅ CORRETTO: Struttura gerarchica
return [
    'list' => [
        'outcomes' => [
            'heading' => 'Scegli il tuo vincitore',
            'empty' => 'Nessun outcome',
        ],
    ],
    'form' => [
        'bet' => [
            'quantity' => [
                'label' => 'Quantità',
            ],
        ],
    ],
];
```

### Errore 3: Chiavi Ambigue

```blade
{{-- ❌ SBAGLIATO: Troppo generico --}}
{{ __('predict::labels.outcomes') }}

{{-- ✅ CORRETTO: Specifico --}}
{{ __('predict::list.outcomes.heading') }}
```

---

## 📋 Contesti Standard

### `list` - Liste e Collezioni

```php
'list' => [
    'outcomes' => [
        'heading' => 'Titolo lista',
        'empty' => 'Messaggio lista vuota',
        'subtitle' => 'Sottotitolo',
    ],
];
```

### `form` - Form e Input

```php
'form' => [
    'bet' => [
        'quantity' => [
            'label' => 'Etichetta campo',
            'placeholder' => 'Placeholder',
            'hint' => 'Hint/testo di aiuto',
            'tooltip' => 'Tooltip',
            'error' => 'Messaggio di errore',
        ],
    ],
];
```

### `detail` - Pagine Dettaglio

```php
'detail' => [
    'predict' => [
        'title' => 'Titolo pagina',
        'description' => 'Descrizione',
    ],
];
```

### `widget` - Widget e Componenti

```php
'widget' => [
    'outcomes_grid' => [
        'title' => 'Titolo widget',
        'subtitle' => 'Sottotitolo',
    ],
];
```

---

## 🔧 Esempi Pratici

### Example 1: Lista Outcomes

**Blade**:
```blade
<h3>{{ __('predict::list.outcomes.heading') }}</h3>
@forelse($outcomes as $outcome)
    <div>{{ $outcome->title }}</div>
@empty
    <p>{{ __('predict::list.outcomes.empty') }}</p>
@endforelse
```

**Translation**:
```php
'list' => [
    'outcomes' => [
        'heading' => 'Scegli il tuo vincitore',
        'empty' => 'Nessun outcome disponibile',
    ],
];
```

### Example 2: Form Bet

**Blade**:
```blade
<div class="form-group">
    <label for="quantity">
        {{ __('predict::form.bet.quantity.label') }}
    </label>
    <input
        type="number"
        id="quantity"
        name="quantity"
        placeholder="{{ __('predict::form.bet.quantity.placeholder') }}"
    >
    <small class="form-hint">
        {{ __('predict::form.bet.quantity.hint') }}
    </small>
    @error('quantity')
        <span class="text-danger">
            {{ __('predict::form.bet.quantity.error', ['error' => $message]) }}
        </span>
    @enderror
</div>
```

**Translation**:
```php
'form' => [
    'bet' => [
        'quantity' => [
            'label' => 'Quantità',
            'placeholder' => 'Inserisci quantità',
            'hint' => 'Inserisci un valore tra 1 e 1000',
            'error' => 'Errore: :error',
        ],
    ],
];
```

---

## 📊 Tabella Riassuntiva

| Contesto | Uso | Chiavi Tipiche |
|----------|-----|----------------|
| `list` | Liste, collezioni, tabelle | `heading`, `empty`, `subtitle` |
| `form` | Form, input, campi | `label`, `placeholder`, `hint`, `tooltip`, `error` |
| `detail` | Pagine dettaglio | `title`, `description`, `meta` |
| `widget` | Widget, componenti | `title`, `subtitle`, `footer` |
| `action` | Azioni, bottoni | `label`, `confirm`, `success`, `error` |
| `message` | Messaggi, notifiche | `success`, `error`, `warning`, `info` |

---

## 🔗 Related Documents

- [Translation Files Rules](./translation-files-rules.md)
- [Translation Paths Rules](./translation-paths-rules.md)
- [Laravel Localization Standard](./laravel-localization.md)

---

## ✅ Enforcement Checklist

- [ ] **Namespace corretto**: `predict::`, `blog::`, etc.
- [ ] **Contesto presente**: `list.`, `form.`, `detail.`, `widget.`
- [ ] **Collezione specifica**: `outcomes.`, `articles.`, `users.`
- [ ] **Chiave descrittiva**: `heading`, `label`, `placeholder`
- [ ] **Tipo appropriato**: `heading`, `label`, `hint`, `tooltip`
- [ ] **Struttura gerarchica**: NO chiavi piatte
- [ ] **Fallback dove necessario**: `?: 'Default text'`

---

**Maintained By**: AI Agents Team  
**Last Review**: 2026-03-26  
**Next Review**: 2026-04-26  
**Enforcement**: MANDATORY
