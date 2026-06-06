<<<<<<< HEAD
```php
AttachAction::make()->modifyRecordSelectUsing(
fn ($select) => $select->getOptionLabelFromRecordUsing(fn ($record) => $record->name . ' ' . $record->organization)
);
```

```php
AttachAction::make()
    ->recordTitle(fn (Model $record) => "{$record->name} ({$record->organisation->name})")
```
=======
---
module: theme
topic: attach
canonical: ../../../../../Themes/docs/shared-components/attach.md
---

See canonical documentation: ../../../../../Themes/docs/shared-components/attach.md
>>>>>>> origin/dev
