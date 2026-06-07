# Laraxot Policy Inheritance

## Overview

The Laraxot architecture implements a hierarchical policy system to manage authorization across modular applications.

## Policy Base Classes

### XotBasePolicy (`Modules\Xot\Models\Policies\XotBasePolicy`)

The universal base policy for all modules.

**Responsibilities:**
- Universal authorization rules (e.g., super-admin bypass)
- Common authorization methods (`viewAny`, `view`, `create`, etc.)
- Foundation for all module-specific policies

**Key Features:**
- Uses `once()` wrapper for `before()` method to ensure single execution
- Provides `super-admin` role automatic authorization
- Returns `false` for `viewAny()` by default (deny-all)

### UserBasePolicy (`Modules\User\Models\Policies\UserBasePolicy`)

Module-specific base policy for the User module.

**Responsibilities:**
- User-domain specific authorization rules
- Should extend `XotBasePolicy` to inherit universal rules
- Add granular user-related authorization logic

**Pattern:**
```php
abstract class UserBasePolicy extends XotBasePolicy
{
    // Only user-specific authorization rules here
    // Universal rules come from parent
}
```

## When to Use Which

### Use `XotBasePolicy` for:
- Creating new module base policies (extend it)
- Universal authorization rules that apply to all entities
- Super-admin or global role bypasses

### Use `UserBasePolicy` for:
- User-related model authorization
- User-specific access control logic
- Extending with additional user domain rules

## Implementation Rules

### 1. Inheritance Hierarchy
```
            Illuminate\Auth\Access\AuthorizationException
                          ↓
                 HandlesAuthorization (Trait)
                          ↓
                  XotBasePolicy (Base)
                          ↓
              (Extend for your module)
                          ↓
        YourModuleBasePolicy e.g. UserBasePolicy
```

### 2. No Duplication Principle

**❌ WRONG** - Duplicated before() method:
```php
class UserBasePolicy  // Does NOT extend XotBasePolicy
{
    public function before(UserContract $user, string $_ability): ?bool
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }
        return null;
    }
}
```

**✅ CORRECT** - Extends parent:
```php
class UserBasePolicy extends XotBasePolicy
{
    // Only user-specific methods
    // Inherits universal rules from XotBasePolicy
}
```

### 3. Method Overriding

When overriding parent methods:
```php
class UserBasePolicy extends XotBasePolicy
{
    public function before(UserContract $user, string $_ability): ?bool
    {
        // Call parent first
        $parentResult = parent::before($user, $_ability);
        if ($parentResult !== null) {
            return $parentResult;
        }
        
        // Add user-specific logic
        if ($user->hasRole('user-admin')) {
            return in_array($_ability, ['user.view', 'user.update']);
        }
        
        return null;
    }
}
```

### 4. New Module Policy Creation

For a new module (e.g., `Modules/Ticket`):

```php
// Modules/Ticket/Models/Policies/TicketBasePolicy.php
namespace Modules\Ticket\Models\Policies;

use Modules\Xot\Models\Policies\XotBasePolicy;

abstract class TicketBasePolicy extends XotBasePolicy
{
    // Ticket-specific authorization rules
    public function update(UserContract $user, Ticket $ticket): bool
    {
        return $user->id === $ticket->user_id 
            || $user->hasRole('ticket-admin');
    }
}
```

## Best Practices

1. **Single Responsibility**: Each policy handles one domain (User, Ticket, etc.)
2. **DRY**: Universal logic in `XotBasePolicy`, specific logic in child classes
3. **Liskov Substitution**: Child policies can replace parent without breaking
4. **Open/Closed**: Extend policies, don't modify them
5. **Explicit**: Always use `parent::method()` when overriding

## Common Patterns

### Pattern 1: Module-Specific Base Policy
```php
class TicketBasePolicy extends XotBasePolicy
{
    // All ticket-related models extend this
}
```

### Pattern 2: Entity-Specific Policy
```php
class TicketPolicy extends TicketBasePolicy
{
    public function update(UserContract $user, Ticket $ticket): bool
    {
        return $user->id === $ticket->user_id;
    }
}
```

### Pattern 3: Cross-Module Access
```php
class ProjectPolicy extends XotBasePolicy
{
    public function view(UserContract $user, Project $project): bool
    {
        // Check across multiple modules
        return $project->team->users->contains($user->id)
            || $user->hasRole('project.admin');
    }
}
```

## Registration

In your module's `AuthServiceProvider`:

```php
public function boot(): void
{
    $this->registerPolicies();
    
    // Register your policy
    Gate::policy(Ticket::class, TicketPolicy::class);
}
```

## Testing

```php
// Test that child policy inherits parent
public function test_user_base_policy_extends_xot_base_policy()
{
    $reflector = new \ReflectionClass(UserBasePolicy::class);
    $parent = $reflector->getParentClass();
    
    $this->assertEquals(XotBasePolicy::class, $parent->getName());
}
```

## Documentation Structure

- Module base policies: `<Module>/docs/wiki/concepts/policy-inheritance-strategy.md`
- Root documentation: `docs/wiki/concepts/laraxot-policy-inheritance.md`
- Reference implementations: `<Module>/app/Models/Policies/`

## References

- Laravel Authorization: https://laravel.com/docs/authorization
- Laraxot Base Classes: `Modules/Xot/Models/Policies/`
- Policy Registration: `Modules/*/Providers/AuthServiceProvider.php"
