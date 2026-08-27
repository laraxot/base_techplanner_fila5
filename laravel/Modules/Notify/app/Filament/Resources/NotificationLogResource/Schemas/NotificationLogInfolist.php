<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\NotificationLogResource\Schemas;

use Filament\Infolists\Components\TextEntry;
<<<<<<< .merge_file_3Q7tzr
=======
use Filament\Schemas\Components\Component;
>>>>>>> .merge_file_Fviit4
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class NotificationLogInfolist extends XotBaseResourceInfolist
{
    /**
<<<<<<< .merge_file_3Q7tzr
     * @return array<string, \Filament\Schemas\Components\Component>
=======
     * @return array<string, Component>
>>>>>>> .merge_file_Fviit4
     */
    public static function getInfolistSchema(): array
    {
        return [
            'id' => TextEntry::make('id'),
            'name' => TextEntry::make('name'),
            'created_at' => TextEntry::make('created_at')->dateTime(),
        ];
    }
}
