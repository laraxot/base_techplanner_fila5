<?php

declare(strict_types=1);

namespace Modules\UI\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\UI\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\file_get_contents;

/*
 * Asset is an OPTIONAL model that is NOT part of the UI module artifact set
 * (no Models/Asset.php, no AssetFactory, no create_assets_table migration).
 * These tests skip at runtime via the class_exists() guard below. The class is
 * referenced by its FQCN string and narrowed with assertions, so PHPStan analyses
 * the body without any ignore annotation. Per docs/wiki/rules/no-phpstan-probe-models.md
 * we do NOT create a fake probe model just to satisfy the analyser. When the Asset
 * model + AssetFactory are actually added, switch these calls to the typed model
 * usage (see CategoryModelTest).
 */

const UI_ASSET_MODEL_CLASS = 'Modules\\UI\\Models\\Asset';

/**
 * @return class-string<Model>
 */
function uiAssetModelClass(): string
{
    $class = UI_ASSET_MODEL_CLASS;
    Assert::assertTrue(class_exists($class), 'Asset model class must exist.');
    Assert::assertTrue(is_subclass_of($class, Model::class), 'Asset must be an Eloquent model.');

    return $class;
}

function uiAssetModel(): Model
{
    $class = uiAssetModelClass();

    return new $class();
}

uses(TestCase::class);

beforeEach(function (): void {
    if (! class_exists(UI_ASSET_MODEL_CLASS)) {
        Assert::markTestSkipped('Asset model is not part of the UI module artifact set.');
    }
});

describe('Asset Model', function (): void {
    test('can be instantiated', function (): void {
        Assert::assertInstanceOf(uiAssetModelClass(), uiAssetModel());
    });

    test('has fillable attributes', function (): void {
        $expected = ['name', 'type', 'path', 'theme_id', 'is_minified', 'is_compressed', 'order', 'should_bundle'];

        $fillable = uiAssetModel()->getFillable();
        foreach ($expected as $field) {
            Assert::assertContains($field, $fillable);
        }
    });

    test('has casts defined', function (): void {
        $casts = uiAssetModel()->getCasts();
        Assert::assertSame('boolean', $casts['is_minified'] ?? null);
        Assert::assertSame('boolean', $casts['is_compressed'] ?? null);
        Assert::assertSame('integer', $casts['order'] ?? null);
        Assert::assertSame('boolean', $casts['should_bundle'] ?? null);
    });

    test('has theme relationship', function (): void {
        $reflection = new \ReflectionClass(uiAssetModelClass());
        Assert::assertTrue($reflection->hasMethod('theme'));
    });

    test('has correct table name', function (): void {
        Assert::assertSame('assets', uiAssetModel()->getTable());
    });

    test('has model base class', function (): void {
        Assert::assertTrue(is_a(uiAssetModelClass(), 'Modules\\UI\\Models\\BaseModel', true));
    });

    test('uses strict types', function (): void {
        $reflection = new \ReflectionClass(uiAssetModelClass());
        $fileName = $reflection->getFileName();
        Assert::assertNotFalse($fileName);
        $content = file_get_contents($fileName);
        Assert::assertStringContainsString('declare(strict_types=1);', $content);
    });

    test('has correct namespace', function (): void {
        $reflection = new \ReflectionClass(uiAssetModelClass());
        Assert::assertSame('Modules\\UI\\Models', $reflection->getNamespaceName());
    });
});
