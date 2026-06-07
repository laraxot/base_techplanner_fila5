---
trigger: manual
description:
globs:
---
# Regole HasTeams Trait - Filosofia Laraxot

## Filosofia Fondamentale
- **belongsToManyX** è SEMPRE preferito a belongsToMany (Convention over Configuration)
- **Auto-Discovery** automatico di pivot models, tables, fields
- **Zero Boilerplate** - il framework lavora per te
- **Cross-Database Support** automatico

## Pattern Obbligatori

### ✅ Trait Structure Corretto
```php
use Modules\Xot\Models\Traits\RelationX;

trait HasTeams
{
    use RelationX; // OBBLIGATORIO per belongsToManyX

    public function teams(): BelongsToMany
    {
        $teamClass = XotData::make()->getTeamClass();
        return $this->belongsToManyX($teamClass); // NO belongsToMany!
    }
}
```

### ✅ Tipizzazione Rigorosa
```php
// Tutti i parametri DEVONO avere tipo esplicito
public function addTeamMember(UserContract $user, ?Role $role = null): Model
public function hasTeamMember(UserContract $user): bool
public function removeTeamMember(UserContract $user): void
```

### ✅ PHPDoc Completi
```php
/**
 * @property-read Collection<int, TeamContract> $teams
 * @property-read Collection<int, TeamContract> $ownedTeams
 * @property-read TeamContract|null $currentTeam
 */
```

### ✅ Null Safety
```php
public function switchTeam(?TeamContract $team): bool
{
    if ($team === null) {
        $this->current_team_id = null;
        $this->save();
        return true;
    }
    // Resto della logica...
}
```

### ✅ Dependency Injection (NO app() helper)
```php
// ✅ CORRETTO
return $this->hasMany(TeamUser::class, 'team_id');
return $this->hasMany(TeamInvitation::class, 'team_id');

// ❌ VIETATO
return $this->hasMany(app('team_user_model'), 'team_id');
```

### ✅ Validazione Rigorosa
```php
public function addTeamMember(UserContract $user, ?Role $role = null): Model
{
    Assert::notNull($user, 'User cannot be null');
    // Resto della logica...
}
```

## Anti-pattern da Evitare

### ❌ belongsToMany Manuale
```php
// MAI fare questo
return $this->belongsToMany($teamClass, 'team_user')
            ->withTimestamps()
            ->withPivot('role');
```

### ❌ Tipizzazione Mancante
```php
// MAI parametri senza tipo
public function addTeamMember($user, $role = null)
```

### ❌ Logica Sempre True
```php
// MAI logica senza senso
public function belongsToTeams(): bool
{
    return true; // DEMENZA!
}
```

### ❌ Side Effects nei Getter
```php
// MAI side effects nei getter
public function currentTeam(): BelongsTo
{
    // Side effects qui = MALE!
    if ($this->current_team_id === null) {
        $this->switchTeam($this->personalTeam());
    }
}
```

## Requisiti PHPStan Livello 9+
- `declare(strict_types=1);` OBBLIGATORIO
- Tutti i parametri tipizzati
- Tutti i return types espliciti
- PHPDoc con generics completi
- Assert per validazione runtime

## File Dependency Richiesti
- `Modules\User\Models\TeamUser` (pivot model)
- `Modules\User\Models\TeamInvitation`
- `Modules\User\Models\Role`
- `Modules\Xot\Models\Traits\RelationX` (per belongsToManyX)

## Religione Laraxot
> "Il framework deve lavorare per te, non tu per il framework"
> - Auto-Discovery > Configurazione Manuale
> - Convention > Configuration
> - Intelligence > Boilerplate

*Data: Gennaio 2025*
