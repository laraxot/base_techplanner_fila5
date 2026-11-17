# Pagina login (Theme Two)

## Scopo

Pagina di accesso pubblico `/it/auth/login` (o `/auth/login` in base al locale). Usa il widget Filament del modulo User e il layout auth del tema.

## File

- **Vista:** `resources/views/pages/auth/login.blade.php`
- **Layout:** `pub_theme::layouts.auth`
- **Widget:** `Modules\User\Filament\Widgets\Auth\LoginWidget`

## Implementazione

La pagina è un componente Volt che usa il layout auth e incorpora il widget di login tramite classe PHP:

```blade
<?php
use function Livewire\Volt\layout;
use Modules\User\Filament\Widgets\Auth\LoginWidget;

layout('pub_theme::layouts.auth');
?>

<div class="...">
    @livewire(LoginWidget::class)
</div>
```

**Regola:** usare sempre il Filament LoginWidget, mai un form HTML tradizionale (method POST, action route('login'), @csrf, input raw). I form di autenticazione in questo progetto si gestiscono solo con Filament widget. Preferire `@livewire(\Modules\User\Filament\Widgets\Auth\LoginWidget::class)`.

## Logo sulle pagine auth

Login e register usano il componente **logo configurabile** del tema:

- **Componente:** `<x-pub_theme::ui.logo class="..." />`
- **Configurazione:** il logo viene da **metatag** (configurazione tenant). Se è valorizzato `logo_header` / `logo_img` in `config/metatag` (registrata tramite TenantServiceProvider / config tenant), viene mostrata l’immagine; altrimenti fallback SVG con `app.name`.
- **Dove si imposta:** pannello Metatag (Filament) o file di config tenant (es. `Modules/Tenant/config/metatag.php` e override per tenant). Chiavi rilevanti: `logo_header`, `logo_alt`.

Non usare icone fisse (es. `meetup-logo`): usare sempre `<x-pub_theme::ui.logo />` per avere un logo unico e modificabile da config.

## Pulsanti Social Login

Il LoginWidget mostra pulsanti per Google, GitHub e Microsoft quando configurati in `config/services.php`:

- **Google**: visibile se `GOOGLE_CLIENT_ID` in `.env`
- **GitHub**: visibile se `GITHUB_CLIENT_ID` in `.env`
- **Microsoft**: visibile se `MICROSOFT_CLIENT_ID` in `.env`

Le traduzioni usano `user::auth.social.google`, `user::auth.social.github`, `user::auth.social.microsoft` (vedi [Auth Social Login Translations](../../Modules/User/docs/auth-social-login-translations.md)).

I pulsanti usano colori espliciti per visibilità (WCAG AA): evitare classi Tailwind non definite che possono risultare bianche su bianco.

## Mostra password (revealable)

Il campo password usa il toggle "mostra/nascondi" built-in di Filament tramite `->revealable()` nel LoginWidget. Non serve implementazione custom: Filament gestisce icona occhio e stato.

## Logo su sfondo scuro

Sul pannello sinistro (gradient blu-verde) il logo deve essere **bianco** per contrasto. Usare `color="white"`:

```blade
<x-pub_theme::ui.logo class="h-14 w-auto" color="white" />
```

Se il logo è un'immagine (da metatag), assicurarsi che sia una versione light/white per sfondi scuri.

## Effetto particles

Il pannello sinistro include un effetto particles con canvas vanilla JS per dare profondità visiva. Componente: `pub_theme::components.ui.particles`. Leggero, accessibile (aria-hidden), non blocca interazioni. Vedi [particles-component](particles-component.md).

## Anti-pattern da evitare
Non sostituire il widget con un form HTML classico:
- Vietato: `<form method="POST" action="{{ route('login') }}">` con @csrf e input email/password/remember.
- Motivo: architettura unica (Filament widget), validazione e UX coerenti, registrazione Livewire necessaria.

## Traduzioni del login

I gruppi `user::auth.login.title`, `welcome_back` e `welcome_message` sono array di metadati, non stringhe. Nel Blade usare `user::auth.login.title.label`, `user::auth.login.welcome_back.text` e `user::auth.login.welcome_message.text`. Il sottotitolo usa `user::auth.login.subtitle.text`.

Stampare direttamente uno di questi gruppi con `{{ __() }}` provoca `htmlspecialchars(): Argument #1 ($string) must be of type string, array given`. Verificare che i valori siano stringhe nei cataloghi `it`, `en`, `de`, `es` e controllare il rendering di `/{locale}/auth/login` per le lingue abilitate dal tenant.

## Collegamenti

- [particles-component](particles-component.md)
- [Auth Social Login Translations (modulo User)](../../Modules/User/docs/auth-social-login-translations.md)
- [Troubleshooting login (modulo User)](../../Modules/User/docs/troubleshooting-login-component.md)
- [Regola Cursor: form auth solo Filament widget](../../../.cursor/rules/filament-login-widget.mdc)
- [Folio page file rules](folio-page-file-rules.md)
- [Tenant – config metatag](../../Modules/Tenant/docs/it/config/metatag.md)
