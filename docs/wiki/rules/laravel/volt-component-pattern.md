# Volt Component Pattern - AI Agent Rule

## Description
All interactive frontend components in this project MUST use the Volt Component pattern with `new class extends Livewire\Volt\Component` syntax. This provides type safety, reactivity, and seamless Folio integration.

Nel tema `Meetup` la regola è ancora più stringente (ed è quindi un sottoinsieme dell'obbligo di progetto).

## 🚫 CRITICAL: NEVER USE BLADE WITH PHP INLINE

This pattern is COMPLETELY WRONG and must NEVER be used:

```php
<?php
// ❌❌❌ NEVER DO THIS - COMPLETELY WRONG ❌❌❌
declare(strict_types=1);

use Modules\Meetup\Models\Event;

// Load event from slug - INLINE LOGIC IS FORBIDDEN!
$slug0 = $slug0 ?? '';
$slugToUse = $slug0;
if (empty($slugToUse)) {
    $slugToUse = Request::segment(3);
}
$event = null;
if (!empty($slugToUse)) {
    $event = Event::where('slug', $slugToUse)->first();
}
$isUpcoming = $event?->start_date?->isFuture() ?? true;
?>

<div>
    @if($event)
        <p>{{ $event->title }}</p>
    @endif
</div>
```

**Why this is WRONG:**
- ❌ Not reactive (no Livewire)
- ❌ Logic scattered in template
- ❌ Difficult to test
- ❌ Not type-safe
- ❌ Doesn't follow Laraxot philosophy
- ❌ Mix of PHP and Blade without structure

**⚠️ NEVER revert to this pattern. It is a serious architectural error.**

## Rules

### DO
- ✅ Use `new class extends Component` at the top of Blade files
- ✅ Define public properties with explicit types (`public ?Event $event = null`)
- ✅ Use `mount()` method to initialize data from props or database
- ✅ Access properties via `$this->property` in templates
- ✅ Access model properties directly (`$this->event->title`)
- ✅ Use `wire:click` for interactive actions
- ✅ Add `livewire: true` flag in CMS block JSON for Volt components
- ✅ Use type hints for all methods

### DON'T
- ❌ **NEVER** use Blade with inline PHP logic (the anti-pattern shown above)
- ❌ Use `@props()` with Volt class components
- ❌ Use inline PHP logic (`@php`) in templates
- ❌ Flatten all model properties to component properties (access model directly instead)
- ❌ Use computed properties for data that exists on the model
- ❌ Use direct variable access without `$this->`

## File Location
```
Themes/Meetup/resources/views/components/blocks/{block}/{component}.blade.php
```

## Example Pattern
```php
<?php

use Livewire\Volt\Component;
use Modules\Meetup\Models\Event;

new class extends Component {
    public ?Event $event = null;
    public string $slug0 = '';
    public bool $showModal = false;
    
    public function mount(): void
    {
        if (!$this->event && !empty($this->slug0)) {
            $this->event = Event::where('slug', $this->slug0)->first();
        }
    }
};

?>

<div>
    @if($this->event)
        <h1>{{ $this->event->title }}</h1>
        <button wire:click="$this->showModal = true">Open</button>
    @endif
</div>
```

## CMS Integration
Volt components require `livewire: true` flag in block configuration:
```json
{
  "view": "pub_theme::components.blocks.events.detail",
  "livewire": true
}
```

## Related Documentation
- `Themes/Meetup/docs/volt-component-pattern.md`
- `Themes/Meetup/docs/agnostic-routing.md`
- `Themes/Meetup/docs/helper-class-pattern.md`
