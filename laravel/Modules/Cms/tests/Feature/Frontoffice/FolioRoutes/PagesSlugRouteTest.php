<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
namespace Modules\Cms\Tests\Feature\Frontoffice\FolioRoutes;

>>>>>>> dev
use Modules\Cms\Tests\TestCase;

uses(TestCase::class);

<<<<<<< HEAD
<<<<<<< HEAD
it('SKIP dynamic /it/{slug}', function (): void {
=======
it('SKIP dynamic /it/pages/{slug}', function (): void {
>>>>>>> 4b6b99016 (first commit)
    /* @phpstan-ignore-next-line property.notFound */
=======
it('SKIP dynamic /it/{slug}', function (): void {
>>>>>>> dev
    $this->markTestSkipped('Dynamic pages slug requires fixture.');
});
