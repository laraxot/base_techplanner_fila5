# Localization Standard (Laraxot)

## Philosophy
Localization in Laraxot is handled strictly through `mcamara/laravel-localization`. We avoid polluting the `web.php` or creating custom controllers for language management.

## Rules
1. **Exclusive Package Use**: Only use `Mcamara\LaravelLocalization\Facades\LaravelLocalization` for all locale-related operations.
2. **No Custom Switchers**: Do not implement routes or controllers for switching languages. The package handles this via URL re-routing.
3. **Localized URLs**: All links in the frontoffice (Folio/Volt) MUST be wrapped in `LaravelLocalization::localizeUrl()`.
4. **Current Locale**: Prefer `LaravelLocalization::getCurrentLocale()` over `app()->getLocale()`.
5. **UI Consistency**: Use `x-filament::icon` for flags with the correctly mapped locale code (e.g. `ui-flags.it`, `ui-flags.gb` for `en`).

## Operational Rules (to prevent common bugs)

### POST forms

- Any `action` URL (logout/login/register/forms) that targets localized routes MUST be localized.
- Otherwise redirect middleware may turn **POST into GET**.

### SEO / hreflang

- For language switchers, use `rel="alternate"` + `hreflang`.
- To keep the current page while switching locale, use `LaravelLocalization::getLocalizedURL($localeCode, null, [], true)`.

### Route caching

- Do not use `php artisan route:cache` / `php artisan optimize` for localized routes unless the project explicitly enables translated route caching.
- Prefer:
  - `php artisan route:trans:cache`
  - `php artisan route:trans:clear`
  - `php artisan route:trans:list {locale}`

### Testing

- Localized routes may 404 in tests because the app is bootstrapped before the request.
- Use upstream pattern: set `Mcamara\\LaravelLocalization\\LaravelLocalization::ENV_ROUTE_KEY` before performing requests.

### Laravel 11+

- Middleware aliases for mcamara should be registered in `bootstrap/app.php` (via `withMiddleware()->alias([...])`) when using Laravel 11+.

## Mandatory Usage
- **Generating Switch Links**:
  ```php
  <a href="{{ LaravelLocalization::getLocalizedURL($localeCode) }}">
  ```
- **Localizing Navigation**:
  ```php
  <a href="{{ LaravelLocalization::localizeUrl('/dashboard') }}">
  ```
- **Fetching Supported Languages**:
  ```php
  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
  ```

## Integration with Modules/Themes
- Service Providers should leverage `LaravelLocalizationViewPath` if module-specific views need localization-aware paths.
- All `.blade.php` files in Themes MUST follow these standards for navigation and language pickers.
