<?php

declare(strict_types=1);

use Modules\Cms\Tests\TestCase;

it('GET /it/auth/password/confirm acceptable', function (): void {
    $res = cmsGet('/it/auth/password/confirm');
});
