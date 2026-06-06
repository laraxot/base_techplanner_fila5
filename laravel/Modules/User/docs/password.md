<<<<<<< HEAD
use Illuminate\Validation\Rules\Password;

 Password::defaults(function () {
            return Password::min(8)
                           ->mixedCase()
                           ->uncompromised();
        });

$request->validate([
    'password' => ['required', Password::defaults()],
]);

---

ZxcvbnPhp\Zxcvbn

ZxcvbnRule

https://github.com/bjeavons/zxcvbn-php

https://github.com/DivineOmega/laravel-password-exposed-validation-rule

NoOldPasswords
https://laracasts.com/discuss/channels/laravel/complex-password-rules-for-password-reset

https://njoguamos.me.ke/posts/create-and-test-a-custom-laravel-validation-rule !!!!
=======
---
module: theme
topic: password
canonical: ../../../Themes/docs/shared-components/password.md
---

See canonical documentation: ../../../Themes/docs/shared-components/password.md
>>>>>>> origin/dev
