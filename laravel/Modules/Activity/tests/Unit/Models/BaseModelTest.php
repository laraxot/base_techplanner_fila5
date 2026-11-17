<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(\Modules\Activity\Tests\TestCase::class);

use Modules\Activity\Models\BaseModel;

test('BaseModel has correct connection', function () {
    $model = new class extends BaseModel
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    };
    $reflection = new \ReflectionClass($model);
    $property = $reflection->getProperty('connection');
    $property->setAccessible(true);

    expect($property->getValue($model))->toBe('activity');
});

test('BaseModel extends XotBaseModel', function () {
    $model = new class extends BaseModel
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    };

    expect($model)->toBeInstanceOf(\Modules\Xot\Models\XotBaseModel::class);
=======
namespace Modules\Activity\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Models\BaseModel;
use Modules\Activity\Tests\TestCase;

uses(TestCase::class);

/**
 * Helper that returns an anonymous BaseModel configured for assertions.
 */
function makeTestActivityModel(): BaseModel
{
    return new class extends BaseModel
    {
        protected $table = 'test_activity_table';
    };
}

test('base model extends eloquent model', function (): void {
    $model = makeTestActivityModel();

    expect($model)->toBeInstanceOf(Model::class);
});

test('base model has correct table name', function (): void {
    $model = makeTestActivityModel();

    expect($model->getTable())->toBe('test_activity_table');
});

test('base model can be instantiated', function (): void {
    $model = makeTestActivityModel();

    expect($model)->toBeInstanceOf(BaseModel::class);
});

test('base model has proper inheritance chain', function (): void {
    $model = makeTestActivityModel();

    expect($model)->toBeInstanceOf(BaseModel::class);
    expect($model)->toBeInstanceOf(Model::class);
});

test('base model has timestamps enabled', function (): void {
    $model = makeTestActivityModel();

    expect($model->usesTimestamps())->toBeTrue();
>>>>>>> 6ed19256f (.)
});
