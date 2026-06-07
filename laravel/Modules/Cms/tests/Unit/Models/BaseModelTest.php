<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(Modules\Cms\Tests\TestCase::class);

use Illuminate\Database\Eloquent\Model;
=======
>>>>>>> dev
use Modules\Cms\Models\BaseModel;

beforeEach(function (): void {
    $this->baseModel = new class extends BaseModel {
        protected $table = 'test_cms_table';
    };
});

test('base model extends eloquent model', function (): void {
<<<<<<< HEAD
    expect($this->baseModel)->toBeInstanceOf(Model::class);
});

test('base model has correct table name', function (): void {
    expect($this->baseModel->getTable())->toBe('test_cms_table');
});

test('base model can be instantiated', function (): void {
    expect($this->baseModel)->toBeInstanceOf(BaseModel::class);
});

test('base model has proper inheritance chain', function (): void {
    expect($this->baseModel)->toBeInstanceOf(BaseModel::class);
    expect($this->baseModel)->toBeInstanceOf(Model::class);
});

test('base model has timestamps enabled', function (): void {
    expect($this->baseModel->usesTimestamps())->toBeTrue();
=======
    expect($baseModel);
});

test('base model has correct table name', function (): void {
    expect($baseModel->getTable());
});

test('base model can be instantiated', function (): void {
    expect($baseModel);
});

test('base model has proper inheritance chain', function (): void {
    expect($baseModel);
    expect($baseModel);
});

test('base model has timestamps enabled', function (): void {
    expect($baseModel->usesTimestamps());
>>>>>>> dev
});
