<?php

declare(strict_types=1);

use Modules\Cms\Tests\TestCase;

it('GET /it/auth/register is reachable', function (): void {
    $res = cmsGet('/it/auth/register');
});
