<?php

declare(strict_types=1);

use Modules\Cms\Tests\TestCase;

it('GET /it/profile acceptable (likely auth required)', function (): void {
    $res = cmsGet('/it/profile');
});
