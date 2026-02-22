# Profile migration nel main_module

## Regola

Profile è strettamente dipendente dal main_module. La migration `create_profiles_table` vive in TechPlanner, non in User.

## Migration

`database/migrations/2026_02_22_000000_create_profiles_table.php`

Usa `XotBaseMigration::convertUuidPrimaryKeyToBigintWithUuidColumn()` per convertire id da UUID a bigint.

## Riferimenti

- [profile-id-uuid-schema](../../User/docs/profile-id-uuid-schema.md)
- [convert-uuid-id-to-bigint](../../Xot/docs/database/convert-uuid-id-to-bigint.md)
