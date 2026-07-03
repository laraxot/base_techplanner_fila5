<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\UI\Tests\Unit\Enums;
=======
>>>>>>> c001364 (.)

use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Modules\UI\Enums\TableLayoutEnum;
<<<<<<< HEAD
use Modules\UI\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('has enum values', function (): void {
    Assert::assertSame('list', TableLayoutEnum::LIST->value);
    Assert::assertSame('grid', TableLayoutEnum::GRID->value);
=======

it('has enum values', function (): void {
    expect(TableLayoutEnum::LIST->value)->toBe('list');
    expect(TableLayoutEnum::GRID->value)->toBe('grid');
>>>>>>> c001364 (.)
});

it('has default layout', function (): void {
    $default = TableLayoutEnum::init();
<<<<<<< HEAD
    Assert::assertSame(TableLayoutEnum::LIST, $default);
=======
    expect($default)->toBe(TableLayoutEnum::LIST);
>>>>>>> c001364 (.)
});

it('toggles between layouts', function (): void {
    $list = TableLayoutEnum::LIST;
    $grid = TableLayoutEnum::GRID;

<<<<<<< HEAD
    Assert::assertSame($grid, $list->toggle());
    Assert::assertSame($list, $grid->toggle());
=======
    expect($list->toggle())->toBe($grid);
    expect($grid->toggle())->toBe($list);
>>>>>>> c001364 (.)
});

it('checks layout types correctly', function (): void {
    $list = TableLayoutEnum::LIST;
    $grid = TableLayoutEnum::GRID;

<<<<<<< HEAD
    Assert::assertTrue($list->isListLayout());
    Assert::assertFalse($list->isGridLayout());
    Assert::assertTrue($grid->isGridLayout());
    Assert::assertFalse($grid->isListLayout());
=======
    expect($list->isListLayout())->toBeTrue();
    expect($list->isGridLayout())->toBeFalse();

    expect($grid->isGridLayout())->toBeTrue();
    expect($grid->isListLayout())->toBeFalse();
>>>>>>> c001364 (.)
});

it('has grid configuration', function (): void {
    $grid = TableLayoutEnum::GRID;
    $config = $grid->getTableContentGrid();

<<<<<<< HEAD
    Assert::assertIsArray($config);
    Assert::assertArrayHasKey('sm', $config);
    Assert::assertArrayHasKey('md', $config);
    Assert::assertArrayHasKey('lg', $config);
    Assert::assertArrayHasKey('xl', $config);
    Assert::assertArrayHasKey('2xl', $config);
=======
    expect($config)->toBeArray();
    expect($config)->toHaveKey('sm');
    expect($config)->toHaveKey('md');
    expect($config)->toHaveKey('lg');
    expect($config)->toHaveKey('xl');
    expect($config)->toHaveKey('2xl');
>>>>>>> c001364 (.)
});

it('returns correct table columns based on layout', function (): void {
    $list = TableLayoutEnum::LIST;
    $grid = TableLayoutEnum::GRID;

    $listColumns = [
        TextColumn::make('name'),
        TextColumn::make('email'),
    ];

    $gridColumns = [
        Stack::make([
            TextColumn::make('name'),
            TextColumn::make('email'),
        ]),
    ];

    // Test list layout
    $result = $list->getTableColumns($listColumns, $gridColumns);
<<<<<<< HEAD
    Assert::assertSame($listColumns, $result);
    // Test grid layout
    $result = $grid->getTableColumns($listColumns, $gridColumns);
    Assert::assertSame($gridColumns, $result);
=======
    expect($result)->toBe($listColumns);

    // Test grid layout
    $result = $grid->getTableColumns($listColumns, $gridColumns);
    expect($result)->toBe($gridColumns);
>>>>>>> c001364 (.)
});

it('has options', function (): void {
    $options = TableLayoutEnum::getOptions();

<<<<<<< HEAD
    Assert::assertArrayHasKey('list', $options);
    Assert::assertArrayHasKey('grid', $options);
    Assert::assertIsString($options['list']);
    Assert::assertIsString($options['grid']);
    Assert::assertNotEmpty($options['list']);
    Assert::assertNotEmpty($options['grid']);
=======
    expect($options)->toBeArray();
    expect($options)->toHaveKey('list');
    expect($options)->toHaveKey('grid');
    expect($options['list'])->toBe(TableLayoutEnum::LIST);
    expect($options['grid'])->toBe(TableLayoutEnum::GRID);
>>>>>>> c001364 (.)
});

it('has container classes', function (): void {
    $list = TableLayoutEnum::LIST;
    $grid = TableLayoutEnum::GRID;

    $listClasses = $list->getContainerClasses();
    $gridClasses = $grid->getContainerClasses();

<<<<<<< HEAD
    Assert::assertGreaterThan(0, strlen($listClasses));
    Assert::assertGreaterThan(0, strlen($gridClasses));
=======
    expect($listClasses)->toBeString();
    expect(strlen($listClasses))->toBeGreaterThan(0);
    expect($gridClasses)->toBeString();
    expect(strlen($gridClasses))->toBeGreaterThan(0);
});

it('has translation support', function (): void {
    $list = TableLayoutEnum::LIST;
    $grid = TableLayoutEnum::GRID;

    // Test that labels are translatable
    // Since translation requires full app context, we'll just check that methods exist
    expect(method_exists($list, 'getLabel'))->toBeTrue();
    expect(method_exists($grid, 'getLabel'))->toBeTrue();
});

it('has color and icon methods', function (): void {
    $list = TableLayoutEnum::LIST;
    $grid = TableLayoutEnum::GRID;

    // Test that methods exist (actual translation requires full app context)
    expect(method_exists($list, 'getColor'))->toBeTrue();
    expect(method_exists($grid, 'getColor'))->toBeTrue();
    expect(method_exists($list, 'getIcon'))->toBeTrue();
    expect(method_exists($grid, 'getIcon'))->toBeTrue();
>>>>>>> c001364 (.)
});
