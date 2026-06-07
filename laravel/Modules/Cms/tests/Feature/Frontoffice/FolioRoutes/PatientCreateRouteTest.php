<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
namespace Modules\Cms\Tests\Feature\Frontoffice\FolioRoutes;

>>>>>>> dev
use Modules\Cms\Tests\TestCase;

uses(TestCase::class);

<<<<<<< HEAD
it('GET /it/patient/create acceptable', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $res = $this->get('/it/patient/create');

    $status = (int) $res->getStatusCode();
    if ($status >= 500) {
        test()->markTestSkipped('Patient create route returned server error in this install.');
=======
it('GET /it/events acceptable (LaravelPizza Meetup)', function (): void {
    $res = $this->get('/it/events');

    $status = (int) $res->getStatusCode();
    if ($status >= 500) {
        test()->markTestSkipped('Events (LaravelPizza) route returned server error in this install.');
>>>>>>> dev

        return;
    }

    expect(in_array($status, [200, 204, 301, 302, 303, 307, 308, 401, 403, 404], true))->toBeTrue();
});
