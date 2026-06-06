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
public function it_logs_registration_with_default_properties(): void
    {
        $user = new User(['type' => 'customer_user']);
        $user->forceFill(['id' => 1]);
=======
    public function itLogsRegistrationWithDefaultProperties(): void
    {
        $user = new User(['type' => 'standard']);        $user->forceFill(['id' => 1]);
>>>>>>> 8215f950 (.)

        $action = new LogRegistrationAction();
        $action->execute($user);

        $this->assertTrue(true);
    }

    #[Test]
<<<<<<< HEAD
public function it_logs_registration_with_custom_properties(): void
    {
=======
    public function itLogsRegistrationWithCustomProperties(): void    {
>>>>>>> 8215f950 (.)
        $user = new User(['type' => 'premium']);
        $user->forceFill(['id' => 2]);

        $action = new LogRegistrationAction();
        $action->execute($user, ['referral' => 'newsletter', 'source' => 'landing']);

        $this->assertTrue(true);
    }

    #[Test]
<<<<<<< HEAD
public function it_logs_registration_with_different_user_types(): void
    {
        $customerUser = new User(['type' => 'customer_user']);
        $customerUser->forceFill(['id' => 3]);

=======
    public function itLogsRegistrationWithDifferentUserTypes(): void
    {
        $standardUser = new User(['type' => 'standard']);
        $standardUser->forceFill(['id' => 3]);
>>>>>>> 8215f950 (.)
        $adminUser = new User(['type' => 'admin']);
        $adminUser->forceFill(['id' => 4]);

        $action = new LogRegistrationAction();

<<<<<<< HEAD
$action->execute($customerUser);
        $action->execute($adminUser);
=======
        $action->execute($standardUser);        $action->execute($adminUser);
>>>>>>> 8215f950 (.)

        $this->assertTrue(true);
    }
}
