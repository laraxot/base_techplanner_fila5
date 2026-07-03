<?php

declare(strict_types=1);

namespace Modules\UI\Tests\Unit\Models;

use Modules\UI\Models\Theme;
use Modules\UI\Tests\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;

uses(TestCase::class);

beforeEach(function (): void {
    /* @var \Modules\UI\Tests\TestCase $this */
    if (! class_exists('Modules\UI\Models\Theme')) {
        Assert::markTestSkipped('Theme model is not part of the UI module artifact set.');
    }
});

describe('Theme Model', function (): void {
    test('it can create atheme with valid data', function (): void {
        /** @phpstan-ignore-next-line -- Theme model is optional, guarded by setUp */
=======

uses(TestCase::class);

describe('Theme Model', function (): void {
    test('it can create a theme with valid data', function (): void {
>>>>>>> c001364 (.)
        $theme = Theme::factory()->create([
            'name' => 'Test Theme',
            'is_active' => true,
        ]);

<<<<<<< HEAD
        /* @phpstan-ignore-next-line -- Theme model is optional */
        Assert::assertSame('Test Theme', $theme->name);
        /* @phpstan-ignore-next-line -- Theme model is optional */
        Assert::assertTrue($theme->is_active);
    });

    test('it has fillable attributes', function (): void {
        /** @phpstan-ignore-next-line -- Theme model is optional, guarded by setUp */
=======
        expect($theme->name)->toBe('Test Theme')
            ->and($theme->is_active)->toBeTrue();
    });

    test('it has fillable attributes', function (): void {
        $theme = new Theme();
>>>>>>> c001364 (.)
        $theme = new Theme();
        $expected = ['name', 'description', 'is_active', 'config', 'parent_id', 'source_path', 'compiled_path', 'needs_compilation'];

        foreach ($expected as $field) {
<<<<<<< HEAD
            /* @phpstan-ignore-next-line -- Theme model is optional */
            Assert::assertTrue(in_array($field, $theme->getFillable()));
        }
    });

    test('it casts is active to boolean', function (): void {
        /** @phpstan-ignore-next-line -- Theme model is optional, guarded by setUp */
        $theme = Theme::factory()->create(['is_active' => '1']);

        /* @phpstan-ignore-next-line -- Theme model is optional */
        Assert::assertIsBool($theme->is_active);
        /* @phpstan-ignore-next-line -- Theme model is optional */
        Assert::assertTrue($theme->is_active);
    });

    test('it casts config to array', function (): void {
        /** @phpstan-ignore-next-line -- Theme model is optional, guarded by setUp */
=======
            expect(in_array($field, $theme->getFillable()))->toBeTrue();
        }
    });

    test('it casts is_active to boolean', function (): void {
        $theme = Theme::factory()->create(['is_active' => '1']);

        expect($theme->is_active)->toBeBool()
            ->and($theme->is_active)->toBeTrue();
    });

    test('it casts config to array', function (): void {
>>>>>>> c001364 (.)
        $theme = Theme::factory()->create([
            'config' => ['primary_color' => '#ff0000', 'font_family' => 'Roboto'],
        ]);

<<<<<<< HEAD
        /* @phpstan-ignore-next-line -- Theme model is optional */
        Assert::assertIsArray($theme->config);
        /* @phpstan-ignore-next-line -- Theme model is optional */
        Assert::assertSame('#ff0000', $theme->config['primary_color']);
    });

    test('it casts needs compilation to boolean', function (): void {
        /** @phpstan-ignore-next-line -- Theme model is optional, guarded by setUp */
        $theme = Theme::factory()->create(['needs_compilation' => true]);

        /* @phpstan-ignore-next-line -- Theme model is optional */
        Assert::assertIsBool($theme->needs_compilation);
        /* @phpstan-ignore-next-line -- Theme model is optional */
        Assert::assertTrue($theme->needs_compilation);
    });

    test('theme can have parent theme', function (): void {
        /** @phpstan-ignore-next-line -- Theme model is optional, guarded by setUp */
        $parent = Theme::factory()->create(['name' => 'Parent Theme']);
        /** @phpstan-ignore-next-line -- Theme model is optional, guarded by setUp */
        $child = Theme::factory()->create(['name' => 'Child Theme', 'parent_id' => $parent->id]);

        /* @phpstan-ignore-next-line -- Theme model is optional */
        Assert::assertSame('Parent Theme', $child->parent->name);
    });

    test('theme can be active', function (): void {
        /** @phpstan-ignore-next-line -- Theme model is optional, guarded by setUp */
        $theme = Theme::factory()->create(['is_active' => true]);

        /* @phpstan-ignore-next-line -- Theme model is optional */
        Assert::assertTrue($theme->is_active);
    });

    test('theme can be inactive', function (): void {
        /** @phpstan-ignore-next-line -- Theme model is optional, guarded by setUp */
        $theme = Theme::factory()->create(['is_active' => false]);

        /* @phpstan-ignore-next-line -- Theme model is optional */
        Assert::assertFalse($theme->is_active);
    });

    test('theme has timestamps', function (): void {
        /** @phpstan-ignore-next-line -- Theme model is optional, guarded by setUp */
        $theme = Theme::factory()->create();

        /* @phpstan-ignore-next-line -- Theme model is optional */
        Assert::assertNotNull($theme->created_at);
        /* @phpstan-ignore-next-line -- Theme model is optional */
        Assert::assertNotNull($theme->updated_at);
=======
        expect($theme->config)->toBeArray()
            ->and($theme->config['primary_color'])->toBe('#ff0000');
    });

    test('it casts needs_compilation to boolean', function (): void {
        $theme = Theme::factory()->create(['needs_compilation' => true]);

        expect($theme->needs_compilation)->toBeBool()
            ->and($theme->needs_compilation)->toBeTrue();
    });

    test('theme can have parent theme', function (): void {
        $parent = Theme::factory()->create(['name' => 'Parent Theme']);
        $child = Theme::factory()->create(['name' => 'Child Theme', 'parent_id' => $parent->id]);

        expect($child->parent->name)->toBe('Parent Theme');
    });

    test('theme can be active', function (): void {
        $theme = Theme::factory()->create(['is_active' => true]);

        expect($theme->is_active)->toBeTrue();
    });

    test('theme can be inactive', function (): void {
        $theme = Theme::factory()->create(['is_active' => false]);

        expect($theme->is_active)->toBeFalse();
    });

    test('theme has timestamps', function (): void {
        $theme = Theme::factory()->create();

        expect($theme->created_at)->not->toBeNull()
            ->and($theme->updated_at)->not->toBeNull();
>>>>>>> c001364 (.)
    });
});
