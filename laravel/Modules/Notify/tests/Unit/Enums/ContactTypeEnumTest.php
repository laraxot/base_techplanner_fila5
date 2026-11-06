<?php

declare(strict_types=1);

<<<<<<< .merge_file_Cel8y3
namespace Modules\Notify\Tests\Unit\Enums;
=======
<<<<<<< HEAD
=======
namespace Modules\Notify\Tests\Unit\Enums;
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_n2iIha

use Filament\Forms\Components\TextInput;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Modules\Notify\Enums\ContactTypeEnum;
<<<<<<< .merge_file_Cel8y3
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;
=======
<<<<<<< HEAD
=======
use ReflectionClass;
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_n2iIha

use function Safe\class_implements;

uses(TestCase::class);
it('has correct cases', function (): void {
    Assert::assertCount(6, ContactTypeEnum::cases());
    Assert::assertSame('phone', ContactTypeEnum::PHONE->value);
    Assert::assertSame('mobile', ContactTypeEnum::MOBILE->value);
    Assert::assertSame('email', ContactTypeEnum::EMAIL->value);
    Assert::assertSame('pec', ContactTypeEnum::PEC->value);
    Assert::assertSame('whatsapp', ContactTypeEnum::WHATSAPP->value);
    Assert::assertSame('fax', ContactTypeEnum::FAX->value);
});

it('implements filament contracts', function (): void {
    $interfaces = class_implements(ContactTypeEnum::class) ?: [];

    Assert::assertArrayHasKey(HasLabel::class, $interfaces);
    Assert::assertArrayHasKey(HasIcon::class, $interfaces);
    Assert::assertArrayHasKey(HasColor::class, $interfaces);
});

it('has trans trait', function (): void {
<<<<<<< .merge_file_Cel8y3
    $reflection = new \ReflectionClass(ContactTypeEnum::class);
=======
<<<<<<< HEAD
=======
    $reflection = new ReflectionClass(ContactTypeEnum::class);
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_n2iIha
    $traits = $reflection->getTraitNames();

    Assert::assertContains('Modules\\Xot\\Traits\\EnumTrait', $traits);
});

it('has required methods', function (): void {
    $reflection = new \ReflectionClass(ContactTypeEnum::class);

    foreach (['getLabel', 'getIcon', 'getColor', 'getSearchable', 'getFormSchema'] as $method) {
        Assert::assertTrue($reflection->hasMethod($method));
    }
});

it('getSearchable returns all values', function (): void {
    $searchable = ContactTypeEnum::getSearchable();
    Assert::assertCount(6, $searchable);

    foreach (['phone', 'mobile', 'email', 'pec', 'whatsapp', 'fax'] as $value) {
        Assert::assertContains($value, $searchable);
    }
});

it('getFormSchema returns TextInput components', function (): void {
    $schema = ContactTypeEnum::PHONE->getFormSchema();
    Assert::assertCount(6, $schema);
    foreach ($schema as $component) {
        Assert::assertSame(TextInput::class, $component::class);
    }
});

it('each case has a unique value', function (): void {
    $values = array_map(static fn (ContactTypeEnum $case): string => $case->value, ContactTypeEnum::cases());
    $uniqueValues = array_unique($values);

    Assert::assertCount(count($values), $uniqueValues);
});