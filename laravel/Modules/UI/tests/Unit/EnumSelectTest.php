<?php

declare(strict_types=1);

namespace Modules\UI\Tests\Unit;

use Modules\UI\Filament\Forms\Components\EnumSelect;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;

uses(\Modules\UI\Tests\TestCase::class);

it('generates options from enum class', function (): void {
=======
use PHPUnit\Framework\TestCase;

/*
 * @uses TestCase
 */
it('generates options from enum class', function () {
>>>>>>> c001364 (.)
    $select = EnumSelect::make('enum');
    $select->enum(TestColorEnum::class);

    $options = $select->getOptions();

<<<<<<< HEAD
    Assert::assertCount(3, $options);
    foreach (['red', 'green', 'blue'] as $key) {
        Assert::assertArrayHasKey($key, $options);
    }
});

it('uses HasLabel interface when available', function (): void {
=======
    expect($options)->toBeArray()
        ->toHaveCount(3)
        ->toHaveKeys(['red', 'green', 'blue']);
});

it('uses HasLabel interface when available', function () {
>>>>>>> c001364 (.)
    $select = EnumSelect::make('enum');
    $select->enum(TestColorEnum::class);

    $options = $select->getOptions();

<<<<<<< HEAD
    Assert::assertNotEmpty($options['red']);
    Assert::assertNotEmpty($options['green']);
});

it('falls back to case name when HasLabel not implemented', function (): void {
=======
    expect($options['red'])->toContain('Rosso');
    expect($options['green'])->toContain('Verde');
});

it('falls back to case name when HasLabel not implemented', function () {
>>>>>>> c001364 (.)
    $select = EnumSelect::make('enum');
    $select->enum(TestNoLabelEnum::class);

    $options = $select->getOptions();

<<<<<<< HEAD
    Assert::assertSame('ALPHA', $options['alpha']);
    Assert::assertSame('BETA', $options['beta']);
});

it('rejects plain (non-backed) enums when resolving options', function (): void {
    $select = EnumSelect::make('enum')->enum(TestPureUnitEnum::class);

    try {
        $select->getOptions();
        Assert::fail('Expected InvalidArgumentException');
    } catch (\InvalidArgumentException $e) {
        Assert::assertStringContainsString('must be a backed enum', $e->getMessage());
    }
});

it('rejects classes that are not enums when resolving options', function (): void {
    $select = EnumSelect::make('enum')->enum(\stdClass::class);

    try {
        $select->getOptions();
        Assert::fail('Expected InvalidArgumentException');
    } catch (\InvalidArgumentException $e) {
        Assert::assertStringContainsString('does not exist', $e->getMessage());
    }
});

it('converts value to enum case', function (): void {
=======
    expect($options['alpha'])->toBe('ALPHA');
    expect($options['beta'])->toBe('BETA');
});

it('rejects plain (non-backed) enums when resolving options', function () {
    $select = EnumSelect::make('enum')->enum(TestPureUnitEnum::class);

    expect(fn () => $select->getOptions())
        ->toThrow(\InvalidArgumentException::class, 'must be a backed enum');
});

it('rejects classes that are not enums when resolving options', function () {
    $select = EnumSelect::make('enum')->enum(\stdClass::class);

    expect(fn () => $select->getOptions())
        ->toThrow(\InvalidArgumentException::class, 'does not exist');
});

it('converts value to enum case', function () {
>>>>>>> c001364 (.)
    $select = EnumSelect::make('enum');
    $select->enum(TestColorEnum::class);

    $result = $select->convertToEnum('red');
<<<<<<< HEAD
    Assert::assertSame(TestColorEnum::RED, $result);
    $result = $select->convertToEnum('invalid');
    Assert::assertNull($result);
    $result = $select->convertToEnum(null);
    Assert::assertNull($result);
});

it('enables icons when requested', function (): void {
=======
    expect($result)->toBe(TestColorEnum::RED);

    $result = $select->convertToEnum('invalid');
    expect($result)->toBeNull();

    $result = $select->convertToEnum(null);
    expect($result)->toBeNull();
});

it('enables icons when requested', function () {
>>>>>>> c001364 (.)
    $select = EnumSelect::make('enum');
    $select->enum(TestColorEnum::class);
    $select->icons();

<<<<<<< HEAD
    Assert::assertTrue($select->hasIcons());
});

it('enables html labels when requested', function (): void {
=======
    expect($select->hasIcons())->toBeTrue();
});

it('enables html labels when requested', function () {
>>>>>>> c001364 (.)
    $select = EnumSelect::make('enum');
    $select->enum(TestColorEnum::class);
    $select->htmlLabels();

<<<<<<< HEAD
    Assert::assertTrue($select->allowsHtml());
});

it('returns correct enum class', function (): void {
    $select = EnumSelect::make('enum');
    $select->enum(TestColorEnum::class);

    Assert::assertSame(TestColorEnum::class, $select->getEnumClass());
});

it('formats html labels with icons', function (): void {
=======
    expect($select->allowsHtml())->toBeTrue();
});

it('returns correct enum class', function () {
    $select = EnumSelect::make('enum');
    $select->enum(TestColorEnum::class);

    expect($select->getEnumClass())->toBe(TestColorEnum::class);
});

it('formats html labels with icons', function () {
>>>>>>> c001364 (.)
    $select = EnumSelect::make('enum');
    $select->enum(TestColorEnum::class);
    $select->icons();
    $select->htmlLabels();

    $options = $select->getOptions();

<<<<<<< HEAD
    $redOption = $options['red'];
    Assert::assertIsString($redOption);
    Assert::assertStringContainsString('heroicon-o-exclamation', $redOption);
    Assert::assertStringContainsString('Rosso', $redOption);
=======
    expect($options['red'])->toContain('heroicon-o-exclamation');
    expect($options['red'])->toContain('Rosso');
>>>>>>> c001364 (.)
});
