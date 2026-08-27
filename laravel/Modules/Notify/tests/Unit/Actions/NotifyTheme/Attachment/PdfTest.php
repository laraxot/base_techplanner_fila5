<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions\NotifyTheme\Attachment;

use Modules\Notify\Actions\NotifyTheme\Attachment\Pdf;
use Modules\Notify\Datas\AttachmentData;
use Modules\Notify\Tests\TestCase;
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;
use Spatie\QueueableAction\QueueableAction;
<<<<<<< .merge_file_g4XGN5
=======
<<<<<<< .merge_file_ruVxEa

use function Safe\class_uses;

uses(TestCase::class);
=======
use Modules\Xot\Tests\XotBasePest;
>>>>>>> .merge_file_HkT2mh

use function Safe\class_uses;

uses(TestCase::class)->group('notify-db');
>>>>>>> .merge_file_Rs3gPe

describe('NotifyTheme\Attachment\Pdf', function () {
    it('can be instantiated', function () {
        Assert::assertTrue(class_exists(Pdf::class));
    });

    it('uses QueueableAction trait', function () {
        $traits = class_uses(AttachmentData::class);
        Assert::assertArrayHasKey(QueueableAction::class, $traits);
    });

    it('has execute method with correct signature', function () {
        $reflection = new \ReflectionClass(Pdf::class);
        $method = $reflection->getMethod('execute');

        Assert::assertTrue($method->isPublic());
        Assert::assertSame(2, $method->getNumberOfParameters());
    });

    it('execute accepts string and array parameters', function () {
        $reflection = new \ReflectionClass(Pdf::class);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();

<<<<<<< .merge_file_ruVxEa
        \assertReflectionTypeName($params[0]->getType(), 'string');
        \assertReflectionTypeName($params[1]->getType(), 'array');
=======
        XotBasePest::assertReflectionTypeName($params[0]->getType(), 'string');
        XotBasePest::assertReflectionTypeName($params[1]->getType(), 'array');
>>>>>>> .merge_file_Rs3gPe
    });

    it('execute returns AttachmentData', function () {
        $reflection = new \ReflectionClass(Pdf::class);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

<<<<<<< .merge_file_ruVxEa
        \assertReflectionTypeName($returnType, AttachmentData::class);
=======
        XotBasePest::assertReflectionTypeName($returnType, AttachmentData::class);
>>>>>>> .merge_file_Rs3gPe
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(Pdf::class);
<<<<<<< .merge_file_ruVxEa
        $content = \notifyReflectionSource($reflection);
=======
        $content = TestCase::notifyReflectionSource($reflection);
>>>>>>> .merge_file_Rs3gPe
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(Pdf::class);

        Assert::assertSame('Modules\Notify\Actions\NotifyTheme\Attachment', $reflection->getNamespaceName());
    });

    it('has required imports', function () {
<<<<<<< .merge_file_ruVxEa
        $content = \notifyReflectionSource(new \ReflectionClass(Pdf::class));
=======
        $content = TestCase::notifyReflectionSource(new \ReflectionClass(Pdf::class));
>>>>>>> .merge_file_Rs3gPe

        Assert::assertStringContainsString('use Modules\Notify\Actions\NotifyTheme\Get', $content);
        Assert::assertStringContainsString('use Modules\Notify\Datas\AttachmentData', $content);
        Assert::assertStringContainsString('use Modules\Xot\Actions\Html\HtmlToPdfAction', $content);
    });
});
