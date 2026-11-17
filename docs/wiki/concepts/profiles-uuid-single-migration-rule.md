# Profiles UUID Single-Migration Rule

## Regola

Per `profiles` vale la regola canonica Laraxot:

- una sola migrazione owner `create_profiles_table`
- nessuna migrazione `add_uuid_to_profiles_table`
- nessuna migrazione `add_credits_to_profiles_table`
- nessuna migrazione `repair_profiles_*`

Se il contratto del modello cambia, si modifica la migrazione canonica e si aggiorna il timestamp del file.

## Contratto tabella `profiles`

- `id`: chiave primaria intera auto-increment
- `uuid`: identificatore esterno stabile separato
- `credits`: campo opzionale nullable per evitare vincoli in create iniziale profilo

Il runtime applicativo usa gia' `uuid` in create/insert; quindi la colonna deve esistere sempre nello schema base del modello.

## Caso Fixcity

Nel ramo Fixcity la migrazione owner e' **un solo file**:

- `laravel/Modules/Fixcity/database/migrations/2026_06_05_090000_create_profiles_table.php`

Qui stanno `tableCreate`, `tableUpdate()` idempotente e backfill `uuid`. Vietato un secondo `create_profiles_table` nello stesso modulo; bump timestamp per rieseguire.

## Motivazione

- DRY: un solo file da leggere per capire il contratto `Profile`
- KISS: niente catena di migrazioni additive per una tabella base
- forward-only: si evolve la fonte di verita', non si stratificano toppe

## Verifica minima

- la migrazione `create_profiles_table` contiene `uuid`
- la migrazione `create_profiles_table` mantiene `credits` nullable
- il DB reale viene poi riallineato senza creare una seconda migrazione schema
- nessun modulo diverso da Fixcity introduce `add_*_to_profiles_table`
