<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
namespace Modules\Cms\Tests\Feature\Frontoffice\FolioRoutes;

>>>>>>> dev
use Modules\Cms\Tests\TestCase;

uses(TestCase::class);

it('GET /it/auth/login is reachable', function (): void {
<<<<<<< HEAD
    /** @phpstan-ignore-next-line property.notFound */
=======
>>>>>>> dev
    $res = $this->get('/it/auth/login');
    expect($res->getStatusCode())->toBeIn([200, 204, 301, 302, 303, 307, 308]);
});
