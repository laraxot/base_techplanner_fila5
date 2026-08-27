<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions\SMS;

use Modules\Notify\Actions\SMS\SendAgiletelecomSMSAction;
use Modules\Notify\Datas\SmsData;
<<<<<<< .merge_file_lAxRf7
=======
<<<<<<< .merge_file_mFbmTz
=======
use PHPUnit\Framework\Assert;
>>>>>>> .merge_file_A906xN
>>>>>>> .merge_file_AVFaIL
use ReflectionClass;
use ReflectionNamedType;

it('SendAgiletelecomSMSAction can be instantiated', function () {
<<<<<<< .merge_file_lAxRf7
    $action = new SendAgiletelecomSMSAction();
    expect($action)->toBeInstanceOf(SendAgiletelecomSMSAction::class);
});

it('SendAgiletelecomSMSAction has execute method with correct signature', function () {
    $action = new SendAgiletelecomSMSAction();
=======
<<<<<<< .merge_file_mFbmTz
    $action = new SendAgiletelecomSMSAction();
    expect($action)->toBeInstanceOf(SendAgiletelecomSMSAction::class);
});

it('SendAgiletelecomSMSAction has execute method with correct signature', function () {
    $action = new SendAgiletelecomSMSAction();
=======
    Assert::assertTrue(class_exists(SendAgiletelecomSMSAction::class));
});

it('SendAgiletelecomSMSAction has execute method with correct signature', function () {
    $action = new SendAgiletelecomSMSAction;
>>>>>>> .merge_file_A906xN
>>>>>>> .merge_file_AVFaIL
    $reflection = new ReflectionClass($action);
    $method = $reflection->getMethod('execute');

    expect($method->isPublic())->toBeTrue();
    expect($method->getNumberOfParameters())->toBe(1);
});

it('SendAgiletelecomSMSAction execute accepts SmsData parameter', function () {
<<<<<<< .merge_file_lAxRf7
    $action = new SendAgiletelecomSMSAction();
=======
<<<<<<< .merge_file_mFbmTz
    $action = new SendAgiletelecomSMSAction();
=======
    $action = new SendAgiletelecomSMSAction;
>>>>>>> .merge_file_A906xN
>>>>>>> .merge_file_AVFaIL
    $reflection = new ReflectionClass($action);
    $method = $reflection->getMethod('execute');
    $params = $method->getParameters();
    $type = $params[0]->getType();

    expect($type instanceof ReflectionNamedType ? $type->getName() : null)->toBe(SmsData::class);
});

it('SendAgiletelecomSMSAction execute returns array', function () {
<<<<<<< .merge_file_lAxRf7
    $action = new SendAgiletelecomSMSAction();
=======
<<<<<<< .merge_file_mFbmTz
    $action = new SendAgiletelecomSMSAction();
=======
    $action = new SendAgiletelecomSMSAction;
>>>>>>> .merge_file_A906xN
>>>>>>> .merge_file_AVFaIL
    $reflection = new ReflectionClass($action);
    $method = $reflection->getMethod('execute');
    $returnType = $method->getReturnType();

    expect($returnType instanceof ReflectionNamedType ? $returnType->getName() : null)->toBe('array');
});

it('SendAgiletelecomSMSAction uses strict types', function () {
<<<<<<< .merge_file_lAxRf7
    $action = new SendAgiletelecomSMSAction();
=======
<<<<<<< .merge_file_mFbmTz
    $action = new SendAgiletelecomSMSAction();
=======
    $action = new SendAgiletelecomSMSAction;
>>>>>>> .merge_file_A906xN
>>>>>>> .merge_file_AVFaIL
    $reflection = new ReflectionClass($action);
    $filename = $reflection->getFileName();

    expect($filename)->not->toBeNull();
    /** @var string $filename */
    $content = \Safe\file_get_contents($filename);
    expect($content)->toContain('declare(strict_types=1)');
});

it('SendAgiletelecomSMSAction has correct namespace', function () {
<<<<<<< .merge_file_lAxRf7
    $action = new SendAgiletelecomSMSAction();
=======
<<<<<<< .merge_file_mFbmTz
    $action = new SendAgiletelecomSMSAction();
=======
    $action = new SendAgiletelecomSMSAction;
>>>>>>> .merge_file_A906xN
>>>>>>> .merge_file_AVFaIL
    $reflection = new ReflectionClass($action);

    expect($reflection->getNamespaceName())->toBe('Modules\\Notify\\Actions\\SMS');
});

it('SendAgiletelecomSMSAction has required imports', function () {
<<<<<<< .merge_file_lAxRf7
    $action = new SendAgiletelecomSMSAction();
=======
<<<<<<< .merge_file_mFbmTz
    $action = new SendAgiletelecomSMSAction();
=======
    $action = new SendAgiletelecomSMSAction;
>>>>>>> .merge_file_A906xN
>>>>>>> .merge_file_AVFaIL
    $reflection = new ReflectionClass($action);
    $filename = $reflection->getFileName();
    /** @var string $filename */
    $content = \Safe\file_get_contents($filename);

    expect($content)->toContain('use Modules\\Notify\\Contracts\\SMS\\SmsActionContract;');
    expect($content)->toContain('use Modules\\Notify\\Datas\\SmsData;');
});

<<<<<<< .merge_file_mFbmTz
it('SendAgiletelecomSMSAction does not use QueueableAction trait', function () {
    $action = new SendAgiletelecomSMSAction();
    $traits = \Safe\class_uses($action);

    expect($traits)->not->toContain('Spatie\\QueueableAction\\QueueableAction');
=======
it('SendAgiletelecomSMSAction uses QueueableAction trait', function () {
    $action = new SendAgiletelecomSMSAction();
    $traits = \Safe\class_uses($action);

    expect($traits)->toContain('Spatie\\QueueableAction\\QueueableAction');
>>>>>>> .merge_file_A906xN
});
