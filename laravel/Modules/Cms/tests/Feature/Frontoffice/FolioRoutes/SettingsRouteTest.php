<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
namespace Modules\Cms\Tests\Feature\Frontoffice\FolioRoutes;

>>>>>>> dev
use Modules\Cms\Tests\TestCase;

uses(TestCase::class);

it('GET /it/settings acceptable (likely auth required)', function (): void {
<<<<<<< HEAD
    /** @phpstan-ignore-next-line property.notFound */
=======
>>>>>>> dev
    $res = $this->get('/it/settings');
    expect($res->getStatusCode())->toBeIn([200, 204, 301, 302, 303, 307, 308, 401, 403]);
});
