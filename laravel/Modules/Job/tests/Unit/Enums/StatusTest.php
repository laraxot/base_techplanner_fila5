<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit\Enums;

use Modules\Job\Enums\Status;
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\file_get_contents;

uses(TestCase::class);

describe('Status', function () {
    it('is an enum', function () {
        $reflection = new \ReflectionClass(Status::class);

        Assert::assertTrue($reflection->isEnum());
    });

    it('has correct cases', function () {
        Assert::assertCount(4, Status::cases());
        Assert::assertSame('active', Status::Active->value);
        Assert::assertSame('inactive', Status::Inactive->value);
        Assert::assertSame('trashed', Status::Trashed->value);
        Assert::assertSame('1', Status::One->value);
    });

    it('implements Filament interfaces', function () {
        $interfaces = (new \ReflectionClass(Status::class))->getInterfaceNames();

        Assert::assertContains('Filament\Support\Contracts\HasColor', $interfaces);
        Assert::assertContains('Filament\Support\Contracts\HasIcon', $interfaces);
        Assert::assertContains('Filament\Support\Contracts\HasLabel', $interfaces);
    });

    /*
     * Questi due test si chiamavano «returns translation keys» e asserivano
     * esattamente quello: che `getColor()` restituisse
     * `job::status.values.active.color`. Cioe' mettevano per iscritto
     * l'**assenza** della traduzione come comportamento atteso.
     *
     * Quando una chiave non si risolve, `TransFuncTrait` restituisce
     * `'fix:'.$key`: l'interfaccia mostrava `fix:job::status.values.active.color`
     * dove Filament aspettava il nome di un colore. La sezione `values` del file
     * di lingua non esisteva; ora esiste, in italiano e in inglese
     * (base_quaeris_fila5#245).
     *
     * L'asserzione non e' sul valore letterale — coppierebbe il test al file di
     * lingua, e ogni ritocco al colore lo farebbe fallire — ma sull'invariante
     * che conta: ogni caso dell'enum ha una traduzione. E' lo stile che usa
     * gia' `Modules/Cms/tests/Unit/Enums/AttachmentDiskEnumTest.php`.
     */
    it('ogni caso ha un colore tradotto', function () {
        foreach (Status::cases() as $case) {
            Assert::assertStringStartsNotWith('fix:', $case->getColor(), $case->value);
            Assert::assertNotSame('', $case->getColor(), $case->value);
        }
    });

    it('ogni caso ha un icona tradotta', function () {
        foreach (Status::cases() as $case) {
            Assert::assertStringStartsNotWith('fix:', $case->getIcon(), $case->value);
            Assert::assertStringStartsWith('heroicon-', $case->getIcon(), $case->value);
        }
    });

    it('ogni caso ha un etichetta tradotta', function () {
        foreach (Status::cases() as $case) {
            Assert::assertStringStartsNotWith('fix:', $case->getLabel(), $case->value);
            Assert::assertNotSame('', $case->getLabel(), $case->value);
        }
    });

    it('getLabel returns a non-empty string', function () {
        Assert::assertNotSame('', Status::Inactive->getLabel());
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(Status::class);

        Assert::assertSame('Modules\Job\Enums', $reflection->getNamespaceName());
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(Status::class);
        $filename = $reflection->getFileName();

        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    });

    it('has required imports', function () {
        $filename = (new \ReflectionClass(Status::class))->getFileName();
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);

        Assert::assertStringContainsString('use Filament\Support\Contracts\HasColor;', $content);
        Assert::assertStringContainsString('use Filament\Support\Contracts\HasIcon;', $content);
        Assert::assertStringContainsString('use Filament\Support\Contracts\HasLabel;', $content);
    });

    it('can be used in match expressions', function () {
        $expected = [
            Status::Active->name => 'active',
            Status::Inactive->name => 'inactive',
            Status::Trashed->name => 'trashed',
            Status::One->name => 'one',
        ];

        foreach (Status::cases() as $status) {
            $result = match ($status) {
                Status::Active => 'active',
                Status::Inactive => 'inactive',
                Status::Trashed => 'trashed',
                Status::One => 'one',
            };

            Assert::assertSame($expected[$status->name], $result);
        }
    });
});
