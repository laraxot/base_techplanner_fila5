<?php

declare(strict_types=1);

<<<<<<< .merge_file_O92rff
it('SKIP dynamic /it/pages/{slug}', function (): void {
=======
use Modules\Cms\Tests\TestCase;

uses(TestCase::class);

<<<<<<< HEAD
    /* @phpstan-ignore-next-line property.notFound */
it('SKIP dynamic /it/{slug}', function (): void {
=======
it('SKIP dynamic /it/pages/{slug}', function (): void {
    /* @phpstan-ignore-next-line property.notFound */
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_NmdGPV
    $this->markTestSkipped('Dynamic pages slug requires fixture.');
});
