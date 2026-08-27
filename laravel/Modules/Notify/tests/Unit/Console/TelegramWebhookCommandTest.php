<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Console;

use Modules\Notify\Console\Commands\TelegramWebhook;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< .merge_file_sFHybQ
uses(\Modules\Notify\Tests\TestCase::class);
=======
uses(TestCase::class)->group('no-notify-db');
>>>>>>> .merge_file_NxRntq

test('telegram webhook command has expected signature and handle returns void', function () {
    $command = new TelegramWebhook();

    Assert::assertSame('telegram:set-webhook', $command->getName());
    $command->handle();
});
