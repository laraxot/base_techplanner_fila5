# Theme Translations Rule

## Description

Gestione traduzioni nel tema Meetup con namespace `pub_theme::` e struttura espansa Laraxot.

## Rule

### Namespace Obbligatorio

Tutte le traduzioni del tema Meetup DEVONO usare il namespace `pub_theme::`:

```php
// ✅ CORRETTO
__('pub_theme::event.date.label')
__('pub_theme::navigation.home.label')

// ❌ ERRATO
__('event.date.label')
__('date.label')
__('meetup::event.date.label')
```

### Struttura File

```
Themes/Meetup/lang/
├── it/              # Italiano (primario)
│   ├── event.php
│   ├── events.php
│   ├── home.php
│   └── navigation.php
├── en/              # Inglese
├── es/              # Spagnolo
├── fr/              # Francese
└── de/              # Tedesco
```

### Struttura Espansa Obbligatoria

Ogni traduzione DEVE avere la struttura espansa:

```php
// ✅ CORRETTO
'date' => [
    'label' => 'Data',
    'help' => 'Data dell\'evento',
],

// ❌ ERRATO - Struttura flat
date' => 'Data',
```

### Doppia Struttura: Nidificata + Piatta

I file di traduzione devono supportare entrambe le strutture:

```php
<?php

declare(strict_types=1);

return [
    // 1. Struttura nidificata (per Filament/Forms)
    'fields' => [
        'date' => [
            'label' => 'Data',
            'placeholder' => 'Seleziona data',
            'tooltip' => 'Data evento',
            'helper_text' => '',
            'description' => 'Descrizione',
            'icon' => 'heroicon-o-calendar',
            'color' => 'primary',
        ],
    ],
    'actions' => [
        'share_event' => [
            'label' => 'Condividi',
            'tooltip' => 'Condividi evento',
            'icon' => 'heroicon-o-share',
        ],
    ],
    
    // 2. Struttura piatta (per Template Blade)
    'date' => [
        'label' => 'Data',
        'help' => 'Data dell\'evento',
    ],
    'share_event' => [
        'label' => 'Condividi evento',
        'help' => 'Condividi con contatti',
    ],
];
```

### Chiavi Obbligatorie

Ogni traduzione deve avere almeno:
- `label`: Testo visibile (obbligatorio)
- `help`: Testo di aiuto (consigliato)

Per i campi form (Filament):
- `label`, `placeholder`, `tooltip`, `helper_text`, `description`, `icon`, `color`

### NO Stringhe Hardcoded

```blade
{{-- ✅ CORRETTO --}}
<p>{{ __('pub_theme::event.date.label') }}</p>

{{-- ❌ ERRATO --}}
<p>Data dell'evento</p>
```

### Aggiungere Nuove Traduzioni

1. Aggiungere a `lang/it/{file}.php` (italiano primario)
2. Aggiungere a tutte le altre lingue:
   - `en/`, `es/`, `fr/`, `de/`
3. Seguire la struttura espansa
4. Documentare in `docs/translations.md`

### Convenzioni Naming

- File: `{feature}.php` (es. `event.php`, `home.php`)
- Chiavi: `snake_case`
- Sottostrutture: `fields.*`, `actions.*`, `navigation.*`

### Esempi di Uso

```blade
{{-- Template Blade --}}
{{ __('pub_theme::event.date.label') }}
{{ __('pub_theme::event.time.label') }}
{{ __('pub_theme::event.share_event.label') }}
{{ __('pub_theme::event.back_to_events.label') }}

{{-- Con parametri --}}
{{ __('pub_theme::event.people_joined.label', ['count' => 42]) }}
```

## When to Use

- Sempre quando si aggiungono traduzioni al tema Meetup
- Quando si creano nuovi file di traduzione
- Quando si modificano traduzioni esistenti

## References

- `Themes/Meetup/docs/translations.md`
- `Themes/Meetup/lang/*/`
- AGENTS.md (Translation standards)

## Last Updated

2025-02-19
