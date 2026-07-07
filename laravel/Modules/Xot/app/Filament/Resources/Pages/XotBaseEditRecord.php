<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Pages;

<<<<<<< HEAD
use Filament\Actions\Action;
use Filament\Actions\ActionGroup; // Added missing use statement
use Filament\Actions\DeleteAction;
use Filament\Forms\Form; // Keep if still used elsewhere
use Filament\Resources\Pages\EditRecord as FilamentEditRecord;
use Filament\Schemas\Schema;
=======
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord as FilamentEditRecord;
>>>>>>> 6ed19256f (.)
use Filament\Support\Components\Component;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Filament\Traits\TransTrait;

abstract class XotBaseEditRecord extends FilamentEditRecord
{
    use TransTrait;

    public static function getNavigationLabel(): string
    {
        return static::transFunc(__FUNCTION__);
    }

    public static function getNavigationIcon(): string
    {
        return static::transFunc(__FUNCTION__);
    }

    public static function canDelete(Model $record): bool
    {
<<<<<<< HEAD
        $resource = static::getResource();
=======
        $resource = static::$resource;
>>>>>>> 6ed19256f (.)

        $result = $resource::canDelete($record);

        return is_bool($result) ? $result : false;
    }

    public static function canForceDelete(Model $record): bool
    {
<<<<<<< HEAD
        $resource = static::getResource();
=======
        $resource = static::$resource;
>>>>>>> 6ed19256f (.)

        $result = $resource::canForceDelete($record);

        return is_bool($result) ? $result : false;
    }

    public static function canRestore(Model $record): bool
    {
<<<<<<< HEAD
        $resource = static::getResource();
=======
        $resource = static::$resource;
>>>>>>> 6ed19256f (.)

        $result = $resource::canRestore($record);

        return is_bool($result) ? $result : false;
    }

    /**
     * Get the form schema.
     *
     * @return array<int, Component>
     */
    protected function getFormSchema(): array
    {
        return [];
    }

    /**
     * Get the header actions.
     *
<<<<<<< HEAD
     * @return array<string, Action|ActionGroup>
=======
     * @return array<string, \Filament\Actions\Action|\Filament\Actions\ActionGroup>
>>>>>>> 6ed19256f (.)
     */
    protected function getHeaderActions(): array
    {
        return [
            'delete' => DeleteAction::make()
                ->icon('heroicon-o-trash')
                ->visible(fn (Model $record) => static::canDelete($record)),
            /*
            'forceDelete' => Actions\ForceDeleteAction::make()
                ->icon('heroicon-o-trash')
                ->visible(fn(Model $record) => static::canForceDelete($record)),
            'restore' => Actions\RestoreAction::make()
                ->icon('heroicon-o-trash')
                ->visible(fn(Model $record) => static::canRestore($record)),
            // ...
            */
        ];
    }
}
