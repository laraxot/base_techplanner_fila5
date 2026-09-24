<?php

declare(strict_types=1);

namespace Modules\UI\Tests\Unit\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
=======
use Modules\UI\Models\Asset;
>>>>>>> laraxot/dev
use Modules\UI\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\file_get_contents;

/*
 * Asset is an OPTIONAL model that is NOT part of the UI module artifact set
 * (no Models/Asset.php, no AssetFactory, no create_assets_table migration).
<<<<<<< HEAD
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
=======
 * These tests skip at runtime via the class_exists() guard below. The inline
 * phpstan-ignore annotations are required because PHPStan analyses the body
 * statically regardless of the runtime skip. Per docs/wiki/rules/no-phpstan-probe-models.md
 * we do NOT create a fake probe model just to satisfy the analyser: we annotate
 * the real (skipped) test with a justification instead. When the Asset model +
 * AssetFactory are actually added, switch these calls to the typed model usage
 * (see CategoryModelTest) and drop the ignores.
 */

uses(TestCase::class);

beforeEach(function (): void {
    /* @var \Modules\UI\Tests\TestCase $this */
    if (! class_exists('Modules\UI\Models\Asset')) {
>>>>>>> laraxot/dev
        Assert::markTestSkipped('Asset model is not part of the UI module artifact set.');
    }
});

describe('Asset Model', function (): void {
    test('can be instantiated', function (): void {
<<<<<<< HEAD
        Assert::assertInstanceOf(uiAssetModelClass(), uiAssetModel());
=======
        /** @phpstan-ignore-next-line class.notFound (Asset model absent from artifact set) */
        $asset = new Asset;
        /* @phpstan-ignore-next-line class.notFound (Asset model absent from artifact set) */
        Assert::assertInstanceOf(Asset::class, $asset);
>>>>>>> laraxot/dev
    });

    test('has fillable attributes', function (): void {
        $expected = ['name', 'type', 'path', 'theme_id', 'is_minified', 'is_compressed', 'order', 'should_bundle'];

<<<<<<< HEAD
        $fillable = uiAssetModel()->getFillable();
        foreach ($expected as $field) {
            Assert::assertContains($field, $fillable);
=======
        /** @phpstan-ignore-next-line class.notFound (Asset model absent from artifact set) */
        $asset = new Asset;
        foreach ($expected as $field) {
            /* @phpstan-ignore-next-line class.notFound, argument.type (Asset model absent from artifact set) */
            Assert::assertTrue(in_array($field, $asset->getFillable()));
>>>>>>> laraxot/dev
        }
    });

    test('has casts defined', function (): void {
<<<<<<< HEAD
        $casts = uiAssetModel()->getCasts();
        Assert::assertSame('boolean', $casts['is_minified'] ?? null);
        Assert::assertSame('boolean', $casts['is_compressed'] ?? null);
        Assert::assertSame('integer', $casts['order'] ?? null);
        Assert::assertSame('boolean', $casts['should_bundle'] ?? null);
    });

    test('has theme relationship', function (): void {
        $reflection = new \ReflectionClass(uiAssetModelClass());
=======
        /** @phpstan-ignore-next-line class.notFound (Asset model absent from artifact set) */
        $asset = new Asset;
        /**
         * @var array<string, string> $casts
         *
         * @phpstan-ignore-next-line class.notFound (Asset model absent from artifact set)
         */
        $casts = $asset->getCasts();
        Assert::assertSame('boolean', $casts['is_minified']);
        Assert::assertSame('boolean', $casts['is_compressed']);
        Assert::assertSame('integer', $casts['order']);
        Assert::assertSame('boolean', $casts['should_bundle']);
    });

    test('has theme relationship', function (): void {
        /** @phpstan-ignore-next-line class.notFound (Asset model absent from artifact set) */
        $reflection = new \ReflectionClass(Asset::class);
>>>>>>> laraxot/dev
        Assert::assertTrue($reflection->hasMethod('theme'));
    });

    test('has correct table name', function (): void {
<<<<<<< HEAD
        Assert::assertSame('assets', uiAssetModel()->getTable());
    });

    test('has model base class', function (): void {
        Assert::assertTrue(is_a(uiAssetModelClass(), 'Modules\\UI\\Models\\BaseModel', true));
    });

    test('uses strict types', function (): void {
        $reflection = new \ReflectionClass(uiAssetModelClass());
=======
        /** @phpstan-ignore-next-line class.notFound (Asset model absent from artifact set) */
        $asset = new Asset;
        /* @phpstan-ignore-next-line class.notFound (Asset model absent from artifact set) */
        Assert::assertSame('assets', $asset->getTable());
    });

    test('has model base class', function (): void {
        /* @phpstan-ignore-next-line class.notFound (Asset model absent from artifact set) */
        Assert::assertTrue(is_a(Asset::class, 'Modules\UI\Models\BaseModel', true));
    });

    test('uses strict types', function (): void {
        /** @phpstan-ignore-next-line class.notFound (Asset model absent from artifact set) */
        $reflection = new \ReflectionClass(Asset::class);
>>>>>>> laraxot/dev
        $fileName = $reflection->getFileName();
        Assert::assertNotFalse($fileName);
        $content = file_get_contents($fileName);
        Assert::assertStringContainsString('declare(strict_types=1);', $content);
    });

    test('has correct namespace', function (): void {
<<<<<<< HEAD
        $reflection = new \ReflectionClass(uiAssetModelClass());
        Assert::assertSame('Modules\\UI\\Models', $reflection->getNamespaceName());
=======
        /** @phpstan-ignore-next-line class.notFound (Asset model absent from artifact set) */
        $reflection = new \ReflectionClass(Asset::class);
        Assert::assertSame('Modules\UI\Models', $reflection->getNamespaceName());
>>>>>>> laraxot/dev
    });
});
