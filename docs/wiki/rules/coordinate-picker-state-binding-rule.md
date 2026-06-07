---
name: coordinate-picker-state-binding-rule
description: Use $applyStateBindingModifiers() in coordinate-picker.blade.php to obey live()/defer() modifiers
---

# Coordinate Picker State Binding Rule

REGOLA: in `coordinate-picker.blade.php` lo state binding deve passare per `$applyStateBindingModifiers()` per rispettare `live()`/`defer()` impostati sul field PHP.

## Pattern corretto

```blade
@php $statePath = $field->getStatePath(); @endphp
<div x-data="{
    state: $wire.{{ $applyStateBindingModifiers("\$entangle('{$statePath}')") }},
}">
```

VIETATO: `state: $wire.$entangle('{{ $getStatePath() }}')` — ignora i modificatori.

## Come trasforma

| Modificatore PHP | Output JS |
|---|---|
| `CoordinatePicker::make('location')` (default) | `$wire.$entangle('location')` (deferred) |
| `->live()` | `$wire.$entangleLive('location')` |
| `->defer()` | `$wire.$entangleDeferred('location')` |

## Checklist

- Wrappare con `$applyStateBindingModifiers()`
- `$statePath` DENTRO `$entangle('...')`, non fuori
- Doppi apici PHP: `"\$entangle('{$statePath}')"`
- Echo `{{ }}` avvolge l'intera chiamata

Ref: <https://filamentphp.com/docs/5.x/forms/custom-fields> (Obeying state binding modifiers) · `coordinatepicker-multi-column-save.md` · trait `HasCoordinatePicker`
