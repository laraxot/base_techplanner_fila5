<?php

declare(strict_types=1);

namespace Modules\UI\Tests\Unit\Models;

use Modules\UI\Models\Category;
use Modules\UI\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('Category Model', function (): void {
    test('it can hydrate a category with valid data in memory', function (): void {
<<<<<<< HEAD
        $category = new Category();
=======
        $category = new Category;
>>>>>>> laraxot/dev
        $category->forceFill([
            'title' => 'Test Category',
            'slug' => 'test-category',
            'is_active' => 1,
            'sort_order' => 0,
        ]);

        Assert::assertSame('Test Category', $category->title);
        Assert::assertSame('test-category', $category->slug);
        Assert::assertSame(1, (int) $category->is_active);
    });

    test('it has fillable attributes', function (): void {
<<<<<<< HEAD
        $category = new Category();
=======
        $category = new Category;
>>>>>>> laraxot/dev
        $expected = ['name', 'description', 'icon', 'parent_id', 'is_active', 'sort_order'];

        foreach ($expected as $field) {
            Assert::assertTrue(in_array($field, $category->getFillable(), true));
        }
    });

    test('category has timestamps enabled', function (): void {
<<<<<<< HEAD
        $category = new Category();
=======
        $category = new Category;
>>>>>>> laraxot/dev

        Assert::assertTrue($category->timestamps);
    });
});
