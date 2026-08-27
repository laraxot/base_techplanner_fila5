<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions;

<<<<<<< .merge_file_fXMCSu
use InvalidArgumentException;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Notifications\Notification as IlluminateNotification;
use Illuminate\Support\Facades\Notification;
use Modules\Notify\Actions\SendNotificationToRecipientAction;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);
=======
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Notifications\Notification as IlluminateNotification;
use Illuminate\Support\Facades\Notification;
use InvalidArgumentException;
use Modules\Notify\Actions\SendNotificationToRecipientAction;
use Modules\Notify\Tests\TestCase;
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('no-notify-db');
>>>>>>> .merge_file_KxSnwd

function makeDummyNotificationForRecipient(): IlluminateNotification
{
    return new class() extends IlluminateNotification
    {
        /** @return list<string> */
        public function via(object $notifiable): array
        {
            return ['mail'];
        }
    };
}

test('send notification to recipient returns true and routes mail', function () {
    Notification::fake();
    $notification = makeDummyNotificationForRecipient();

    $result = app(SendNotificationToRecipientAction::class)->execute(
        'user@example.test',
        $notification,
    );

    Assert::assertTrue($result);
    Notification::assertSentOnDemand(
        $notification::class,
        static function (IlluminateNotification $notification, array $channels, AnonymousNotifiable $notifiable): bool {
            return ($notifiable->routes['mail'] ?? null) === 'user@example.test';
        }
    );
});

test('send notification to recipient throws for invalid email', function () {
<<<<<<< .merge_file_fXMCSu
    \assertNotifyThrows(
=======
    XotBasePest::assertThrows(
>>>>>>> .merge_file_KxSnwd
        fn () => app(SendNotificationToRecipientAction::class)->execute(
            'invalid-email',
            makeDummyNotificationForRecipient(),
        ),
<<<<<<< .merge_file_fXMCSu
        \InvalidArgumentException::class,
=======
        InvalidArgumentException::class,
>>>>>>> .merge_file_KxSnwd
    );
});
