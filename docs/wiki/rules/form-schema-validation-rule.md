---
title: "Regola: Validazione SOLO nello Schema — Mai nel Widget"
type: "rule"
tags: [filament, schema, validation, widget, dry, kiss]
module: "root"
---

# Regola: Validazione SOLO nello Schema Form — Mai nel Widget

**Ultimo Aggiornamento:** 2026-06-04  
**Stato:** ✅ Applicata  

---

## ❌ SBAGLIATO

```php
class RegisterWidget extends XotBaseSchemaWidget
{
    protected function validateForm(): array  // ❌ NON FARE
    {
        $data = $this->form->getState();
        
        // Hash, cast, trasformazioni QUI? NO!
        return [
            'password' => Hash::make($data['password']),
            'first_name' => app(SafeStringCastAction::class)->execute($data['first_name']),
            // ...
        ];
    }
}
```

## ✅ CORRETTO

### 1. Schema definito in `UserForm` (SSoT)

```php
// Modules/User/Filament/Resources/UserResource/Schemas/UserForm.php

public static function getRegisterFormSchema(): array
{
    return [
        TextInput::make('first_name')
            ->required()
            ->maxLength(255)
            ->rules(['string', new SafeStringCastRule()]),  // ← Validazione + cast qui
        
        TextInput::make('password')
            ->password()
            ->required()
            ->rules(['string', new HashPasswordRule()]),    // ← Hash nel rule
    ];
}
```

### 2. Widget solo orchestrazione

```php
// Modules/User/Filament/Widgets/Auth/RegisterWidget.php

class RegisterWidget extends XotBaseSchemaWidget
{
    public function submit(): void
    {
        // $this->form->getState() Lancia ValidationException se fallisce
        $data = $this->form->getState();
        
        $user = DB::transaction(function () use ($data) {
            return app(RegisterFoUserAction::class)->execute($data);  // Action pulita
        });
        
        $this->handleSuccessfulRegistration($user);
    }
}
```

---

## Perché questa regola?

| Problema | Soluzione |
|----------|-----------|
| **Duplicazione validazione** | Una sola fonte: lo Schema |
| **Logica dispersa** | Tutte le regole nel Form |
| **Difficile testare** | Testi lo Schema, non il Widget |
| **Viola DRY/KISS** | Action + Schema = pulito |

---

## Regole per i Widget

| Componente | Responsabilità |
|------------|----------------|
| **Schema (Form)** | Validazione, cast, hash, regole business |
| **Action** | Transaction, creazione modello, side effects |
| **Widget** | `getState()`, action call, redirect, notification |

---

## Riferimenti

- [RegisterWidget](laravel/Modules/User/app/Filament/Widgets/Auth/RegisterWidget.php)
- [UserForm Schema](laravel/Modules/User/Filament/Resources/UserResource/Schemas/UserForm.php)
- [RegisterFoUserAction](laravel/Modules/User/Actions/Auth/RegisterFoUserAction.php)

---

*Regola documentata nel Second Brain del progetto FixCity.*