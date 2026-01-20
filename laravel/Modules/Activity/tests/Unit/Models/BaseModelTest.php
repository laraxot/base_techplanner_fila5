<?php

declare(strict_types=1);

uses(\Modules\Activity\Tests\TestCase::class);

use Modules\Activity\Models\BaseModel;

<<<<<<< HEAD
test('BaseModel has correct connection', function () {
    $model = new class extends BaseModel
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    };
=======
// Test per BaseModel - usiamo una classe concreta solo per test
class TestBaseModel extends BaseModel
{
    protected $table = 'test_models';

    protected $fillable = ['name'];
}

test('BaseModel has correct connection', function () {
    $model = new TestBaseModel;
>>>>>>> 4b6b99016 (first commit)
    $reflection = new \ReflectionClass($model);
    $property = $reflection->getProperty('connection');
    $property->setAccessible(true);

    expect($property->getValue($model))->toBe('activity');
});

test('BaseModel extends XotBaseModel', function () {
<<<<<<< HEAD
    $model = new class extends BaseModel
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    };
=======
    $model = new TestBaseModel;
>>>>>>> 4b6b99016 (first commit)

    expect($model)->toBeInstanceOf(\Modules\Xot\Models\XotBaseModel::class);
});
