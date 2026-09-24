<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\NotificationResource\Pages;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Modules\Notify\Filament\Resources\NotificationResource;
use Modules\Notify\Filament\Resources\NotificationResource\Schemas\NotificationInfolist;
=======
use Modules\Notify\Filament\Resources\NotificationResource;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewNotification extends XotBaseViewRecord
{
    protected static string $resource = NotificationResource::class;
<<<<<<< HEAD

    /**
     * @return array<string, Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(NotificationInfolist::class)->getInfolistSchema();
    }
=======
>>>>>>> laraxot/dev
}
