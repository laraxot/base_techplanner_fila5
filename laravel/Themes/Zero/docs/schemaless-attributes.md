# 🧬 Schemaless Attributes in Themes

**Status:** ✅ STANDARD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
**Central Reference:** [Xot Schemaless Guide](../../Modules/Xot/docs/spatie-schemaless-attributes.md)

---

## 🎨 Usage in Themes

Themes can use models that implement Schemaless Attributes (e.g., `Profile`, `Extra`).

### Safe Access in Blade Views

```blade
{{-- ✅ CORRECT — with default value --}}
{{ $model->extra_attributes->get('color', 'default-blue') }}

{{-- ✅ CORRECT — null-safe check --}}
@if($model->extra_attributes?->get('show_banner'))
    <div class="banner">...</div>
@endif

{{-- ❌ RISKY — may throw on null --}}
{{ $model->extra_attributes->color }}
```

### Safe Access in Livewire Components

```php
// ✅ Type-safe in component
/** @var string $theme */
$theme = $profile->extra_attributes->get('theme', 'zero');

// ✅ Check before use
$preferences = $profile->extra_attributes->get('user_preferences', []);
if (is_array($preferences)) {
    // use preferences
}
```

### Forms with Schemaless Attributes

```php
// Filament Form — dot notation for nested JSON
TextInput::make('extra_attributes.custom_setting')
    ->label(__('Custom Setting'));

// Set in action
$record->extra_attributes->set('custom_setting', $data['custom_setting']);
$record->save();
```

---

## Key Rules

1. **Always use `->get('key', default)`** — never dynamic property access
2. **Always call `->save()`** after setting attributes
3. **Type-check values** before using them in views
4. **Use defaults** for all optional attributes

---

## References

- [Xot Schemaless Guide](../../Modules/Xot/docs/spatie-schemaless-attributes.md)
- [UI Themes Detailed Guide](../../Modules/UI/docs/themes/schemaless-attributes-guide.md)
- [Rating Schemaless Docs](../../Modules/Rating/docs/schemaless-attributes.md)
<<<<<<< HEAD
=======
**Reference:** [Global Rules](../../../Modules/Xot/docs/schemaless-attributes-rules.md)

---

## 🎨 Utilizzo nei Temi

I temi possono utilizzare modelli che implementano Schemaless Attributes.

### Best Practices per le View
1.  **Accesso Sicuro**: Gli attributi potrebbero non esistere.
    ```blade
    {{-- ✅ CORRETTO --}}
    {{ $model->extra_attributes->get('color', 'default-blue') }}
    
    {{-- ❌ RISCHIOSO --}}
    {{ $model->extra_attributes->color }}
    ```

2.  **Forms**: Quando si creano form per attributi extra, usare la dot notation nei nomi dei campi se supportato dal backend, oppure gestire la serializzazione.

---
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
