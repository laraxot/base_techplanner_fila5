<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
namespace Modules\Cms\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
>>>>>>> 6ed19256f (.)
use Modules\Cms\Models\BaseModel;
use PHPUnit\Framework\Assert;

function createCmsBaseModelTestDouble(): BaseModel
{
    return new class extends BaseModel
    {
        protected $table = 'test_cms_table';
    };
}

test('base model extends eloquent model', function (): void {
<<<<<<< .merge_file_2Qbh6d
    $baseModel = createCmsBaseModelTestDouble();

    Assert::assertFalse($baseModel->exists);
});

test('base model has correct table name', function (): void {
    $baseModel = createCmsBaseModelTestDouble();
    Assert::assertSame('test_cms_table', $baseModel->getTable());
});

test('base model can be instantiated', function (): void {
    $baseModel = createCmsBaseModelTestDouble();

    Assert::assertSame('test_cms_table', $baseModel->getTable());
});

test('base model has proper inheritance chain', function (): void {
    $baseModel = createCmsBaseModelTestDouble();

    Assert::assertTrue(is_subclass_of($baseModel, BaseModel::class));
});

test('base model has timestamps enabled', function (): void {
    $baseModel = createCmsBaseModelTestDouble();
    Assert::assertTrue($baseModel->usesTimestamps());
=======
<<<<<<< HEAD
=======
    /* @phpstan-ignore-next-line property.notFound */
    expect($this->baseModel)->toBeInstanceOf(Model::class);
});

test('base model has correct table name', function (): void {
    /* @phpstan-ignore-next-line property.notFound */
    expect($this->baseModel->getTable())->toBe('test_cms_table');
});

test('base model can be instantiated', function (): void {
    /* @phpstan-ignore-next-line property.notFound */
    expect($this->baseModel)->toBeInstanceOf(BaseModel::class);
});

test('base model has proper inheritance chain', function (): void {
    /* @phpstan-ignore-next-line property.notFound */
    expect($this->baseModel)->toBeInstanceOf(BaseModel::class);
    /* @phpstan-ignore-next-line property.notFound */
    expect($this->baseModel)->toBeInstanceOf(Model::class);
});

test('base model has timestamps enabled', function (): void {
    /* @phpstan-ignore-next-line property.notFound */
    expect($this->baseModel->usesTimestamps())->toBeTrue();
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_ZuOUt8
});
