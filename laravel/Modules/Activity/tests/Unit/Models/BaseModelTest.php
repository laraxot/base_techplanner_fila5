<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(\Modules\Activity\Tests\TestCase::class);

use Modules\Activity\Models\BaseModel;

<<<<<<< HEAD
=======
namespace Modules\Activity\Tests\Unit\Models;

uses(TestCase::class);

use Modules\Activity\Models\BaseModel;
use Modules\Activity\Tests\TestCase;
use Modules\Xot\Models\XotBaseModel;

>>>>>>> dev
test('BaseModel has correct connection', function () {
    $model = new class extends BaseModel
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    };
<<<<<<< HEAD
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
=======
>>>>>>> dev
    $reflection = new \ReflectionClass($model);
    $property = $reflection->getProperty('connection');
    $property->setAccessible(true);

    expect($property->getValue($model))->toBe('activity');
});

test('BaseModel extends XotBaseModel', function () {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
    $model = new class extends BaseModel
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    };
<<<<<<< HEAD
=======
    $model = new TestBaseModel;
>>>>>>> 4b6b99016 (first commit)

    expect($model)->toBeInstanceOf(\Modules\Xot\Models\XotBaseModel::class);
=======

    expect($model)->toBeInstanceOf(XotBaseModel::class);
>>>>>>> dev
});
