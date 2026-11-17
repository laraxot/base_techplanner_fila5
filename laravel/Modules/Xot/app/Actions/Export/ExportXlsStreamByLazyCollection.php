<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use Illuminate\Support\Str;
<<<<<<< HEAD

use function Safe\fclose;
use function Safe\fopen;
use function Safe\fputcsv;

=======
use function Safe\fclose;
use function Safe\fopen;
use function Safe\fputcsv;
>>>>>>> 6ed19256f (.)
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Webmozart\Assert\Assert;

class ExportXlsStreamByLazyCollection
{
    use QueueableAction;

    /**
     * Esporta una LazyCollection in un file CSV streamed.
     *
<<<<<<< HEAD
     * @param LazyCollection     $data     I dati da esportare
     * @param string             $filename Nome del file CSV
     * @param string|null        $transKey Chiave di traduzione per le intestazioni
     * @param array<string>|null $_fields  Campi da includere nell'export (attualmente non utilizzato)
=======
     * @param  LazyCollection  $data  I dati da esportare
     * @param  string  $filename  Nome del file CSV
     * @param  string|null  $transKey  Chiave di traduzione per le intestazioni
     * @param  array<string>|null  $_fields  Campi da includere nell'export (attualmente non utilizzato)
>>>>>>> 6ed19256f (.)
     */
    public function execute(
        LazyCollection $data,
        string $filename = 'test.csv',
        ?string $transKey = null,
        ?array $_fields = null,
    ): StreamedResponse {
        $headers = [
            'Content-Disposition' => 'attachment; filename='.$filename,
        ];
        $head = $this->headings($data, $transKey);

        return response()->stream(
            static function () use ($data, $head): void {
                $file = fopen('php://output', 'w+');

                // Assicuriamo che le intestazioni siano stringhe
                $headStrings = array_map(strval(...), $head);

                fputcsv($file, $headStrings);

                foreach ($data as $key => $value) {
                    // Gestiamo sia oggetti che possono essere convertiti ad array che array diretti
                    if (is_object($value) && method_exists($value, 'toArray')) {
                        /** @var array<string|int|float|bool|null> $rowData */
                        $rowData = $value->toArray();
                    } elseif (is_array($value)) {
                        /** @var array<string|int|float|bool|null> $rowData */
                        $rowData = $value;
                    } else {
                        // Se non è né un oggetto con toArray né un array, saltiamo
                        continue;
                    }
                    // Convertiamo tutti i valori in stringhe o null
                    $safeRowData = array_map(function ($item) {
<<<<<<< HEAD
                        if (null === $item) {
=======
                        if ($item === null) {
>>>>>>> 6ed19256f (.)
                            return '';
                        }

                        return is_string($item) ? $item : ((string) $item);
                    }, $rowData);

                    fputcsv($file, $safeRowData);
                }

                // Aggiungiamo righe vuote alla fine
                $blanks = ["\t", "\t", "\t", "\t"];
                fputcsv($file, $blanks);
                fputcsv($file, $blanks);
                fputcsv($file, $blanks);

                fclose($file);
            },
            200,
            $headers,
        );
    }

    /**
     * Ottiene le intestazioni per l'export.
     *
<<<<<<< HEAD
     * @param LazyCollection $data     I dati da cui estrarre le intestazioni
     * @param string|null    $transKey Chiave di traduzione per le intestazioni
=======
     * @param  LazyCollection  $data  I dati da cui estrarre le intestazioni
     * @param  string|null  $transKey  Chiave di traduzione per le intestazioni
>>>>>>> 6ed19256f (.)
     *
     * @return array<string>
     */
    public function headings(LazyCollection $data, ?string $transKey = null): array
    {
        $first = $data->first();
        if (! is_array($first) && (! is_object($first) || ! method_exists($first, 'toArray'))) {
            return []; // Ritorna intestazioni vuote se non c'è un primo elemento valido
        }

        $headArray = is_array($first) ? $first : $first->toArray();

        /**
<<<<<<< HEAD
         * @var array<string, mixed>    $headArray
=======
         * @var array<string, mixed> $headArray
>>>>>>> 6ed19256f (.)
         * @var Collection<int, string> $headings
         */
        $headings = collect($headArray)->keys();

<<<<<<< HEAD
        if (null !== $transKey) {
=======
        if ($transKey !== null) {
>>>>>>> 6ed19256f (.)
            $headings = $headings->map(static function (string $item) use ($transKey) {
                $key = $transKey.'.fields.'.$item;
                $trans = trans($key);
                if ($trans !== $key) {
                    return is_string($trans) ? $trans : $item;
                }

                Assert::string($item1 = Str::replace('.', '_', $item), '['.__LINE__.']['.self::class.']');
                $key = $transKey.'.fields.'.$item1;
                $trans = trans($key);
                if ($trans !== $key) {
                    return is_string($trans) ? $trans : $item;
                }

                return $item;
            });
        }

<<<<<<< HEAD
        /** @var array<string> $headers */
        $headers = array_values($headings->map(strval(...))->toArray());

        return $headers;
=======
        /** @var array<string> */
        return $headings->map(strval(...))->toArray();
>>>>>>> 6ed19256f (.)
    }
}
