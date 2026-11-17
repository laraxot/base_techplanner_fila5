# 🔴 CRITICAL RULE: Translation 5-Level Protocol

**Priority**: **CRITICAL**  
**Category**: Internationalization (i18n)  
**Enforced**: **ALWAYS**  
**Status**: **MANDATORY**

---

## Rule Statement

> **TUTTE le traduzioni DEVONO seguire il protocollo a 5 livelli:**
> 
> **`<namespace>::<context>.<collection>.<key>.<type>`**

---

## Protocollo a 5 Livelli

### Struttura

```php
// ✅ CORRETTO: 5 livelli
__('predict::common.labels.outcomes.label')
__('predict::common.labels.related_markets.label')
__('predict::common.descriptions.trading_form.help')
__('predict::common.titles.market_overview.title')

// ❌ SBAGLIATO: Meno di 5 livelli
__('predict::outcomes')           // ❌ Solo 2 livelli
__('predict::labels.outcomes')    // ❌ Solo 3 livelli
__('predict::common.outcomes')    // ❌ Solo 3 livelli

// ❌ SBAGLIATO: Più di 5 livelli
__('predict::common.labels.outcomes.label.text') // ❌ 6 livelli
```

---

## I 5 Livelli

### 1. Namespace (`predict::`)

Il namespace del modulo.

**Esempi**:
- `predict::` - Modulo Predict
- `blog::` - Modulo Blog
- `cms::` - Modulo Cms

---

### 2. Context (`common`, `user`, `admin`, `api`)

Il contesto di utilizzo.

**Esempi**:
- `common` - Testo condiviso (frontend + backend)
- `user` - Testo per utenti frontend
- `admin` - Testo per admin backend
- `api` - Testo per API responses

---

### 3. Collection (`labels`, `titles`, `descriptions`, `messages`, `actions`)

La collezione di testi.

**Esempi**:
- `labels` - Etichette (nomi, titoli brevi)
- `titles` - Titoli di sezioni/pagine
- `descriptions` - Descrizioni, testi lunghi
- `messages` - Messaggi (successo, errore, info)
- `actions` - Testi per azioni (bottoni, link)
- `validation` - Messaggi di validazione
- `placeholders` - Placeholder per input
- `hints` - Suggerimenti, help text

---

### 4. Key (`outcomes`, `related_markets`, `trading_form`)

La chiave specifica del testo.

**Esempi**:
- `outcomes` - Testi relativi agli outcomes
- `related_markets` - Testi per mercati correlati
- `trading_form` - Testi per formulario trading
- `price_chart` - Testi per grafico prezzi

---

### 5. Type (`label`, `title`, `help`, `placeholder`, `error`)

Il tipo specifico di testo.

**Esempi**:
- `label` - Etichetta breve
- `title` - Titolo
- `help` - Testo di aiuto
- `placeholder` - Placeholder input
- `error` - Messaggio di errore
- `success` - Messaggio di successo

---

## Esempi Completi

### Example 1: Outcomes

```php
// ✅ CORRETTO
@lang('predict::common.labels.outcomes.label')
// Namespace: predict::
// Context: common
// Collection: labels
// Key: outcomes
// Type: label

// ❌ SBAGLIATO
@lang('predict::outcomes') // Troppo corto!
```

### Example 2: Related Markets

```php
// ✅ CORRETTO
@lang('predict::common.labels.related_markets.label')
// Namespace: predict::
// Context: common
// Collection: labels
// Key: related_markets
// Type: label

// ❌ SBAGLIATO
@lang('predict::related_markets') // Troppo corto!
```

### Example 3: Trading Form

```php
// ✅ CORRETTO
@lang('predict::user.descriptions.trading_form.help')
@lang('predict::user.actions.trading_form.submit')
@lang('predict::user.placeholders.trading_form.stake')

// ❌ SBAGLIATO
@lang('predict::trading_form') // Troppo corto!
```

---

## File di Traduzione

### Struttura File

```
Modules/Predict/lang/
├── it/
│   ├── common.php        # common context
│   ├── user.php          # user context
│   ├── admin.php         # admin context
│   └── api.php           # api context
└── en/
    ├── common.php
    ├── user.php
    ├── admin.php
    └── api.php
```

### Esempio: `common.php`

```php
<?php

return [
    'labels' => [
        'outcomes' => [
            'label' => 'Esiti',
        ],
        'related_markets' => [
            'label' => 'Mercati Correlati',
        ],
        'volume' => [
            'label' => 'Volume',
        ],
    ],
    'titles' => [
        'market_overview' => [
            'title' => 'Panoramica Mercato',
        ],
    ],
    'descriptions' => [
        'trading_form' => [
            'help' => 'Inserisci l\'importo da scommettere',
        ],
    ],
];
```

---

## Migration Guide

### From Old to New

**Prima**:
```php
// ❌ SBAGLIATO
__('predict::outcomes')
__('predict::labels.outcomes')
__('predict::related_markets')
```

**Dopo**:
```php
// ✅ CORRETTO
__('predict::common.labels.outcomes.label')
__('predict::common.labels.related_markets.label')
__('predict::common.titles.market_overview.title')
```

---

## Common Mistakes

### Mistake 1: Troppo Corto

```php
// ❌ SBAGLIATO: 2-3 livelli
__('predict::outcomes')
__('predict::labels.outcomes')

// ✅ CORRETTO: 5 livelli
__('predict::common.labels.outcomes.label')
```

---

### Mistake 2: Troppo Lungo

```php
// ❌ SBAGLIATO: 6+ livelli
__('predict::common.labels.outcomes.label.text')

// ✅ CORRETTO: 5 livelli
__('predict::common.labels.outcomes.label')
```

---

### Mistake 3: Collection Sbagliata

```php
// ❌ SBAGLIATO: 'outcomes' non è una collection
__('predict::common.outcomes.label')

// ✅ CORRETTO: 'labels' è la collection
__('predict::common.labels.outcomes.label')
```

---

## Checklist Pre-Commit

Prima di commitare traduzioni:

- [ ] ✅ 5 livelli: `namespace::context.collection.key.type`
- [ ] ✅ Namespace corretto (`predict::`, `blog::`, etc.)
- [ ] ✅ Context corretto (`common`, `user`, `admin`)
- [ ] ✅ Collection corretta (`labels`, `titles`, `descriptions`)
- [ ] ✅ Key descrittiva (`outcomes`, `related_markets`)
- [ ] ✅ Type corretto (`label`, `title`, `help`)
- [ ] ✅ File di traduzione esiste e ha la struttura corretta

---

## Tools

### Check Translation Keys

```bash
# Trova traduzioni con meno di 5 livelli
grep -rn "@lang('predict::" Modules/Predict/resources/views | \
  grep -v '\.[a-z]*\.[a-z]*\.[a-z]*\.[a-z]*')

# Trova traduzioni con più di 5 livelli
grep -rn "@lang('predict::" Modules/Predict/resources/views | \
  grep '\.[a-z]*\.[a-z]*\.[a-z]*\.[a-z]*\.[a-z]*')
```

---

## References

- [Laravel Localization Documentation](https://laravel.com/docs/localization)
- [Translation File Structure](../../../laravel/Modules/Predict/lang/)
- [Rule 008: Translation Structure](008-translation-structure.md)

---

## Changelog

- **2026-03-26**: Created rule - CRITICAL
- **2026-03-26**: Added 5-level protocol
- **2026-03-26**: Added examples and migration guide
- **2026-03-26**: Added common mistakes section

---

**Enforced By**: AI Agents, Code Review  
**Violations**: 0 (must remain 0)  
**Last Review**: 2026-03-26  
**Next Review**: 2026-04-01
