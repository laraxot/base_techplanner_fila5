<?php

declare(strict_types=1);

namespace Modules\UI\Tests\Unit\Models;

<<<<<<< HEAD
use Modules\UI\Database\Factories\CollectionFactory;
use Modules\UI\Models\Collection;
use Modules\UI\Tests\TestCase;
use PHPUnit\Framework\Assert;
=======
use Modules\UI\Models\Collection;
use Modules\UI\Tests\TestCase;
>>>>>>> c001364 (.)

uses(TestCase::class);

describe('Collection Model', function (): void {
    test('it can create a collection with valid data', function (): void {
<<<<<<< HEAD
        $collection = CollectionFactory::new()->createOne([
            'name' => 'Hero Components',
            'type' => 'block',
            'theme_id' => 1,
        ]);

        Assert::assertSame('block', $collection->type);
        Assert::assertSame('Hero Components', $collection->name);
=======
        $collection = Collection::factory()->create([
            'name' => 'Hero Components',
            'type' => 'block',
        ]);

        expect($collection->name)->toBe('Hero Components')
            ->and($collection->type)->toBe('block');
>>>>>>> c001364 (.)
    });

    test('it has fillable attributes', function (): void {
        $collection = new Collection();
        $collection = new Collection();
        $expected = ['name', 'description', 'type'];

        foreach ($expected as $field) {
<<<<<<< HEAD
            Assert::assertTrue(in_array($field, $collection->getFillable()));
=======
            expect(in_array($field, $collection->getFillable()))->toBeTrue();
>>>>>>> c001364 (.)
        }
    });

    test('collection has timestamps', function (): void {
<<<<<<< HEAD
        $collection = CollectionFactory::new()->createOne();

        Assert::assertNotNull($collection->created_at);
        Assert::assertNotNull($collection->updated_at);
=======
        $collection = Collection::factory()->create();

        expect($collection->created_at)->not->toBeNull()
            ->and($collection->updated_at)->not->toBeNull();
>>>>>>> c001364 (.)
    });
});
