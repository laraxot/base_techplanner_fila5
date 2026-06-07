<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(Modules\Gdpr\Tests\TestCase::class);

use Illuminate\Database\Eloquent\Model;
use Modules\Gdpr\Models\BaseModel;

beforeEach(function () {
    $this->baseModel = new class extends BaseModel {
=======
namespace Modules\Gdpr\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Gdpr\Models\BaseModel;
use Modules\Gdpr\Tests\TestCase;

uses(TestCase::class);

beforeEach(function () {
    $this->baseModel = new class extends BaseModel
    {
>>>>>>> dev
        protected $table = 'test_gdpr_table';
    };
});

test('base model extends eloquent model', function () {
    expect($this->baseModel)->toBeInstanceOf(Model::class);
});

test('base model has correct table name', function () {
    expect($this->baseModel->getTable())->toBe('test_gdpr_table');
});

test('base model can be instantiated', function () {
    expect($this->baseModel)->toBeInstanceOf(BaseModel::class);
});

test('base model has proper inheritance chain', function () {
    expect($this->baseModel)->toBeInstanceOf(BaseModel::class);
    expect($this->baseModel)->toBeInstanceOf(Model::class);
});

test('base model has timestamps enabled', function () {
<<<<<<< HEAD
    expect($this->baseModel)->usesTimestamps()->toBeTrue();
=======
    expect($this->baseModel->timestamps)->toBeTrue();
>>>>>>> dev
});
