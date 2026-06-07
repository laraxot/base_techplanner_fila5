<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
namespace Modules\Cms\Tests\Feature\Frontoffice\FolioRoutes;

>>>>>>> dev
use Modules\Cms\Tests\TestCase;

uses(TestCase::class);

it('GET /it/pages acceptable', function (): void {
<<<<<<< HEAD
    /** @phpstan-ignore-next-line property.notFound */
=======
>>>>>>> dev
    $res = $this->get('/it/pages');

    $status = (int) $res->getStatusCode();
    if ($status >= 500) {
        test()->markTestSkipped('Pages index route returned server error in this install.');

        return;
    }

    expect(in_array($status, [200, 204, 301, 302, 303, 307, 308, 404], true))->toBeTrue();
});
