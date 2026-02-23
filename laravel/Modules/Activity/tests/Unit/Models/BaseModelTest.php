<?php

declare(strict_types=1);

uses(\Modules\Activity\Tests\TestCase::class);

use Modules\Activity\Models\BaseModel;

test('BaseModel has correct connection', function () {
    $model = new class() extends BaseModel
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    };

    expect($model->getConnectionName())->toBe('activity');
});

test('BaseModel extends XotBaseModel', function () {
    $model = new class() extends BaseModel
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    };

    expect($model)->toBeInstanceOf(\Modules\Xot\Models\XotBaseModel::class);
});
