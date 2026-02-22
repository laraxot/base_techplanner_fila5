# convertUuidPrimaryKeyToBigintWithUuidColumn

Metodo riutilizzabile in XotBaseMigration per convertire id da UUID a bigint auto-increment con colonna uuid.

## Scopo

Per tabelle con id UUID che devono passare a id bigint + uuid (app Android, API esterne, Postgres).

## Firma

```php
protected function convertUuidPrimaryKeyToBigintWithUuidColumn(
    string $newTableColumnsSql,
    array $insertColumns,
    array $relatedTableFks = []
): void
```

## Parametri

- **newTableColumnsSql**: corpo CREATE TABLE (colonne, es. "uuid CHAR(36) NULL UNIQUE, user_id VARCHAR(36) NULL")
- **insertColumns**: colonne da copiare (id diventa uuid automaticamente)
- **relatedTableFks**: tabelle con FK uuid da convertire, es. `[['table' => 'profile_team', 'fk_column' => 'profile_id', 'unique_with' => ['profile_id', 'team_id']]]`

## Esempio (profiles in TechPlanner)

Vedi [profile-id-uuid-schema](../../../User/docs/profile-id-uuid-schema.md).

## Riferimenti

- [migration-guidelines](migration-guidelines.md)
- [profile-id-uuid-schema](../../../User/docs/profile-id-uuid-schema.md)
