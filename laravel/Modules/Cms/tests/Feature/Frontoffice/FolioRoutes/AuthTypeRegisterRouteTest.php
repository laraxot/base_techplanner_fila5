<?php

declare(strict_types=1);

use Modules\Cms\Tests\TestCase;

it('SKIP dynamic /it/auth/{type}/register', function (): void {
    cmsSkipTest('Dynamic type route requires fixture.');
});
