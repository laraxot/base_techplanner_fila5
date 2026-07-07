<?php

/**
 * @see https://stackoverflow.com/questions/39213022/custom-laravel-relations
 * @see https://github.com/johnnyfreeman/laravel-custom-relation
 */

declare(strict_types=1);

namespace Modules\Xot\Traits;

<<<<<<< HEAD
=======
use Closure;
>>>>>>> 6ed19256f (.)
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Relations\CustomRelation;
use Webmozart\Assert\Assert;

// use Illuminate\Database\Eloquent\Builder;

/**
 * Trait HasCustomRelations.
 */
trait HasCustomRelations
{
    public function customRelation(
        string $related,
<<<<<<< HEAD
        \Closure $baseConstraints,
        ?\Closure $eagerConstraints = null,
        ?\Closure $eagerMatcher = null,
=======
        Closure $baseConstraints,
        ?Closure $eagerConstraints = null,
        ?Closure $eagerMatcher = null,
>>>>>>> 6ed19256f (.)
    ): CustomRelation {
        $instance = new $related();
        // Call to an undefined method object::newQuery()
        Assert::isInstanceOf($instance, Model::class, '['.__LINE__.']['.class_basename($this).']');
        $query = $instance->newQuery();

        return new CustomRelation($query, $this, $baseConstraints, $eagerConstraints, $eagerMatcher);
    }
}
