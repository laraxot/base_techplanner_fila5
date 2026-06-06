# Autoload Configuration Audit Report

## Standard Configuration
Each module's composer.json should have:

```json
{
    "autoload": {
        "psr-4": {
            "Modules\\<ModuleName>\\": "app/",
            "Modules\\<ModuleName>\\Database\\Factories\\": "database/factories/",
            "Modules\\<ModuleName>\\Database\\Seeders\\": "database/seeders/"
        }
    },
    "autoload-dev": {
        "psr-4": {
            "Modules\\<ModuleName>\\Tests\\": "tests/"
        }
    }
}
```

## Findings

### Modules with CORRECT configuration:
- User ✓
---
module: theme
topic: autoload
canonical: ../../../Themes/docs/shared-components/autoload-audit-report.md
---

See canonical documentation: ../../../Themes/docs/shared-components/autoload-audit-report.md
