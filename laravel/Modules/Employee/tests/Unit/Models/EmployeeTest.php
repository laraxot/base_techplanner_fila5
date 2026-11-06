<?php

declare(strict_types=1);

namespace Modules\Employee\Tests\Unit\Models;

use Modules\Employee\Models\Employee;
<<<<<<< .merge_file_D2EiWT
use Modules\Employee\Models\User;
use PHPUnit\Framework\Assert;
=======
use Modules\Employee\Models\Position;
use Modules\Employee\Tests\TestCase;

>>>>>>> .merge_file_X4bKd9

test('employee is an employee-module user specialization', function (): void {
    $employee = new Employee();

    Assert::assertInstanceOf(User::class, $employee);
});
