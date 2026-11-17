# Header Authentication State Rule

## Architecture - Single Source of Truth

```md
<x-section slug="header" />
  → Modules\Cms\View\Components\Section::render()
  → view: pub_theme::components.sections.header.v1
  → FILE: laravel/Modules/Sixteen/resources/views/components/sections/header/v1.blade.php
```

**GUEST (non authenticated):**
- Show ONE block: "Accedi all'area personale"
- NO avatar, NO name, NO dropdown

**AUTHENTICATED:**
- User block with avatar/icon, name, dropdown menu
- No "Accedi" button

### Requirements
- Alpine.js dropdowns (`x-show`) - NO Bootstrap data-attributes
- Consistent color usage (`icon-white`, not `icon-primary`)
- Test reference: `graduatoria-area-personale.html`