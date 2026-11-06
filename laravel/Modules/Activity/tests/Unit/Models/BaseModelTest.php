<?php

declare(strict_types=1);
<<<<<<< .merge_file_gPLdrP
=======

<<<<<<< HEAD
uses(\Modules\Activity\Tests\TestCase::class);

>>>>>>> .merge_file_omI5n1
use Modules\Activity\Models\BaseModel;
use Modules\Activity\Tests\TestCase;
use Modules\Xot\Models\XotBaseModel;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('BaseModel has correct connection', function () {
    $model = new class extends BaseModel
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    };
    $reflection = new ReflectionClass($model);
    $property = $reflection->getProperty('connection');
    $property->setAccessible(true);

    Assert::assertSame('activity', $property->getValue($model));
});

test('BaseModel extends XotBaseModel', function () {
<<<<<<< .merge_file_gPLdrP
    Assert::assertTrue((new ReflectionClass(BaseModel::class))->isSubclassOf(XotBaseModel::class));
=======
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
>>>>>>> .merge_file_omI5n1
});
