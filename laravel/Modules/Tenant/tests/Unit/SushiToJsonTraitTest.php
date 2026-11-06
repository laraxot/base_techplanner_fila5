<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Tenant\Tests\Unit;

<<<<<<< .merge_file_nzfxkJ
use Exception;
=======
=======
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_bIr0as
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Mockery;
use Mockery\Expectation;
use Modules\Tenant\Actions\Config\GetTenantFilePathAction;
use Modules\Tenant\Models\TestSushiModel;
use Modules\Tenant\Tests\TestCase;

use function Safe\json_encode;

uses(TestCase::class);

beforeEach(function (): void {
    /** @var TestCase $this */
    $this->model = new TestSushiModel;
    TestCase::$testDirectory = storage_path('tests/sushi-json');
    TestCase::$testJsonPath = TestCase::$testDirectory.'/test_sushi.json';

<<<<<<< .merge_file_nzfxkJ
    if (! File::exists(TestCase::$testDirectory)) {
        File::makeDirectory(TestCase::$testDirectory, 0o755, true, true);
    }

    $jsonPath = TestCase::$testJsonPath;
    $mock = Mockery::mock(GetTenantFilePathAction::class);
    $mock->allows(['execute' => $jsonPath]);
    app()->instance(GetTenantFilePathAction::class, $mock);
=======
    // Configura percorsi di test
    $this->testDirectory = storage_path('tests/sushi-json');
    $this->testJsonPath = $this->testDirectory.'/test_sushi.json';

    // Crea directory di test
<<<<<<< HEAD
    if (! File::exists($this->testDirectory)) {
=======
    /** @phpstan-ignore-next-line property.notFound */
    if (! File::exists($this->testDirectory)) {
        /** @phpstan-ignore-next-line property.notFound */
>>>>>>> 6ed19256f (.)
        File::makeDirectory($this->testDirectory, 0o755, true, true);
    }

    // Mock TenantService per i test
<<<<<<< HEAD
    $this->mock(TenantService::class, function ($mock): void {
=======
    /** @phpstan-ignore-next-line property.notFound, method.nonObject */
    $this->mock(TenantService::class, function ($mock): void {
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
>>>>>>> 6ed19256f (.)
        $mock->shouldReceive('filePath')->with('database/content/test_sushi.json')->andReturn($this->testJsonPath);
    });
>>>>>>> .merge_file_bIr0as

    TestCase::$createTestData = static fn (): array => [
        1 => [
            'id' => 1,
            'name' => 'Test Item 1',
            'description' => 'Description 1',
            'status' => 'active',
            'metadata' => ['key1' => 'value1'],
            'created_at' => now()->toISOString(),
            'updated_at' => now()->toISOString(),
        ],
        2 => [
            'id' => 2,
            'name' => 'Test Item 2',
            'description' => 'Description 2',
            'status' => 'inactive',
            'metadata' => ['key3' => 'value3'],
            'created_at' => now()->toISOString(),
            'updated_at' => now()->toISOString(),
        ],
    ];
});

afterEach(function (): void {
<<<<<<< .merge_file_nzfxkJ
    /** @var TestCase $this */
    if (File::exists(TestCase::$testJsonPath)) {
        File::delete(TestCase::$testJsonPath);
    }

    if (File::exists(TestCase::$testDirectory)) {
        File::deleteDirectory(TestCase::$testDirectory);
=======
    // Cleanup file di test
<<<<<<< HEAD
    if (File::exists($this->testJsonPath)) {
        File::delete($this->testJsonPath);
    }

    if (File::exists($this->testDirectory)) {
=======
    /** @phpstan-ignore-next-line property.notFound */
    if (File::exists($this->testJsonPath)) {
        /** @phpstan-ignore-next-line property.notFound */
        File::delete($this->testJsonPath);
    }

    /** @phpstan-ignore-next-line property.notFound */
    if (File::exists($this->testDirectory)) {
        /** @phpstan-ignore-next-line property.notFound */
>>>>>>> 6ed19256f (.)
        File::deleteDirectory($this->testDirectory);
>>>>>>> .merge_file_bIr0as
    }

    Mockery::close();
});

describe('SushiToJson Trait', function (): void {
    it('returns correct json file path', function (): void {
<<<<<<< .merge_file_nzfxkJ
        /** @var TestCase $this */
        expect($this->sushiModel()->getJsonFile())->toBe(TestCase::$testJsonPath);
    });

    it('loads existing data from json file', function (): void {
        /** @var TestCase $this */
        /** @var array<int, array<string, mixed>> $testData */
        $testData = $this->sushiTestData();
        File::put(TestCase::$testJsonPath, json_encode($testData, JSON_PRETTY_PRINT));

        $rows = $this->sushiModel()->loadExistingData();

        expect($rows)->toHaveCount(2);
        expect($this->jsonRecordAt($rows, '1')['name'])->toBe('Test Item 1');
        expect($this->jsonRecordAt($rows, '2')['name'])->toBe('Test Item 2');
    });

    it('returns empty array when file not exists', function (): void {
        /** @var TestCase $this */
        expect($this->sushiModel()->getSushiRows())->toBeEmpty();
    });

    it('throws exception with malformed json', function (): void {
        /** @var TestCase $this */
        File::put(TestCase::$testJsonPath, 'invalid json content');

        expect(fn () => $this->sushiModel()->getSushiRows())
            ->toThrow(Exception::class, 'Syntax error');
    });

    it('throws exception with non array data', function (): void {
        /** @var TestCase $this */
        File::put(TestCase::$testJsonPath, '"string data"');

        expect(fn () => $this->sushiModel()->getSushiRows())
            ->toThrow(Exception::class, 'Data is not array');
=======
<<<<<<< HEAD
        $path = $this->model->getJsonFile();

=======
        /** @phpstan-ignore-next-line property.notFound */
        $path = $this->model->getJsonFile();

        /** @phpstan-ignore-next-line property.notFound */
>>>>>>> 6ed19256f (.)
        expect($path)->toBe($this->testJsonPath)->and($path)->toEndWith('test_sushi.json');
    });

    it('loads existing data from json file', function (): void {
<<<<<<< HEAD
        $testData = ($this->createTestData)();
        File::put($this->testJsonPath, json_encode($testData, JSON_PRETTY_PRINT));

=======
        /** @phpstan-ignore-next-line property.notFound */
        $testData = ($this->createTestData)();
        /** @phpstan-ignore-next-line property.notFound */
        File::put($this->testJsonPath, json_encode($testData, JSON_PRETTY_PRINT));

        /** @phpstan-ignore-next-line property.notFound */
>>>>>>> 6ed19256f (.)
        $rows = $this->model->loadExistingData();

        expect($rows)
            ->toBeArray()
            ->toHaveCount(2)
<<<<<<< HEAD
            ->and($rows['1']['name'])
            ->toBe('Test Item 1')
=======
            /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
            ->and($rows['1']['name'])
            ->toBe('Test Item 1')
            /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
>>>>>>> 6ed19256f (.)
            ->and($rows['2']['name'])
            ->toBe('Test Item 2');
    });

    it('returns empty array when file not exists', function (): void {
<<<<<<< HEAD
=======
        /** @phpstan-ignore-next-line property.notFound */
>>>>>>> 6ed19256f (.)
        $rows = $this->model->getSushiRows();

        expect($rows)->toBeArray()->toBeEmpty();
    });

    it('throws exception with malformed json', function (): void {
<<<<<<< HEAD
        File::put($this->testJsonPath, 'invalid json content');

=======
        /** @phpstan-ignore-next-line property.notFound */
        File::put($this->testJsonPath, 'invalid json content');

        /** @phpstan-ignore-next-line property.notFound */
>>>>>>> 6ed19256f (.)
        expect($this->model->getSushiRows(...))->toThrow(Exception::class, 'Syntax error');
    });

    it('throws exception with non array data', function (): void {
<<<<<<< HEAD
        File::put($this->testJsonPath, '"string data"');

=======
        /** @phpstan-ignore-next-line property.notFound */
        File::put($this->testJsonPath, '"string data"');

        /** @phpstan-ignore-next-line property.notFound */
>>>>>>> 6ed19256f (.)
        expect($this->model->getSushiRows(...))->toThrow(Exception::class, 'Data is not array');
>>>>>>> .merge_file_bIr0as
    });

    it('normalizes nested arrays to json strings', function (): void {
        /** @var TestCase $this */
        $testData = [
            '1' => [
                'id' => 1,
                'name' => 'Test',
                'metadata' => ['nested' => 'value'],
                'tags' => ['tag1', 'tag2'],
            ],
        ];

<<<<<<< .merge_file_nzfxkJ
        File::put(TestCase::$testJsonPath, json_encode($testData, JSON_PRETTY_PRINT));

        $rows = $this->sushiModel()->getSushiRows();
        $row = $this->jsonRecordAt($rows, '1');

        expect($row['metadata'])->toBeString()->toBe('{"nested":"value"}');
        expect($row['tags'])->toBeString()->toBe('["tag1","tag2"]');
    });

    it('saves data successfully to json file', function (): void {
        /** @var TestCase $this */
        /** @var array<int, array<string, mixed>> $testData */
        $testData = $this->sushiTestData();
=======
<<<<<<< HEAD
        File::put($this->testJsonPath, json_encode($testData, JSON_PRETTY_PRINT));

        $rows = $this->model->getSushiRows();

        expect($rows['1']['metadata'])
            ->toBeString()
            ->toBe('{"nested":"value"}')
=======
        /** @phpstan-ignore-next-line property.notFound */
        File::put($this->testJsonPath, json_encode($testData, JSON_PRETTY_PRINT));

        /** @phpstan-ignore-next-line property.notFound */
        $rows = $this->model->getSushiRows();

        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($rows['1']['metadata'])
            ->toBeString()
            ->toBe('{"nested":"value"}')
            /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
>>>>>>> 6ed19256f (.)
            ->and($rows['1']['tags'])
            ->toBeString()
            ->toBe('["tag1","tag2"]');
    });

    it('saves data successfully to json file', function (): void {
<<<<<<< HEAD
        $testData = ($this->createTestData)();
>>>>>>> .merge_file_bIr0as

        expect($this->sushiModel()->saveToJson($testData))->toBeTrue();
        expect(TestCase::$testJsonPath)->toBeFile();

<<<<<<< .merge_file_nzfxkJ
        $savedData = $this->readJsonFileAsArray(TestCase::$testJsonPath);
        expect($savedData)->toHaveCount(2);
        expect($this->jsonRecordAt($savedData, 1)['name'])->toBe('Test Item 1');
    });

    it('creates directory if not exists', function (): void {
        /** @var TestCase $this */
        if (File::exists(TestCase::$testDirectory)) {
            File::deleteDirectory(TestCase::$testDirectory);
=======
        expect($result)->toBeTrue();
        expect($this->testJsonPath)->toBeFile();

=======
        /** @phpstan-ignore-next-line property.notFound */
        $testData = ($this->createTestData)();

        /** @phpstan-ignore-next-line property.notFound */
        $result = $this->model->saveToJson($testData);

        expect($result)->toBeTrue();
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->testJsonPath)->toBeFile();

        /** @phpstan-ignore-next-line property.notFound */
>>>>>>> 6ed19256f (.)
        $savedData = json_decode(File::get($this->testJsonPath), true);
        expect($savedData)->toBe($testData);
    });

    it('creates directory if not exists', function (): void {
        // Rimuovi directory di test
<<<<<<< HEAD
        if (File::exists($this->testDirectory)) {
            File::deleteDirectory($this->testDirectory);
>>>>>>> .merge_file_bIr0as
        }

        /** @var array<int, array<string, mixed>> $testData */
        $testData = $this->sushiTestData();

<<<<<<< .merge_file_nzfxkJ
        expect($this->sushiModel()->saveToJson($testData))->toBeTrue();
        expect(TestCase::$testDirectory)->toBeDirectory();
        expect(TestCase::$testJsonPath)->toBeFile();
    });

    it('handles save errors gracefully', function (): void {
        /** @var TestCase $this */
        $expectation = File::partialMock()->shouldReceive('put');
        if ($expectation instanceof Expectation) {
            $expectation->andThrow(new \RuntimeException('write failed'));
        }

        /** @var array<int, array<string, mixed>> $testData */
        $testData = $this->sushiTestData();
=======
        expect($result)->toBeTrue();
        expect($this->testDirectory)->toBeDirectory();
=======
        /** @phpstan-ignore-next-line property.notFound */
        if (File::exists($this->testDirectory)) {
            /** @phpstan-ignore-next-line property.notFound */
            File::deleteDirectory($this->testDirectory);
        }

        /** @phpstan-ignore-next-line property.notFound */
        $testData = ($this->createTestData)();

        /** @phpstan-ignore-next-line property.notFound */
        $result = $this->model->saveToJson($testData);

        expect($result)->toBeTrue();
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->testDirectory)->toBeDirectory();
        /** @phpstan-ignore-next-line property.notFound */
>>>>>>> 6ed19256f (.)
        expect($this->testJsonPath)->toBeFile();
    });

    it('handles save errors gracefully', function (): void {
        // Mock File facade per simulare errore di scrittura
        File::shouldReceive('put')->once()->andReturn(false);

<<<<<<< HEAD
        $testData = ($this->createTestData)();

=======
        /** @phpstan-ignore-next-line property.notFound */
        $testData = ($this->createTestData)();

        /** @phpstan-ignore-next-line property.notFound */
>>>>>>> 6ed19256f (.)
        $result = $this->model->saveToJson($testData);
>>>>>>> .merge_file_bIr0as

        expect($this->sushiModel()->saveToJson($testData))->toBeFalse();
    });

    it('handles creating event correctly', function (): void {
<<<<<<< .merge_file_nzfxkJ
        /** @var TestCase $this */
        Auth::shouldReceive('id')->andReturn(1);

        $model = new TestSushiModel;
        $model->fill(['name' => 'New Item', 'description' => 'New Description']);

        expect($model->name)->toBe('New Item');
        expect($model->getJsonFile())->toEndWith('test_sushi.json');
    });

    it('integrates with tenant service correctly', function (): void {
        /** @var TestCase $this */
        expect($this->sushiModel()->getJsonFile())->toBe(TestCase::$testJsonPath);
=======
        // Mock Auth per simulare utente autenticato
        Auth::shouldReceive('id')->andReturn(1);

        $testData = [
            'name' => 'New Item',
            'description' => 'New Description',
        ];

        $model = new TestSushiModel;
<<<<<<< HEAD
=======
        /** @phpstan-ignore-next-line method.nonObject */
>>>>>>> 6ed19256f (.)
        $model->fill($testData);

        // Test che il modello può essere creato con i dati
        expect($model->name)->toBe('New Item')->and($model->description)->toBe('New Description');

        // Test che i metodi del trait funzionano
        expect($model->getJsonFile())->toBeString()->toEndWith('test_sushi.json');
    });

    it('handles updating event correctly', function (): void {
        // Mock Auth per simulare utente autenticato
        Auth::shouldReceive('id')->andReturn(1);

<<<<<<< HEAD
        $testData = ($this->createTestData)();
=======
        /** @phpstan-ignore-next-line property.notFound */
        $testData = ($this->createTestData)();
        /** @phpstan-ignore-next-line property.notFound */
>>>>>>> 6ed19256f (.)
        File::put($this->testJsonPath, json_encode($testData, JSON_PRETTY_PRINT));

        $model = new TestSushiModel;
        $model->id = 1;
<<<<<<< HEAD
=======
        /** @phpstan-ignore-next-line method.nonObject */
>>>>>>> 6ed19256f (.)
        $model->fill(['name' => 'Updated Name']);

        // Test che il modello può essere aggiornato
        expect($model->name)->toBe('Updated Name')->and($model->id)->toBe(1);

        // Test che i dati esistenti possono essere caricati
<<<<<<< HEAD
        $existingData = $model->loadExistingData();
=======
        /** @phpstan-ignore-next-line method.nonObject */
        $existingData = $model->loadExistingData();
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
>>>>>>> 6ed19256f (.)
        expect($existingData)->toHaveKey('1')->and($existingData['1']['name'])->toBe('Test Item 1');
    });

    it('handles deleting event correctly', function (): void {
<<<<<<< HEAD
        $testData = ($this->createTestData)();
=======
        /** @phpstan-ignore-next-line property.notFound */
        $testData = ($this->createTestData)();
        /** @phpstan-ignore-next-line property.notFound */
>>>>>>> 6ed19256f (.)
        File::put($this->testJsonPath, json_encode($testData, JSON_PRETTY_PRINT));

        $model = new TestSushiModel;
        $model->id = 1;

        // Test che il modello può essere configurato per la cancellazione
        expect($model->id)->toBe(1);

        // Test che i dati esistenti possono essere caricati
<<<<<<< HEAD
=======
        /** @phpstan-ignore-next-line method.nonObject */
>>>>>>> 6ed19256f (.)
        $existingData = $model->loadExistingData();
        expect($existingData)->toHaveKey('1')->toHaveKey('2');

        // Test che il metodo saveToJson funziona
<<<<<<< HEAD
=======
        /** @phpstan-ignore-next-line method.nonObject */
>>>>>>> 6ed19256f (.)
        $result = $model->saveToJson($existingData);
        expect($result)->toBeTrue();
    });

    it('integrates with tenant service correctly', function (): void {
        $tenantService = app(TenantService::class);

        expect($tenantService)->toBeInstanceOf(TenantService::class);

        // Verifica che il mock funzioni correttamente
<<<<<<< HEAD
        $path = $this->model->getJsonFile();
=======
        /** @phpstan-ignore-next-line property.notFound */
        $path = $this->model->getJsonFile();
        /** @phpstan-ignore-next-line property.notFound */
>>>>>>> 6ed19256f (.)
        expect($path)->toBe($this->testJsonPath);
>>>>>>> .merge_file_bIr0as
    });

    it('handles large datasets efficiently', function (): void {
        /** @var TestCase $this */
        $largeData = [];
        for ($i = 1; $i <= 1000; $i++) {
<<<<<<< HEAD
=======
            /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
>>>>>>> 6ed19256f (.)
            $largeData[$i] = [
                'id' => $i,
                'name' => "Item {$i}",
                'description' => "Description for item {$i}",
                'status' => ($i % 2) === 0 ? 'active' : 'inactive',
                'created_at' => now()->toISOString(),
                'updated_at' => now()->toISOString(),
            ];
        }

        $startTime = microtime(true);
        expect($this->sushiModel()->saveToJson($largeData))->toBeTrue();
        expect(microtime(true) - $startTime)->toBeLessThan(50.0);

<<<<<<< .merge_file_nzfxkJ
        $startTime = microtime(true);
        $rows = $this->sushiModel()->getSushiRows();
        expect(microtime(true) - $startTime)->toBeLessThan(25.0);
        expect($rows)->toHaveCount(1000);
    });

    it('maintains data integrity during operations', function (): void {
        /** @var TestCase $this */
        /** @var array<int, array<string, mixed>> $originalData */
        $originalData = $this->sushiTestData();
        File::put(TestCase::$testJsonPath, json_encode($originalData, JSON_PRETTY_PRINT));

        expect($this->sushiModel()->loadExistingData())->toHaveCount(2);
        expect($this->jsonRecordAt($this->sushiModel()->loadExistingData(), 1)['name'])->toBe('Test Item 1');
=======
<<<<<<< HEAD
=======
        /** @phpstan-ignore-next-line property.notFound */
>>>>>>> 6ed19256f (.)
        $result = $this->model->saveToJson($largeData);

        $endTime = microtime(true);
        $executionTime = $endTime - $startTime;

        expect($result)->toBeTrue();
        expect($executionTime)->toBeLessThan(1.0);

        // Verifica caricamento
        $startTime = microtime(true);
<<<<<<< HEAD
=======
        /** @phpstan-ignore-next-line property.notFound */
>>>>>>> 6ed19256f (.)
        $rows = $this->model->getSushiRows();
        $endTime = microtime(true);
        $loadTime = $endTime - $startTime;

        expect($rows)->toHaveCount(1000);
        expect($loadTime)->toBeLessThan(0.5);
    });

    it('logs errors appropriately', function (): void {
        // Mock Log facade per verificare logging
<<<<<<< HEAD
        $this->mock('log', function ($mock): void {
=======
        /** @phpstan-ignore-next-line property.notFound */
        $this->mock('log', function ($mock): void {
            /** @phpstan-ignore-next-line method.nonObject */
>>>>>>> 6ed19256f (.)
            $mock->shouldReceive('error')->once()->with('Failed to save data to JSON file', Mockery::any());
        });

        // Simula errore di salvataggio
        File::shouldReceive('put')->once()->andReturn(false);

<<<<<<< HEAD
        $testData = ($this->createTestData)();
=======
        /** @phpstan-ignore-next-line property.notFound */
        $testData = ($this->createTestData)();
        /** @phpstan-ignore-next-line property.notFound */
>>>>>>> 6ed19256f (.)
        $result = $this->model->saveToJson($testData);

        expect($result)->toBeFalse();
    });

    it('maintains data integrity during operations', function (): void {
<<<<<<< HEAD
        $originalData = ($this->createTestData)();
        File::put($this->testJsonPath, json_encode($originalData, JSON_PRETTY_PRINT));

        // Verifica che i dati originali siano preservati
=======
        /** @phpstan-ignore-next-line property.notFound */
        $originalData = ($this->createTestData)();
        /** @phpstan-ignore-next-line property.notFound */
        File::put($this->testJsonPath, json_encode($originalData, JSON_PRETTY_PRINT));

        // Verifica che i dati originali siano preservati
        /** @phpstan-ignore-next-line property.notFound */
>>>>>>> 6ed19256f (.)
        $loadedData = $this->model->loadExistingData();
        expect($loadedData)->toBe($originalData);
>>>>>>> .merge_file_bIr0as

        $updatedData = $originalData;
<<<<<<< .merge_file_nzfxkJ
        $updatedData[1]['name'] = 'Updated Name';

        expect($this->sushiModel()->saveToJson($updatedData))->toBeTrue();

        $finalData = $this->sushiModel()->loadExistingData();
        expect($this->jsonRecordAt($finalData, 1)['name'])->toBe('Updated Name');
        expect($this->jsonRecordAt($finalData, 2)['name'])->toBe('Test Item 2');
=======
<<<<<<< HEAD
        $updatedData['1']['name'] = 'Updated Name';

=======
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        $updatedData['1']['name'] = 'Updated Name';

        /** @phpstan-ignore-next-line property.notFound */
>>>>>>> 6ed19256f (.)
        $result = $this->model->saveToJson($updatedData);
        expect($result)->toBeTrue();

        // Verifica che solo il record specifico sia stato aggiornato
<<<<<<< HEAD
        $finalData = $this->model->loadExistingData();
=======
        /** @phpstan-ignore-next-line property.notFound */
        $finalData = $this->model->loadExistingData();
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
>>>>>>> 6ed19256f (.)
        expect($finalData['1']['name'])->toBe('Updated Name')->and($finalData['2']['name'])->toBe('Test Item 2'); // Non modificato
    });

    it('handles empty and null values correctly', function (): void {
        $testData = [
            '1' => [
                'id' => 1,
                'name' => '',
                'description' => null,
                'metadata' => [],
                'status' => false,
            ],
        ];

<<<<<<< HEAD
        $result = $this->model->saveToJson($testData);
        expect($result)->toBeTrue();

        $loadedData = $this->model->getSushiRows();
        expect($loadedData['1']['name'])
            ->toBe('')
            ->and($loadedData['1']['description'])
            ->toBeNull()
            ->and($loadedData['1']['metadata'])
            ->toBe('[]') // Convertito in stringa JSON
=======
        /** @phpstan-ignore-next-line property.notFound */
        $result = $this->model->saveToJson($testData);
        expect($result)->toBeTrue();

        /** @phpstan-ignore-next-line property.notFound */
        $loadedData = $this->model->getSushiRows();
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($loadedData['1']['name'])
            ->toBe('')
            /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
            ->and($loadedData['1']['description'])
            ->toBeNull()
            /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
            ->and($loadedData['1']['metadata'])
            ->toBe('[]') // Convertito in stringa JSON
            /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
>>>>>>> 6ed19256f (.)
            ->and($loadedData['1']['status'])
            ->toBeFalse();
    });

    it('handles unicode and special characters', function (): void {
        $testData = [
            '1' => [
                'id' => 1,
                'name' => 'Café & Résumé 🚀',
                'description' => 'Test con caratteri speciali: é, è, ñ, 中文, 🎉',
                'tags' => ['tag-é', 'tag-è', 'tag-ñ'],
            ],
        ];

<<<<<<< HEAD
        $result = $this->model->saveToJson($testData);
        expect($result)->toBeTrue();

        $loadedData = $this->model->getSushiRows();
        expect($loadedData['1']['name'])
            ->toBe('Café & Résumé 🚀')
            ->and($loadedData['1']['description'])
            ->toBe('Test con caratteri speciali: é, è, ñ, 中文, 🎉')
=======
        /** @phpstan-ignore-next-line property.notFound */
        $result = $this->model->saveToJson($testData);
        expect($result)->toBeTrue();

        /** @phpstan-ignore-next-line property.notFound */
        $loadedData = $this->model->getSushiRows();
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($loadedData['1']['name'])
            ->toBe('Café & Résumé 🚀')
            /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
            ->and($loadedData['1']['description'])
            ->toBe('Test con caratteri speciali: é, è, ñ, 中文, 🎉')
            /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
>>>>>>> 6ed19256f (.)
            ->and($loadedData['1']['tags'])
            ->toBe('["tag-é","tag-è","tag-ñ"]');
>>>>>>> .merge_file_bIr0as
    });
});
