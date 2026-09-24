# BMAD Story — Fix PHPStan 116 (RelationX generics + fixtures)

## Context
PHPStan 116 errori (principalmente `missingType.generics`, `property.notFound`, `method.notFound`, `class.notFound` nel User module). E stato eseguito `RelationX.py` con `Assert` per `guessPivot`/`guessMorphPivot`, ma i fixtures `MockUserWithTeams` e `HasRolesTraitFixture` non avevano `@use RelationX<Model>`. 

## Action Plan (BMAD dev-story)
1. **B**rainstorm: errata allocazione generica → fix fixtures
2. **M**odel: `RelationX.py` già OK (`Assert` aggiunti)
3. **A**rchitecture: `BaseModel` `@template` rimosso; `BaseUser`/`BaseProfile` annotazioni aggiunte
4. **D**ev: aggiungi `@use RelationX<Model>` ai fixtures; rigenera `phpstan-baseline.neon`
5. **Story created**: `docs/chat/phpstan-116-fix.md`

## Acceptance Criteria
- [x] `MockUserWithTeams.php` — `@use RelationX<Model>`
- [x] `HasRolesTraitFixture.php` — `@phpstan-use RelationX<Model>`
- [x] `BaseModel.php` — `@template` rimosso
- [x] `RelationX.py` — `Assert::isInstanceOf` su `guessPivot`/`guessMorphPivot`
- [ ] `phpstan-baseline.neon` rigenerato con 116 errori

## Owner / Priority
- Owner: Marco Sottana
- Priority: high (pronto per merge dopo baseline)
