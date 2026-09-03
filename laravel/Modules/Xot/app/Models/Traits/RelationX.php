<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;

/**
 * Trait Modules\Xot\Models\Traits\RelationX.
 */
trait RelationX
{
    /**
     * Define a many-to-many relationship.
     *
     * @template TRelatedModel of \Illuminate\Database\Eloquent\Model
     *
     * @param  class-string<TRelatedModel>  $related  Related model class
     * @param  string|null  $_table  Pivot table name
     * @param  string|null  $foreignPivotKey  Foreign pivot key
     * @param  string|null  $relatedPivotKey  Related pivot key
     * @param  string|null  $parentKey  Parent key
     * @param  string|null  $relatedKey  Related key
     * @param  string|null  $relation  Relation name
     * @phpstan-return BelongsToMany<TRelatedModel, $this, Pivot, 'pivot'>
     */
    public function belongsToManyX(
        string $related,
        ?string $_table = null,
        ?string $foreignPivotKey = null,
        ?string $relatedPivotKey = null,
        ?string $parentKey = null,
        ?string $relatedKey = null,
        ?string $relation = null,
    ): BelongsToMany {
        Assert::subclassOf($related, Model::class);
        /** @var class-string<TRelatedModel> $related */
        $related = $related;
        $related_model = app($related);
        Assert::isInstanceOf($related_model, Model::class);

        $pivot = $this->guessPivot($related);
        $table = $pivot->getTable();
        $pivotFields = $pivot->getFillable();

        $pivotDbName = $pivot->getConnection()->getDatabaseName();
        $dbName = $this->getConnection()->getDatabaseName();
        $relatedDbName = $related_model->getConnection()->getDatabaseName();
        if ($pivotDbName !== $dbName || $relatedDbName !== $dbName) {
            $pivotDriver = $pivot->getConnection()->getDriverName();
            // Only add database prefix for non-SQLite drivers
            // SQLite doesn't support database.table syntax
            if ($pivotDriver !== 'sqlite') {
                $table = $pivotDbName.'.'.$table;
            }
        }

        /** @var BelongsToMany<TRelatedModel, $this, Pivot, 'pivot'> $relationInstance */
        $relationInstance = $this->belongsToMany(
            related: $related,
            table: $table,
            foreignPivotKey: $foreignPivotKey,
            relatedPivotKey: $relatedPivotKey,
            parentKey: $parentKey,
            relatedKey: $relatedKey,
            relation: $relation
        )
            ->using($pivot::class)
            ->withPivot($pivotFields)
            ->withTimestamps();

        return $relationInstance;
    }

    /**
     * Define a polymorphic many-to-many relationship.
     *
     * @template TRelatedModel of \Illuminate\Database\Eloquent\Model
     *
     * @param  class-string<TRelatedModel>  $related
     * @param  string  $name
     * @param  string|null  $_table = null
     * @param  string|null  $foreignPivotKey = null
     * @param  string|null  $relatedPivotKey = null
     * @param  string|null  $parentKey = null
     * @param  string|null  $relatedKey = null
     * @param  string|null  $relation = null
     * @param  bool  $inverse = false
     * @phpstan-return MorphToMany<TRelatedModel, $this, MorphPivot, 'pivot'>
     */
    public function morphToManyX(
        string $related,
        string $name,
        ?string $_table = null,
        ?string $foreignPivotKey = null,
        ?string $relatedPivotKey = null,
        ?string $parentKey = null,
        ?string $relatedKey = null,
        ?string $relation = null,
        bool $inverse = false,
    ): MorphToMany {
        Assert::subclassOf($related, Model::class);
        /** @var class-string<TRelatedModel> $related */
        $related = $related;
        $related_model = app($related);
        Assert::isInstanceOf($related_model, Model::class);

        $pivot = $this->guessMorphPivot($related);
        $table = $pivot->getTable();
        $pivotFields = $pivot->getFillable();

        $pivotDbName = $pivot->getConnection()->getDatabaseName();
        $dbName = $this->getConnection()->getDatabaseName();
        $relatedDbName = $related_model->getConnection()->getDatabaseName();
        if ($pivotDbName !== $dbName || $relatedDbName !== $dbName) {
            $pivotDriver = $pivot->getConnection()->getDriverName();
            // Only add database prefix for non-SQLite drivers
            // SQLite doesn't support database.table syntax
            if ($pivotDriver !== 'sqlite') {
                $table = $pivotDbName.'.'.$table;
            }
        }

        /** @var MorphToMany<TRelatedModel, $this, MorphPivot, 'pivot'> $relationInstance */
        $relationInstance = $this->morphToMany(
            related: $related,
            name: $name,
            table: $table,
            foreignPivotKey: $foreignPivotKey,
            relatedPivotKey: $relatedPivotKey,
            parentKey: $parentKey,
            relatedKey: $relatedKey,
            relation: $relation,
            inverse: $inverse,
        )
            ->using($pivot::class)
            ->withPivot($pivotFields)
            ->withTimestamps();

        return $relationInstance;
    }

    /**
     * Define the inverse of a polymorphic many-to-many relationship.
     *
     * @template TRelatedModel of \Illuminate\Database\Eloquent\Model
     *
     * @param  class-string<TRelatedModel>  $related
     * @param  string  $name
     * @param  string|null  $_table = null
     * @param  string|null  $foreignPivotKey = null
     * @param  string|null  $relatedPivotKey = null
     * @param  string|null  $parentKey = null
     * @param  string|null  $relatedKey = null
     * @param  string|null  $relation = null
     * @phpstan-return MorphToMany<TRelatedModel, $this, MorphPivot, 'pivot'>
     */
    public function morphedByManyX(
        string $related,
        string $name,
        ?string $_table = null,
        ?string $foreignPivotKey = null,
        ?string $relatedPivotKey = null,
        ?string $parentKey = null,
        ?string $relatedKey = null,
        ?string $relation = null,
    ): MorphToMany {
        Assert::subclassOf($related, Model::class);
        /** @var class-string<TRelatedModel> $related */
        $related = $related;
        $related_model = app($related);
        Assert::isInstanceOf($related_model, Model::class);

        $pivot = $this->guessMorphPivot($related);
        $table = $pivot->getTable();
        $pivotFields = $pivot->getFillable();

        $pivotDbName = $pivot->getConnection()->getDatabaseName();
        $dbName = $this->getConnection()->getDatabaseName();
        $relatedDbName = $related_model->getConnection()->getDatabaseName();
        if ($pivotDbName !== $dbName || $relatedDbName !== $dbName) {
            $pivotDriver = $pivot->getConnection()->getDriverName();
            // Only add database prefix for non-SQLite drivers
            // SQLite doesn't support database.table syntax
            if ($pivotDriver !== 'sqlite') {
                $table = $pivotDbName.'.'.$table;
            }
        }

        /** @var MorphToMany<TRelatedModel, $this, MorphPivot, 'pivot'> $relationInstance */
        $relationInstance = $this->morphedByMany(
            related: $related,
            name: $name,
            table: $table,
            foreignPivotKey: $foreignPivotKey,
            relatedPivotKey: $relatedPivotKey,
            parentKey: $parentKey,
            relatedKey: $relatedKey,
            relation: $relation,
        )
            ->using($pivot::class)
            ->withPivot($pivotFields)
            ->withTimestamps();

        return $relationInstance;
    }

    /**
     * Guess the pivot model for a many-to-many relationship.
     *
     * @param  class-string  $related
     * @return Pivot
     * @phpstan-return Pivot
     */
    public function guessPivot(string $related, ?string $class = null): Pivot
    {
        if ($class) {
            $instance = app($class);
            Assert::isInstanceOf($instance, Pivot::class);

            return $instance;
        }

        /** @var string $thisTable */
        $thisTable = (string) $this->getTable();
        Assert::subclassOf($related, Model::class);
        /** @var class-string<Model> $related */
        $relatedModel = app($related);
        Assert::isInstanceOf($relatedModel, Model::class);
        /** @var string $relatedTable */
        $relatedTable = (string) $relatedModel->getTable();
        /** @var class-string<Pivot> $pivotClass */
        $pivotClass = Str::studly(Str::singular($thisTable).'_'.Str::singular($relatedTable));

        if (!class_exists($pivotClass)) {
            $pivotClass = Pivot::class;
        }

        $instance = app($pivotClass);
        Assert::isInstanceOf($instance, Pivot::class);

        return $instance;
    }

    /**
     * Guess the pivot model for a polymorphic many-to-many relationship.
     *
     * @param  class-string  $related
     * @return MorphPivot
     * @phpstan-return MorphPivot
     */
    public function guessMorphPivot(string $related, ?string $_class = null): MorphPivot
    {
        if ($_class !== null) {
            $instance = app($_class);
            Assert::isInstanceOf($instance, MorphPivot::class);
            return $instance;
        }

        Assert::subclassOf($related, Model::class);
        $relatedModel = app($related);
        Assert::isInstanceOf($relatedModel, Model::class);
        $thisTable = (string) $this->getTable();
        /** @var string $relatedTable */
        $relatedTable = (string) $relatedModel->getTable();
        /** @var class-string<MorphPivot> $pivotClass */
        $pivotClass = Str::studly(Str::singular($thisTable).'_'.Str::singular($relatedTable));

        if (!class_exists($pivotClass)) {
            $pivotClass = MorphPivot::class;
        }

        $instance = app($pivotClass);
        Assert::isInstanceOf($instance, MorphPivot::class);

        return $instance;
    }
}