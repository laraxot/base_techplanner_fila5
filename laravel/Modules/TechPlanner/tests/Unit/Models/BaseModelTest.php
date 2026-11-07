<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\TechPlanner\Models\BaseModel;

use function Safe\class_parents;

beforeEach(function () {
    $this->baseModel = new class() extends BaseModel
    {
        protected $table = 'test_techplanner_table';
    };
});

test('base model has correct table name', function () {
    expect($this->baseModel->getTable())->toBe('test_techplanner_table');
});

test('base model has proper inheritance chain', function () {
    $parents = class_parents($this->baseModel);

    expect($parents)->toContain(BaseModel::class);
    expect($parents)->toContain(Model::class);
});

test('base model has timestamps enabled', function () {
    expect($this->baseModel->usesTimestamps())->toBeTrue();
});
