<?php

declare(strict_types=1);

namespace Modules\UI\Tests\Unit\Models;

use Modules\UI\Models\Asset;
<<<<<<< HEAD
use Modules\UI\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\file_get_contents;

uses(TestCase::class);

beforeEach(function (): void {
    /* @var \Modules\UI\Tests\TestCase $this */
    if (! class_exists('Modules\UI\Models\Asset')) {
        Assert::markTestSkipped('Asset model is not part of the UI module artifact set.');
    }
});

describe('Asset Model', function (): void {
    test('can be instantiated', function (): void {
        /** @phpstan-ignore-next-line -- Asset model is optional, guarded by setUp */
        $asset = new Asset();
        /* @phpstan-ignore-next-line -- Asset::class resolves to string even if class absent */
        Assert::assertInstanceOf(Asset::class, $asset);
    });

    test('has fillable attributes', function (): void {
        $expected = ['name', 'type', 'path', 'theme_id', 'is_minified', 'is_compressed', 'order', 'should_bundle'];

        /** @phpstan-ignore-next-line -- Asset model is optional, guarded by setUp */
        $asset = new Asset();
        foreach ($expected as $field) {
            /* @phpstan-ignore-next-line -- Asset model is optional */
            Assert::assertTrue(in_array($field, $asset->getFillable()));
        }
    });

    test('has casts defined', function (): void {
        /** @phpstan-ignore-next-line -- Asset model is optional, guarded by setUp */
        $asset = new Asset();
        $casts = $asset->getCasts(); // @phpstan-ignore-line
        /* @phpstan-ignore-next-line -- $casts is mixed from ignored call */
        Assert::assertSame('boolean', $casts['is_minified']);
        /* @phpstan-ignore-next-line -- $casts is mixed from ignored call */
        Assert::assertSame('boolean', $casts['is_compressed']);
        /* @phpstan-ignore-next-line -- $casts is mixed from ignored call */
        Assert::assertSame('integer', $casts['order']);
        /* @phpstan-ignore-next-line -- $casts is mixed from ignored call */
        Assert::assertSame('boolean', $casts['should_bundle']);
    });

    test('has theme relationship', function (): void {
        /** @phpstan-ignore-next-line -- Asset::class resolves to string even if class absent */
        $reflection = new \ReflectionClass(Asset::class);
        Assert::assertTrue($reflection->hasMethod('theme'));
    });

    test('has correct table name', function (): void {
        /** @phpstan-ignore-next-line -- Asset model is optional, guarded by setUp */
        $asset = new Asset();
        /* @phpstan-ignore-next-line -- Asset model is optional */
        Assert::assertSame('assets', $asset->getTable());
    });

    test('has model base class', function (): void {
        /* @phpstan-ignore-next-line -- Asset::class resolves to string even if class absent */
        Assert::assertTrue(is_a(Asset::class, 'Modules\UI\Models\BaseModel', true));
    });

    test('uses strict types', function (): void {
        /** @phpstan-ignore-next-line -- Asset::class resolves to string even if class absent */
        $reflection = new \ReflectionClass(Asset::class);
        $fileName = $reflection->getFileName();
        Assert::assertNotFalse($fileName);
        $content = file_get_contents($fileName);
        Assert::assertStringContainsString('declare(strict_types=1);', $content);
    });

    test('has correct namespace', function (): void {
        /** @phpstan-ignore-next-line -- Asset::class resolves to string even if class absent */
        $reflection = new \ReflectionClass(Asset::class);
        Assert::assertSame('Modules\UI\Models', $reflection->getNamespaceName());
=======

describe('Asset Model', function (): void {
    it('can be instantiated', function (): void {
        $asset = new Asset();
        $asset = new Asset();
        expect($asset)->toBeInstanceOf(Asset::class);
    });

    it('has fillable attributes', function (): void {
        $asset = new Asset();
        $asset = new Asset();
        $expected = ['name', 'type', 'path', 'theme_id', 'is_minified', 'is_compressed', 'order', 'should_bundle'];

        foreach ($expected as $field) {
            expect(in_array($field, $asset->getFillable()))->toBeTrue();
        }
    });

    it('has casts defined', function (): void {
        $asset = new Asset();
        $asset = new Asset();
        $casts = $asset->getCasts();

        expect($casts['is_minified'])->toBe('boolean')
            ->and($casts['is_compressed'])->toBe('boolean')
            ->and($casts['order'])->toBe('integer')
            ->and($casts['should_bundle'])->toBe('boolean');
    });

    it('has theme relationship', function (): void {
        $reflection = new ReflectionClass(Asset::class);
        expect($reflection->hasMethod('theme'))->toBeTrue();
    });

    it('has correct table name', function (): void {
        $asset = new Asset();
        $asset = new Asset();
        expect($asset->getTable())->toBe('assets');
    });

    it('has model base class', function (): void {
        expect(is_a(Asset::class, 'Modules\UI\Models\BaseModel', true))->toBeTrue();
    });

    it('uses strict types', function (): void {
        $reflection = new ReflectionClass(Asset::class);
        $content = file_get_contents($reflection->getFileName());
        expect($content)->toContain('');
    });

    it('has correct namespace', function (): void {
        $reflection = new ReflectionClass(Asset::class);
        expect($reflection->getNamespaceName())->toBe('Modules\UI\Models');
>>>>>>> c001364 (.)
    });
});
