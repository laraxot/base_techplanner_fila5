<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Forms\Components;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Forms\Components\Select as FilamentSelect;
=======
use Filament\Forms\Components\Select;
>>>>>>> 4b6b99016 (first commit)
=======
use Filament\Forms\Components\Select as FilamentSelect;
>>>>>>> dev

/**
 * Base class for custom Select components following Laraxot philosophy.
 *
 * In the Laraxot framework, all custom Select components should extend
 * XotBaseSelect instead of directly extending Filament\Forms\Components\Select.
 * This ensures consistency with the framework's architecture and provides
 * a foundation for common Select functionality across the application.
 *
 * @method static static make(string $name) Create a new instance of the component
 */
<<<<<<< HEAD
<<<<<<< HEAD
abstract class XotBaseSelect extends FilamentSelect
=======
abstract class XotBaseSelect extends Select
>>>>>>> 4b6b99016 (first commit)
=======
abstract class XotBaseSelect extends FilamentSelect
>>>>>>> dev
{
    protected function setUp(): void
    {
        parent::setUp();
        // Common setup for all XotBaseSelect components can be added here.
    }
}
