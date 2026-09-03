# Project Context — BMAD On-Demand

Phase: Implementation / Code Fix
Task: PHPStan max-level fix; rename resolve/getXotTable*; docs consolidation
Rules: phpstan.neon ONLY USER; deprecated IGNORE; BMAD always on-demand

## Status
- PHPStan: 3 errori residui (CMS class_uses_recursive, Media generics) — non bloccanti
- Seo/TestCase: RISOLTO (verificato: [OK])
- deprecated: 8 soppressi (HasXotTable, HasXotFactory)
- rename: resolveTableHeading→getTableHeading, getXotTableHeaderActions→getTableHeaderActions
- docs: INDEX.md in 7 moduli (Xot,Gdpr,Geo,AI,Employee,Seo,Activity,Job) + Zero theme

## Next
- chiudere i 3 residui CMS/Media se richiesto
- consolidamento docs (duplicati, archive)
