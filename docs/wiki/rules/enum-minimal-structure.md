# Enum Minimal Structure

## Scopo

Definire la struttura minima canonica per gli enum di dominio, allineata al pattern Laraxot/Fixcity.

## Regola minima obbligatoria

Per enum usati in UI (Filament, Blade, map popup, badge):

1. enum tipizzato `string`
2. `declare(strict_types=1);`
3. implementare `HasLabel`, `HasColor`, `HasIcon`
4. usare `Modules\Xot\Traits\EnumTrait`
5. definire `default(): static`

## Esempio canonico (TicketTypeEnum)

Percorso: `laravel/Modules/Fixcity/app/Enums/TicketTypeEnum.php`

```php
<?php

declare(strict_types=1);

namespace Modules\Fixcity\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Modules\Xot\Traits\EnumTrait;

enum TicketTypeEnum: string implements HasColor, HasIcon, HasLabel
{
    use EnumTrait;

    case ROAD_MAINTENANCE = 'road_maintenance';
    case PUBLIC_LIGHTING = 'public_lighting';
    // ...
    case OTHER = 'other';

    public static function default(): static
    {
        return self::OTHER;
    }
}
```

## Perche' `EnumTrait` e' obbligatorio

`Modules\Xot\Traits\EnumTrait` fornisce in modo centralizzato:

- `getLabel()`
- `getColor()`
- `getIcon()`
- `getDescription()`
- helper comuni (`toArray()`, `getSearchable()`, ecc.)

Questo evita duplicazioni e mantiene coerenza tra admin, frontend e traduzioni.

## Traduzioni attese

Le label/color/icon/description devono arrivare dalla struttura traduzioni dell'enum (`values.<value>.*`), risolta dal trait.

## Anti-pattern da evitare

- implementare manualmente `getLabel()/getColor()/getIcon()` dentro ogni enum senza motivo
- introdurre metodi alternativi (`label()`, `iconName()`) non allineati al trait
- usare enum senza `default()` quando il dominio richiede un fallback
