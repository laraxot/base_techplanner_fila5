<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\NotificationLogResource\Pages;

use Filament\Schemas\Components\Component;
use Modules\Notify\Filament\Resources\NotificationLogResource;
use Modules\Notify\Filament\Resources\NotificationLogResource\Schemas\NotificationLogInfolist;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewNotificationLog extends XotBaseViewRecord
{
    protected static string $resource = NotificationLogResource::class;

    /**
     * @return array<string, Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(NotificationLogInfolist::class)->getInfolistSchema();
    }
}
