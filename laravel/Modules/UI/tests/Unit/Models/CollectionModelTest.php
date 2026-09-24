<?php

declare(strict_types=1);

namespace Modules\UI\Tests\Unit\Models;

<<<<<<< HEAD
use Modules\UI\Database\Factories\CollectionFactory;
=======
>>>>>>> laraxot/dev
use Modules\UI\Models\Collection;
use Modules\UI\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('Collection Model', function (): void {
<<<<<<< HEAD
    test('it can create a collection with valid data', function (): void {
        $collection = CollectionFactory::new()->createOne([
=======
    test('it can hydrate a collection with valid data in memory', function (): void {
        $collection = new Collection([
>>>>>>> laraxot/dev
            'name' => 'Hero Components',
            'type' => 'block',
            'theme_id' => 1,
        ]);

        Assert::assertSame('block', $collection->type);
        Assert::assertSame('Hero Components', $collection->name);
<<<<<<< HEAD
        Assert::assertSame(1, $collection->theme_id);
    });

    test('it has fillable attributes', function (): void {
        $collection = new Collection();
=======
        Assert::assertSame(1, (int) $collection->theme_id);
    });

    test('it has fillable attributes', function (): void {
        $collection = new Collection;
>>>>>>> laraxot/dev
        $expected = ['name', 'description', 'type'];

        foreach ($expected as $field) {
            Assert::assertTrue(in_array($field, $collection->getFillable(), true));
        }
    });

    test('collection has timestamps enabled', function (): void {
<<<<<<< HEAD
        $collection = new Collection();
=======
        $collection = new Collection;
>>>>>>> laraxot/dev

        Assert::assertTrue($collection->timestamps);
    });
});
