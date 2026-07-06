<?php

declare(strict_types=1);

namespace Modules\Comment\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Comment\Support\CommentConfig;
use Spatie\QueueableAction\QueueableAction;

class ResolveMentionsAutocompleteAction
{
    use QueueableAction;

    /**
     * @return Collection<int, Model>
     */
    public function execute(string $query): Collection
    {
        return $this->handle($query);
    }

    /**
     * @return Collection<int, Model>
     */
    public function handle(string $query): Collection
    {
        $modelClass = CommentConfig::commentatorModelClass();

        if ($modelClass === null || ! class_exists($modelClass)) {
            return new Collection;
        }

        $nameField = CommentConfig::commentatorModelNameField();

        $instance = new $modelClass;

        if (! $instance instanceof Model) {
            return new Collection;
        }

        /** @var Collection<int, Model> $results */
        $results = $instance->newQuery()
            ->where($nameField, 'like', '%'.$query.'%')
            ->limit(10)
            ->get();

        return $results;
    }
}