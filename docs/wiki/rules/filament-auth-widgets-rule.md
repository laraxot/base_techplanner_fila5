---
title: "Filament Auth Widgets Rule"
type: rule
confidence: high
created: 2026-05-26
updated: 2026-05-26
tags: [filament, auth, widgets, register, login]
related:
  - concepts/xotbasewidget-child-no-explicit-widget-view.md
  - rules/00-TRIGGER_MAP.md
---

# Filament Auth Widgets Rule

## Problema

I form di autenticazione (register, login, password reset, ecc.) **non vanno implementati manualmente in Blade** con Volt/Livewire.

Esempio errore (mai replicare):
```php
// MAI fare questo!
<x-layouts.guest>
    @volt('auth.register')
    <form wire:submit="register">
        <x-ui.input wire:model="name" />
        <!-- ... -->
    </form>
    @endvolt
</x-layouts.guest>
```

## Pattern Corretto

Usare **Filament Widgets** esistenti nel modulo User:

```blade
<!-- register.blade.php -->
<x-layouts.app>
    <x-slot name="title">
        {{ __('user::auth.register.page.meta_title.label') }}
    </x-slot>

    <section class="...">
        <div class="mx-auto max-w-md">
            @livewire(\Modules\User\Filament\Widgets\Auth\RegisterWidget::class)
        </div>
    </section>
</x-layouts.app>
```

## Widget Disponibili

| Widget | Modulo | View Template |
|--------|--------|---------------|
| LoginWidget | User | `user::widgets.auth.login-widget` |
| RegisterWidget | User | `user::widgets.auth.register-widget` |
| ResetPasswordWidget | User | `user::widgets.auth.reset-password-widget` |

## Regole

1. **Mai usare `@volt`** per auth forms
2. **Usare `@livewire(Modules\User\Filament\Widgets\Auth\...)`**.
3. **Layout**: `layouts/app` per auth pagine, non `layouts/guest` (supporta `$title` slot)
4. **Traduzioni**: usare namespace `user::auth.*` già definito
5. **Template Blade**: il widget ha già `->view('user::widgets.auth.register-widget')`

## Errori Comuni (Non Fare Mai)

| Errore | Perché è cacca |
|--------|----------------|
| Implementare form manuali in Blade | Duplica logica, traduzioni, validazione — ceco |
| Usare `layouts.guest` per register | Non supporta `{{ $title }}` slot, rompe Folio |
| Usare `x-data="headerMobileNav"` senza bootstrap | Alpine undefined su first paint |
| Inline JS Vue-style (`wire:submit="register"` con method `submit()`) | Wire mismatch, azione non collegata |

## Template Blade Widget Auth

```blade
<x-layouts.app>
    <x-slot name="title">{{ __('user::auth.{action}.page.meta_title.label') }}</x-slot>
    
    <section class="...">
        <div class="mx-auto max-w-md">
            @livewire(\Modules\User\Filament\Widgets\Auth\{Action}Widget::class)
        </div>
    </section>
</x-layouts.app>
```