<?php

declare(strict_types=1);

use Modules\Cms\Tests\TestCase;

it('GET /it/auth/verify acceptable', function (): void {
    $res = cmsGet('/it/auth/verify');
});
