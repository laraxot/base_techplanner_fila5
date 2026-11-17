<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Tree;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\Xot\Contracts\HasRecursiveRelationshipsContract;
use Spatie\QueueableAction\QueueableAction;
<<<<<<< HEAD
use Staudenmeir\LaravelAdjacencyList\Eloquent\Collection as TreeCollection;
=======
use Staudenmeir\LaravelAdjacencyList\Eloquent\Collection;
>>>>>>> 6ed19256f (.)

class GetTreeOptionsByModelClassAction
{
    use QueueableAction;

    /** @var array<int|string, string> */
    public array $options = [];

    /**
<<<<<<< HEAD
     * @param class-string<HasRecursiveRelationshipsContract> $class
=======
     * @param  class-string<HasRecursiveRelationshipsContract>  $class
>>>>>>> 6ed19256f (.)
     *
     * @return array<int|string, string>
     */
    public function execute(string $class, Model|callable|null $_where = null): array
    {
        /** @var HasRecursiveRelationshipsContract $model */
        $model = new $class();

<<<<<<< HEAD
        /** @var TreeCollection<int, Model&HasRecursiveRelationshipsContract> $collection */
=======
        /** @var Collection<int, HasRecursiveRelationshipsContract> $collection */
        // @phpstan-ignore generics.notSubtype
>>>>>>> 6ed19256f (.)
        $collection = $model->newQuery()->get();
        $rows = $collection->toTree();

        foreach ($rows as $row) {
<<<<<<< HEAD
            if (! $row instanceof HasRecursiveRelationshipsContract) {
                continue;
            }
            $key = $row->getKey();
            $this->options[(string) $key] = $row->getLabel();
=======
            /** @var HasRecursiveRelationshipsContract $row */
            $key = $row->getKey();
            $this->options[is_string($key) ? $key : ((string) $key)] = is_string($row)
                ? $row
                : (string) $row->getLabel();
>>>>>>> 6ed19256f (.)
            $this->parse($row);
        }

        return $this->options;
    }

    public function parse(HasRecursiveRelationshipsContract $model): void
    {
        foreach ($model->children as $child) {
            /** @var HasRecursiveRelationshipsContract $child */
            $key = $child->getKey();
<<<<<<< HEAD
            $this->options[(string) $key] =
=======
            $this->options[is_string($key) ? $key : ((string) $key)] =
>>>>>>> 6ed19256f (.)
                Str::repeat('---', $child->depth).'   '.$child->getLabel();
        }
    }
}
