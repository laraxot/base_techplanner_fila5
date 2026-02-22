# Profile: id auto-increment + colonna uuid

## Scopo

La tabella `profiles` usa **id bigint auto-increment** come chiave primaria e **uuid** come colonna separata.

- **id**: per FK interne, performance, join
- **uuid**: per app Android, API esterne, compatibilità PostgreSQL, identificazione pubblica

## Regola

- **id**: mai esporre nelle API pubbliche; usare per relazioni e query interne
- **uuid**: usare per identificazione esterna (app mobile, webhook, integrazioni)

## Schema

```
profiles
  id          BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
  uuid        CHAR(36) UNIQUE NULL  -- generato da HasUuids su creazione
  user_id     VARCHAR(36) ...
  ...
```

## BaseProfile

- `uniqueIds()` restituisce `['uuid']` (non `['id']`)
- `id` non è in `fillable`
- `HasUuids` genera UUID solo per la colonna `uuid`

## Migration

Unica migrazione in **TechPlanner** (Profile dipende dal main_module): `2026_02_22_000000_create_profiles_table.php`.
Usa `XotBaseMigration::convertUuidPrimaryKeyToBigintWithUuidColumn()` per la conversione.

## Regola: Profile nel main_module

Profile è strettamente dipendente dal main_module: la migration vive nel modulo principale (es. TechPlanner), non in User.

## Riferimenti

- [user-profile-models](user-profile-models.md)
- [uuid-trait-resolution](uuid-trait-resolution.md)
- [models/readme](models/readme.md)
- [convert-uuid-id-to-bigint](../../Xot/docs/database/convert-uuid-id-to-bigint.md)
