---
title: "Topic spatie-permission"
type: digest
status: active
qmd: "digest ceiling 100 spatie-permission"
---

# Topic spatie-permission

Sintesi automatica di 3 documenti (chiave `spatie-permission`).

## Spatie Permission teams boundary

_Fonte: `bmad/spatie-permission-teams-boundary.md`_

# Spatie Permission teams boundary

## Theme boundary

Theme Zero must not configure Spatie Permission directly. Team, role, and permission behavior belongs to modules:

- User owns `Team`, `Role`, `Permission`, team switching, and auth UI widgets.
- Xot exposes framework-level defaults.
- The theme renders module-provided widgets and views.

## Laravel 13 impact

On Laravel 13 with Spatie Permission 7, dashboard rendering can fail before the theme finishes rendering if `permission.models.team` is missing. The fix is not in the theme; it is in permission config and User/Xot documentation.

## Verification for theme work

When a theme page includes the team switcher or dashboard widgets:

1. Verify `php artisan optimize:clear` has been run after permission config changes.
2. Verify `config('permission.models.team')` resolves to `Modules\User\Models\Team`.
3. Keep theme code free from package configuration workarounds.

## References

- User module fix note: [../../../laravel/Modules/User/docs/spatie-permission-teams-laravel-13.md](../../../laravel/Modules/User/docs/spatie-permission-teams-laravel-13.md)
- Xot bridge note: [../../../laravel/Modules/Xot/docs/spatie-permission-team-model-laravel-13.md](../../../laravel/Modules/Xot/docs/spatie-permission-team-model-laravel-13.md)
- User module fix note: [../../../laravel/Modules/User/docs/spatie-permission-teams-laravel-13.md](../../../laravel/Modules/User/docs/spatie-permission-teams-laravel-13.md)
- Xot bridge note: [../../../la

## Spatie Permission Team Context

_Fonte: `spatie-permission-team-context.md`_

# Spatie Permission Team Context

## Theme Boundary

Theme Zero renders authentication and dashboard UI. It must not configure Spatie Permission models.

The team model is owned by the User module:

```php
Modules\User\Models\Team::class
```

## UI Rule

When a theme renders team switching, dashboards, menus, or auth widgets, it must assume that:

- `permission.teams` is enabled;
- `permission.models.team` resolves to `Modules\User\Models\Team`;
- active team context may affect role and permission checks;
- User module code calls `setPermissionsTeamId()` after a team switch;
- stale `roles` and `permissions` relations must be reloaded after switching teams;
- permission checks should use Laravel `can()`/policies instead of hard-coded role names.

## Troubleshooting

If the theme route fails with `TeamModelNotConfigured`, the fix is not in the theme. Verify User module permission config and clear caches:

```bash
cd laravel
php artisan optimize:clear

## Spatie Permission teams boundary

_Fonte: `spatie-permission-teams-boundary.md`_

# Spatie Permission teams boundary

## Theme boundary

Theme Zero must not configure Spatie Permission directly. Team, role, and permission behavior belongs to modules:

- User owns `Team`, `Role`, `Permission`, team switching, and auth UI widgets.
- Xot exposes framework-level defaults.
- The theme renders module-provided widgets and views.

## Laravel 13 impact

On Laravel 13 with Spatie Permission 7, dashboard rendering can fail before the theme finishes rendering if `permission.models.team` is missing. The fix is not in the theme; it is in permission config and User/Xot documentation.

## Verification for theme work

When a theme page includes the team switcher or dashboard widgets:

1. Verify `php artisan optimize:clear` has been run after permission config changes.
2. Verify `config('permission.models.team')` resolves to `Modules\User\Models\Team`.
3. Keep theme code free from package configuration workarounds.

## References

- User module fix note: [../../Modules/User/docs/spatie-permission-teams-laravel-13.md](../../Modules/User/docs/spatie-permission-teams-laravel-13.md)
- Xot bridge note: [../../Modules/Xot/docs/spatie-permission-team-model-laravel-13.md](../../Modules/Xot/docs/spatie-permission-team-model-laravel-13.md)
