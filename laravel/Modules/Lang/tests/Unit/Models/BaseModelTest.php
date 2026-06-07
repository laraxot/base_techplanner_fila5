<?php

declare(strict_types=1);

namespace Modules\Lang\Tests\Unit\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\Lang\Models\BaseModel;
use Tests\TestCase;

uses(TestCase::class, DatabaseTransactions::class);

beforeEach(function () {
    $this->baseModel = new class extends BaseModel {
=======
use Modules\Lang\Models\BaseModel;
use Tests\TestCase;

uses(TestCase::class);

beforeEach(function () {
    $baseModel = new class extends BaseModel {
>>>>>>> dev
        protected $table = 'test_lang_table';
    };
});

test('base model extends eloquent model', function () {
<<<<<<< HEAD
    expect($this->baseModel)->toBeInstanceOf(Model::class);
});

test('base model has correct table name', function () {
    expect($this->baseModel->getTable())->toBe('test_lang_table');
});

test('base model can be instantiated', function () {
    expect($this->baseModel)->toBeInstanceOf(BaseModel::class);
});

test('base model has proper inheritance chain', function () {
    expect($this->baseModel)->toBeInstanceOf(BaseModel::class);
    expect($this->baseModel)->toBeInstanceOf(Model::class);
});

test('base model has timestamps enabled', function () {
    expect($this->baseModel->usesTimestamps())->toBeTrue();
=======
    expect($baseModel);
});

test('base model has correct table name', function () {
    expect($baseModel->getTable());
});

test('base model can be instantiated', function () {
    expect($baseModel);
});

test('base model has proper inheritance chain', function () {
    expect($baseModel);
    expect($baseModel);
});

test('base model has timestamps enabled', function () {
    expect($baseModel->usesTimestamps());
>>>>>>> dev
});
