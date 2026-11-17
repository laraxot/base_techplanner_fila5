---
paths:
  - "laravel/Modules/**/lang/**/*.php"
  - "laravel/Themes/**/lang/**/*.php"
---

# Translation 5‑Element Rule

## Requirements
Every translation entry in the User module must have exactly five elements to ensure consistency across themes.

## The 5 Elements

| Element | Description | Example |
|---------|-------------|---------|
| **Key** | Unique identifier for the translation | `auth.email_address` |
| **Text** | The base language string | `Email address` |
| **Description** | Short description of usage | `Label for the email input field on the login form` |
| **Context** | Optional context for translators | `login_form` |
| **Placeholder** | Placeholder if used in an input field | `you@example.com` |

## Implementation
```php
// In laravel/Modules/User/lang/en/auth.php
return [
    'email_address' => [
        'key'         => 'auth.email_address',
        'text'        => 'Email address',
        'description' => 'Label for the email input field on the login form',
        'context'     => 'login_form',
        'placeholder' => 'you@example.com',
    ],
];
```

## Usage in code
```php
// Use the key in your code, never hard‑code full sentences
__('user::auth.email_address.text')
__('user::auth.email_address.placeholder')
```

## Distinzione label vs text

| Tipo elemento | Campo display | Esempio | Uso in `__()` |
|---------------|---------------|---------|-------------|
| Titoli, sottotitoli, descrizioni, testi statici | `label` | `register.title.label` | `__('user::auth.register.title.label')` |
| Bottoni, messaggi, link, placeholder input | `text` | `register.submit.text` | `__('user::auth.register.submit.text')` |

Questa distinzione è una **convenzione osservata** nel modulo User (`auth.php`):
- Elementi **display** (ciò che l'utente legge come testo statico) → `label`
- Elementi **attivi** (bottoni, messaggi di sistema, etichette input, link) → `text`

**Attenzione**: chiamare `__('user::auth.register.title')` senza `.label` o `.text` restituisce l'intero array 5-elementi, causando `htmlspecialchars(): Argument #1 ($string) must be of type string, array given`.

Sempre verificare la struttura in `auth.php` prima di scrivere la chiave.

## Why this rule?
- No full sentences in code
- Translators have all context
- Consistent across themes
- Future‑proof for new translation needs

## Enforcement
- Pre‑commit hooks should check this structure
- Static analysis should scan for `__('long sentence')` in user module
- Code reviews should reject translation files without 5‑element structure
---
