<?php

declare(strict_types=1);

namespace Modules\Tenant\Actions\Json;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Modules\Tenant\Models\Contracts\HasSushiToJson;
use Modules\Xot\Actions\Arr\EnsureKeysAction;
use Modules\Xot\Actions\Arr\SaveArrayAction;
use Spatie\QueueableAction\QueueableAction;

/**
 * Aggiunge al file JSON del tenant la riga corrispondente al record in creazione.
 *
 * L'id non viene assegnato dal database (Sushi usa SQLite in memoria): il
 * record riceve `max(id esistenti) + 1`. Il fallback `?: [0]` copre il file
 * vuoto, dove `max()` su array senza elementi leverebbe una ValueError.
 */
class CreateJsonFileByRecordAction
{
    use QueueableAction;

    public function execute(Model&HasSushiToJson $record): void
    {
        $rows = $record->getRows();

        $record->setAttribute('created_at', now());
        $record->setAttribute('updated_at', now());

        $keyName = $record->getKeyName();

        // Nei file JSON gli id possono essere stringhe ("4"): prima Assert::integer('4') faceva fallire
        // ogni creazione (es. il conteggio nel menu mostrava «--»). Gli id non numerici valgono 0.
        $ids = array_map(
            static fn (mixed $id): int => is_numeric($id) ? (int) $id : 0,
            Arr::pluck($rows, $keyName),
        );
        $max = $ids === [] ? 0 : max($ids);

        $newId = $max + 1;

        $record->setAttribute($keyName, $newId);

        $rows[$newId] = $record->toArray();
        $rows = app(EnsureKeysAction::class)->execute($rows, array_keys($record->getSchema()));

        $rows = array_values($rows);
        $filename = $record->getJsonFile();
        app(SaveArrayAction::class)->execute($rows, $filename, 'json');
    }
}
