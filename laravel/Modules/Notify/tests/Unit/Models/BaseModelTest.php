<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Notify\Models\BaseModel;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_8wCQcl

uses(\Modules\Notify\Tests\TestCase::class);

test('base model extends eloquent model', function () {
        $baseModel = new class extends BaseModel
=======

uses(TestCase::class)->group('no-notify-db');

test('base model extends eloquent model', function () {
<<<<<<< .merge_file_cy6k1O
    $baseModel = new class() extends BaseModel
=======
    $baseModel = new class extends BaseModel
>>>>>>> .merge_file_ynf1sE
>>>>>>> .merge_file_SLmGMl
    {
        protected $table = 'test_notify_table';
    };

    Assert::assertInstanceOf(Model::class, $baseModel);
});

test('base model has correct table name', function () {
<<<<<<< .merge_file_cy6k1O
    $baseModel = new class() extends BaseModel
=======
<<<<<<< .merge_file_8wCQcl
        $baseModel = new class extends BaseModel
=======
    $baseModel = new class extends BaseModel
>>>>>>> .merge_file_ynf1sE
>>>>>>> .merge_file_SLmGMl
    {
        protected $table = 'test_notify_table';
    };

    Assert::assertSame('test_notify_table', $baseModel->getTable());
});

test('base model can be instantiated', function () {
<<<<<<< .merge_file_cy6k1O
    $baseModel = new class() extends BaseModel
=======
<<<<<<< .merge_file_8wCQcl
        $baseModel = new class extends BaseModel
=======
    $baseModel = new class extends BaseModel
>>>>>>> .merge_file_ynf1sE
>>>>>>> .merge_file_SLmGMl
    {
        protected $table = 'test_notify_table';
    };

    Assert::assertInstanceOf(BaseModel::class, $baseModel);
});

test('base model has proper inheritance chain', function () {
<<<<<<< .merge_file_cy6k1O
    $baseModel = new class() extends BaseModel
=======
<<<<<<< .merge_file_8wCQcl
        $baseModel = new class extends BaseModel
=======
    $baseModel = new class extends BaseModel
>>>>>>> .merge_file_ynf1sE
>>>>>>> .merge_file_SLmGMl
    {
        protected $table = 'test_notify_table';
    };

    Assert::assertInstanceOf(BaseModel::class, $baseModel);
    Assert::assertInstanceOf(Model::class, $baseModel);
});

test('base model has timestamps enabled', function () {
<<<<<<< .merge_file_cy6k1O
    $baseModel = new class() extends BaseModel
=======
<<<<<<< .merge_file_8wCQcl
        $baseModel = new class extends BaseModel
=======
    $baseModel = new class extends BaseModel
>>>>>>> .merge_file_ynf1sE
>>>>>>> .merge_file_SLmGMl
    {
        protected $table = 'test_notify_table';
    };

    Assert::assertTrue($baseModel->usesTimestamps());
});
