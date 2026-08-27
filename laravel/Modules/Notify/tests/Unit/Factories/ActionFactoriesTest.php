<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Factories;

use Modules\Notify\Actions\SMS\SendSmsFactorSMSAction;
use Modules\Notify\Contracts\SMS\SmsActionContract;
use Modules\Notify\Contracts\TelegramProviderActionInterface;
use Modules\Notify\Contracts\WhatsAppProviderActionInterface;
use Modules\Notify\Factories\TelegramActionFactory;
use Modules\Notify\Factories\WhatsAppActionFactory;
use Modules\Notify\Tests\TestCase;
<<<<<<< .merge_file_leAf04
=======
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_HjBZEd

uses(TestCase::class);
=======
>>>>>>> .merge_file_HDWeKM
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('notify-db');
>>>>>>> .merge_file_2NuGvP

test('sms action resolves default smsfactor driver instance', function () {
    config()->set('sms.default', 'smsfactor');
    config()->set('sms.drivers.smsfactor.token', 'token-123');

    $action = app(SendSmsFactorSMSAction::class);

    Assert::assertInstanceOf(SmsActionContract::class, $action);
});

test('telegram action factory creates official driver instance', function () {
    config()->set('services.telegram.token', 'telegram-token');

    $factory = new TelegramActionFactory();
    $action = $factory->create('official');

    Assert::assertInstanceOf(TelegramProviderActionInterface::class, $action);
});

test('telegram action factory throws for unsupported driver', function () {
<<<<<<< .merge_file_HjBZEd
    \assertNotifyThrows(
=======
    XotBasePest::assertThrows(
<<<<<<< .merge_file_leAf04
        fn () => (new TelegramActionFactory())->create('unsupported'),
=======
>>>>>>> .merge_file_2NuGvP
        fn () => (new TelegramActionFactory)->create('unsupported'),
>>>>>>> .merge_file_HDWeKM
        \Exception::class,
    );
});

test('whatsapp action factory creates twilio driver instance', function () {
    config()->set('services.twilio.account_sid', 'sid-123');
    config()->set('services.twilio.auth_token', 'token-123');

    $factory = new WhatsAppActionFactory();
    $action = $factory->create('twilio');

    Assert::assertInstanceOf(WhatsAppProviderActionInterface::class, $action);
});

test('whatsapp action factory throws for unsupported driver', function () {
<<<<<<< .merge_file_HjBZEd
    \assertNotifyThrows(
=======
    XotBasePest::assertThrows(
<<<<<<< .merge_file_leAf04
        fn () => (new WhatsAppActionFactory())->create('unsupported'),
=======
>>>>>>> .merge_file_2NuGvP
        fn () => (new WhatsAppActionFactory)->create('unsupported'),
>>>>>>> .merge_file_HDWeKM
        \Exception::class,
    );
});
