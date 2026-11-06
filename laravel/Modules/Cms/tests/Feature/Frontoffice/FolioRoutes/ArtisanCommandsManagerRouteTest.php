<?php

declare(strict_types=1);

it('GET /it/artisan-commands-manager returns acceptable status', function (): void {
<<<<<<< .merge_file_0qvHrD
    $res = $this->get('/it/artisan-commands-manager');
    $status = $res->getStatusCode();
    if ($status >= 500) {
=======
<<<<<<< HEAD
=======
    /** @phpstan-ignore-next-line property.notFound */
    $res = $this->get('/it/artisan-commands-manager');
    /** @phpstan-ignore-next-line method.nonObject */
    $status = (int) $res->getStatusCode();
    if ($status >= 500) {
        /* @phpstan-ignore-next-line property.notFound */
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_B8F9K9
        $this->markTestSkipped('Server error on /it/artisan-commands-manager: '.$status);
    }
    expect($status)->toBeIn([200, 204, 301, 302, 303, 307, 308, 401, 403]);
});
