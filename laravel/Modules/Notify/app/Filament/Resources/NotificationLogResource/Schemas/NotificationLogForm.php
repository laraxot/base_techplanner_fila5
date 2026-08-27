<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\NotificationLogResource\Schemas;

use Filament\Forms\Components\TextInput;
<<<<<<< .merge_file_fY7zpw
=======
use Filament\Schemas\Components\Component;
>>>>>>> .merge_file_AMR8yA
use Filament\Schemas\Components\Section;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class NotificationLogForm extends XotBaseResourceForm
{
    /**
<<<<<<< .merge_file_fY7zpw
     * @return array<int|string, \Filament\Schemas\Components\Component>
     */

=======
     * @return array<int|string, Component>
     */
>>>>>>> .merge_file_AMR8yA
    public static function getFormSchema(): array
    {
        return [
            Section::make([
                'name' => TextInput::make('name'),
            ]),
        ];
    }
}
