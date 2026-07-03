<?php

declare(strict_types=1);

namespace Modules\UI\Tests\Unit\Enums;

<<<<<<< HEAD
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
=======
uses(TestCase::class);

>>>>>>> c001364 (.)
use Modules\UI\Enums\CornerPositionEnum;
use Modules\UI\Enums\FieldTypeEnum;
use Modules\UI\Enums\TableLayout;
use Modules\UI\Tests\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;

uses(TestCase::class);
=======
>>>>>>> c001364 (.)

// --- CornerPositionEnum ---

it('CornerPositionEnum has correct values', function (): void {
<<<<<<< HEAD
    Assert::assertSame('top-left', CornerPositionEnum::TOP_LEFT->value);
    Assert::assertSame('top-right', CornerPositionEnum::TOP_RIGHT->value);
    Assert::assertSame('bottom-left', CornerPositionEnum::BOTTOM_LEFT->value);
    Assert::assertSame('bottom-right', CornerPositionEnum::BOTTOM_RIGHT->value);
});

it('CornerPositionEnum getColor returns translation keys via EnumTrait', function (): void {
    foreach (CornerPositionEnum::cases() as $case) {
        Assert::assertStringContainsString('ui::corner_position_enum.values.', $case->getColor());
        Assert::assertStringEndsWith('.color', $case->getColor());
    }
});

it('CornerPositionEnum getIcon returns translation keys via EnumTrait', function (): void {
    Assert::assertSame('ui::corner_position_enum.values.top-left.icon', CornerPositionEnum::TOP_LEFT->getIcon());
    Assert::assertSame('ui::corner_position_enum.values.top-right.icon', CornerPositionEnum::TOP_RIGHT->getIcon());
    Assert::assertSame('ui::corner_position_enum.values.bottom-left.icon', CornerPositionEnum::BOTTOM_LEFT->getIcon());
    Assert::assertSame('ui::corner_position_enum.values.bottom-right.icon', CornerPositionEnum::BOTTOM_RIGHT->getIcon());
});

it('CornerPositionEnum getCssClass returns correct CSS classes', function (): void {
    Assert::assertSame('top-0 left-0', CornerPositionEnum::TOP_LEFT->getCssClass());
    Assert::assertSame('top-0 right-0', CornerPositionEnum::TOP_RIGHT->getCssClass());
    Assert::assertSame('bottom-0 left-0', CornerPositionEnum::BOTTOM_LEFT->getCssClass());
    Assert::assertSame('bottom-0 right-0', CornerPositionEnum::BOTTOM_RIGHT->getCssClass());
});

it('CornerPositionEnum can be created from value', function (): void {
    Assert::assertSame(CornerPositionEnum::TOP_LEFT, CornerPositionEnum::from('top-left'));
    Assert::assertSame(CornerPositionEnum::BOTTOM_RIGHT, CornerPositionEnum::from('bottom-right'));
=======
    expect(CornerPositionEnum::TOP_LEFT->value)->toBe('top-left');
    expect(CornerPositionEnum::TOP_RIGHT->value)->toBe('top-right');
    expect(CornerPositionEnum::BOTTOM_LEFT->value)->toBe('bottom-left');
    expect(CornerPositionEnum::BOTTOM_RIGHT->value)->toBe('bottom-right');
});

it('CornerPositionEnum getColor returns gray for all cases', function (): void {
    foreach (CornerPositionEnum::cases() as $case) {
        expect($case->getColor())->toBe('gray');
    }
});

it('CornerPositionEnum getIcon returns heroicon strings', function (): void {
    expect(CornerPositionEnum::TOP_LEFT->getIcon())->toBe('heroicon-o-arrow-up-left');
    expect(CornerPositionEnum::TOP_RIGHT->getIcon())->toBe('heroicon-o-arrow-up-right');
    expect(CornerPositionEnum::BOTTOM_LEFT->getIcon())->toBe('heroicon-o-arrow-down-left');
    expect(CornerPositionEnum::BOTTOM_RIGHT->getIcon())->toBe('heroicon-o-arrow-down-right');
});

it('CornerPositionEnum getCssClass returns correct CSS classes', function (): void {
    expect(CornerPositionEnum::TOP_LEFT->getCssClass())->toBe('top-0 left-0');
    expect(CornerPositionEnum::TOP_RIGHT->getCssClass())->toBe('top-0 right-0');
    expect(CornerPositionEnum::BOTTOM_LEFT->getCssClass())->toBe('bottom-0 left-0');
    expect(CornerPositionEnum::BOTTOM_RIGHT->getCssClass())->toBe('bottom-0 right-0');
});

it('CornerPositionEnum can be created from value', function (): void {
    expect(CornerPositionEnum::from('top-left'))->toBe(CornerPositionEnum::TOP_LEFT);
    expect(CornerPositionEnum::from('bottom-right'))->toBe(CornerPositionEnum::BOTTOM_RIGHT);
>>>>>>> c001364 (.)
});

it('CornerPositionEnum getLabel returns a string', function (): void {
    foreach (CornerPositionEnum::cases() as $case) {
<<<<<<< HEAD
        Assert::assertNotEmpty($case->getLabel());
=======
        expect($case->getLabel())->toBeString();
>>>>>>> c001364 (.)
    }
});

// --- FieldTypeEnum ---

it('FieldTypeEnum has correct values', function (): void {
<<<<<<< HEAD
    Assert::assertSame('text', FieldTypeEnum::TEXT->value);
    Assert::assertSame('email', FieldTypeEnum::EMAIL->value);
    Assert::assertSame('textarea', FieldTypeEnum::TEXTAREA->value);
    Assert::assertSame('select', FieldTypeEnum::SELECT->value);
    Assert::assertSame('radio', FieldTypeEnum::RADIO->value);
    Assert::assertSame('checkbox', FieldTypeEnum::CHECKBOX->value);
    Assert::assertSame('date', FieldTypeEnum::DATE->value);
    Assert::assertSame('time', FieldTypeEnum::TIME->value);
    Assert::assertSame('datetime', FieldTypeEnum::DATETIME->value);
});

it('FieldTypeEnum implements HasLabel, HasColor, HasIcon', function (): void {
    Assert::assertInstanceOf(HasLabel::class, FieldTypeEnum::TEXT);
    Assert::assertInstanceOf(HasColor::class, FieldTypeEnum::TEXT);
    Assert::assertInstanceOf(HasIcon::class, FieldTypeEnum::TEXT);
=======
    expect(FieldTypeEnum::TEXT->value)->toBe('text');
    expect(FieldTypeEnum::EMAIL->value)->toBe('email');
    expect(FieldTypeEnum::TEXTAREA->value)->toBe('textarea');
    expect(FieldTypeEnum::SELECT->value)->toBe('select');
    expect(FieldTypeEnum::RADIO->value)->toBe('radio');
    expect(FieldTypeEnum::CHECKBOX->value)->toBe('checkbox');
    expect(FieldTypeEnum::DATE->value)->toBe('date');
    expect(FieldTypeEnum::TIME->value)->toBe('time');
    expect(FieldTypeEnum::DATETIME->value)->toBe('datetime');
});

it('FieldTypeEnum implements HasLabel, HasColor, HasIcon', function (): void {
    expect(FieldTypeEnum::TEXT)->toBeInstanceOf(Filament\Support\Contracts\HasLabel::class);
    expect(FieldTypeEnum::TEXT)->toBeInstanceOf(Filament\Support\Contracts\HasColor::class);
    expect(FieldTypeEnum::TEXT)->toBeInstanceOf(Filament\Support\Contracts\HasIcon::class);
>>>>>>> c001364 (.)
});

it('FieldTypeEnum getLabel returns a string', function (): void {
    foreach (FieldTypeEnum::cases() as $case) {
<<<<<<< HEAD
        Assert::assertNotEmpty($case->getLabel());
=======
        expect($case->getLabel())->toBeString();
>>>>>>> c001364 (.)
    }
});

it('FieldTypeEnum getColor returns a string', function (): void {
    foreach (FieldTypeEnum::cases() as $case) {
<<<<<<< HEAD
        Assert::assertNotEmpty($case->getColor());
=======
        expect($case->getColor())->toBeString();
>>>>>>> c001364 (.)
    }
});

it('FieldTypeEnum getIcon returns a string', function (): void {
    foreach (FieldTypeEnum::cases() as $case) {
<<<<<<< HEAD
        Assert::assertNotEmpty($case->getIcon());
=======
        expect($case->getIcon())->toBeString();
>>>>>>> c001364 (.)
    }
});

it('FieldTypeEnum getDescription returns a string', function (): void {
    foreach (FieldTypeEnum::cases() as $case) {
<<<<<<< HEAD
        Assert::assertNotEmpty($case->getDescription());
=======
        expect($case->getDescription())->toBeString();
>>>>>>> c001364 (.)
    }
});

it('FieldTypeEnum can be created from value', function (): void {
<<<<<<< HEAD
    Assert::assertSame(FieldTypeEnum::TEXT, FieldTypeEnum::from('text'));
    Assert::assertSame(FieldTypeEnum::EMAIL, FieldTypeEnum::from('email'));
=======
    expect(FieldTypeEnum::from('text'))->toBe(FieldTypeEnum::TEXT);
    expect(FieldTypeEnum::from('email'))->toBe(FieldTypeEnum::EMAIL);
>>>>>>> c001364 (.)
});

// --- TableLayout ---

it('TableLayout has correct values', function (): void {
<<<<<<< HEAD
    Assert::assertSame('list', TableLayout::LIST->value);
    Assert::assertSame('grid', TableLayout::GRID->value);
});

it('TableLayout getLabel returns non-empty strings via EnumTrait', function (): void {
    Assert::assertNotEmpty(TableLayout::LIST->getLabel());
    Assert::assertNotEmpty(TableLayout::GRID->getLabel());
});

it('TableLayout getColor returns translation keys via EnumTrait', function (): void {
    Assert::assertSame('ui::table_layout.values.list.color', TableLayout::LIST->getColor());
    Assert::assertSame('ui::table_layout.values.grid.color', TableLayout::GRID->getColor());
});

it('TableLayout getIcon returns translation keys via EnumTrait', function (): void {
    Assert::assertSame('ui::table_layout.values.list.icon', TableLayout::LIST->getIcon());
    Assert::assertSame('ui::table_layout.values.grid.icon', TableLayout::GRID->getIcon());
});

it('TableLayout toggle switches between layouts', function (): void {
    Assert::assertSame(TableLayout::GRID, TableLayout::LIST->toggle());
    Assert::assertSame(TableLayout::LIST, TableLayout::GRID->toggle());
});

it('TableLayout can be created from value', function (): void {
    Assert::assertSame(TableLayout::LIST, TableLayout::from('list'));
    Assert::assertSame(TableLayout::GRID, TableLayout::from('grid'));
=======
    expect(TableLayout::LIST->value)->toBe('list');
    expect(TableLayout::GRID->value)->toBe('grid');
});

it('TableLayout getLabel returns correct labels', function (): void {
    expect(TableLayout::LIST->getLabel())->toBe('List View');
    expect(TableLayout::GRID->getLabel())->toBe('Grid View');
});

it('TableLayout getColor returns correct colors', function (): void {
    expect(TableLayout::LIST->getColor())->toBe('primary');
    expect(TableLayout::GRID->getColor())->toBe('secondary');
});

it('TableLayout getIcon returns correct icons', function (): void {
    expect(TableLayout::LIST->getIcon())->toBe('heroicon-o-list-bullet');
    expect(TableLayout::GRID->getIcon())->toBe('heroicon-o-squares-2x2');
});

it('TableLayout toggle switches between layouts', function (): void {
    expect(TableLayout::LIST->toggle())->toBe(TableLayout::GRID);
    expect(TableLayout::GRID->toggle())->toBe(TableLayout::LIST);
});

it('TableLayout can be created from value', function (): void {
    expect(TableLayout::from('list'))->toBe(TableLayout::LIST);
    expect(TableLayout::from('grid'))->toBe(TableLayout::GRID);
>>>>>>> c001364 (.)
});
