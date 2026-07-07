<?php

declare(strict_types=1);

use Modules\Cms\Tests\TestCase;

uses(TestCase::class);

it('SKIP dynamic /it/auth/{type}/register', function (): void {
<<<<<<< HEAD
=======
    /* @phpstan-ignore-next-line property.notFound */
>>>>>>> 6ed19256f (.)
    $this->markTestSkipped('Dynamic type route requires fixture.');
});
