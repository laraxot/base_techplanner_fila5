# Common Development Commands

Guida per Claude: comandi di sviluppo, testing, qualità, Composer, Filament.

## Project Setup

```bash
cd laravel
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
npm run build
php artisan serve
```

<<<<<<< .merge_file_6nunXk
**Access:** http://localhost:8000/quaeris/admin/{tenant}
=======
<<<<<<< .merge_file_PkaMwz
**Access:** http://localhost:8000/quaeris/admin/{tenant}
=======
>>>>>>> .merge_file_fOwbdN
**Access:** http://localhost:8000/this-project/admin/{tenant}
>>>>>>> .merge_file_PJxthR

## Testing

**🚨 CRITICAL:** NEVER use `RefreshDatabase` trait. Usare `.env.testing` con database dedicato.

```bash
php artisan test
php artisan test tests/Feature/ExampleTest.php
php artisan test --filter=testName
```

### Code Coverage (percentuale)

Richiede PCOV o Xdebug con `xdebug.mode=coverage`. Vedi [coverage-xdebug-pcov.md](../../coverage-xdebug-pcov.md).

```bash
# Percentuale in terminale
php artisan test --coverage
./vendor/bin/pest --coverage

# Con soglia minima
./vendor/bin/pest --coverage --min=80

# Per modulo
<<<<<<< .merge_file_6nunXk
./vendor/bin/pest Modules/Quaeris/tests --coverage
=======
<<<<<<< .merge_file_PkaMwz
./vendor/bin/pest Modules/Quaeris/tests --coverage
=======
>>>>>>> .merge_file_fOwbdN
./vendor/bin/pest Modules/App/tests --coverage
>>>>>>> .merge_file_PJxthR

# Report HTML → build/coverage/html/
./vendor/bin/pest --coverage
```

## Code Quality

```bash
./vendor/bin/pint --dirty
./vendor/bin/phpstan analyse
./vendor/bin/phpstan analyse Modules/Geo --level=10
```

**PHPStan Level 10:** Zero errori, Safe\ functions, type hints espliciti.

## Frontend

```bash
npm run build
npm run dev
```

**Note:** Assets in `../public_html/` (custom `Application::publicPath()`).

## Module Management

```bash
php artisan module:list
php artisan module:enable ModuleName
php artisan module:disable ModuleName
```

## Composer Merge Plugin (CRITICAL)

Path repositories in **ROOT** composer.json, prima di Packagist con `canonical: false`.

Local packages: `lara-zeus/spatie-translatable`, `coolsam/panel-modules`.

Vedi: [laravel/docs/composer-merge-plugin.md](../../laravel/docs/composer-merge-plugin.md)

## nWidart Laravel Modules

- `"Modules\\": "Modules/"` NON più richiesto (v11+)
- `merge-plugin` include: `["Modules/*/composer.json"]`
- `allow-plugins: wikimedia/composer-merge-plugin: true` OBBLIGATORIO

## Filament

```bash
php artisan make:filament-resource Post --generate --module=Cms
php artisan filament:optimize
php artisan filament:upgrade
```

## Collegamenti

- [Critical Rules](./critical-rules.md)
- [Architecture Principles](./architecture-principles.md)
- [Indice CLAUDE](./index.md)
