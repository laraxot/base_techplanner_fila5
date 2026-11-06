<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Tables\Actions;

<<<<<<< HEAD
=======
use Closure;
>>>>>>> 6ed19256f (.)
use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Model;

/**
 * @property ?Model $record
 *
 * @method ?Model getRecord()
 */
abstract class XotBaseTableAction extends Action
{
    public function getRecord(bool $withDefault = true): ?Model
    {
<<<<<<< HEAD
        if ($this->record instanceof \Closure) {
=======
        if ($this->record instanceof Closure) {
>>>>>>> 6ed19256f (.)
            return null;
        }

        return $this->record;
    }
}
