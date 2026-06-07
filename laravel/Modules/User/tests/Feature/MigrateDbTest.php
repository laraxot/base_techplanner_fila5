<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
namespace Modules\User\Tests\Feature;

>>>>>>> dev
use Modules\User\Tests\TestCase;

uses(TestCase::class);

it('migrates the test database', function () {
    $this->artisan('migrate:fresh', [
        '--force' => true,
        '--env' => 'testing',
        '--path' => [
            'database/migrations',
            'Modules/Xot/database/migrations',
            'Modules/User/database/migrations',
        ],
    ])->assertExitCode(0);
});
