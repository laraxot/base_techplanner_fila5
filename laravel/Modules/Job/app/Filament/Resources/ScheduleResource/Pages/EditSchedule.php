<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ScheduleResource\Pages;

use Filament\Notifications\Notification;
<<<<<<< HEAD
use Filament\Support\Components\Component;
=======
>>>>>>> 4b6b99016 (first commit)
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Modules\Job\Filament\Resources\ScheduleResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Override;
use Webmozart\Assert\Assert;

class EditSchedule extends XotBaseEditRecord
{
    // TransTrait è già incluso in XotBaseEditRecord - non ridichiarare

    public Collection $commands;

    protected static string $resource = ScheduleResource::class;

    #[Override]
<<<<<<< HEAD
    protected function getFormSchema(): array
    {
        $schema = $this->getResource()::getFormSchema();
        Assert::isArray($schema);

        $components = array_values($schema);
        Assert::allIsInstanceOf($components, Component::class);

        return $components;
=======
    public function getformSchema(): array
    {
        Assert::isArray($res = $this->getResource()::getFormSchema());

        return $res;
>>>>>>> 4b6b99016 (first commit)
    }

    protected function onValidationError(ValidationException $exception): void
    {
        Notification::make()
            ->title($exception->getMessage())
            ->danger()
            ->send();
    }

    // protected function getRedirectUrl(): string
    // {
    //    return $this->getResource()::getUrl('index');
    // }
}
