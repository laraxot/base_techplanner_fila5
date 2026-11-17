---
paths:
  - "laravel/Modules/**/lang/**/*.php"
  - "laravel/Themes/**/lang/**/*.php"
  - "laravel/Modules/**/*.php"
---

# Translation Navigation Placeholder Rule

## REGOLA PERMANENTE: Valori `.navigation` nei file di traduzione sono placeholder da migliorare

### Vincolo assoluto

```
VIETATO: lasciare valori che terminano in '.navigation', '.model', '.label' come stringa letterale
VIETATO: rimuovere chiavi da file di traduzione — solo aggiungere o migliorare
OBBLIGATORIO: sostituire placeholder con testi italiani reali e significativi
OBBLIGATORIO: la sezione 'navigation' deve contenere label, icon (heroicon-o-*), group reali
```

### Come riconoscere un placeholder

Un valore è placeholder se:
- È uguale alla sua chiave (es. `'label' => 'ticket.navigation'`)
- Termina con il nome della sezione padre (es. `'icon' => 'ticket.navigation'`)
- È identico alla chiave del campo (es. `'label' => 'location'`, `'description' => 'type'`)

### Fix obbligatorio

```php
// ❌ SBAGLIATO — placeholder
'navigation' => [
    'label' => 'ticket.navigation',
    'icon'  => 'ticket.navigation',
    'group' => 'ticket.navigation',
],

// ✅ CORRETTO — valori reali
'navigation' => [
    'label' => 'Segnalazioni',
    'icon'  => 'heroicon-o-exclamation-triangle',
    'group' => 'Gestione Segnalazioni',
],
```

### Regola additive-only

I file di traduzione sono **append-only**: non rimuovere mai una chiave esistente.
Ragione: altri moduli, Blade o code PHP potrebbero referenziarla via `__('module::file.key')`.
Rimuoverla causa `translation key not found` a runtime.

### Scan per trovare placeholder

```bash
grep -rn "\\.navigation\|\.model\|'label' => '[a-z_]*'" laravel/Modules/*/lang/it/ | grep -v vendor
```

### Icon convention — "Filament way"

Le icone nei file di traduzione devono essere nomi Heroicons:
```
'icon' => 'heroicon-o-exclamation-triangle'  ← outline
'icon' => 'heroicon-s-exclamation-triangle'  ← solid
```
Mai nomi generici come `'icon' => 'ticket'` o `'icon' => 'navigation'`.

### Documentazione

- Wiki: `laravel/Modules/Fixcity/docs/wiki/concepts/translation-navigation-placeholder-rule.md`
- Story: 8-57 (translation task)
