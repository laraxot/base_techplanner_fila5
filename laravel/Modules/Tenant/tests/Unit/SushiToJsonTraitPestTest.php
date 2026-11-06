<?php

declare(strict_types=1);

namespace Modules\Tenant\Tests\Unit;

use Exception;
use Illuminate\Support\Facades\File;
use Modules\Tenant\Tests\TestCase;
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;

use function Safe\json_encode;

uses(TestCase::class);

beforeEach(function (): void {
    /** @var TestCase $this */
    TestCase::$testDirectory = storage_path('tests/sushi-json');
    TestCase::$testJsonPath = TestCase::$testDirectory.'/test_sushi.json';

    if (! File::exists(TestCase::$testDirectory)) {
        File::makeDirectory(TestCase::$testDirectory, 0o755, true, true);
    }
});

afterEach(function (): void {
    /** @var TestCase $this */
    if (File::exists(TestCase::$testJsonPath)) {
        File::delete(TestCase::$testJsonPath);
    }
});

it('uses isolated json path in testing environment', function (): void {
    /** @var TestCase $this */
    $path = $this->sushiModel()->getJsonFile();

    Assert::assertSame(TestCase::$testJsonPath, $path);
});

it('returns empty rows when json file is missing', function (): void {
    /** @var TestCase $this */
    $rows = $this->sushiModel()->getSushiRows();

    Assert::assertSame([], $rows);
});

it('loads rows from valid json file', function (): void {
    /** @var TestCase $this */
    $payload = [
        '1' => [
            'id' => 1,
            'name' => 'Test Item 1',
            'description' => 'Description 1',
            'status' => 'active',
            'metadata' => ['key1' => 'value1'],
            'created_at' => now()->toISOString(),
            'updated_at' => now()->toISOString(),
        ],
    ];

    File::put(TestCase::$testJsonPath, json_encode($payload, JSON_PRETTY_PRINT));

    $rows = $this->sushiModel()->getSushiRows();

    Assert::assertCount(1, $rows);
    Assert::assertSame('Test Item 1', $rows[0]['name'] ?? null);
});

<<<<<<< .merge_file_faVmZL
it('throws when json file is not an array', function (): void {
    /** @var TestCase $this */
    File::put(TestCase::$testJsonPath, json_encode('not-an-array'));

    XotBasePest::assertThrows(
        fn (): array => $this->sushiModel()->getSushiRows(),
        Exception::class
    );
=======
describe('Business Logic Tests', function () {
    it('handles large datasets efficiently', function () {
        $largeData = [];
        for ($i = 1; $i <= 1000; $i++) {
            $largeData[(string) $i] = [
                'id' => $i,
                'name' => "Item {$i}",
                'status' => ($i % 2) === 0 ? 'active' : 'inactive',
                'created_at' => now()->toISOString(),
            ];
        }

        File::put($this->testJsonPath, json_encode($largeData));

        $rows = $this->model->getSushiRows();

        expect($rows)->toHaveCount(1000);
        expect($rows['1']['name'])->toBe('Item 1');
        expect($rows['1000']['name'])->toBe('Item 1000');
    })->group('performance', 'traits', 'sushi-json');

    it('preserves data types correctly', function () {
        $testData = [
            '1' => [
                'id' => 1, // integer
                'name' => 'Test Item', // string
                'active' => true, // boolean
                'price' => 19.99, // float
                'metadata' => ['key' => 'value'], // array
                'created_at' => '2024-01-01T10:00:00Z', // string datetime
            ],
        ];

        File::put($this->testJsonPath, json_encode($testData));

        $rows = $this->model->getSushiRows();

        expect($rows['1']['id'])->toBeInt();
        expect($rows['1']['name'])->toBeString();
        expect($rows['1']['active'])->toBeBool();
        expect($rows['1']['price'])->toBeFloat();
        expect($rows['1']['metadata'])->toBeArray();
        expect($rows['1']['created_at'])->toBeString();
    })->group('data-types', 'traits', 'sushi-json');
<<<<<<< HEAD
>>>>>>> .merge_file_iSbDrC
});
=======
});
>>>>>>> 6ed19256f (.)
