<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\UI\Tests\Feature;

use Filament\Tables\Columns\TextColumn;
use Illuminate\View\ComponentAttributeBag;
use Modules\UI\Filament\Tables\Columns\GroupColumn;
use PHPUnit\Framework\Assert;
=======
use Filament\Tables\Columns\TextColumn;
use Illuminate\View\ComponentAttributeBag;
use Modules\UI\Filament\Tables\Columns\GroupColumn;
>>>>>>> c001364 (.)

// Test GroupColumn class
describe('GroupColumn class', function (): void {
    it('can be instantiated with make()', function (): void {
        $column = GroupColumn::make('test');
<<<<<<< HEAD
        Assert::assertInstanceOf(GroupColumn::class, $column);
        Assert::assertSame('test', $column->getName());
=======
        expect($column)->toBeInstanceOf(GroupColumn::class);
        expect($column->getName())->toBe('test');
>>>>>>> c001364 (.)
    });

    it('accepts schema with TextColumn instances', function (): void {
        $column = GroupColumn::make('worker')
            ->schema([
                TextColumn::make('matr'),
                TextColumn::make('cognome'),
                TextColumn::make('nome'),
            ]);

        $fields = $column->getFields();
<<<<<<< HEAD
        Assert::assertCount(3, $fields);
        Assert::assertInstanceOf(TextColumn::class, $fields[0]);
        Assert::assertSame('matr', $fields[0]->getName());
=======
        expect($fields)->toHaveCount(3);
        expect($fields[0])->toBeInstanceOf(TextColumn::class);
        expect($fields[0]->getName())->toBe('matr');
>>>>>>> c001364 (.)
    });

    it('filters out non-Column instances from schema', function (): void {
        $column = GroupColumn::make('mixed')
            ->schema([
                TextColumn::make('valid'),
                'invalid_string',
                123,
                null,
                TextColumn::make('also_valid'),
            ]);

        $fields = $column->getFields();
<<<<<<< HEAD
        Assert::assertCount(2, $fields);
=======
        expect($fields)->toHaveCount(2);
>>>>>>> c001364 (.)
    });

    it('handles empty schema', function (): void {
        $column = GroupColumn::make('empty')->schema([]);
<<<<<<< HEAD
        Assert::assertEmpty($column->getFields());
=======
        expect($column->getFields())->toBeEmpty();
>>>>>>> c001364 (.)
    });

    it('uses correct view path', function (): void {
        $column = GroupColumn::make('test');
<<<<<<< HEAD
        $reflection = new \ReflectionClass($column);
        $property = $reflection->getProperty('view');

        Assert::assertSame('ui::filament.tables.columns.group', $property->getValue($column));
=======
        $reflection = new ReflectionClass($column);
        $property = $reflection->getProperty('view');

        expect($property->getValue($column))->toBe('ui::filament.tables.columns.group');
>>>>>>> c001364 (.)
    });
});

// Test view rendering with data_get() fallback
describe('GroupColumn view rendering', function (): void {
    it('renders direct attribute values', function (): void {
        $record = (object) [
            'matr' => '12345',
            'cognome' => 'Rossi',
        ];

        $fields = [
            TextColumn::make('matr'),
            TextColumn::make('cognome'),
        ];

        $value = data_get($record, 'matr');
<<<<<<< HEAD
        Assert::assertSame('12345', $value);
        $value = data_get($record, 'cognome');
        Assert::assertSame('Rossi', $value);
=======
        expect($value)->toBe('12345');

        $value = data_get($record, 'cognome');
        expect($value)->toBe('Rossi');
>>>>>>> c001364 (.)
    });

    it('renders nested relation values with dot notation', function (): void {
        $record = (object) [
            'valutatore' => (object) [
                'nome_diri' => 'Mario Rossi',
                'stabi_txt' => 'Stabilimento A',
            ],
        ];

        // Test data_get() resolves dot notation
<<<<<<< HEAD
        Assert::assertSame('Mario Rossi', data_get($record, 'valutatore.nome_diri'));
        Assert::assertSame('Stabilimento A', data_get($record, 'valutatore.stabi_txt'));
=======
        expect(data_get($record, 'valutatore.nome_diri'))->toBe('Mario Rossi');
        expect(data_get($record, 'valutatore.stabi_txt'))->toBe('Stabilimento A');
>>>>>>> c001364 (.)
    });

    it('returns null for missing nested relations', function (): void {
        $record = (object) [
            'valutatore' => null,
        ];

<<<<<<< HEAD
        Assert::assertNull(data_get($record, 'valutatore.nome_diri'));
=======
        expect(data_get($record, 'valutatore.nome_diri'))->toBeNull();
>>>>>>> c001364 (.)
    });

    it('handles deep nesting', function (): void {
        $record = (object) [
            'level1' => (object) [
                'level2' => (object) [
                    'level3' => 'deep value',
                ],
            ],
        ];

<<<<<<< HEAD
        Assert::assertSame('deep value', data_get($record, 'level1.level2.level3'));
=======
        expect(data_get($record, 'level1.level2.level3'))->toBe('deep value');
>>>>>>> c001364 (.)
    });

    it('preserves zero values', function (): void {
        $record = (object) [
            'score' => 0,
            'string_zero' => '0',
        ];

<<<<<<< HEAD
        Assert::assertSame(0, data_get($record, 'score'));
        Assert::assertSame('0', data_get($record, 'string_zero'));
=======
        expect(data_get($record, 'score'))->toBe(0);
        expect(data_get($record, 'string_zero'))->toBe('0');
>>>>>>> c001364 (.)
    });

    it('renders view with nested relation when view system available', function (): void {
        $record = (object) [
            'valutatore' => (object) [
                'nome_diri' => 'Mario Rossi',
            ],
        ];

        $fields = [TextColumn::make('valutatore.nome_diri')];

        if (! app()->bound('view')) {
<<<<<<< HEAD
            Assert::assertSame('Mario Rossi', data_get($record, 'valutatore.nome_diri'));
=======
            expect(data_get($record, 'valutatore.nome_diri'))->toBe('Mario Rossi');
>>>>>>> c001364 (.)

            return;
        }

        $html = view('ui::filament.tables.columns.group', [
            'getFields' => fn () => $fields,
            'getRecord' => fn () => $record,
            'attributes' => new ComponentAttributeBag(),
            'getExtraAttributes' => fn () => [],
            'isInline' => fn () => false,
        ])->render();

<<<<<<< HEAD
        Assert::assertStringContainsString((string) 'Mario Rossi', (string) $html);
=======
        expect($html)->toContain('Mario Rossi');
>>>>>>> c001364 (.)
    });

    it('renders multiple fields in view', function (): void {
        $record = (object) [
            'matr' => '12345',
            'cognome' => 'Rossi',
            'nome' => 'Mario',
        ];

        $fields = [
            TextColumn::make('matr'),
            TextColumn::make('cognome'),
            TextColumn::make('nome'),
        ];

        if (! app()->bound('view')) {
<<<<<<< HEAD
            Assert::assertSame('12345', data_get($record, 'matr'));
            Assert::assertSame('Rossi', data_get($record, 'cognome'));
            Assert::assertSame('Mario', data_get($record, 'nome'));
=======
            expect(data_get($record, 'matr'))->toBe('12345');
            expect(data_get($record, 'cognome'))->toBe('Rossi');
            expect(data_get($record, 'nome'))->toBe('Mario');
>>>>>>> c001364 (.)

            return;
        }

        $html = view('ui::filament.tables.columns.group', [
            'getFields' => fn () => $fields,
            'getRecord' => fn () => $record,
            'attributes' => new ComponentAttributeBag(),
            'getExtraAttributes' => fn () => [],
            'isInline' => fn () => false,
        ])->render();

<<<<<<< HEAD
        Assert::assertStringContainsString((string) '12345', (string) $html);
        Assert::assertStringContainsString((string) 'Rossi', (string) $html);
        Assert::assertStringContainsString((string) 'Mario', (string) $html);
=======
        expect($html)->toContain('12345');
        expect($html)->toContain('Rossi');
        expect($html)->toContain('Mario');
>>>>>>> c001364 (.)
    });

    it('skips empty values but keeps zeros', function (): void {
        $record = (object) [
            'empty_field' => '',
            'null_field' => null,
            'zero_int' => 0,
            'zero_string' => '0',
            'valid' => 'shown',
        ];

        // The view logic: skip if empty($value) && $value !== 0 && $value !== '0'
<<<<<<< HEAD
        $shouldSkip = static function (mixed $value): bool {
            return empty($value) && 0 !== $value && '0' !== $value;
        };

        Assert::assertTrue($shouldSkip($record->empty_field));
        Assert::assertTrue($shouldSkip($record->null_field));
        Assert::assertFalse($shouldSkip($record->zero_int));
        Assert::assertFalse($shouldSkip($record->zero_string));
=======
        // So zeros should be kept
        expect(empty($record->empty_field) && 0 !== $record->empty_field && '0' !== $record->empty_field)->toBeTrue();
        expect(empty($record->null_field) && 0 !== $record->null_field && '0' !== $record->null_field)->toBeTrue();
        expect(empty($record->zero_int) && 0 !== $record->zero_int && '0' !== $record->zero_int)->toBeFalse();
        expect(empty($record->zero_string) && 0 !== $record->zero_string && '0' !== $record->zero_string)->toBeFalse();
>>>>>>> c001364 (.)
    });
});
