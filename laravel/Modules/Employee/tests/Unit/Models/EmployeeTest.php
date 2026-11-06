<?php

declare(strict_types=1);

namespace Modules\Employee\Tests\Unit\Models;

use Modules\Employee\Models\Employee;
use Modules\Employee\Models\User;
use PHPUnit\Framework\Assert;
>>>>>>> .merge_file_6yevCP

>>>>>>> .merge_file_X4bKd9

test('employee is an employee-module user specialization', function (): void {
    $employee = new Employee();

    Assert::assertInstanceOf(User::class, $employee);
});
