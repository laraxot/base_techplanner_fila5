<?php

declare(strict_types=1);

namespace Modules\Xot\Exports;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\LazyCollection;
use Iterator;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromIterator;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Modules\Lang\Actions\TransCollectionAction;

/**
 * @implements WithMapping<mixed>
 */
class LazyCollectionExport implements FromIterator, ShouldQueue, WithHeadings, WithMapping
{
    use Exportable;

    /** @var array<int, string> */
    public array $headings;

    public ?string $transKey;

    /** @var array<int, string> */
    public array $fields = [];

    /**
     * @param  LazyCollection<int, mixed>  $collection
     * @param  array<int, string>  $fields
     */
    public function __construct(
        public LazyCollection $collection,
        ?string $transKey = null,
        array $fields = [],
    ) {
        // $this->headings = count($headings) > 0 ? $headings : collect($collection->first())->keys()->toArray();

        $this->transKey = $transKey;
        $this->fields = $fields;

        // $this->headings = $headings->toArray();
    }

    /**
     * @return array<int|string, mixed>
     */
    public function map(mixed $row): array
    {
        $rowArray = $this->normalizeRow($row);

        if (empty($this->fields)) {
            return $rowArray;
        }

        return collect($this->fields)
            ->mapWithKeys(function (string $key) use ($rowArray): array {
                return [$key => $rowArray[$key] ?? null];
            })
            ->toArray();

        /*
         * return [
         * $row->,
         * ];
         */
    }

    /**
     * @return Collection<int, int|string>
     */
    public function getHead(): Collection
    {
        if (! empty($this->fields)) {
            /** @var list<int|string> $fields */
            $fields = $this->fields;

            return collect($fields);
        }

        $head = $this->collection->first();
        $headArray = $this->normalizeRow($head);

        return collect(array_keys($headArray));
    }

    /**
     * @return array<int|string, mixed>
     */
    public function headings(): array
    {
        $headings = $this->getHead();
        $transKey = $this->transKey;
        $headings = app(TransCollectionAction::class)->execute($headings, $transKey);

        return $headings->toArray();
    }

    /**
     * @return LazyCollection<int, mixed>
     */
    public function collection(): LazyCollection
    {
        return $this->collection;
    }

    /**
     * Returns an iterator for the current collection.
     *
     * @return Iterator<int, mixed>
     */
    public function iterator(): Iterator
    {
        return new \ArrayIterator(iterator_to_array($this->collection->getIterator(), false));
    }

    /**
     * @return array<int|string, mixed>
     */
    private function normalizeRow(mixed $row): array
    {
        if ($row === null) {
            return [];
        }

        if ($row instanceof Arrayable) {
            /* @var array<int|string, mixed> */
            return $row->toArray();
        }

        if (is_array($row)) {
            /* @var array<int|string, mixed> */
            return $row;
        }

        if ($row instanceof \Traversable) {
            /* @var array<int|string, mixed> */
            return iterator_to_array($row);
        }

        return (array) $row;
    }
}
