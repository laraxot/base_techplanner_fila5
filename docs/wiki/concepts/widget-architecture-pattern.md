---
title: "Widget Architecture Pattern — SSoT Schemas"
type: "concept"
tags: [widgets, architecture, schemas, filament, dry, kiss]
module: "root"
---

# Widget Architecture Pattern — SSoT Schemas

**Ultimo Aggiornamento:** 2026-06-04  
**Stato:** ✅ Applicato  

---

## Gerarchia Widget

```text
FilamentWidget
    └── XotBaseWidget                       (azioni, viste, InteractsWithSchemas)
            └── XotBaseSchemaWidget         ← form/schema lineare
            │       └── RegisterWidget / LoginWidget / etc.
            └── XotBaseInfolistWidget       ← infolist (NON schema)
            └── XotBaseTableWidget          ← table
            └── XotBaseChartWidget          ← chart
            └── XotBaseWizardWidget         ← wizard + step
```

## Regole

1. **XotBaseSchemaWidget** estende `XotBaseWidget` e aggiunge il supporto a **Schema v4**
2. **RegisterWidget** estende `XotBaseSchemaWidget` (non XotBaseWidget direttamente)
3. **SSoT** (Single Source of Truth): lo schema viene da `UserForm::getRegisterFormSchema()`, non dallo widget

## Perché questo pattern?

| Prima | Dopo |
|-------|------|
| `RegisterWidget extends XotBaseWidget` | `RegisterWidget extends XotBaseSchemaWidget` |
| Confusezza: widget ha form? | Chiarezza: estende "SchemaWidget" |
| Codice duplicato | DRY: schema in `UserForm` |
| Difficile testare | Testabile: schema indipendente |

## Esempio

```php
// Modules/User/app/Filaments/Widgets/Auth/RegisterWidget.php

class RegisterWidget extends XotBaseSchemaWidget  // ← corretto
{
    public function getFormSchema(): array
    {
        return UserForm::getRegisterFormSchema();  // ← SSoT
    }
}
```

## Riferimenti

- [XotBaseSchemaWidget](laravel/Modules/Xot/app/Filament/Widgets/XotBaseSchemaWidget.php)
- [UserForm Schema](laravel/Modules/User/Filament/Resources/UserResource/Schemas/UserForm.php)

---

*Pattern documentato nel Second Brain del progetto FixCity.*