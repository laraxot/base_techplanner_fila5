<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Pages;

use Modules\Xot\Filament\Traits\NavigationLabelTrait;

class EnvPage extends XotBasePage
{
    use NavigationLabelTrait;

<<<<<<< HEAD
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-home';
=======
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-home';
>>>>>>> 6ed19256f (.)

    protected string $view = 'xot::filament.pages.dashboard';
}
