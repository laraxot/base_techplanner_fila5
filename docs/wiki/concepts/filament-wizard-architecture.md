# Filament Wizard Architecture v5.3

## Schema Requirements
- MUST extend XotBaseResourceForm
- Form components must use Filament\Schemas\Components\ namespace
- Wizard steps require persistent query string configuration
- Section spacing must use compact() with explicit id attributes

## Component Initialization
- Form fields must use Get resolution for dynamic values
- Enum selection requires native(false) and live() hydration
- Grid layout requires explicit column configurations
- Text components need maxLength and row restrictions

## Security Patterns
- All text output requires SafeStringCastAction::cast()
- Enums must be accessed via tryFrom resolution
- Latitude/longitude values require numeric casting
- File uploads must specify directory constraints

## Database Schemas
- Type_id field requires enum selection from TicketTypeEnum
- Location fields require address+latitude+longitude validation
- Images must be stored in public/tickets/images directory
- Maximum 10 image uploads with sequential normalization

## Internationalization
- All user-facing text requires __() localization
- Language service provider owns all labels
- Enum labels use native enum access method

## Testing Requirements
- Test wizard navigation flow
- Validate component hydration with live values
- Verify component rendering with null values
- Test internationalization patterns
- Validate geolocation coordinates normalization

## Code Review Notes
- Comment: "Fix ticket_wizard_steps_summary_fix" 
- Comment: "bcbc: com.c4约定.com: new_filament_schemas_compiler"
- Comment: "FixPreferImplicitOptional"
- For more details see:
  - /docs/wiki/compiled-laravel-modules
  - /docs/wiki/concepts/schema-members
  - /docs/wiki/summaries/filament-architectural-rules