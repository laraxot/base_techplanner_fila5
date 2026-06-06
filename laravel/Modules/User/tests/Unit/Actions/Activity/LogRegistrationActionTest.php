<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Actions\Activity;

use Modules\User\Actions\Activity\LogRegistrationAction;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class LogRegistrationActionTest extends TestCase
{
    #[Test]
<<<<<<< HEAD
    public function itLogsRegistrationWithDefaultProperties(): void
    {
        $user = new User(['type' => 'standard']);
=======
    public function it_logs_registration_with_default_properties(): void
    {
        $user = new User(['type' => 'customer_user']);
>>>>>>> origin/dev
        $user->forceFill(['id' => 1]);

        $action = new LogRegistrationAction();
        $action->execute($user);

        $this->assertTrue(true);
    }

    #[Test]
<<<<<<< HEAD
    public function itLogsRegistrationWithCustomProperties(): void
=======
    public function it_logs_registration_with_custom_properties(): void
>>>>>>> origin/dev
    {
        $user = new User(['type' => 'premium']);
        $user->forceFill(['id' => 2]);

        $action = new LogRegistrationAction();
        $action->execute($user, ['referral' => 'newsletter', 'source' => 'landing']);

        $this->assertTrue(true);
    }

    #[Test]
<<<<<<< HEAD
    public function itLogsRegistrationWithDifferentUserTypes(): void
    {
        $standardUser = new User(['type' => 'standard']);
        $standardUser->forceFill(['id' => 3]);
=======
    public function it_logs_registration_with_different_user_types(): void
    {
        $customerUser = new User(['type' => 'customer_user']);
        $customerUser->forceFill(['id' => 3]);
>>>>>>> origin/dev

        $adminUser = new User(['type' => 'admin']);
        $adminUser->forceFill(['id' => 4]);

        $action = new LogRegistrationAction();

<<<<<<< HEAD
        $action->execute($standardUser);
=======
        $action->execute($customerUser);
>>>>>>> origin/dev
        $action->execute($adminUser);

        $this->assertTrue(true);
    }
}
