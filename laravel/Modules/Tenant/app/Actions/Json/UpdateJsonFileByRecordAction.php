<?php

declare(strict_types=1);

namespace Modules\Tenant\Actions\Json;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Modules\Tenant\Models\Contracts\HasSushiToJson;
use Modules\Xot\Actions\Arr\EnsureKeysAction;
use Modules\Xot\Actions\Arr\SaveArrayAction;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

/**
 * Sincronizza sul file JSON la riga corrispondente al record in aggiornamento.
 *
 * Chiavizza le righe sulla colonna primaria come `DeleteJsonFileByRecordAction`,
 * cosi' la stessa coppia `($keyName, $key)` identifica la riga da sostituire
 * in scrittura e da rimuovere in cancellazione.
 */
class UpdateJsonFileByRecordAction
{
    use QueueableAction;

    public function execute(Model&HasSushiToJson $record): void
    {
        $rows = $record->getRows();

        $record->setAttribute('updated_at', now());

        $keyName = $record->getKeyName();
        $key = $record->getKey();

        // Gli id letti dai file JSON possono essere stringhe numeriche ("11"): valgono come interi.
        Assert::true(is_int($key) || (is_string($key) && ctype_digit($key)), 'Id del record JSON non numerico.');
        $key = (int) $key;

        /** @var array<int|string, array<string, mixed>> $keyed */
        $keyed = Arr::keyBy($rows, $keyName);

        $keyed[$key] = $record->toArray();

        $keyed = app(EnsureKeysAction::class)->execute(
            $keyed,
            array_keys($record->getSchema())
        );

        $keyed = array_values($keyed);
        $filename = $record->getJsonFile();

        app(SaveArrayAction::class)->execute($keyed, $filename, 'json');
    }
}
