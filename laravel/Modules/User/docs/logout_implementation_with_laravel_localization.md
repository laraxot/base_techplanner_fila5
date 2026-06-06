# Implementazione del Logout con LaravelLocalization 

## Collegamenti correlati
- [README modulo User](./readme.md)
- [Best Practices Componenti di Autenticazione](./auth_components_best_practices.md)
- [Utilizzo di Laravel Localization](/laravel/modules/lang/docs/laravel_localization_usage.md)
- [Collegamenti Documentazione](/docs/collegamenti-documentazione.md)
- [Regole Traduzioni](/laravel/modules/lang/docs/translation_keys_rules.md)
- [Componenti Filament](/docs/rules/filament-components.md)

## Panoramica

Questo documento descrive l'implementazione corretta del processo di logout , con particolare attenzione all'utilizzo di Livewire Volt, LaravelLocalization e componenti Filament.

## Problematiche del Logout Diretto

L'implementazione del logout direttamente nel codice PHP di una pagina Folio causa diversi problemi:

1. **Logout Automatico**: Il logout viene eseguito automaticamente al caricamento della pagina, senza conferma dell'utente
2. **Reindirizzamento Immediato**: L'utente viene reindirizzato immediatamente, senza feedback
3. **Gestione Errori Limitata**: Non c'è una gestione adeguata degli errori che potrebbero verificarsi durante il processo di logout
4. **Problemi di UX**: L'utente non ha la possibilità di annullare l'operazione

## Soluzione Raccomandata: Volt con mount()

La soluzione raccomandata per implementare il logout  è utilizzare un componente Volt con il metodo `mount()` per gestire il processo di logout:

```php
<?php
declare(strict_types=1);

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use function Laravel\Folio\{middleware, name};
use function Livewire\Volt\{mount};
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

middleware(['auth']);
name('logout');

mount(function() {
    if (Auth::check()) {
        // Dispatch dell'evento prima del logout
        Event::dispatch('auth.logout.attempting', [Auth::user()]);
        
        // Esegui il logout
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        
        // Dispatch dell'evento dopo il logout
        Event::dispatch('auth.logout.successful');
    }
    
    // Reindirizza l'utente alla home page localizzata
    $this->redirect(LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), route('home')));
});
```

## Utilizzo Corretto di LaravelLocalization

---
module: theme
topic: logout_implementation_with_laravel_localization
canonical: ../../../Themes/docs/shared-components/logout_implementation_with_laravel_localization.md
---

See canonical documentation: ../../../Themes/docs/shared-components/logout_implementation_with_laravel_localization.md
