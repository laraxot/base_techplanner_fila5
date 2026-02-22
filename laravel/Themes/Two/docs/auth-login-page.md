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

**Regola:** usare sempre `@livewire(LoginWidget::class)`, mai il tag `<livewire:user::filament.widgets.auth.login-widget />` (alias non registrato → ComponentNotFoundException).

## Logo sulle pagine auth

Login e register usano il componente **logo configurabile** del tema:

- **Componente:** `<x-pub_theme::ui.logo class="..." />`
- **Configurazione:** il logo viene da **metatag** (configurazione tenant). Se è valorizzato `logo_header` / `logo_img` in `config/metatag` (registrata tramite TenantServiceProvider / config tenant), viene mostrata l’immagine; altrimenti fallback SVG con `app.name`.
- **Dove si imposta:** pannello Metatag (Filament) o file di config tenant (es. `Modules/Tenant/config/metatag.php` e override per tenant). Chiavi rilevanti: `logo_header`, `logo_alt`.

Non usare icone fisse (es. `meetup-logo`): usare sempre `<x-pub_theme::ui.logo />` per avere un logo unico e modificabile da config.

## Collegamenti

- [Troubleshooting login (modulo User)](../../Modules/User/docs/troubleshooting-login-component.md)
- [Folio page file rules](folio-page-file-rules.md)
- [Tenant – config metatag](../../Modules/Tenant/docs/it/config/metatag.md)
