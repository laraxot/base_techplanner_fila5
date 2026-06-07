<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Forms\Components;

<<<<<<< HEAD
use Filament\Forms\Components\Field;

class TreeField extends Field
=======
use Modules\Xot\Filament\Forms\Components\XotBaseField;

class TreeField extends XotBaseField
>>>>>>> dev
{
    /**
     * Setup iniziale del componente.
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @var view-string $viewString */
        $viewString = 'ui::filament.forms.components.tree';
        $this->view($viewString);
    }
}
