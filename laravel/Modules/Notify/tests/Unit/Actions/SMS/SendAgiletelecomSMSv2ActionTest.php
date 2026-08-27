<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions\SMS;

use Modules\Notify\Actions\SMS\SendAgiletelecomSMSv2Action;
<<<<<<< .merge_file_9JiAFD
use Modules\Notify\Datas\SmsData;
=======
use Modules\Notify\Contracts\SMS\SmsActionContract;
use Modules\Notify\Datas\SmsData;
use PHPUnit\Framework\Assert;
>>>>>>> .merge_file_XOzMT8
use ReflectionClass;
use ReflectionNamedType;

describe('SendAgiletelecomSMSv2Action', function () {
    it('can be instantiated', function () {
<<<<<<< .merge_file_9JiAFD
        expect(new SendAgiletelecomSMSv2Action())->toBeInstanceOf(SendAgiletelecomSMSv2Action::class);
    });

    it('implements SmsActionContract', function () {
        expect(new SendAgiletelecomSMSv2Action())->toBeObject();
    });

    it('has execute method with correct signature', function () {
        $reflection = new ReflectionClass(new SendAgiletelecomSMSv2Action());
=======
        Assert::assertTrue(class_exists(SendAgiletelecomSMSv2Action::class));
    });

    it('implements SmsActionContract', function () {
        $action = new SendAgiletelecomSMSv2Action();

        Assert::assertInstanceOf(SmsActionContract::class, $action);
    });

    it('has execute method with correct signature', function () {
<<<<<<< .merge_file_rXH2CB
        $reflection = new ReflectionClass(new SendAgiletelecomSMSv2Action());
=======
        $reflection = new ReflectionClass(new SendAgiletelecomSMSv2Action);
>>>>>>> .merge_file_XOzMT8
>>>>>>> .merge_file_y1EBiT
        $method = $reflection->getMethod('execute');

        expect($method->isPublic())->toBeTrue();
        expect($method->getNumberOfParameters())->toBe(1);
    });

    it('execute accepts SmsData parameter', function () {
<<<<<<< .merge_file_rXH2CB
        $reflection = new ReflectionClass(new SendAgiletelecomSMSv2Action());
=======
<<<<<<< .merge_file_9JiAFD
        $reflection = new ReflectionClass(new SendAgiletelecomSMSv2Action());
=======
        $reflection = new ReflectionClass(new SendAgiletelecomSMSv2Action);
>>>>>>> .merge_file_XOzMT8
>>>>>>> .merge_file_y1EBiT
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();
        $type = $params[0]->getType();

        expect($type)->toBeInstanceOf(ReflectionNamedType::class);
        expect($type instanceof ReflectionNamedType ? $type->getName() : '')->toBe(SmsData::class);
    });

    it('execute returns array', function () {
<<<<<<< .merge_file_rXH2CB
        $reflection = new ReflectionClass(new SendAgiletelecomSMSv2Action());
=======
<<<<<<< .merge_file_9JiAFD
        $reflection = new ReflectionClass(new SendAgiletelecomSMSv2Action());
=======
        $reflection = new ReflectionClass(new SendAgiletelecomSMSv2Action);
>>>>>>> .merge_file_XOzMT8
>>>>>>> .merge_file_y1EBiT
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

        expect($returnType)->toBeInstanceOf(ReflectionNamedType::class);
        expect($returnType instanceof ReflectionNamedType ? $returnType->getName() : '')->toBe('array');
    });

    it('uses strict types', function () {
<<<<<<< .merge_file_rXH2CB
        $reflection = new ReflectionClass(new SendAgiletelecomSMSv2Action());
=======
<<<<<<< .merge_file_9JiAFD
        $reflection = new ReflectionClass(new SendAgiletelecomSMSv2Action());
=======
        $reflection = new ReflectionClass(new SendAgiletelecomSMSv2Action);
>>>>>>> .merge_file_XOzMT8
>>>>>>> .merge_file_y1EBiT
        $filename = $reflection->getFileName();

        expect($filename)->not->toBeNull();
        /** @var string $filename */
        $content = \Safe\file_get_contents($filename);
        expect($content)->toContain('declare(strict_types=1)');
    });

    it('has correct namespace', function () {
<<<<<<< .merge_file_rXH2CB
        $reflection = new ReflectionClass(new SendAgiletelecomSMSv2Action());
=======
<<<<<<< .merge_file_9JiAFD
        $reflection = new ReflectionClass(new SendAgiletelecomSMSv2Action());
=======
        $reflection = new ReflectionClass(new SendAgiletelecomSMSv2Action);
>>>>>>> .merge_file_XOzMT8
>>>>>>> .merge_file_y1EBiT

        expect($reflection->getNamespaceName())->toBe('Modules\\Notify\\Actions\\SMS');
    });

    it('has required imports', function () {
<<<<<<< .merge_file_rXH2CB
        $reflection = new ReflectionClass(new SendAgiletelecomSMSv2Action());
=======
<<<<<<< .merge_file_9JiAFD
        $reflection = new ReflectionClass(new SendAgiletelecomSMSv2Action());
=======
        $reflection = new ReflectionClass(new SendAgiletelecomSMSv2Action);
>>>>>>> .merge_file_XOzMT8
>>>>>>> .merge_file_y1EBiT
        $filename = $reflection->getFileName();
        /** @var string $filename */
        $content = \Safe\file_get_contents($filename);

        expect($content)->toContain('use Illuminate\\Support\\Facades\\Http;');
        expect($content)->toContain('use Modules\\Notify\\Datas\\SMS\\AgiletelecomData;');
    });

    it('does not use QueueableAction trait', function () {
<<<<<<< .merge_file_rXH2CB
        $traits = \Safe\class_uses(new SendAgiletelecomSMSv2Action());
=======
<<<<<<< .merge_file_9JiAFD
        $traits = \Safe\class_uses(new SendAgiletelecomSMSv2Action());

        expect($traits)->not->toContain('Spatie\\QueueableAction\\QueueableAction');
=======
        $traits = \Safe\class_uses(new SendAgiletelecomSMSv2Action);
>>>>>>> .merge_file_y1EBiT

        expect($traits)->toContain('Spatie\\QueueableAction\\QueueableAction');
>>>>>>> .merge_file_XOzMT8
    });
});
