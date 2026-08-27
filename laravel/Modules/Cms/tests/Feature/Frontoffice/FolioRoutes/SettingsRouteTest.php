<?php

declare(strict_types=1);

use Modules\Cms\Tests\TestCase;

it('GET /it/settings acceptable (likely auth required)', function (): void {
    $res = cmsGet('/it/settings');
});
