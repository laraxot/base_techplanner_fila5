<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Console\Commands;

use Illuminate\Console\Command;
use Modules\Notify\Console\Commands\SendMailCommand;
<<<<<<< .merge_file_LtVCDq

use PHPUnit\Framework\Assert;
=======
use PHPUnit\Framework\Assert;

>>>>>>> .merge_file_LNBTAa
describe('SendMailCommand', function () {
    it('has correct signature', function () {
        $command = new SendMailCommand();

        Assert::assertSame('notify:send-mail', $command->getName());
    });

    it('has description', function () {
        $command = new SendMailCommand();

        $description = $command->getDescription();

        Assert::assertNotEmpty($description);
    });

    it('extends command', function () {
        $command = new SendMailCommand();

        Assert::assertInstanceOf(Command::class, $command);
    });

<<<<<<< .merge_file_LtVCDq
    it('has handle method', function () {
        $command = new SendMailCommand;

            });
=======
    it('handle is a public command entrypoint', function () {
        $command = new SendMailCommand();
        $method = new \ReflectionMethod($command, 'handle');

        Assert::assertTrue($method->isPublic());
        Assert::assertSame('handle', $method->getName());
    });
>>>>>>> .merge_file_LNBTAa
});
