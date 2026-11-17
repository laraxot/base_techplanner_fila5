# Wizard Summary Step con Infolists

## Regola Fondamentale

Lo step summary del wizard **DEVE** usare [Filament Infolists](https://filamentphp.com/docs/5.x/infolists/) - mai HTML manuale.

## Pattern Corretto

### Schema Step Summary
```php
// TicketForm::getSummarySchema()
public static function getSummarySchema(): array
{
    return [
        Section::make(__('fixcity::ticket.sections.summary.label'))
            ->schema([
                TextEntry::make('review_location')
                    ->columnSpanFull()
                    ->state(static fn (Get $get): string => static::formatLocationReviewState($get)),
                
                TextEntry::make('review_category')
                    ->columnSpanFull()
                    ->state(static fn (Get $get): string => static::formatCategoryReviewState($get)),
                
                TextEntry::make('review_description')
                    ->columnSpanFull()
                    ->state(static fn (Get $get): string => static::formatDescriptionReviewState($get)),
                
                TextEntry::make('review_attachments')
                    ->columnSpanFull()
                    ->state(static fn (Get $get): string => static::formatAttachmentsReviewState($get)),
            ]),
    ];
}
```

### Pattern dei Metodi di Formattazione
```php
protected static function formatLocationReviewState(Get $get): string
{
    $data = $get('location_data');
    if (empty($data)) {
        return '<span class="text-gray-500">Non specificata</span>';
    }
    
    return sprintf(
        '%s<br><span class="text-sm text-gray-600">%s</span>',
        e($data['address'] ?? 'Indirizzo non specificato'),
        e($data['city'] ?? 'Città non specificata')
    );
}

protected static function formatCategoryReviewState(Get $get): string
{
    $categoryId = $get('category_id');
    if (empty($categoryId)) {
        return '<span class="text-gray-500">Non selezionata</span>';
    }
    
    $category = TicketCategory::find($categoryId);
    return $category ? $category->name : 'Categoria non trovata';
}
```

## Anti-Pattern da Evitare

### ❌ HTML Manuale nel Form
```php
// SBAGLIATO - HTML hardcoded
TextEntry::make('review_location')
    ->formatStateUsing(fn ($state) => '<div class="address-box">'.$state.'</div>')
```

### ❌ Logica Complessa nello Schema
```php
// SBAGLIATO - Logica nel componente
TextEntry::make('computed_field')
    ->state(fn () => $this->computeSomethingComplex())
```

### ✅ Logica Separata nei Metodi
```php
// CORRETTO - Logica in metodi separati
TextEntry::make('review_location')
    ->state(static fn (Get $get): string => static::formatLocationReviewState($get))
```

## Best Practices

### 1. Separazione delle Responsabilità
- **Schema**: Definisce la struttura UI
- **Metodi di formattazione**: Gestiscono la logica di presentazione
- **Model/Service**: Gestiscono la business logic

### 2. State Management con `Get`
```php
// Usa sempre Get per accedere allo stato
TextEntry::make('field_name')
    ->state(static fn (Get $get): string => static::formatField($get))
```

### 3. HTML Sicuro
```php
// Usa sempre e() per escape HTML
protected static function formatField(Get $get): string
{
    $value = $get('field_name');
    return e($value ?? 'Valore predefinito');
}
```

### 4. CSS Classi Appropriato
```php
// Usa classi CSS del tema
TextEntry::make('field_name')
    ->columnSpanFull() // Per full-width
    ->state(fn (Get $get): string => ...)
```

## Testing del Summary Step

### Test PHP con Pest
```php
test('summary step shows formatted data', function () {
    $component = mountComponent(CreateTicketWizardWidget::class, [
        'step' => 'summary'
    ]);
    
    $component->assertSee('Riepilogo segnalazione');
    $component->assertSeeText('Indirizzo: Via Roma 123');
});
```

### Test Visivo con Playwright
```javascript
test('summary step renders correctly', async ({ page }) => {
    await page.goto('/it/tests/segnalazione-crea?step=summary');
    
    await expect(page.locator('text=Riepilogo segnalazione')).toBeVisible();
    await expect(page.locator('.fi-sc-infolist-section')).toBeVisible();
});
```

## Quality Gate

Prima di deployare verificare:

1. **phpstan analyse** - 0 errori
2. **phpmd.phar** - nessun errore bloccante
3. **phpinsights** - nessun errore critico
4. **pest** - test passano
5. **puppeteer/playwright** - test visuali passano
6. **File .lock** - integrità mantenuta

## Riferimenti

- [Filament Infolists Documentation](https://filamentphp.com/docs/5.x/infolists/)
- [XotBaseWizardWidget](../../../laravel/Modules/Xot/docs/filament/widgets/xot-base-wizard-widget.md)
- [Fixcity — `ticket` vs `segnalazione` (schema Filament)](../../../laravel/Modules/Fixcity/docs/wiki/concepts/fixcity-ticket-vs-segnalazione-lang.md)
- [TicketForm Schema](../../../laravel/Modules/Fixcity/app/Filament/Resources/TicketResource/Schemas/TicketForm.php)