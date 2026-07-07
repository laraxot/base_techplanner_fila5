<?php

declare(strict_types=1);

use Modules\Cms\Tests\TestCase;

uses(TestCase::class);

<<<<<<< HEAD
    /* @phpstan-ignore-next-line property.notFound */
it('SKIP dynamic /it/{slug}', function (): void {
=======
it('SKIP dynamic /it/pages/{slug}', function (): void {
    /* @phpstan-ignore-next-line property.notFound */
>>>>>>> 6ed19256f (.)
    $this->markTestSkipped('Dynamic pages slug requires fixture.');
});
