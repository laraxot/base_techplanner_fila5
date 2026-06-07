---
paths:
  - "laravel/Modules/**/Providers/**/*.php"
  - "laravel/Modules/**/resources/svg/**/*.svg"
  - "laravel/Modules/**/docs/**/*.md"
---

# XotBase Blade Icons Auto-Registration Rule

## REGOLA PERMANENTE: Non ridichiarare registerBladeIcons() nei service provider figli

### Vincolo assoluto

```
VIETATO: override di register() in un ModuleServiceProvider per registrare blade icons
VIETATO: chiamare callAfterResolving(BladeIconsFactory::class, ...) in un service provider figlio
OBBLIGATORIO: affidarsi a XotBaseServiceProvider::registerBladeIcons() che lo fa automaticamente
```

### Come funziona XotBaseServiceProvider

```php
// XotBaseServiceProvider::register() chiama automaticamente:
public function registerBladeIcons(): void
{
    $assetsPath = app(GetModulePathByGeneratorAction::class)->execute($this->name, 'assets');
    $svgPath = $assetsPath.'/../svg'; // → resources/assets/../svg = resources/svg
    if (File::exists($svgPath)) {
        $factory->add($this->nameLower, ['path' => $svgPath, 'prefix' => $this->nameLower]);
    }
}
```

**Per ogni modulo con `resources/svg/` la registrazione è automatica.**

### Esempio SBAGLIATO (DRY violation)

```php
// ❌ SBAGLIATO — GeoServiceProvider
public function register(): void
{
    parent::register(); // già chiama registerBladeIcons()!

    // DUPLICATO — XotBase lo fa già!
    $this->callAfterResolving(BladeIconsFactory::class, function ($factory): void {
        $factory->add('geo', ['path' => __DIR__.'/../../resources/svg', 'prefix' => 'geo']);
    });
}
```

### Esempio CORRETTO

```php
// ✅ CORRETTO — GeoServiceProvider (nessun register() override)
class GeoServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'Geo';

    public function boot(): void
    {
        parent::boot();
        // solo logica specifica del modulo Geo
    }
}
```

### Quando l'errore SvgNotFound persiste

Se `@svg('geo::magnifying-glass')` fallisce nonostante `resources/svg/magnifying-glass.svg` esiste:

1. **Prima soluzione**: `php artisan config:clear && php artisan cache:clear`
2. Verificare che `laravel/Modules/Geo/resources/assets/` esista (serve per il path calcolo)
3. Verificare che `laravel/Modules/Geo/resources/svg/<nome>.svg` esista
4. MAI aggiungere registrazione manuale — causa doppia registrazione e confusione

### Prefix convention

Il prefix dell'icon set è sempre `Str::lower($this->name)`:
- `name = 'Geo'` → prefix `geo` → `@svg('geo::icon-name')`
- `name = 'User'` → prefix `user` → `@svg('user::icon-name')`
- `name = 'Fixcity'` → prefix `fixcity` → `@svg('fixcity::icon-name')`

### Documentazione

- XotBaseServiceProvider: `laravel/Modules/Xot/app/Providers/XotBaseServiceProvider.php:57`
- Wiki: `laravel/Modules/Xot/docs/wiki/concepts/xotbase-blade-icons-auto-registration.md`
- Memory: `memory/feedback_xotbase_blade_icons_auto_registration.md`
