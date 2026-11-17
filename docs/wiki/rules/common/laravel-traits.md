# Laravel Trait Rules

## The #1 rule: Traits over duplication

**BEFORE adding ANY method to a model or class, check every trait it uses.**

If the method:
- Already exists in a trait the class uses -> DO NOT add it, it is already there
- Should exist in a trait (shared behavior) -> add it to the trait, not the model

This prevents DRY violations, wrong implementations (e.g., using `base_path()` instead of tenant-aware `TenantService::filePath()`), and maintenance nightmares.

## Mandatory checklist

Before writing a method in a model:
1. Look at `use TraitName` declarations in the model
2. Read each trait file - does the method exist?
3. Is this method needed in more than one model? If yes -> it belongs in a trait
4. Does the trait already have the correct service/helper? Use that, do not override.

## Real violations (lessons)

### Violation 1: getJsonFile() duplicated in 4 models
`SushiToJsons` trait already had `getJsonFile()` using `TenantService::filePath()`.
It was incorrectly added to Attachment, Menu, PageContent, Section using `base_path()`.
- `base_path()` breaks multi-tenancy
- The correct implementation is in the trait - NEVER override it

### Violation 2: getBlocksBySlug() duplicated in Section and Page
`HasBlocks` trait already had `getBlocksBySlug()`.
It was incorrectly added directly to Section.php and Page.php.
- The trait version uses `getBlocks()` which handles all side logic correctly
- The model version duplicated the logic poorly

## Key trait inventory for Laraxot/Cms

| Trait | File | Key Methods |
|-------|------|-------------|
| SushiToJsons | Modules/Tenant/app/Models/Traits/SushiToJsons.php | `getJsonFile()`, `getSushiRows()` |
| SushiToJson | Modules/Tenant/app/Models/Traits/SushiToJson.php | (singular variant for Page) |
| HasBlocks | Modules/Cms/app/Models/Traits/HasBlocks.php | `getBlocks()`, `compile()`, `getBlocksBySlug()` |

## CRITICAL: Tenant-aware paths

`TenantService::filePath()` != `base_path()`

Always use `TenantService::filePath()` for any file path that should be tenant-isolated.
`base_path()` returns the application root - it ignores the tenant context entirely.
