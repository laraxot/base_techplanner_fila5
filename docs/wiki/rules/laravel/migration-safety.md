# Rule: Migration Safety - NEVER Destroy Data

## 🚨 COMANDI VIETATI

```bash
❌ NEVER: php artisan migrate:fresh
❌ NEVER: php artisan migrate --force
❌ NEVER: php artisan db:wipe
❌ NEVER: php artisan db:fresh
❌ NEVER: php artisan migrate:refresh (without backup)
```

## Filosofia

**FORWARD-ONLY**: Sempre avanti, mai indietro
**DATA PRESERVATION**: I dati sono sacri
**PRODUCTION-FIRST**: Sviluppa come se fossi in produzione

## Workflow Corretto

```bash
# 1. Find existing migration
find Modules/User/database/migrations -name "*create_profiles*"

# 2. Modify with idempotent check
if (! $this->hasColumn('uuid')) {
    $table->uuid('uuid')->nullable();
}

# 3. Update timestamp (not create new file)
mv 2026_03_12_170000_create_profiles_table.php \
   2026_03_12_172000_create_profiles_table.php

# 4. Run safe migration
php artisan migrate
```

## Related

- Docs: `Modules/User/docs/database/MIGRATION_SAFETY_RULES.md`
- Skill: `.opencode/skills/safe-migrations/SKILL.md`
- GitHub Issue: #24
