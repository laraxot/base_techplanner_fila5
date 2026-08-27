<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Datas;

use Modules\Notify\Actions\SMS\NormalizePhoneNumberAction;
use Modules\Notify\Datas\RecordNotificationData;
use Modules\Notify\Tests\TestCase;
use Modules\User\Models\User;
<<<<<<< .merge_file_cF3m8k
=======
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_8bxUXs

uses(\Modules\Notify\Tests\TestCase::class);
=======
>>>>>>> .merge_file_gcJvPt
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('no-notify-db');
>>>>>>> .merge_file_F0DnZG

test('record notification data returns mail route', function (): void {
    $user = new User();
    $user->setAttribute('email', 'recipient@example.test');

    $data = RecordNotificationData::from([
        'record' => $user,
        'channel' => 'mail',
    ]);

    Assert::assertSame('mail', $data->getChannel());
    Assert::assertSame('recipient@example.test', $data->getRoute());
});

test('record notification data returns normalized sms route', function (): void {
    app()->instance(NormalizePhoneNumberAction::class, new class()
    {
        public function execute(string $phone): string
        {
            return '+39'.$phone;
        }
    });

    $user = new User();
    $user->setAttribute('phone', '3331234567');

    $data = RecordNotificationData::from([
        'record' => $user,
        'channel' => 'sms',
    ]);

    Assert::assertSame('+393331234567', $data->getRoute());
});

test('record notification data throws for unsupported channel', function (): void {
    $user = new User();
    $user->setAttribute('email', 'recipient@example.test');

    $data = RecordNotificationData::from([
        'record' => $user,
        'channel' => 'telegram',
    ]);

<<<<<<< .merge_file_8bxUXs
    \assertNotifyThrows(
=======
    XotBasePest::assertThrows(
>>>>>>> .merge_file_F0DnZG
        fn () => $data->getRoute(),
        \Exception::class,
    );
});
