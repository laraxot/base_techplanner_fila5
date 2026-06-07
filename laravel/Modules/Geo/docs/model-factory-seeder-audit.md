# Model/Factory/Seeder Audit

<<<<<<< HEAD
<<<<<<< HEAD
Generated: [DATE] 16:28
=======
Generated: 2025-08-22 16:28
>>>>>>> 4b6b99016 (first commit)
=======
Generated: [DATE] 16:28
>>>>>>> dev

## Coverage
| Model | Factory | Seeded |
|---|---|---|
| Place | yes | no |
| County | yes | no |
| Province | yes | no |
| Address | yes | no |
| Location | yes | no |
| Comune | yes | no |
| PlaceType | yes | no |
| Region | yes | no |
| Locality | yes | no |
| State | yes | no |
| GeoJsonModel | n/a | n/a |
| ComuneJson | n/a | n/a |
| GeoTrait | n/a | n/a |
| HasAddress | n/a | n/a |
| HasPlaceTrait | n/a | n/a |
| GeographicalScopes | n/a | n/a |
| SushiToJsons | n/a | n/a |

Seeder: `database/seeders/GeoDatabaseSeeder.php`

## Missing / Actions
- Add exemplar seeding for: Region, Province, Comune, Address, Location (small curated set).
- Mark trait/utility/JSON helper classes as non-seed targets (n/a).

## Likely non-business-critical
- Trait/utility classes listed above; not direct domain entities.
