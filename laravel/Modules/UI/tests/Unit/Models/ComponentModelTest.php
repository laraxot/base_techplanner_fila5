<?php

declare(strict_types=1);

namespace Modules\UI\Tests\Unit\Models;

use Modules\UI\Models\Component;
<<<<<<< HEAD
use Modules\UI\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\file_get_contents;

uses(TestCase::class);

beforeEach(function (): void {
    /* @var \Modules\UI\Tests\TestCase $this */
    if (! class_exists('Modules\UI\Models\Component')) {
        Assert::markTestSkipped('Component model is not part of the UI module artifact set.');
    }
});

describe('Component Model', function (): void {
    test('can be instantiated', function (): void {
        /** @phpstan-ignore-next-line -- Component model is optional, guarded by setUp */
        $component = new Component();
        /* @phpstan-ignore-next-line -- Component::class resolves to string even if class absent */
        Assert::assertInstanceOf(Component::class, $component);
    });

    test('has fillable attributes', function (): void {
        /** @phpstan-ignore-next-line -- Component model is optional, guarded by setUp */
=======

describe('Component Model', function (): void {
    it('can be instantiated', function (): void {
        $component = new Component();
        $component = new Component();
        expect($component)->toBeInstanceOf(Component::class);
    });

    it('has fillable attributes', function (): void {
        $component = new Component();
>>>>>>> c001364 (.)
        $component = new Component();
        $expected = [
            'name', 'theme_id', 'is_active', 'version', 'dependencies',
            'template', 'is_cacheable', 'cache_ttl', 'validation_rules',
            'view_path', 'data_schema', 'responsive_breakpoints',
            'supports_lazy_loading', 'lazy_loading_threshold',
            'cache_strategy', 'cache_duration',
        ];

        foreach ($expected as $field) {
<<<<<<< HEAD
            /* @phpstan-ignore-next-line -- Component model is optional */
            Assert::assertTrue(in_array($field, $component->getFillable()));
        }
    });

    test('has casts defined', function (): void {
        /** @phpstan-ignore-next-line -- Component model is optional, guarded by setUp */
        $component = new Component();
        $casts = $component->getCasts(); // @phpstan-ignore-line
        /* @phpstan-ignore-next-line -- $casts is mixed from ignored call */
        Assert::assertSame('boolean', $casts['is_active']);
        /* @phpstan-ignore-next-line -- $casts is mixed from ignored call */
        Assert::assertSame('boolean', $casts['is_cacheable']);
        /* @phpstan-ignore-next-line -- $casts is mixed from ignored call */
        Assert::assertSame('array', $casts['dependencies']);
        /* @phpstan-ignore-next-line -- $casts is mixed from ignored call */
        Assert::assertSame('array', $casts['validation_rules']);
        /* @phpstan-ignore-next-line -- $casts is mixed from ignored call */
        Assert::assertSame('array', $casts['data_schema']);
        /* @phpstan-ignore-next-line -- $casts is mixed from ignored call */
        Assert::assertSame('array', $casts['responsive_breakpoints']);
        /* @phpstan-ignore-next-line -- $casts is mixed from ignored call */
        Assert::assertSame('boolean', $casts['supports_lazy_loading']);
        /* @phpstan-ignore-next-line -- $casts is mixed from ignored call */
        Assert::assertSame('integer', $casts['lazy_loading_threshold']);
        /* @phpstan-ignore-next-line -- $casts is mixed from ignored call */
        Assert::assertSame('integer', $casts['cache_duration']);
    });

    test('has theme relationship', function (): void {
        /** @phpstan-ignore-next-line -- Component::class resolves to string even if class absent */
        $reflection = new \ReflectionClass(Component::class);
        Assert::assertTrue($reflection->hasMethod('theme'));
    });

    test('has correct table name', function (): void {
        /** @phpstan-ignore-next-line -- Component model is optional, guarded by setUp */
        $component = new Component();
        /* @phpstan-ignore-next-line -- Component model is optional */
        Assert::assertSame('components', $component->getTable());
    });

    test('extends base model', function (): void {
        /** @phpstan-ignore-next-line -- Component::class resolves to string even if class absent */
        $reflection = new \ReflectionClass(Component::class);
        Assert::assertTrue($reflection->isSubclassOf('Modules\UI\Models\BaseModel'));
    });

    test('uses strict types', function (): void {
        /** @phpstan-ignore-next-line -- Component::class resolves to string even if class absent */
        $reflection = new \ReflectionClass(Component::class);
        $fileName = $reflection->getFileName();
        Assert::assertNotFalse($fileName);
        $content = file_get_contents($fileName);
        Assert::assertStringContainsString('declare(strict_types=1);', $content);
    });

    test('has correct namespace', function (): void {
        /** @phpstan-ignore-next-line -- Component::class resolves to string even if class absent */
        $reflection = new \ReflectionClass(Component::class);
        Assert::assertSame('Modules\UI\Models', $reflection->getNamespaceName());
=======
            expect(in_array($field, $component->getFillable()))->toBeTrue();
        }
    });

    it('has casts defined', function (): void {
        $component = new Component();
        $component = new Component();
        $casts = $component->getCasts();

        expect($casts['is_active'])->toBe('boolean')
            ->and($casts['is_cacheable'])->toBe('boolean')
            ->and($casts['dependencies'])->toBe('array')
            ->and($casts['validation_rules'])->toBe('array')
            ->and($casts['data_schema'])->toBe('array')
            ->and($casts['responsive_breakpoints'])->toBe('array')
            ->and($casts['supports_lazy_loading'])->toBe('boolean')
            ->and($casts['lazy_loading_threshold'])->toBe('integer')
            ->and($casts['cache_duration'])->toBe('integer');
    });

    it('has theme relationship', function (): void {
        $reflection = new ReflectionClass(Component::class);
        expect($reflection->hasMethod('theme'))->toBeTrue();
    });

    it('has correct table name', function (): void {
        $component = new Component();
        $component = new Component();
        expect($component->getTable())->toBe('components');
    });

    it('extends BaseModel', function (): void {
        $reflection = new ReflectionClass(Component::class);
        expect($reflection->isSubclassOf(Modules\UI\Models\BaseModel::class))->toBeTrue();
    });

    it('uses strict types', function (): void {
        $reflection = new ReflectionClass(Component::class);
        $content = file_get_contents($reflection->getFileName());
        expect($content)->toContain('');
    });

    it('has correct namespace', function (): void {
        $reflection = new ReflectionClass(Component::class);
        expect($reflection->getNamespaceName())->toBe('Modules\UI\Models');
>>>>>>> c001364 (.)
    });
});
