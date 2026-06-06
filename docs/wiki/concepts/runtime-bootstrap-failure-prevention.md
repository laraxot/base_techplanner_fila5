---
title: "Runtime bootstrap failure prevention"
type: concept
tags: [laravel, composer, autoload, tenant, sqlite, traits, runtime]
created: 2026-06-06
updated: 2026-06-06
qmd: "laravel runtime bootstrap composer dump-autoload case sensitive helpers tenant sqlite username trait collision teams"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/21"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/19"
---

# Runtime bootstrap failure prevention

When Laravel fails before a page render or before `artisan` can boot, treat it as a bootstrap chain problem and verify these points in order.

## Autoload file paths are case-sensitive

On Linux, `Helpers/Helper.php` and `helpers/Helper.php` are different paths.

Checklist:

- Check the module `composer.json` first.
- Check generated Composer files under `laravel/vendor/composer/autoload_files.php` and `autoload_static.php`.
- If source config is correct but generated files are stale, run `composer dump-autoload` from `laravel/`.
- Confirm with `php -r "require 'vendor/autoload.php'; echo 'autoload-ok'.PHP_EOL;"`.

## Tenant DB config must tolerate SQLite

Tenant module connection cloning must not assume every default connection has `username`, `password`, `host`, or `port`.

Rule:

- Read connection values with `Arr::get()`.
- Verify the default connection is an array before cloning it for module connections.
- Keep SQLite configs valid even when credential keys are absent.

Verification:

```bash
php artisan about
composer dump-autoload
```

## Trait collisions must be resolved explicitly

If two traits expose the same method, PHP must know which method wins.

For User team membership, `BaseUser::teams()` must use Laraxot `HasTeams::teams()` because local contracts and tests expect real team membership. Spatie permission teams can be kept under an explicit alias.

Pattern:

```php
use HasSpatiePermission;
use HasTeams {
    HasTeams::teams insteadof HasSpatiePermission;
    HasSpatiePermission::teams as permissionTeams;
}
```

## Smoke test after fixing

Always finish bootstrap fixes with:

```bash
composer dump-autoload
php artisan optimize:clear
php artisan about
curl -s -o /dev/null -w '%{http_code} %{content_type} %{size_download}\n' http://127.0.0.1:8002/it
```
